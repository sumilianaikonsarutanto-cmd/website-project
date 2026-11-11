<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main id="main" class="section">
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?>>
        <p class="section__label">Page</p>
        <h1 class="section__title"><?php the_title(); ?></h1>
        <div class="section__lead" style="max-width:48em;color:inherit;margin-top:2rem">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>
<?php
get_footer();
