<?php
/**
 * 404
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main id="main" class="section wp-page">
  <div class="container wp-page__inner">
    <h1>ページが見つかりません</h1>
    <p>お探しのページは移動または削除された可能性があります。</p>
    <p class="cta-inline"><a class="btn btn--primary" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(chuboya_get('shop_name')); ?>トップへ戻る</a></p>
  </div>
</main>
<?php
get_footer();
