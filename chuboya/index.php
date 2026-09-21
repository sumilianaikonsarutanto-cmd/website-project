<?php
/**
 * メインテンプレート（ブログ一覧など）
 * ホームページ本体は front-page.php を使います。
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main id="main" class="section wp-page">
  <div class="container wp-page__inner">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
          <h1><?php the_title(); ?></h1>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <h1><?php echo esc_html(chuboya_get('shop_name')); ?></h1>
      <p>表示できる投稿がありません。</p>
      <p class="cta-inline"><a class="btn btn--primary" href="<?php echo esc_url(home_url('/')); ?>">トップへ戻る</a></p>
    <?php endif; ?>
  </div>
</main>
<?php
get_footer();
