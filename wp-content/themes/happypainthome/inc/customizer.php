<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('customize_register', function ($wp_customize) {
    $wp_customize->add_panel('hph_panel', array(
        'title'       => 'ハッピーペイントホーム',
        'description' => '店舗情報・実績数値をここで変更すると、サイト全体に反映されます。',
        'priority'    => 30,
    ));

    $wp_customize->add_section('hph_contact', array(
        'title' => '店舗情報',
        'panel' => 'hph_panel',
    ));

    $wp_customize->add_section('hph_stats', array(
        'title'       => '実績・評価（要確認項目）',
        'description' => '公式サイトと外部媒体で数字が食い違っている項目です。公開前に最新値へ更新してください。',
        'panel'       => 'hph_panel',
    ));

    $fields = array(
        'hph_contact' => array(
            'shop_name'      => array('屋号', 'text'),
            'shop_legal'     => array('屋号（法人・屋号の併記）', 'text'),
            'shop_tagline'   => array('キャッチ（ロゴ下）', 'text'),
            'tel_display'    => array('電話番号（表示）', 'text'),
            'tel_href'       => array('電話番号（リンク・数字のみ）', 'text'),
            'mobile_display' => array('携帯電話（表示）', 'text'),
            'mobile_href'    => array('携帯電話（リンク・数字のみ）', 'text'),
            'line_url'       => array('LINE URL', 'url'),
            'email'          => array('メールアドレス', 'email'),
            'instagram'      => array('Instagram URL', 'url'),
            'address'        => array('所在地', 'text'),
            'owner'          => array('代表名', 'text'),
            'owner_years'    => array('職人歴（年）', 'text'),
        ),
        'hph_stats' => array(
            'yearly_jobs'    => array('年間施工件数（例: 約180）', 'text'),
            'avg_price'      => array('平均施工単価（万円）', 'text'),
            'warranty_years' => array('雨漏り保証（年）', 'text'),
            'google_rating'  => array('Googleマップ評価', 'text'),
            'google_reviews' => array('Googleマップ口コミ件数', 'text'),
        ),
    );

    $defaults = hph_defaults();
    foreach ($fields as $section => $items) {
        foreach ($items as $key => $meta) {
            $wp_customize->add_setting('hph_' . $key, array(
                'default'           => $defaults[$key],
                'sanitize_callback' => $meta[1] === 'url' ? 'esc_url_raw' : ($meta[1] === 'email' ? 'sanitize_email' : 'sanitize_text_field'),
                'transport'         => 'refresh',
            ));
            $wp_customize->add_control('hph_' . $key, array(
                'label'   => $meta[0],
                'section' => $section,
                'type'    => $meta[1] === 'url' || $meta[1] === 'email' ? $meta[1] : 'text',
            ));
        }
    }
});
