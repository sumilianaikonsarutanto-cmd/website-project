<?php
/**
 * 管理画面「中房家ホームページ設定」
 * プラグイン不要。設定 API + メディアアップローダーのみ。
 */
if (!defined('ABSPATH')) {
    exit;
}

function chuboya_admin_menu() {
    add_menu_page(
        '中房家ホームページ設定',
        '中房家ホームページ設定',
        'edit_theme_options',
        'chuboya-settings',
        'chuboya_render_admin_page',
        'dashicons-store',
        59
    );
}
add_action('admin_menu', 'chuboya_admin_menu');

function chuboya_admin_assets($hook) {
    if ($hook !== 'toplevel_page_chuboya-settings') {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_style(
        'chuboya-admin',
        get_template_directory_uri() . '/assets/css/admin.css',
        array(),
        CHUBOYA_VERSION
    );
    wp_enqueue_script(
        'chuboya-admin',
        get_template_directory_uri() . '/assets/js/admin.js',
        array('jquery'),
        CHUBOYA_VERSION,
        true
    );
}
add_action('admin_enqueue_scripts', 'chuboya_admin_assets');

function chuboya_save_settings() {
    if (!isset($_POST['chuboya_save']) || !isset($_POST['chuboya_nonce'])) {
        return;
    }
    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['chuboya_nonce'])), 'chuboya_save_settings')) {
        wp_die('不正なリクエストです。');
    }
    if (!current_user_can('edit_theme_options')) {
        wp_die('権限がありません。');
    }

    $defaults = chuboya_defaults();
    $clean = array();
    $posted = isset($_POST['chuboya']) && is_array($_POST['chuboya']) ? wp_unslash($_POST['chuboya']) : array();

    foreach ($defaults as $key => $default) {
        if (strpos($key, 'photo_') === 0) {
            $clean[$key] = isset($posted[$key]) ? absint($posted[$key]) : 0;
            continue;
        }
        if (strpos($key, '_chip') !== false) {
            $clean[$key] = !empty($posted[$key]) ? '1' : '0';
            continue;
        }
        if (!isset($posted[$key]) || $posted[$key] === '') {
            $clean[$key] = $default;
            continue;
        }
        $value = $posted[$key];
        if (in_array($key, array('hero_lead', 'menu_lead', 'night_lead', 'seats_lead', 'cta_lead', 'about_p1', 'about_p2', 'lunch_text', 'drink_text', 'lunch_note', 'night_note', 'drink_note', 'menu_note', 'about_note', 'seats_note', 'voices_note', 'map_note', 'seo_description', 'seo_og_description'), true)
            || strpos($key, 'faq_a_') === 0
            || strpos($key, '_text') !== false
        ) {
            $clean[$key] = sanitize_textarea_field($value);
        } else {
            $clean[$key] = sanitize_text_field($value);
        }
    }

    update_option(CHUBOYA_OPTION, $clean, false);

    wp_safe_redirect(add_query_arg(array(
        'page' => 'chuboya-settings',
        'updated' => '1',
    ), admin_url('admin.php')));
    exit;
}
add_action('admin_init', 'chuboya_save_settings');

function chuboya_reset_settings() {
    if (!isset($_POST['chuboya_reset']) || !isset($_POST['chuboya_nonce'])) {
        return;
    }
    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['chuboya_nonce'])), 'chuboya_save_settings')) {
        wp_die('不正なリクエストです。');
    }
    if (!current_user_can('edit_theme_options')) {
        wp_die('権限がありません。');
    }
    delete_option(CHUBOYA_OPTION);
    wp_safe_redirect(add_query_arg(array(
        'page' => 'chuboya-settings',
        'reset' => '1',
    ), admin_url('admin.php')));
    exit;
}
add_action('admin_init', 'chuboya_reset_settings');

function chuboya_admin_field($key, $label, $type = 'text', $hint = '') {
    $value = chuboya_get($key);
    echo '<p class="chuboya-field">';
    echo '<label for="chuboya-' . esc_attr($key) . '"><strong>' . esc_html($label) . '</strong></label>';
    if ($type === 'textarea') {
        echo '<textarea id="chuboya-' . esc_attr($key) . '" name="chuboya[' . esc_attr($key) . ']" rows="4">' . esc_textarea($value) . '</textarea>';
    } else {
        echo '<input type="text" id="chuboya-' . esc_attr($key) . '" name="chuboya[' . esc_attr($key) . ']" value="' . esc_attr($value) . '">';
    }
    if ($hint !== '') {
        echo '<span class="description">' . esc_html($hint) . '</span>';
    }
    echo '</p>';
}

function chuboya_admin_chip($key, $label = '末尾に「要確認」チップを付ける') {
    $on = (string) chuboya_get($key) === '1';
    echo '<p class="chuboya-field chuboya-field--check">';
    echo '<label><input type="checkbox" name="chuboya[' . esc_attr($key) . ']" value="1"' . checked($on, true, false) . '> ' . esc_html($label) . '</label>';
    echo '</p>';
}

function chuboya_admin_image($slot_key) {
    $slots = chuboya_photo_slots();
    $slot = $slots[$slot_key];
    $id = absint(chuboya_get($slot_key, 0));
    $preview = '';
    if ($id && wp_attachment_is_image($id)) {
        $preview = wp_get_attachment_image_url($id, 'medium');
    } else {
        $bundled = get_template_directory_uri() . '/assets/images/photos/' . $slot['file'];
        $path = get_template_directory() . '/assets/images/photos/' . $slot['file'];
        if (file_exists($path)) {
            $preview = $bundled;
        }
    }

    echo '<div class="chuboya-image" data-slot="' . esc_attr($slot_key) . '">';
    echo '<p><strong>' . esc_html($slot['label']) . '</strong></p>';
    echo '<p class="description">' . esc_html($slot['hint']) . ' ファイル名の目安：' . esc_html($slot['file']) . '</p>';
    echo '<div class="chuboya-image__preview">';
    if ($preview) {
        echo '<img src="' . esc_url($preview) . '" alt="">';
    } else {
        echo '<span class="chuboya-image__empty">未設定（プレースホルダーが表示されます）</span>';
    }
    echo '</div>';
    echo '<input type="hidden" class="chuboya-image__id" name="chuboya[' . esc_attr($slot_key) . ']" value="' . esc_attr($id) . '">';
    echo '<p>';
    echo '<button type="button" class="button chuboya-image__select">画像を選ぶ</button> ';
    echo '<button type="button" class="button chuboya-image__clear">初期画像に戻す</button>';
    echo '</p>';
    echo '</div>';
}

function chuboya_render_admin_page() {
    if (!current_user_can('edit_theme_options')) {
        return;
    }
    require get_template_directory() . '/inc/admin-ui.php';
}
