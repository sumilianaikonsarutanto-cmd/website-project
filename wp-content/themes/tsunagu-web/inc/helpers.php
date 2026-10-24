<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * ブランド情報の初期値。
 * 連絡先は空のまま（捏造しない）。カスタマイザーで設定する。
 */
function tsn_defaults() {
    return array(
        'brand_name'    => 'ツナグWEB製作',
        'brand_tagline' => 'Connect Value',
        'email'         => '',
        'tel'           => '',
        'tel_display'   => '',
        'line_url'      => '',
        'address'       => '',
        'price_ref'     => '49,800',
    );
}

function tsn_info($key) {
    $defaults = tsn_defaults();
    $value = get_theme_mod('tsn_' . $key, $defaults[$key] ?? '');
    return is_string($value) ? $value : (string) $value;
}

function tsn_asset($path) {
    return TSN_URI . '/assets/' . ltrim($path, '/');
}

function tsn_hash($id) {
    if (is_front_page()) {
        return '#' . ltrim($id, '#');
    }
    return home_url('/#' . ltrim($id, '#'));
}

function tsn_has_email() {
    return (bool) is_email(tsn_info('email'));
}

function tsn_has_tel() {
    return tsn_info('tel') !== '';
}

function tsn_has_line() {
    return tsn_info('line_url') !== '';
}

function tsn_has_any_contact() {
    return tsn_has_email() || tsn_has_tel() || tsn_has_line();
}

function tsn_tel_href() {
    $tel = preg_replace('/[^0-9+]/', '', tsn_info('tel'));
    return $tel ? 'tel:' . $tel : '';
}

function tsn_tel_label() {
    $display = tsn_info('tel_display');
    return $display !== '' ? $display : tsn_info('tel');
}

/**
 * front-page 用に JS へ渡す連絡先オブジェクト。
 */
function tsn_contact_for_js() {
    return array(
        'email'      => tsn_info('email'),
        'tel'        => tsn_info('tel'),
        'telDisplay' => tsn_tel_label(),
        'line'       => tsn_info('line_url'),
    );
}
