<?php
/**
 * 固定ページ
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main id="main" class="section wp-page">
  <div class="container wp-page__inner">
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?>>
        <h1><?php the_title(); ?></h1>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>
<?php
get_footer();
