<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * テーマ有効化時に、このサイトがそのまま公開できる状態にする。
 * デザインや文言は変更しない。パーマリンク・施工事例・表示設定だけ整える。
 */
function hph_on_theme_activation() {
    hph_register_cpt();

    if (get_option('permalink_structure') !== '/%postname%/') {
        update_option('permalink_structure', '/%postname%/');
    }

    update_option('blogname', 'ハッピーペイントホーム（白井工業）');
    update_option('blogdescription', '大阪の雨漏り修理専門店。職人直営で、本当に必要な修理だけを。');
    update_option('timezone_string', 'Asia/Tokyo');
    update_option('date_format', 'Y年n月j日');
    update_option('time_format', 'H:i');
    update_option('start_of_week', 1);
    update_option('show_on_front', 'posts');
    update_option('posts_per_page', 35);

    if (!get_option('hph_sample_content_removed')) {
        wp_delete_post(1, true);
        wp_delete_post(2, true);
        update_option('hph_sample_content_removed', 1);
    }

    hph_import_works(false);

    update_option('hph_needs_flush', 1);
    flush_rewrite_rules();
}

add_action('init', function () {
    if (get_option('hph_works_imported')) {
        return;
    }
    $count = wp_count_posts('works');
    if (empty($count->publish)) {
        hph_import_works(false);
    }
}, 30);
