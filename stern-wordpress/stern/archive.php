<?php
/**
 * 一覧
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
      <h1 class="section-head__title"><?php the_archive_title(); ?></h1>
    </header>
    <?php if ( have_posts() ) : ?>
      <ul>
        <?php while ( have_posts() ) : the_post(); ?>
          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
      </ul>
    <?php else : ?>
      <p>表示できる記事がありません。</p>
    <?php endif; ?>
  </div>
</main>
<?php
get_footer();
