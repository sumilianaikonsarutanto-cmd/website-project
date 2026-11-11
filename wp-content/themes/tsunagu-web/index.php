<?php
/**
 * フォールバックテンプレート。
 * フロントページは front-page.php を使用します。
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main id="main" class="section">
  <div class="container">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('reveal is-visible'); ?>>
          <h1 class="section__title"><?php the_title(); ?></h1>
          <div class="section__lead" style="max-width:none;color:inherit">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <h1 class="section__title">コンテンツがありません</h1>
      <p class="section__lead"><a href="<?php echo esc_url(home_url('/')); ?>">トップページへ戻る</a></p>
    <?php endif; ?>
  </div>
</main>
<?php
get_footer();
