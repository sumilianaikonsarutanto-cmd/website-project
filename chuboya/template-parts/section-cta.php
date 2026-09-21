<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     12 最終CTA（WP: template-parts/section-cta.php）
     ============================================================ -->
<section class="section final-cta" id="contact">
  <div class="container container--narrow">
    <h2 class="final-cta__title"><span class="nb"><?php chuboya_text('cta_title_1'); ?></span><span class="nb"><?php chuboya_text('cta_title_2'); ?></span></h2>
    <p class="final-cta__lead">
      <?php chuboya_br(chuboya_get('cta_lead')); ?>
    </p>
    <div class="final-cta__actions">
      <a class="btn btn--light btn--lg" href="<?php echo esc_url(chuboya_tel_href()); ?>"><?php chuboya_text('cta_tel'); ?><span class="btn__note"><?php chuboya_text('phone_display'); ?></span></a>
      <a class="btn btn--outline-light" href="<?php echo esc_url(chuboya_url('access')); ?>"><?php chuboya_text('cta_access'); ?></a>
    </div>
  </div>
</section>

<!-- ============================================================
     13 Instagram（公式アカウント未確認のため非表示）
     アカウントが確認できたら以下のコメントを解除して URL を設定
     ============================================================ -->
<!--
<section class="section instagram" id="instagram">
  <div class="container">
    <p class="label">Instagram</p>
    <h2 class="heading">今日の中房家を、Instagramで。</h2>
    <p class="lead">日々の料理や店の様子はInstagramで発信しています。</p>
    <p class="cta-inline"><a class="btn btn--primary" href="要確認：公式アカウントURL" target="_blank" rel="noopener">Instagramを見る</a></p>
  </div>
</section>
-->
