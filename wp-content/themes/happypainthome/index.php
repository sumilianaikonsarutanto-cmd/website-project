<?php
/**
 * フォールバック。通常は front-page.php / archive-works.php が使われます。
 */
if (!defined('ABSPATH')) { exit; }
get_header();
?>
<main id="main">
  <section class="section">
    <div class="container">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
          <h1 class="section-head__title"><?php the_title(); ?></h1>
          <div class="question__body"><?php the_content(); ?></div>
        </article>
      <?php endwhile; else : ?>
        <p>表示できる投稿がありません。</p>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer();
