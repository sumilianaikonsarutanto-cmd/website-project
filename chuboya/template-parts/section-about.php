<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     02 中房家とは（WP: template-parts/section-about.php）
     ============================================================ -->
<section class="section about" id="about">
  <div class="container about__grid">
    <div class="about__text">
      <p class="label"><?php chuboya_text('about_label'); ?></p>
      <h2 class="heading">
        <?php chuboya_text('about_heading_1'); ?><br>
        <span class="nb"><?php chuboya_text('about_heading_2'); ?></span><span class="nb"><?php chuboya_text('about_heading_3'); ?></span>
      </h2>
      <p>
        <?php chuboya_text('about_p1'); ?>
      </p>
      <p>
        <?php chuboya_text('about_p2'); ?>
      </p>
      <p class="about__note">
        <?php chuboya_text('about_note'); ?><?php chuboya_echo_inline(chuboya_chip_if(chuboya_get('about_note_chip'))); ?>
      </p>
    </div>

    <div class="about__media">
      <figure class="photo photo--tall">
        <?php
        chuboya_img('photo_about_staff', 'about-staff.jpg', array(
            'alt' => chuboya_get('about_staff_alt'),
        ));
        ?>
        <figcaption><?php chuboya_text('about_staff_caption'); ?></figcaption>
      </figure>
      <figure class="photo photo--wide about__media-sub">
        <?php
        chuboya_img('photo_about_exterior', 'about-exterior.jpg', array(
            'alt' => chuboya_get('about_exterior_alt'),
        ));
        ?>
        <figcaption><?php chuboya_text('about_exterior_caption'); ?></figcaption>
      </figure>
    </div>
  </div>
</section>
