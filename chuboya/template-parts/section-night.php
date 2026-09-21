<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     06 夜の楽しみ方（WP: template-parts/section-night.php）
     07 お酒・ドリンクを内包（暗いトーンで連続させる）
     ============================================================ -->
<section class="section section--dark night" id="night">
  <div class="container">
    <p class="label label--gold"><?php chuboya_text('night_label'); ?></p>
    <h2 class="heading"><span class="nb"><?php chuboya_text('night_heading_1'); ?></span><span class="nb"><?php chuboya_text('night_heading_2'); ?></span><span class="nb"><?php chuboya_text('night_heading_3'); ?></span></h2>
    <p class="lead lead--dark">
      <?php chuboya_br(chuboya_get('night_lead')); ?>
    </p>

    <div class="night__grid">
      <figure class="photo photo--wide night__photo">
        <?php
        chuboya_img('photo_night', 'night.jpg', array(
            'fallback' => 'dark',
            'alt' => chuboya_get('night_alt'),
            'width' => 1600,
            'height' => 1000,
        ));
        ?>
        <figcaption><?php chuboya_text('night_caption'); ?></figcaption>
      </figure>

      <div class="drink" id="drink">
        <h3 class="drink__title"><?php chuboya_text('drink_title'); ?></h3>
        <p>
          <?php chuboya_text('drink_text'); ?>
        </p>
        <ul class="drink__list">
          <li><?php chuboya_text('drink_1'); ?></li>
          <li><?php chuboya_text('drink_2'); ?> <?php chuboya_echo_inline(chuboya_chip_if(chuboya_get('drink_2_chip'), '要確認', true)); ?></li>
        </ul>
        <p class="note note--dark"><?php chuboya_text('drink_note'); ?></p>
      </div>
    </div>

    <p class="note note--dark">
      <?php chuboya_text('night_note'); ?>
    </p>
  </div>
</section>
