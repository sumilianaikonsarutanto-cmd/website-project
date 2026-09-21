<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     09 お客様の声（WP: template-parts/section-voices.php）
     ============================================================ -->
<section class="section voices" id="voices">
  <div class="container">
    <p class="label"><?php chuboya_text('voices_label'); ?></p>
    <h2 class="heading"><span class="nb"><?php chuboya_text('voices_heading_1'); ?></span><span class="nb"><?php chuboya_text('voices_heading_2'); ?></span></h2>
    <p class="lead"><?php chuboya_text('voices_lead'); ?></p>

    <ul class="voices__list">
      <li>
        <h3 class="voices__title"><?php chuboya_text('voice1_title'); ?></h3>
        <p><?php chuboya_text('voice1_text'); ?></p>
      </li>
      <li>
        <h3 class="voices__title"><?php chuboya_text('voice2_title'); ?></h3>
        <p><?php chuboya_text('voice2_text'); ?></p>
      </li>
      <li>
        <h3 class="voices__title"><?php chuboya_text('voice3_title'); ?></h3>
        <p><?php chuboya_text('voice3_text'); ?></p>
      </li>
      <li>
        <h3 class="voices__title"><?php chuboya_text('voice4_title'); ?></h3>
        <p><?php chuboya_text('voice4_text'); ?></p>
      </li>
      <li>
        <h3 class="voices__title"><?php chuboya_text('voice5_title'); ?></h3>
        <p><?php chuboya_text('voice5_text'); ?></p>
      </li>
    </ul>

    <p class="note">
      <?php chuboya_text('voices_note'); ?><?php chuboya_echo_inline(chuboya_chip_if(chuboya_get('voices_note_chip'))); ?>
    </p>
  </div>
</section>
