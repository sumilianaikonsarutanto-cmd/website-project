<?php
/**
 * フロント／管理画面共通のヘルパー
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 設定値を取得。未保存なら現行サイトと同じ初期値を返す。
 */
function chuboya_get($key, $default = null) {
    static $settings = null;
    if ($settings === null) {
        $saved = get_option(CHUBOYA_OPTION, array());
        if (!is_array($saved)) {
            $saved = array();
        }
        $settings = array_merge(chuboya_defaults(), $saved);
    }
    if (array_key_exists($key, $settings)) {
        return $settings[$key];
    }
    return $default;
}

/**
 * 保存済み設定を破棄してキャッシュを更新（テスト用ではない。保存後に呼ぶ）
 */
function chuboya_flush_settings_cache() {
    // chuboya_get の static をリセットできないため、保存後はリダイレクトする。
}

function chuboya_tel_href($display = null) {
    if ($display === null) {
        $display = chuboya_get('phone_display');
    }
    $digits = preg_replace('/\D+/', '', (string) $display);
    return 'tel:' . $digits;
}

/**
 * フロントページでは #id、他ページでは /#id
 */
function chuboya_url($hash) {
    $hash = ltrim((string) $hash, '#');
    if (function_exists('is_front_page') && is_front_page()) {
        return '#' . $hash;
    }
    return home_url('/#' . $hash);
}

/**
 * 改行を現行サイトと同じ <br> に変換して出力
 */
function chuboya_br($text) {
    $text = (string) $text;
    $text = str_replace(array("\r\n", "\r"), "\n", $text);
    $lines = explode("\n", $text);
    $safe = array_map('esc_html', $lines);
    echo implode("<br>\n      ", $safe);
}

function chuboya_text($key) {
    echo esc_html(chuboya_get($key));
}

/**
 * 「要確認」だけの値はチップ、それ以外は本文として出す
 */
function chuboya_maybe_chip($value, $dark = false) {
    $value = trim((string) $value);
    if ($value === '' || $value === '要確認') {
        $class = $dark ? 'chip chip--dark' : 'chip';
        return '<span class="' . esc_attr($class) . '">要確認</span>';
    }
    return esc_html($value);
}

function chuboya_chip_if($flag, $label = '要確認', $dark = false) {
    if ((string) $flag === '1' || $flag === 1 || $flag === true) {
        $class = $dark ? 'chip chip--dark' : 'chip';
        return '<span class="' . esc_attr($class) . '">' . esc_html($label) . '</span>';
    }
    return '';
}

/**
 * 画像スロットの URL / alt を返す。
 * 1. 管理画面で選んだメディア
 * 2. テーマ同梱の初期写真
 * 3. プレースホルダー SVG
 */
function chuboya_image_src($slot_key, $bundled_file, $fallback = 'light') {
    $theme_uri = get_template_directory_uri();
    $theme_dir = get_template_directory();
    $placeholder = $theme_uri . '/assets/images/placeholder-' . ($fallback === 'dark' ? 'dark' : 'light') . '.svg';

    $id = absint(chuboya_get($slot_key, 0));
    if ($id && wp_attachment_is_image($id)) {
        $src = wp_get_attachment_image_url($id, 'full');
        $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
        if ($src) {
            return array(
                'src' => $src,
                'alt' => $alt !== '' ? $alt : '',
                'onerror' => $placeholder,
            );
        }
    }

    $bundled = $theme_dir . '/assets/images/photos/' . $bundled_file;
    if ($bundled_file && file_exists($bundled)) {
        return array(
            'src' => $theme_uri . '/assets/images/photos/' . $bundled_file,
            'alt' => '',
            'onerror' => $placeholder,
        );
    }

    return array(
        'src' => $placeholder,
        'alt' => '',
        'onerror' => $placeholder,
    );
}

/**
 * img タグを出力（現行の属性構成を維持）
 */
function chuboya_img($slot_key, $bundled_file, $args = array()) {
    $args = wp_parse_args($args, array(
        'fallback' => 'light',
        'alt' => '',
        'width' => 1200,
        'height' => 800,
        'lazy' => true,
        'priority' => false,
    ));

    $img = chuboya_image_src($slot_key, $bundled_file, $args['fallback']);
    $alt = $img['alt'] !== '' ? $img['alt'] : $args['alt'];

    $attr = 'src="' . esc_url($img['src']) . '"';
    $attr .= ' alt="' . esc_attr($alt) . '"';
    $attr .= ' width="' . absint($args['width']) . '"';
    $attr .= ' height="' . absint($args['height']) . '"';
    if ($args['priority']) {
        $attr .= ' fetchpriority="high"';
    } elseif ($args['lazy']) {
        $attr .= ' loading="lazy" decoding="async"';
    }
    $attr .= ' onerror="this.onerror=null;this.src=\'' . esc_url($img['onerror']) . '\';"';

    echo '<img ' . $attr . '>';
}

/**
 * 文中の「要確認」を現行デザインと同じ黄色いチップにする
 */
function chuboya_with_confirm_chip($text, $dark = false) {
    $class = $dark ? 'chip chip--dark' : 'chip';
    $chip = '<span class="' . esc_attr($class) . '">要確認</span>';
    return str_replace('要確認', $chip, esc_html((string) $text));
}

function chuboya_spec_value($key, $dark = false) {
    $value = trim((string) chuboya_get($key));
    if ($value === '' || $value === '要確認') {
        return chuboya_maybe_chip('要確認', $dark);
    }
    return chuboya_with_confirm_chip($value, $dark);
}

function chuboya_echo_inline($html) {
    echo wp_kses($html, array(
        'span' => array('class' => true),
        'br' => array(),
    ));
}

/**
 * 構造化データの電話番号（現行サイトと同じ +81-6-6990-5578 形式）
 */
function chuboya_tel_intl() {
    $digits = preg_replace('/\D+/', '', (string) chuboya_get('phone_display'));
    if ($digits === '') {
        return '';
    }
    if (strpos($digits, '0') === 0) {
        $digits = '81' . substr($digits, 1);
    } elseif (strpos($digits, '81') !== 0) {
        $digits = '81' . $digits;
    }
    if (strlen($digits) === 11 && substr($digits, 0, 2) === '81') {
        return '+81-' . substr($digits, 2, 1) . '-' . substr($digits, 3, 4) . '-' . substr($digits, 7);
    }
    return '+' . $digits;
}

function chuboya_print_jsonld() {
    $street = preg_replace('/^大阪市東淀川区/', '', (string) chuboya_get('address'));
    $data = array(
        '@context' => 'https://schema.org',
        '@type' => 'Restaurant',
        'name' => chuboya_get('shop_name'),
        'alternateName' => chuboya_get('shop_kana'),
        'servesCuisine' => array('中華料理', '居酒屋'),
        'telephone' => chuboya_tel_intl(),
        'address' => array(
            '@type' => 'PostalAddress',
            'addressCountry' => 'JP',
            'addressRegion' => '大阪府',
            'addressLocality' => '大阪市東淀川区',
            'streetAddress' => $street,
        ),
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}

function chuboya_maps_search_url() {
    $query = chuboya_get('map_query');
    if ($query === '') {
        $query = chuboya_get('address') . ' ' . chuboya_get('shop_name');
    }
    return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($query);
}

function chuboya_maps_embed_url() {
    $query = chuboya_get('map_query');
    if ($query === '') {
        $query = chuboya_get('address');
    }
    return 'https://www.google.com/maps?q=' . rawurlencode($query) . '&hl=ja&z=17&output=embed';
}
