<?php
if (!defined('ABSPATH')) {
    exit;
}
$brand = tsn_info('brand_name');
$address = tsn_info('address');
?>
<footer class="footer">
  <div class="container">
    <div class="footer__top">
      <div>
        <p class="footer__brand">ツナグ<span>WEB</span>製作</p>
        <p class="footer__desc">中小企業・地域密着型事業者のためのホームページ制作。価値を整理し、伝わる形へ。</p>
        <?php if ($address !== '') : ?>
          <p class="footer__desc" style="margin-top:0.75rem"><?php echo esc_html($address); ?></p>
        <?php endif; ?>
      </div>
      <div>
        <h3>Navigate</h3>
        <div class="footer__links">
          <a href="<?php echo esc_url(tsn_hash('problem')); ?>">課題</a>
          <a href="<?php echo esc_url(tsn_hash('philosophy')); ?>">考え方</a>
          <a href="<?php echo esc_url(tsn_hash('services')); ?>">サービス</a>
          <a href="<?php echo esc_url(tsn_hash('works')); ?>">コンセプト</a>
          <a href="<?php echo esc_url(tsn_hash('price')); ?>">費用</a>
          <a href="<?php echo esc_url(tsn_hash('contact')); ?>">相談</a>
        </div>
      </div>
      <div>
        <h3>Business</h3>
        <div class="footer__links">
          <span style="color:var(--text-mute);font-size:0.92rem;line-height:1.8">ホームページ新規制作 / リニューアル / スマホ対応・導線改善 / コンテンツ設計</span>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <p>&copy; <span data-year><?php echo esc_html(gmdate('Y')); ?></span> <?php echo esc_html($brand); ?></p>
      <p class="footer__en">Connect Value. Design Impact.</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
