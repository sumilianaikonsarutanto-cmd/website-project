<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     05 ランチ（WP: template-parts/section-lunch.php）
     ============================================================ -->
<section class="section lunch" id="lunch">
  <div class="container lunch__grid">
    <figure class="photo photo--wide lunch__photo">
      <?php
      chuboya_img('photo_lunch', 'lunch.jpg', array(
          'alt' => chuboya_get('lunch_alt'),
      ));
      ?>
      <figcaption><?php chuboya_text('lunch_caption'); ?></figcaption>
    </figure>

    <div class="lunch__text">
      <p class="label"><?php chuboya_text('lunch_label'); ?></p>
      <h2 class="heading"><?php chuboya_text('lunch_heading'); ?></h2>
      <p>
        <?php chuboya_text('lunch_text'); ?>
      </p>
      <dl class="spec">
        <div class="spec__row">
          <dt><?php chuboya_text('lunch_hours_label'); ?></dt>
          <dd><?php chuboya_echo_inline(chuboya_spec_value('lunch_hours')); ?></dd>
        </div>
        <div class="spec__row">
          <dt><?php chuboya_text('lunch_contents_label'); ?></dt>
          <dd><?php chuboya_text('lunch_contents'); ?> <?php chuboya_echo_inline(chuboya_chip_if(chuboya_get('lunch_contents_chip'))); ?></dd>
        </div>
        <div class="spec__row">
          <dt><?php chuboya_text('lunch_price_label'); ?></dt>
          <dd><?php chuboya_echo_inline(chuboya_spec_value('lunch_price')); ?></dd>
        </div>
      </dl>
      <p class="note"><?php chuboya_text('lunch_note'); ?></p>
      <p class="cta-inline">
        <a class="btn btn--primary" href="<?php echo esc_url(chuboya_tel_href()); ?>"><?php chuboya_text('lunch_cta'); ?></a>
      </p>
    </div>
  </div>
</section>
