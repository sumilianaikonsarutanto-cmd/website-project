<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     04 人気メニュー（WP: template-parts/section-menu.php）
     ============================================================ -->
<section class="section menu" id="menu">
  <div class="container">
    <p class="label"><?php chuboya_text('menu_label'); ?></p>
    <h2 class="heading"><?php chuboya_text('menu_heading'); ?></h2>
    <p class="lead">
      <?php chuboya_br(chuboya_get('menu_lead')); ?>
    </p>

    <div class="menu__layout">
      <ul class="tanzaku" aria-label="中房家の料理（一部）">
        <?php for ($i = 1; $i <= 8; $i++) : ?>
        <li class="tanzaku__item"><span class="tanzaku__name"><?php chuboya_text('menu_name_' . $i); ?></span><span class="tanzaku__price"><?php chuboya_text('menu_price_' . $i); ?></span></li>
        <?php endfor; ?>
        <li class="tanzaku__item tanzaku__item--more"><span class="tanzaku__name"><?php chuboya_text('menu_more'); ?></span></li>
      </ul>

      <div class="menu__photos">
        <figure class="photo photo--wide menu__photo menu__photo--main">
          <?php
          chuboya_img('photo_menu_main', 'menu-main.jpg', array(
              'alt' => chuboya_get('menu_main_alt'),
          ));
          ?>
          <figcaption><?php chuboya_text('menu_main_caption'); ?></figcaption>
        </figure>
        <figure class="photo photo--sq menu__photo">
          <?php
          chuboya_img('photo_menu_noodles', 'menu-noodles.jpg', array(
              'alt' => chuboya_get('menu_noodles_alt'),
          ));
          ?>
          <figcaption><?php chuboya_text('menu_noodles_caption'); ?></figcaption>
        </figure>
        <figure class="photo photo--sq menu__photo">
          <?php
          chuboya_img('photo_menu_ippin', 'menu-ippin.jpg', array(
              'alt' => chuboya_get('menu_ippin_alt'),
          ));
          ?>
          <figcaption><?php chuboya_text('menu_ippin_caption'); ?></figcaption>
        </figure>
      </div>
    </div>

    <p class="note">
      <?php chuboya_text('menu_note'); ?><?php chuboya_echo_inline(chuboya_chip_if(chuboya_get('menu_note_chip'))); ?>
    </p>
  </div>
</section>
