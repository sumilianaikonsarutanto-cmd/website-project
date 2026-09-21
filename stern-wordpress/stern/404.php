<?php
/**
 * 404
 *
 * @package Stern
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<main id="main" class="section">
  <div class="container container--narrow">
    <header class="section-head">
      <h1 class="section-head__title">ページが見つかりません</h1>
      <p class="section-head__lead">アドレスが間違っているか、ページが移動した可能性があります。</p>
    </header>
    <p><a class="btn btn--primary" href="<?php echo esc_url( home_url('/') ); ?>">トップページへ戻る</a></p>
  </div>
</main>
<?php
get_footer();
