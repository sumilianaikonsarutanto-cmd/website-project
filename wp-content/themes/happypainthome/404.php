<?php
if (!defined('ABSPATH')) { exit; }
get_header();
?>
<main id="main">
  <section class="section">
    <div class="container container--narrow">
      <div class="section-head">
        <p class="section-head__label">Error</p>
        <h1 class="section-head__title">ページが見つかりません</h1>
        <p class="section-head__lead">お探しのページは移動または削除された可能性があります。</p>
      </div>
      <p class="works__more">
        <a class="btn btn--ghost" href="<?php echo esc_url(home_url('/')); ?>">トップページに戻る</a>
      </p>
    </div>
  </section>
</main>
<?php get_footer();
