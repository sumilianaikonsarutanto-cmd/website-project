<?php
/**
 * ツナグWEB製作 テーマ
 *
 * 静的 HTML 版のデザインを維持したまま WordPress で運用するためのテーマです。
 * 連絡先は 外観 → カスタマイズ → ツナグWEB製作 で設定します。
 */

if (!defined('ABSPATH')) {
    exit;
}

define('TSN_VERSION', '1.0.0');
define('TSN_DIR', get_template_directory());
define('TSN_URI', get_template_directory_uri());

require_once TSN_DIR . '/inc/helpers.php';
require_once TSN_DIR . '/inc/customizer.php';

add_action('after_setup_theme', function () {
    load_theme_textdomain('tsunagu-web', TSN_DIR . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'tsn-fonts',
        'https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@500;600;700&family=Syne:wght@500;600;700;800&family=Zen+Kaku+Gothic+New:wght@400;500;700;900&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'tsn-style',
        TSN_URI . '/assets/css/style.css',
        array('tsn-fonts'),
        TSN_VERSION
    );
    wp_enqueue_script(
        'tsn-main',
        TSN_URI . '/assets/js/main.js',
        array(),
        TSN_VERSION,
        array('strategy' => 'defer', 'in_footer' => true)
    );

    wp_add_inline_script(
        'tsn-main',
        'window.TSUNAGU_CONTACT = ' . wp_json_encode(tsn_contact_for_js()) . ';',
        'before'
    );

    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
}, 20);

add_filter('style_loader_tag', function ($html, $handle) {
    if ($handle !== 'tsn-fonts') {
        return $html;
    }
    $preconnect  = '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    $preconnect .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    return $preconnect . $html;
}, 10, 2);

add_action('wp_head', function () {
    echo '<meta name="theme-color" content="#101110">' . "\n";
    echo '<meta name="format-detection" content="telephone=no">' . "\n";
    echo '<link rel="icon" href="' . esc_url(tsn_asset('img/favicon.svg')) . '" type="image/svg+xml">' . "\n";
}, 1);

add_filter('document_title_parts', function ($parts) {
    if (is_front_page()) {
        return array(
            'title' => 'ツナグWEB製作｜中小企業のためのホームページ制作',
        );
    }
    if (is_404()) {
        return array(
            'title' => 'ページが見つかりません｜ツナグWEB製作',
        );
    }
    return $parts;
});

add_action('wp_head', function () {
    $desc = get_bloginfo('description');
    $og_image = tsn_asset('img/og/og.jpg');
    $canonical = home_url('/');
    $title = wp_get_document_title();

    if (is_front_page()) {
        $desc = 'ツナグWEB製作は、建設・設備・自動車・店舗など地域密着型の中小企業向けに、伝わるホームページを制作します。強みの整理、スマホ対応、問い合わせ導線まで設計します。';
        $title = 'ツナグWEB製作｜いい仕事を、ちゃんと伝わる形に。';
    } elseif (is_404()) {
        $desc = 'お探しのページは見つかりませんでした。ツナグWEB製作のトップページへお戻りください。';
        echo '<meta name="robots" content="noindex">' . "\n";
    } elseif (is_singular()) {
        $excerpt = get_the_excerpt();
        if ($excerpt) {
            $desc = wp_strip_all_tags($excerpt);
        }
        $canonical = get_permalink();
        if (has_post_thumbnail()) {
            $og_image = get_the_post_thumbnail_url(null, 'large');
        }
    }

    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($canonical) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(tsn_info('brand_name')) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($canonical) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
    echo '<meta property="og:locale" content="ja_JP">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";

    if (is_front_page()) {
        $schema = array(
            '@context'    => 'https://schema.org',
            '@type'       => 'ProfessionalService',
            'name'        => tsn_info('brand_name'),
            'description' => '中小企業・個人事業主向けのホームページ制作。企業の魅力を整理し、デザインと情報設計で伝わるWebサイトをつくります。',
            'url'         => home_url('/'),
            'image'       => $og_image,
            'areaServed'  => 'JP',
            'serviceType' => array('ホームページ制作', 'サイトリニューアル', '情報設計', 'スマートフォン対応'),
        );
        if (tsn_has_email()) {
            $schema['email'] = tsn_info('email');
        }
        if (tsn_has_tel()) {
            $schema['telephone'] = tsn_info('tel');
        }
        if (tsn_info('address') !== '') {
            $schema['address'] = tsn_info('address');
        }
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}, 5);

add_filter('body_class', function ($classes) {
    $classes[] = 'tsunagu-theme';
    return $classes;
});
