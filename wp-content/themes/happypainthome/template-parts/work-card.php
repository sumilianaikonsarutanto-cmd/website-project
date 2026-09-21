<?php
if (!defined('ABSPATH')) {
    exit;
}

$heading = isset($args['heading']) ? $args['heading'] : 'h3';
if (!in_array($heading, array('h2', 'h3'), true)) {
    $heading = 'h3';
}

$post_id    = get_the_ID();
$area       = hph_work_meta($post_id, 'area');
$area_group = hph_work_meta($post_id, 'area_group');
$type       = hph_work_meta($post_id, 'type');
$price      = hph_work_meta($post_id, 'price');
$age        = hph_work_meta($post_id, 'age');
$detail     = hph_work_meta($post_id, 'detail');
$image      = hph_work_image($post_id);
$alt        = $area . 'の' . $type . ' 施工前・施工中・施工後の様子';
?>
<article class="work reveal" data-area="<?php echo esc_attr($area_group); ?>">
  <img class="work__img" src="<?php echo esc_url($image['src']); ?>"
       alt="<?php echo esc_attr($alt); ?>"
       width="<?php echo esc_attr($image['width']); ?>" height="<?php echo esc_attr($image['height']); ?>"
       loading="lazy" decoding="async">
  <div class="work__body">
    <<?php echo $heading; ?> class="work__area"><svg aria-hidden="true"><use href="#i-pin"></use></svg><?php echo esc_html($area); ?></<?php echo $heading; ?>>
    <p class="work__type"><?php echo esc_html($type); ?></p>
    <?php if ($detail) : ?>
      <p class="work__detail"><?php echo esc_html($detail); ?></p>
    <?php endif; ?>
    <p class="work__foot">
      <?php if ($price) : ?>
        <span class="work__price"><small>施工費用</small><?php echo esc_html($price); ?></span>
      <?php endif; ?>
      <?php if ($age) : ?>
        <span class="work__age"><?php echo esc_html($age); ?></span>
      <?php endif; ?>
    </p>
  </div>
</article>
