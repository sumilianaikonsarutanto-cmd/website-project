<?php
/**
 * 中房家オリジナルテーマ
 *
 * フロントの見た目は現行の完成 HTML を再現します。
 * 変更するのは管理・更新のための内部構造だけです。
 */

if (!defined('ABSPATH')) {
    exit;
}

define('CHUBOYA_VERSION', '1.0.0');
define('CHUBOYA_OPTION', 'chuboya_settings');

require_once get_template_directory() . '/inc/defaults.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/admin.php';

/**
 * テーマ初期化
 */
function chuboya_setup() {
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');

    register_nav_menus(array(
        'primary' => 'メインメニュー（未使用時はテーマ既定のリンクを表示）',
    ));
}
add_action('after_setup_theme', 'chuboya_setup');

/**
 * CSS / JS / フォント
 * 現行サイトと同じ Google Fonts と同一の style.css / main.js を読み込みます。
 */
function chuboya_enqueue_assets() {
    wp_enqueue_style(
        'chuboya-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&family=Noto+Sans+JP:wght@400;500;700;900&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'chuboya-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array('chuboya-fonts'),
        CHUBOYA_VERSION
    );

    wp_enqueue_script(
        'chuboya-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        CHUBOYA_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'chuboya_enqueue_assets');

/**
 * フロントページの title / description を現行サイトと同じ文言に揃える
 */
function chuboya_document_title($title) {
    if (is_front_page()) {
        return chuboya_get('seo_title');
    }
    return $title;
}
add_filter('pre_get_document_title', 'chuboya_document_title');

function chuboya_language_attributes() {
    return 'lang="ja"';
}
add_filter('language_attributes', 'chuboya_language_attributes');

function chuboya_resource_hints($urls, $relation_type) {
    if ($relation_type === 'preconnect') {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter('wp_resource_hints', 'chuboya_resource_hints', 10, 2);

/**
 * Gutenberg / グローバルスタイルは現行デザインを変えるため、フロントでは外す
 */
function chuboya_dequeue_wp_styles() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'chuboya_dequeue_wp_styles', 100);

function chuboya_head_meta() {
    $description = is_front_page()
        ? chuboya_get('seo_description')
        : get_bloginfo('description');

    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="format-detection" content="telephone=no">' . "\n";
    echo '<meta name="theme-color" content="#a52824">' . "\n";
    echo '<link rel="icon" href="' . esc_url(get_template_directory_uri() . '/assets/images/favicon.svg') . '" type="image/svg+xml">' . "\n";

    if (is_front_page()) {
        echo '<link rel="canonical" href="' . esc_url(home_url('/')) . '">' . "\n";
        echo '<meta property="og:type" content="restaurant">' . "\n";
        echo '<meta property="og:site_name" content="' . esc_attr(chuboya_get('shop_name')) . '">' . "\n";
        echo '<meta property="og:title" content="' . esc_attr(chuboya_get('seo_og_title')) . '">' . "\n";
        echo '<meta property="og:description" content="' . esc_attr(chuboya_get('seo_og_description')) . '">' . "\n";
        echo '<meta property="og:locale" content="ja_JP">' . "\n";
        echo '<meta property="og:url" content="' . esc_url(home_url('/')) . '">' . "\n";

        $hero = chuboya_image_src('photo_hero', 'hero.jpg', 'dark');
        echo '<meta property="og:image" content="' . esc_url($hero['src']) . '">' . "\n";

        chuboya_print_jsonld();
    }
}
add_action('wp_head', 'chuboya_head_meta', 1);

/**
 * ファビコン（現行の SVG を使用）
 */
function chuboya_favicon($url) {
    if (empty($url)) {
        return get_template_directory_uri() . '/assets/images/favicon.svg';
    }
    return $url;
}
add_filter('get_site_icon_url', 'chuboya_favicon');

/**
 * フロントでは絵文字用の余分なスクリプトを外す（見た目は変わらない）
 */
function chuboya_disable_emojis() {
    if (is_admin()) {
        return;
    }
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'chuboya_disable_emojis');

remove_action('wp_head', 'wp_generator');
