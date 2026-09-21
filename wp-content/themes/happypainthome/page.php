<?php
if (!defined('ABSPATH')) { exit; }
get_header();
?>
<main id="main">
  <section class="section">
    <div class="container container--narrow">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="section-head">
          <h1 class="section-head__title"><?php the_title(); ?></h1>
        </div>
        <div class="question__body">
          <?php the_content(); ?>
        </div>
      <?php endwhile; else : ?>
        <p>ページが見つかりませんでした。</p>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer();
