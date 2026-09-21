<?php
/**
 * ハッピーペイントホーム（白井工業）テーマ
 *
 * 静的 HTML 版のデザイン・文言を維持したまま WordPress で運用するためのテーマです。
 * 店舗情報は 外観 → カスタマイズ → 店舗情報 で一括変更できます。
 */

if (!defined('ABSPATH')) {
    exit;
}

define('HPH_VERSION', '1.0.0');
define('HPH_DIR', get_template_directory());
define('HPH_URI', get_template_directory_uri());

require_once HPH_DIR . '/inc/helpers.php';
require_once HPH_DIR . '/inc/cpt-works.php';
require_once HPH_DIR . '/inc/customizer.php';
require_once HPH_DIR . '/inc/importer.php';
require_once HPH_DIR . '/inc/setup.php';

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-logo', array(
        'height'      => 64,
        'width'       => 64,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_image_size('hph-work', 900, 900, false);

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
        'hph-fonts',
        'https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600;700&family=Zen+Kaku+Gothic+New:wght@400;500;700;900&family=Zen+Old+Mincho:wght@600&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'hph-style',
        HPH_URI . '/assets/css/style.css',
        array('hph-fonts'),
        HPH_VERSION
    );
    wp_enqueue_script(
        'hph-main',
        HPH_URI . '/assets/js/main.js',
        array(),
        HPH_VERSION,
        array('strategy' => 'defer', 'in_footer' => true)
    );

    // 静的 HTML 版の見た目を守るため、WordPress 既定のブロック用 CSS は読み込まない
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
}, 20);

add_filter('style_loader_tag', function ($html, $handle) {
    if ($handle !== 'hph-fonts') {
        return $html;
    }
    $preconnect  = '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    $preconnect .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    return $preconnect . $html;
}, 10, 2);

add_action('wp_head', function () {
    echo '<meta name="theme-color" content="#0d2b4e">' . "\n";
    echo '<meta name="format-detection" content="telephone=no">' . "\n";
    echo '<link rel="icon" href="' . esc_url(hph_asset('img/favicon.svg')) . '" type="image/svg+xml">' . "\n";
}, 1);

add_filter('document_title_parts', function ($parts) {
    if (is_front_page()) {
        return array(
            'title' => '大阪の雨漏り修理専門店｜ハッピーペイントホーム（白井工業）職人直営',
        );
    }
    if (is_post_type_archive('works')) {
        return array(
            'title' => '雨漏り修理の施工事例（全35件）｜大阪の雨漏り修理専門店 ハッピーペイントホーム',
        );
    }
    return $parts;
});

add_action('wp_head', function () {
    $desc = '';
    $og_type = 'website';
    $og_image = hph_asset('img/craft/craft-removing-soil.jpg');
    $canonical = home_url('/');

    if (is_front_page()) {
        $desc = '大阪市東淀川区の雨漏り修理専門店。職人直営で、現地調査から施工まで同じ職人が担当します。調査のお立ち合いは不要。1時間で原因をご報告し、修理費用は当日中にお伝えします。現地調査・お見積り無料、大阪市を中心に大阪府全域対応。';
        $canonical = home_url('/');
    } elseif (is_post_type_archive('works')) {
        $desc = '大阪市・大阪府内を中心に対応した雨漏り修理の施工事例を全35件掲載。地域・工事内容・施工費用・築年数とあわせて、施工前／施工中／施工後の写真をそのまま公開しています。';
        $og_type = 'article';
        $og_image = hph_asset('img/works/work-01.jpg');
        $canonical = get_post_type_archive_link('works') ?: home_url('/works/');
    } elseif (is_singular('works')) {
        $desc = get_the_excerpt() ?: get_bloginfo('description');
        $og_type = 'article';
        if (has_post_thumbnail()) {
            $og_image = get_the_post_thumbnail_url(null, 'large');
        }
        $canonical = get_permalink();
    }

    if ($desc) {
        echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    }

    $og_title = wp_get_document_title();
    $og_desc  = $desc ?: '雨漏りの原因を見極め、本当に必要な修理だけを。職人直営・雨漏り専門。現地調査から施工まで、同じ職人が責任を持って対応します。';

    echo '<meta property="og:type" content="' . esc_attr($og_type) . '">' . "\n";
    echo '<meta property="og:site_name" content="ハッピーペイントホーム（白井工業）">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($og_title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($og_desc) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($canonical) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
    echo '<meta property="og:locale" content="ja_JP">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($canonical) . '">' . "\n";
}, 5);

