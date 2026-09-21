<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     08 店内・利用シーン（WP: template-parts/section-seats.php）
     ============================================================ -->
<section class="section seats" id="seats">
  <div class="container">
    <p class="label"><?php chuboya_text('seats_label'); ?></p>
    <h2 class="heading"><span class="nb"><?php chuboya_text('seats_heading_1'); ?></span><span class="nb"><?php chuboya_text('seats_heading_2'); ?></span><span class="nb"><?php chuboya_text('seats_heading_3'); ?></span></h2>
    <p class="lead">
      <?php chuboya_br(chuboya_get('seats_lead')); ?>
    </p>

    <div class="seats__grid">
      <div class="scene scene--lead">
        <figure class="photo photo--wide">
          <?php
          chuboya_img('photo_scene_solo', 'scene-solo.jpg', array(
              'alt' => chuboya_get('scene_solo_alt'),
          ));
          ?>
        </figure>
        <h3 class="scene__title"><?php chuboya_text('scene_solo_title'); ?></h3>
        <p><?php chuboya_text('scene_solo_text'); ?></p>
      </div>

      <div class="scene">
        <figure class="photo photo--sq">
          <?php
          chuboya_img('photo_scene_family', 'scene-family.jpg', array(
              'alt' => chuboya_get('scene_family_alt'),
          ));
          ?>
        </figure>
        <h3 class="scene__title"><?php chuboya_text('scene_family_title'); ?></h3>
        <p><?php chuboya_text('scene_family_text'); ?></p>
      </div>

      <div class="scene">
        <figure class="photo photo--sq">
          <?php
          chuboya_img('photo_scene_group', 'scene-group.jpg', array(
              'alt' => chuboya_get('scene_group_alt'),
          ));
          ?>
        </figure>
        <h3 class="scene__title"><?php chuboya_text('scene_group_title'); ?></h3>
        <p><?php chuboya_text('scene_group_text'); ?></p>
      </div>
    </div>

    <p class="note"><?php chuboya_text('seats_note'); ?><?php chuboya_echo_inline(chuboya_chip_if(chuboya_get('seats_note_chip'))); ?></p>
  </div>
</section>
