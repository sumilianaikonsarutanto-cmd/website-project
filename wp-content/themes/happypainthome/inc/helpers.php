<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 店舗情報の初期値。カスタマイザー未設定時は静的 HTML 版と同じ値を返す。
 */
function hph_defaults() {
    return array(
        'shop_name'       => 'ハッピーペイントホーム',
        'shop_legal'      => '白井工業',
        'shop_tagline'    => '大阪の雨漏り修理専門店',
        'tel_display'     => '06-6599-9208',
        'tel_href'        => '0665999208',
        'mobile_display'  => '090-5881-0531',
        'mobile_href'     => '09058810531',
        'line_url'        => 'https://lin.ee/nVTAZSSq',
        'email'           => 'happypainthome0987@gmail.com',
        'instagram'       => 'https://www.instagram.com/happypainthome/',
        'address'         => '大阪市東淀川区西淡路4-24-11 レジデンス西淡路401',
        'yearly_jobs'     => '約180',
        'avg_price'       => '27',
        'warranty_years'  => '5',
        'google_rating'   => '4.9',
        'google_reviews'  => '38',
        'owner'           => '白井 賢治',
        'owner_years'     => '27',
    );
}

function hph_info($key) {
    $defaults = hph_defaults();
    $value = get_theme_mod('hph_' . $key, $defaults[$key] ?? '');
    return is_string($value) ? $value : (string) $value;
}

function hph_asset($path) {
    return HPH_URI . '/assets/' . ltrim($path, '/');
}

function hph_hash($id) {
    if (is_front_page()) {
        return '#' . $id;
    }
    return home_url('/#' . $id);
}

function hph_works_url() {
    $url = get_post_type_archive_link('works');
    return $url ? $url : home_url('/works/');
}

function hph_tel_href($which = 'tel') {
    $href = $which === 'mobile' ? hph_info('mobile_href') : hph_info('tel_href');
    return 'tel:' . preg_replace('/[^0-9+]/', '', $href);
}

function hph_work_meta($post_id, $key) {
    return (string) get_post_meta($post_id, '_hph_' . $key, true);
}

function hph_work_image($post_id) {
    $slug = get_post_field('post_name', $post_id);
    $file = HPH_DIR . '/assets/img/works/' . $slug . '.jpg';
    if ($slug && is_readable($file)) {
        $size = getimagesize($file);
        return array(
            'src'    => hph_asset('img/works/' . $slug . '.jpg'),
            'width'  => $size ? $size[0] : 900,
            'height' => $size ? $size[1] : 900,
        );
    }

    if (has_post_thumbnail($post_id)) {
        $id   = get_post_thumbnail_id($post_id);
        $src  = wp_get_attachment_image_url($id, 'full');
        $meta = wp_get_attachment_metadata($id);
        return array(
            'src'    => $src,
            'width'  => isset($meta['width']) ? (int) $meta['width'] : 900,
            'height' => isset($meta['height']) ? (int) $meta['height'] : 900,
        );
    }

    return array('src' => '', 'width' => 900, 'height' => 900);
}
