<?php
if (!defined('ABSPATH')) {
    exit;
}

$heading = isset($args['heading']) ? $args['heading'] : 'h3';
$slugs   = isset($args['slugs']) ? $args['slugs'] : array();

$query_args = array(
    'post_type'      => 'works',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'no_found_rows'  => true,
);

if (!empty($slugs)) {
    $query_args['post_name__in'] = $slugs;
    $query_args['orderby'] = 'post_name__in';
}

$works = new WP_Query($query_args);
if (!$works->have_posts()) {
    wp_reset_postdata();
    return;
}
?>
<div class="works__grid">
  <?php
  while ($works->have_posts()) :
      $works->the_post();
      get_template_part('template-parts/work-card', null, array('heading' => $heading));
  endwhile;
  wp_reset_postdata();
  ?>
</div>
