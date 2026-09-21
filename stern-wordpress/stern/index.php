<?php
/**
 * フォールバック（必須）。通常は front-page.php が使われます。
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
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
          <h1 class="section-head__title"><?php the_title(); ?></h1>
          <div class="entry"><?php the_content(); ?></div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <p>表示できる記事がありません。</p>
    <?php endif; ?>
  </div>
</main>
<?php
get_footer();
