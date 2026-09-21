<?php
/**
 * 固定ページ
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
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?>>
        <header class="section-head">
          <h1 class="section-head__title"><?php the_title(); ?></h1>
        </header>
        <div class="entry"><?php the_content(); ?></div>
      </article>
    <?php endwhile; ?>
  </div>
</main>
<?php
get_footer();
