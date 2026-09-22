<?php
/**
 * フッター
 *
 * @package Shinjuen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<footer class="footer">
  <div class="wrap footer__grid">
    <div>
      <p class="footer__name">新樹園</p>
      <p>〒533-0022 大阪府大阪市東淀川区菅原2丁目9-10<br>
        <a href="tel:0663271587">06-6327-1587</a><br>
        営業時間・定休日：要確認</p>
    </div>
    <nav aria-label="フッターメニュー">
      <a href="<?php echo shinjuen_link( '#lineup' ); ?>">植物</a>
      <a href="<?php echo shinjuen_link( '#arrivals' ); ?>">今週の入荷</a>
      <a href="<?php echo shinjuen_link( '#beginners' ); ?>">初めての方</a>
      <a href="<?php echo shinjuen_link( '#access' ); ?>">アクセス</a>
      <a href="<?php echo shinjuen_privacy_url(); ?>">プライバシーポリシー</a>
    </nav>
  </div>
  <div class="wrap">
    <p class="footer__note">このページは新樹園向けの提案デモです。営業時間、価格、在庫、スタッフ紹介など、確認できていない情報は載せていません。</p>
  </div>
</footer>

<div class="dock" aria-label="電話とアクセス">
  <a href="tel:0663271587"><svg aria-hidden="true"><use href="#i-phone"></use></svg>電話する</a>
  <a href="<?php echo shinjuen_link( '#access' ); ?>"><svg aria-hidden="true"><use href="#i-pin"></use></svg>アクセス</a>
</div>
<?php wp_footer(); ?>
</body>
</html>
