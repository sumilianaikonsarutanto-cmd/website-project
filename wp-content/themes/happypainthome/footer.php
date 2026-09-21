<?php if (!defined('ABSPATH')) { exit; } ?>
<footer class="footer">
  <div class="container">
    <div class="footer__top">
      <div>
        <p class="footer__brand-name"><?php echo esc_html(hph_info('shop_name')); ?></p>
        <p class="footer__brand-sub"><?php echo esc_html(hph_info('shop_legal')); ?>／<?php echo esc_html(hph_info('shop_tagline')); ?></p>
        <address class="footer__address">
          <?php echo esc_html(hph_info('address')); ?><br>
          TEL <a href="<?php echo esc_url(hph_tel_href()); ?>"><?php echo esc_html(hph_info('tel_display')); ?></a> ／ <a href="<?php echo esc_url(hph_tel_href('mobile')); ?>"><?php echo esc_html(hph_info('mobile_display')); ?></a><br>
          <a href="mailto:<?php echo esc_attr(hph_info('email')); ?>"><?php echo esc_html(hph_info('email')); ?></a>
        </address>
      </div>
      <nav class="footer__nav" aria-label="フッターメニュー">
        <a href="<?php echo esc_url(hph_hash('question')); ?>">その工事、本当に必要ですか？</a>
        <a href="<?php echo esc_url(hph_hash('reason')); ?>">選ばれる理由</a>
        <a href="<?php echo esc_url(hph_hash('flow')); ?>">雨漏り修理の流れ</a>
        <a href="<?php echo esc_url(hph_works_url()); ?>">施工事例</a>
        <a href="<?php echo esc_url(hph_hash('price')); ?>">料金の目安</a>
        <a href="<?php echo esc_url(hph_hash('voice')); ?>">お客様の評価</a>
        <a href="<?php echo esc_url(hph_hash('craftsman')); ?>">職人紹介</a>
        <a href="<?php echo esc_url(hph_hash('faq')); ?>">よくある質問</a>
        <a href="<?php echo esc_url(hph_hash('area')); ?>">対応エリア</a>
        <a href="<?php echo esc_url(hph_hash('company')); ?>">会社概要</a>
      </nav>
    </div>
    <div class="footer__bottom">
      <small>&copy; <span data-year><?php echo esc_html(date('Y')); ?></span> <?php echo esc_html(hph_info('shop_name')); ?>（<?php echo esc_html(hph_info('shop_legal')); ?>）</small>
      <div class="footer__social">
        <a href="<?php echo esc_url(hph_info('instagram')); ?>" target="_blank" rel="noopener" aria-label="Instagram">
          <svg aria-hidden="true"><use href="#i-instagram"></use></svg>
        </a>
        <a href="<?php echo esc_url(hph_info('line_url')); ?>" target="_blank" rel="noopener" aria-label="LINEで相談">
          <svg aria-hidden="true"><use href="#i-line"></use></svg>
        </a>
      </div>
    </div>
  </div>
</footer>

<div class="fixed-cta">
  <a class="fixed-cta__btn fixed-cta__btn--tel" href="<?php echo esc_url(hph_tel_href()); ?>">
    <svg aria-hidden="true"><use href="#i-phone"></use></svg>
    <span>電話で相談<small><?php echo esc_html(hph_info('tel_display')); ?></small></span>
  </a>
  <a class="fixed-cta__btn fixed-cta__btn--line" href="<?php echo esc_url(hph_info('line_url')); ?>" target="_blank" rel="noopener">
    <svg aria-hidden="true"><use href="#i-line"></use></svg>
    <span>LINEで相談<small>写真を送るだけでOK</small></span>
  </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
