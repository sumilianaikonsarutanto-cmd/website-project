<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     11 FAQ（WP: template-parts/section-faq.php）
     ============================================================ -->
<section class="section faq" id="faq">
  <div class="container container--narrow">
    <p class="label"><?php chuboya_text('faq_label'); ?></p>
    <h2 class="heading"><span class="nb"><?php chuboya_text('faq_heading_1'); ?></span><span class="nb"><?php chuboya_text('faq_heading_2'); ?></span></h2>

    <div class="faq__list">
      <?php for ($i = 1; $i <= 7; $i++) : ?>
      <details class="qa">
        <summary><?php chuboya_text('faq_q_' . $i); ?></summary>
        <div class="qa__body"><p><?php chuboya_text('faq_a_' . $i); ?><?php chuboya_echo_inline(chuboya_chip_if(chuboya_get('faq_a_' . $i . '_chip'))); ?></p></div>
      </details>
      <?php endfor; ?>
    </div>
  </div>
</section>