add_action('wp_head', function () {
    if (!is_front_page()) {
        return;
    }
    $data = array(
        '@context' => 'https://schema.org',
        '@type'    => 'RoofingContractor',
        'name'     => 'ハッピーペイントホーム（白井工業）',
        'description' => '大阪市東淀川区を拠点とする雨漏り修理専門店。職人直営で、現地調査から施工まで同じ職人が担当します。',
        'url'      => home_url('/'),
        'image'    => hph_asset('img/craft/craft-removing-soil.jpg'),
        'telephone' => '+81-' . preg_replace('/^0/', '', hph_info('tel_href')),
        'email'    => hph_info('email'),
        'address'  => array(
            '@type'           => 'PostalAddress',
            'addressCountry'  => 'JP',
            'addressRegion'   => '大阪府',
            'addressLocality' => '大阪市東淀川区',
            'streetAddress'   => '西淡路4-24-11 レジデンス西淡路401',
        ),
        'areaServed' => array(
            array('@type' => 'AdministrativeArea', 'name' => '大阪府'),
            array('@type' => 'City', 'name' => '大阪市'),
        ),
        'founder' => array('@type' => 'Person', 'name' => '白井賢治'),
        'sameAs'  => array(hph_info('instagram')),
        'knowsAbout' => array('雨漏り修理', '屋根修理', '外壁補修', '防水工事'),
    );
    echo '<script type="application/ld+json">' . wp_json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";

    $faq = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array(
            array('@type' => 'Question', 'name' => '調査には立ち会う必要がありますか？', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => '調査のお立ち合いは不要です。職人がハシゴを使用して屋根やベランダに上がりますので、その点だけご了承のうえ、ご注意ください。')),
            array('@type' => 'Question', 'name' => '雨漏りの原因や費用は、いつ分かりますか？', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => '調査から1時間で原因をご報告します。修理費用は当日中にお伝えします。')),
            array('@type' => 'Question', 'name' => '現地調査やお見積りは有料ですか？', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => '現地調査・お見積りは無料です。また、駐車スペースがなくコインパーキングを使用した場合も、その料金をご請求することは一切ございません。')),
            array('@type' => 'Question', 'name' => '見積りのあとに追加料金がかかりませんか？', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'お見積書費用外の追加料金は一切かかりません。')),
            array('@type' => 'Question', 'name' => '屋根の葺き替えや外壁塗装も勧められますか？', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => '弊社から雨漏り修理以外の施工をご提案することはありません。外壁塗装をお勧めすることもございません。まずは雨漏りの原因調査からご相談ください。')),
            array('@type' => 'Question', 'name' => '保証はありますか？', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => '雨漏り保証は最大5年です。保証の内容は施工内容によって異なりますので、お見積りの際にご確認ください。')),
            array('@type' => 'Question', 'name' => '写真を送るだけでも相談できますか？', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'LINEで雨漏りの写真を送っていただくだけでもご相談いただけます。屋根の点検・お見積り、修理に関するご質問もLINEで承っています。')),
            array('@type' => 'Question', 'name' => '対応しているエリアを教えてください。', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => '大阪市を中心に、大阪府全域の雨漏り修理に対応しています。京都府・兵庫県でも施工実績があります。記載のない地域もお気軽にご相談ください。')),
        ),
    );
    echo '<script type="application/ld+json">' . wp_json_encode($faq, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}, 20);

add_action('wp_head', function () {
    if (!is_post_type_archive('works')) {
        return;
    }
    $data = array(
        '@context' => 'https://schema.org',
        '@type'    => 'BreadcrumbList',
        'itemListElement' => array(
            array('@type' => 'ListItem', 'position' => 1, 'name' => 'ホーム', 'item' => home_url('/')),
            array('@type' => 'ListItem', 'position' => 2, 'name' => '施工事例'),
        ),
    );
    echo '<script type="application/ld+json">' . wp_json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}, 20);

add_action('after_switch_theme', 'hph_on_theme_activation');
add_action('admin_init', function () {
    if (get_option('hph_needs_flush')) {
        flush_rewrite_rules();
        delete_option('hph_needs_flush');
    }
});
