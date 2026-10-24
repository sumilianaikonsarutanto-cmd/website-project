<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main id="main" class="page-404">
  <div class="page-404__inner">
    <p class="page-404__code en" aria-hidden="true">404</p>
    <h1>ページが<br>見つかりません。</h1>
    <p>URLが変わったか、削除された可能性があります。トップページから目的の情報へお進みください。</p>
    <div class="cta-row">
      <a class="btn btn--primary" href="<?php echo esc_url(home_url('/')); ?>">トップへ戻る <span class="btn__arrow" aria-hidden="true">→</span></a>
      <a class="btn btn--ghost" href="<?php echo esc_url(tsn_hash('contact')); ?>">制作を相談する</a>
    </div>
  </div>
</main>
<?php
get_footer();
