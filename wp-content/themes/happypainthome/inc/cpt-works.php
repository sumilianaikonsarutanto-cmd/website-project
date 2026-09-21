<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'hph_register_cpt');

function hph_register_cpt() {
    register_post_type('works', array(
        'labels' => array(
            'name'               => '施工事例',
            'singular_name'      => '施工事例',
            'add_new'            => '新規追加',
            'add_new_item'       => '施工事例を追加',
            'edit_item'          => '施工事例を編集',
            'new_item'           => '新しい施工事例',
            'view_item'          => '施工事例を表示',
            'search_items'       => '施工事例を検索',
            'not_found'          => '施工事例が見つかりませんでした',
            'not_found_in_trash' => 'ゴミ箱に施工事例はありません',
            'all_items'          => '施工事例一覧',
            'menu_name'          => '施工事例',
        ),
        'public'             => true,
        'has_archive'        => 'works',
        'rewrite'            => array('slug' => 'works', 'with_front' => false),
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array('title', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
        'publicly_queryable' => true,
        'exclude_from_search'=> false,
    ));
}

add_action('add_meta_boxes', function () {
    add_meta_box(
        'hph_work_fields',
        '施工事例の詳細',
        'hph_work_fields_box',
        'works',
        'normal',
        'high'
    );
});

function hph_work_fields_box($post) {
    wp_nonce_field('hph_work_fields', 'hph_work_fields_nonce');
    $area       = hph_work_meta($post->ID, 'area');
    $area_group = hph_work_meta($post->ID, 'area_group');
    $type       = hph_work_meta($post->ID, 'type');
    $price      = hph_work_meta($post->ID, 'price');
    $age        = hph_work_meta($post->ID, 'age');
    $detail     = hph_work_meta($post->ID, 'detail');
    ?>
    <p>
        <label>地域<br>
            <input type="text" name="hph_area" value="<?php echo esc_attr($area); ?>" class="widefat">
        </label>
    </p>
    <p>
        <label>地域グループ（フィルター用）<br>
            <select name="hph_area_group">
                <option value="osaka-city" <?php selected($area_group, 'osaka-city'); ?>>大阪市内</option>
                <option value="osaka" <?php selected($area_group, 'osaka'); ?>>大阪府内</option>
                <option value="other" <?php selected($area_group, 'other'); ?>>近隣府県</option>
            </select>
        </label>
    </p>
    <p>
        <label>工事内容<br>
            <input type="text" name="hph_type" value="<?php echo esc_attr($type); ?>" class="widefat">
        </label>
    </p>
    <p>
        <label>施工費用<br>
            <input type="text" name="hph_price" value="<?php echo esc_attr($price); ?>" class="regular-text">
        </label>
    </p>
    <p>
        <label>築年数（任意）<br>
            <input type="text" name="hph_age" value="<?php echo esc_attr($age); ?>" class="regular-text">
        </label>
    </p>
    <p>
        <label>原因・施工内容（任意）<br>
            <textarea name="hph_detail" rows="4" class="widefat"><?php echo esc_textarea($detail); ?></textarea>
        </label>
    </p>
    <p class="description">タイトルは「地域＋工事内容」にしておくと管理画面で探しやすくなります。公開ページの見出しには「地域」だけが表示されます。</p>
    <?php
}

add_action('save_post_works', function ($post_id) {
    if (!isset($_POST['hph_work_fields_nonce']) || !wp_verify_nonce($_POST['hph_work_fields_nonce'], 'hph_work_fields')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('area', 'area_group', 'type', 'price', 'age', 'detail');
    foreach ($fields as $field) {
        $raw = isset($_POST['hph_' . $field]) ? wp_unslash($_POST['hph_' . $field]) : '';
        update_post_meta($post_id, '_hph_' . $field, sanitize_textarea_field($raw));
    }
});

add_filter('manage_works_posts_columns', function ($columns) {
    $columns['hph_area']  = '地域';
    $columns['hph_type']  = '工事内容';
    $columns['hph_price'] = '施工費用';
    return $columns;
});

add_action('manage_works_posts_custom_column', function ($column, $post_id) {
    if ($column === 'hph_area') {
        echo esc_html(hph_work_meta($post_id, 'area'));
    }
    if ($column === 'hph_type') {
        echo esc_html(hph_work_meta($post_id, 'type'));
    }
    if ($column === 'hph_price') {
        echo esc_html(hph_work_meta($post_id, 'price'));
    }
}, 10, 2);
