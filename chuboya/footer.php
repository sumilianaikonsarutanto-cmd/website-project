<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ============================================================
     14 Footer（WP: footer.php）
     ============================================================ -->
<footer class="footer">
  <div class="container footer__inner">
    <div class="footer__brand">
      <p class="footer__name"><?php chuboya_text('shop_name'); ?></p>
      <p class="footer__desc"><?php chuboya_text('footer_desc'); ?></p>
      <p class="footer__addr">
        <?php chuboya_text('address'); ?><br>
        <?php chuboya_text('nearest'); ?><br>
        <a class="link link--tel" href="<?php echo esc_url(chuboya_tel_href()); ?>"><?php chuboya_text('phone_display'); ?></a>
      </p>
    </div>

    <nav class="footer__nav" aria-label="フッターメニュー">
      <ul>
        <li><a href="<?php echo esc_url(chuboya_url('about')); ?>">中房家について</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('reasons')); ?>">選ばれる理由</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('menu')); ?>">お品書き</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('lunch')); ?>">ランチ</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('night')); ?>">夜の楽しみ方</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('seats')); ?>">店内・利用シーン</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('voices')); ?>">お客様の声</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('access')); ?>">アクセス</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('faq')); ?>">よくある質問</a></li>
      </ul>
    </nav>
  </div>
  <p class="footer__copy"><small><?php chuboya_text('copyright'); ?></small></p>
</footer>

<!-- スマートフォン用 固定CTA（WP: footer.php 内） -->
<div class="fixed-cta" aria-label="お問い合わせ">
  <a class="fixed-cta__btn fixed-cta__btn--tel" href="<?php echo esc_url(chuboya_tel_href()); ?>"><?php chuboya_text('fixed_tel'); ?></a>
  <a class="fixed-cta__btn fixed-cta__btn--map" href="<?php echo esc_url(chuboya_url('access')); ?>"><?php chuboya_text('fixed_access'); ?></a>
</div>

<?php wp_footer(); ?>
</body>
</html>
