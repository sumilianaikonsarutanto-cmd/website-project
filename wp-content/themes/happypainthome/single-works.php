<?php
/**
 * 施工事例の個別ページ。一覧と同じ情報を大きく表示します。
 * トップ・一覧のカードからはリンクしていません（静的 HTML 版と同じ）。
 */
if (!defined('ABSPATH')) { exit; }
get_header();
?>
<main id="main">
  <section class="section">
    <div class="container container--narrow">
      <?php while (have_posts()) : the_post(); ?>
        <div class="section-head">
          <p class="section-head__label">Works</p>
          <h1 class="section-head__title"><?php echo esc_html(hph_work_meta(get_the_ID(), 'area')); ?>　<?php echo esc_html(hph_work_meta(get_the_ID(), 'type')); ?></h1>
        </div>
        <div class="works__grid">
          <?php get_template_part('template-parts/work-card', null, array('heading' => 'h2')); ?>
        </div>
        <p class="works__more">
          <a class="btn btn--ghost" href="<?php echo esc_url(hph_works_url()); ?>">施工事例一覧へ戻る</a>
        </p>
      <?php endwhile; ?>
    </div>
  </section>
</main>
<?php get_footer();
