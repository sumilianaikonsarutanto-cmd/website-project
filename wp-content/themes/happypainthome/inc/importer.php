<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 施工事例 35件を data/works.json から投入する。
 * すでに同じスラッグの投稿がある場合は上書きせずスキップする（店舗側の修正を守る）。
 */
function hph_import_works($force = false) {
    $json_path = HPH_DIR . '/data/works.json';
    if (!is_readable($json_path)) {
        return 0;
    }

    $data = json_decode(file_get_contents($json_path), true);
    if (empty($data['works']) || !is_array($data['works'])) {
        return 0;
    }

    $count = 0;
    $menu_order = 1;
    foreach ($data['works'] as $item) {
        $slug = sanitize_title($item['id']);
        $found = get_posts(array(
            'name'           => $slug,
            'post_type'      => 'works',
            'post_status'    => 'any',
            'posts_per_page' => 1,
        ));
        $existing = $found ? $found[0] : null;

        if ($existing && !$force) {
            $menu_order++;
            continue;
        }

        $title = $item['area'] . ' ' . $item['type'];
        $postarr = array(
            'post_type'   => 'works',
            'post_status' => 'publish',
            'post_title'  => $title,
            'post_name'   => $slug,
            'menu_order'  => $menu_order,
            'post_excerpt'=> $item['detail'] ?? '',
        );

        if ($existing) {
            $postarr['ID'] = $existing->ID;
            $post_id = wp_update_post($postarr, true);
        } else {
            $post_id = wp_insert_post($postarr, true);
        }

        if (is_wp_error($post_id) || !$post_id) {
            continue;
        }

        update_post_meta($post_id, '_hph_area', sanitize_text_field($item['area']));
        update_post_meta($post_id, '_hph_area_group', sanitize_text_field($item['areaGroup']));
        update_post_meta($post_id, '_hph_type', sanitize_text_field($item['type']));
        update_post_meta($post_id, '_hph_price', sanitize_text_field($item['price']));
        update_post_meta($post_id, '_hph_age', sanitize_text_field($item['age'] ?? ''));
        update_post_meta($post_id, '_hph_detail', sanitize_textarea_field($item['detail'] ?? ''));

        if (!has_post_thumbnail($post_id)) {
            hph_attach_work_image($post_id, $slug, $title);
        }

        $count++;
        $menu_order++;
    }

    update_option('hph_works_imported', 1);
    return $count;
}

function hph_attach_work_image($post_id, $slug, $title) {
    $file = HPH_DIR . '/assets/img/works/' . $slug . '.jpg';
    if (!is_readable($file)) {
        return;
    }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $tmp = wp_tempnam($slug . '.jpg');
    copy($file, $tmp);

    $file_array = array(
        'name'     => $slug . '.jpg',
        'tmp_name' => $tmp,
    );

    $attach_id = media_handle_sideload($file_array, $post_id, $title . ' 施工前・施工中・施工後の様子');
    if (is_wp_error($attach_id)) {
        @unlink($tmp);
        return;
    }

    set_post_thumbnail($post_id, $attach_id);
}

add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=works',
        '施工事例データの投入',
        '初期データを投入',
        'manage_options',
        'hph-import-works',
        'hph_import_works_page'
    );
});

function hph_import_works_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    $message = '';
    if (isset($_POST['hph_import']) && check_admin_referer('hph_import_works')) {
        $force = !empty($_POST['hph_force']);
        $count = hph_import_works($force);
        $message = $force
            ? sprintf('%d件の施工事例を上書き更新しました。', $count)
            : sprintf('%d件の施工事例を追加しました（既存はスキップ）。', $count);
    }

    $total = wp_count_posts('works');
    $published = isset($total->publish) ? (int) $total->publish : 0;
    ?>
    <div class="wrap">
        <h1>施工事例データの投入</h1>
        <?php if ($message) : ?>
            <div class="notice notice-success"><p><?php echo esc_html($message); ?></p></div>
        <?php endif; ?>
        <p>現在公開中の施工事例：<strong><?php echo esc_html($published); ?></strong>件</p>
        <p>テーマ同梱の <code>data/works.json</code>（公式サイト掲載の35件）から投入します。写真はテーマ内の画像をメディアライブラリへコピーします。</p>
        <form method="post">
            <?php wp_nonce_field('hph_import_works'); ?>
            <p>
                <label>
                    <input type="checkbox" name="hph_force" value="1">
                    既存の施工事例も JSON の内容で上書きする（管理画面で直した内容が戻ります）
                </label>
            </p>
            <p>
                <button type="submit" name="hph_import" class="button button-primary">投入する</button>
            </p>
        </form>
    </div>
    <?php
}
