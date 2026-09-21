<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     01 ファーストビュー（WP: template-parts/section-hero.php）
     ============================================================ -->
<section class="hero" id="top">
  <div class="hero__media">
    <?php
    chuboya_img('photo_hero', 'hero.jpg', array(
        'fallback' => 'dark',
        'alt' => chuboya_get('hero_alt'),
        'width' => 1600,
        'height' => 1000,
        'lazy' => false,
        'priority' => true,
    ));
    ?>
  </div>

  <div class="hero__body">
    <p class="hero__eyebrow"><?php chuboya_text('hero_eyebrow'); ?></p>
    <h1 class="hero__title"><?php chuboya_text('hero_title_1'); ?><br><?php chuboya_text('hero_title_2'); ?></h1>
    <p class="hero__lead">
      <?php chuboya_br(chuboya_get('hero_lead')); ?>
    </p>
    <div class="hero__actions">
      <a class="btn btn--primary btn--lg" href="<?php echo esc_url(chuboya_url('menu')); ?>"><?php chuboya_text('hero_cta_menu'); ?></a>
      <a class="btn btn--ghost" href="<?php echo esc_url(chuboya_tel_href()); ?>">
        <?php chuboya_text('hero_cta_tel'); ?><span class="btn__note"><?php chuboya_text('phone_display'); ?></span>
      </a>
    </div>
  </div>

  <p class="hero__strip">
    <span><?php chuboya_text('hero_strip_1'); ?></span>
    <span><?php chuboya_text('hero_strip_2'); ?></span>
    <span><?php chuboya_text('hero_strip_3'); ?></span>
    <span><?php chuboya_text('hero_strip_4'); ?></span>
  </p>
</section>
