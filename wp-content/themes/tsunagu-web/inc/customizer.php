<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('customize_register', function ($wp_customize) {
    $wp_customize->add_panel('tsn_panel', array(
        'title'       => 'ツナグWEB製作',
        'description' => 'ブランド名・連絡先をここで変更すると、サイト全体に反映されます。未設定の連絡先は表示・送信しません。',
        'priority'    => 30,
    ));

    $wp_customize->add_section('tsn_brand', array(
        'title' => 'ブランド',
        'panel' => 'tsn_panel',
    ));

    $wp_customize->add_section('tsn_contact', array(
        'title'       => '連絡先',
        'description' => '空欄のままではフォーム送信・電話/LINEリンクは有効になりません。確認できた連絡先のみ入力してください。',
        'panel'       => 'tsn_panel',
    ));

    $wp_customize->add_section('tsn_price', array(
        'title'       => '価格表示',
        'description' => '実績制作価格の参考表示です。全案件がこの金額という意味ではありません。',
        'panel'       => 'tsn_panel',
    ));

    $fields = array(
        'tsn_brand' => array(
            'brand_name'    => array('ブランド名', 'text'),
            'brand_tagline' => array('英語タグライン（ロゴ下）', 'text'),
            'address'       => array('事業者住所（任意）', 'text'),
        ),
        'tsn_contact' => array(
            'email'       => array('メールアドレス', 'email'),
            'tel'         => array('電話番号（リンク用・数字）', 'text'),
            'tel_display' => array('電話番号（表示）', 'text'),
            'line_url'    => array('LINE URL', 'url'),
        ),
        'tsn_price' => array(
            'price_ref' => array('実績制作価格（円・税込・カンマ可）', 'text'),
        ),
    );

    $defaults = tsn_defaults();
    foreach ($fields as $section => $items) {
        foreach ($items as $key => $meta) {
            $sanitize = 'sanitize_text_field';
            if ($meta[1] === 'url') {
                $sanitize = 'esc_url_raw';
            } elseif ($meta[1] === 'email') {
                $sanitize = 'sanitize_email';
            }

            $wp_customize->add_setting('tsn_' . $key, array(
                'default'           => $defaults[$key] ?? '',
                'sanitize_callback' => $sanitize,
                'transport'         => 'refresh',
            ));

            $wp_customize->add_control('tsn_' . $key, array(
                'label'   => $meta[0],
                'section' => $section,
                'type'    => in_array($meta[1], array('url', 'email'), true) ? $meta[1] : 'text',
            ));
        }
    }
});
