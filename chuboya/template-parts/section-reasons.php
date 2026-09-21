<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     03 選ばれる3つの理由（WP: template-parts/section-reasons.php）
     ============================================================ -->
<section class="section reasons" id="reasons">
  <div class="container">
    <p class="label label--center"><?php chuboya_text('reasons_label'); ?></p>
    <h2 class="heading heading--center"><?php chuboya_text('reasons_heading'); ?></h2>

    <ol class="reasons__list">
      <li class="reason">
        <p class="reason__num" aria-hidden="true">01</p>
        <div class="reason__body">
          <h3 class="reason__title"><?php chuboya_text('reason1_title'); ?></h3>
          <p><?php chuboya_text('reason1_text'); ?></p>
        </div>
        <figure class="photo photo--sq reason__photo">
          <?php
          chuboya_img('photo_reason_food', 'reason-food.jpg', array(
              'alt' => chuboya_get('reason1_alt'),
          ));
          ?>
        </figure>
      </li>

      <li class="reason">
        <p class="reason__num" aria-hidden="true">02</p>
        <div class="reason__body">
          <h3 class="reason__title"><?php chuboya_text('reason2_title'); ?></h3>
          <p><?php chuboya_text('reason2_text'); ?></p>
        </div>
        <figure class="photo photo--sq reason__photo">
          <?php
          chuboya_img('photo_reason_volume', 'reason-volume.jpg', array(
              'alt' => chuboya_get('reason2_alt'),
          ));
          ?>
        </figure>
      </li>

      <li class="reason">
        <p class="reason__num" aria-hidden="true">03</p>
        <div class="reason__body">
          <h3 class="reason__title"><?php chuboya_text('reason3_title'); ?></h3>
          <p><?php chuboya_text('reason3_text'); ?></p>
        </div>
        <figure class="photo photo--sq reason__photo">
          <?php
          chuboya_img('photo_reason_staff', 'reason-staff.jpg', array(
              'alt' => chuboya_get('reason3_alt'),
          ));
          ?>
        </figure>
      </li>
    </ol>
  </div>
</section>
