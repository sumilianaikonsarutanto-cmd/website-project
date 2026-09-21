<?php
/**
 * 共通フッター
 *
 * @package Stern
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- ===== フッター ================================================== -->
<footer class="footer">
  <div class="container footer__inner">
    <div class="footer__brand">
      <svg class="footer__mark" viewBox="0 0 40 40" role="img" aria-label="ステルン ロゴ">
        <path d="M20 8.5c1.5 7.5 3.9 11.6 8.3 13.5-4.4 1.9-6.8 6-8.3 13.5-1.5-7.5-3.9-11.6-8.3-13.5 4.4-1.9 6.8-6 8.3-13.5Z" fill="#e9b949"/>
      </svg>
      <p class="footer__name">ステルン</p>
      <p class="footer__address">
        〒533-0002 大阪府大阪市東淀川区北江口4丁目2-8<br>
        TEL <a href="<?php echo esc_attr( stern_phone_href() ); ?>"><?php echo esc_html( stern_phone() ); ?></a>（<?php echo esc_html( stern_hours() ); ?>）
      </p>
    </div>

    <nav class="footer__nav" aria-label="フッターメニュー">
      <ul>
        <li><a href="<?php echo esc_url( stern_section_url('service') ); ?>">サービス</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('reason') ); ?>">選ばれる理由</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('price') ); ?>">料金・お見積もり</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('works') ); ?>">作業事例</a></li>
      </ul>
      <ul>
        <li><a href="<?php echo esc_url( stern_section_url('voice') ); ?>">お客様からの評価</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('flow') ); ?>">ご利用の流れ</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('faq') ); ?>">よくある質問</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('access') ); ?>">アクセス・事業者情報</a></li>
      </ul>
    </nav>
  </div>
  <!-- 要確認（docs/content-source.md B-7）：プライバシーポリシー・特定商取引法に基づく表記等の
       法定表示ページを用意する場合は、ここにリンクを追加してください。 -->
  <p class="footer__copy">&copy; <span data-year>2026</span> ステルン</p>
</footer>

<!-- ===== スマホ固定CTA ============================================= -->
<div class="fixed-cta" aria-label="お問い合わせ">
  <a class="fixed-cta__btn fixed-cta__btn--tel" href="<?php echo esc_attr( stern_phone_href() ); ?>">
    <svg class="icon" aria-hidden="true"><use href="#i-phone"></use></svg>電話で相談
  </a>
  <a class="fixed-cta__btn fixed-cta__btn--main" href="<?php echo esc_url( stern_section_url('contact') ); ?>">無料見積もり</a>
</div>


<?php wp_footer(); ?>
</body>
</html>
