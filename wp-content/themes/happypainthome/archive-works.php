<?php
/**
 * 施工事例一覧。静的 HTML 版 works.html と同一の構成・文言です。
 */
if (!defined('ABSPATH')) { exit; }
get_header();

$count = (int) wp_count_posts('works')->publish;
?>
<main id="main">
  <section class="section">
    <div class="container">
      <div class="section-head">
        <p class="section-head__label">Works</p>
        <h1 class="section-head__title">雨漏り修理の施工事例</h1>
        <p class="section-head__lead">
          地域・工事内容・施工費用とあわせて、施工前／施工中／施工後の写真をそのまま掲載しています。
          瓦を交換せずに修繕し、雨漏りが改善したケースも数多くあります。
        </p>
      </div>

      <div class="filter" data-filter role="group" aria-label="地域で絞り込む">
        <button class="filter__btn" type="button" data-filter-value="all" aria-pressed="true">すべて</button>
        <button class="filter__btn" type="button" data-filter-value="osaka-city" aria-pressed="false">大阪市内</button>
        <button class="filter__btn" type="button" data-filter-value="osaka" aria-pressed="false">大阪府内</button>
        <button class="filter__btn" type="button" data-filter-value="other" aria-pressed="false">近隣府県</button>
      </div>

      <p class="works__note">
        <span data-filter-count><?php echo esc_html($count); ?></span>件を表示中　／　※施工費用は当時のものです。建物の状態や雨漏りの原因によって費用は変わります。
      </p>

      <?php get_template_part('template-parts/works-grid', null, array('heading' => 'h2')); ?>

      <p class="works__empty" data-filter-empty hidden>該当する施工事例がありません。</p>

      <div class="inline-cta">
        <p class="inline-cta__text">似た症状の雨漏りを相談する</p>
        <p class="inline-cta__note">現地調査・お見積りは無料です。写真を送るだけでもご相談いただけます。</p>
        <div class="inline-cta__actions">
          <a class="btn btn--line" href="<?php echo esc_url(hph_info('line_url')); ?>" target="_blank" rel="noopener">
            <svg class="btn__icon" aria-hidden="true"><use href="#i-line"></use></svg>LINEで写真を送って相談
          </a>
          <a class="btn btn--orange" href="<?php echo esc_url(hph_tel_href()); ?>">
            <svg class="btn__icon" aria-hidden="true"><use href="#i-phone"></use></svg>電話で相談する
          </a>
        </div>
      </div>

      <p class="works__more">
        <a class="btn btn--ghost" href="<?php echo esc_url(home_url('/')); ?>">トップページに戻る</a>
      </p>
    </div>
  </section>
</main>
<?php get_footer();
