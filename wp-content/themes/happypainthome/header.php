<?php
if (!defined('ABSPATH')) {
    exit;
}

$home = is_front_page();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">本文へスキップ</a>

<svg xmlns="http://www.w3.org/2000/svg" style="display:none" aria-hidden="true" focusable="false">
  <symbol id="i-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 12.5 9.5 18 20 6"/></symbol>
  <symbol id="i-phone" viewBox="0 0 24 24" fill="currentColor"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.24 11.4 11.4 0 0 0 3.6.58 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .58 3.6 1 1 0 0 1-.25 1z"/></symbol>
  <symbol id="i-line" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.2c5.52 0 10 3.64 10 8.13 0 1.78-.69 3.38-2.13 4.98-2.1 2.42-6.8 5.37-7.87 5.82-1.07.45-.91-.29-.87-.54l.14-.85c.04-.25.07-.64-.03-.89-.11-.28-.56-.42-.89-.49C5.55 17.72 2 14.35 2 10.33 2 5.84 6.48 2.2 12 2.2Z"/></symbol>
  <symbol id="i-mail" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"><rect x="2.5" y="4.5" width="19" height="15" rx="2"/><path d="m3 6 9 6.5L21 6"/></symbol>
  <symbol id="i-instagram" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.4" cy="6.6" r="1.1" fill="currentColor" stroke="none"/></symbol>
  <symbol id="i-pin" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a7 7 0 0 0-7 7c0 5.1 6.2 12.2 6.47 12.5a.7.7 0 0 0 1.06 0C12.8 21.2 19 14.1 19 9a7 7 0 0 0-7-7m0 9.6A2.6 2.6 0 1 1 14.6 9 2.6 2.6 0 0 1 12 11.6"/></symbol>
  <symbol id="i-star" viewBox="0 0 24 24" fill="currentColor"><path d="m12 2.6 2.9 5.9 6.5.95-4.7 4.58 1.1 6.47L12 17.45 6.2 20.5l1.1-6.47-4.7-4.58 6.5-.95z"/></symbol>
</svg>

<header class="header">
  <div class="container header__inner">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
      <svg class="logo__mark" viewBox="0 0 64 64" role="img" aria-label="<?php echo esc_attr(hph_info('shop_name')); ?> ロゴ">
        <path d="M4 44 24 24l7 7-20 20z" fill="#2b2622"/>
        <path d="M13 53 33 33l7 7-20 20z" fill="#2b2622" opacity=".9"/>
        <path d="M34 12 60 40h-7L34 20 15 40H8z" fill="#ef7215"/>
        <rect x="29" y="34" width="5" height="5" rx="1" fill="#ef7215"/>
        <rect x="36" y="34" width="5" height="5" rx="1" fill="#ef7215"/>
        <rect x="29" y="41" width="5" height="5" rx="1" fill="#ef7215"/>
        <rect x="36" y="41" width="5" height="5" rx="1" fill="#ef7215"/>
      </svg>
      <span class="logo__text">
        <span class="logo__name"><?php echo esc_html(hph_info('shop_name')); ?></span>
        <span class="logo__sub"><?php echo esc_html(hph_info('shop_legal')); ?>／<?php echo esc_html(hph_info('shop_tagline')); ?></span>
      </span>
    </a>

    <nav class="gnav" aria-label="メインメニュー">
      <ul class="gnav__list">
        <li><a class="gnav__link" href="<?php echo esc_url(hph_hash('reason')); ?>">選ばれる理由</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url(hph_hash('flow')); ?>">修理の流れ</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url($home ? '#works' : hph_works_url()); ?>">施工事例</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url(hph_hash('price')); ?>">料金の目安</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url(hph_hash('craftsman')); ?>">職人紹介</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url(hph_hash('faq')); ?>">よくある質問</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url(hph_hash('area')); ?>">対応エリア</a></li>
      </ul>
    </nav>

    <div class="header__contact">
      <a class="header__tel" href="<?php echo esc_url(hph_tel_href()); ?>">
        <span class="header__tel-num"><?php echo esc_html(hph_info('tel_display')); ?></span>
        <span class="header__tel-note">※営業・勧誘のお電話はご遠慮ください</span>
      </a>
      <a class="btn btn--line header__cta" href="<?php echo esc_url(hph_info('line_url')); ?>" target="_blank" rel="noopener">
        <svg class="btn__icon" aria-hidden="true"><use href="#i-line"></use></svg>無料相談
      </a>
    </div>

    <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="drawer">
      <span class="nav-toggle__bar"></span>
      <span class="nav-toggle__bar"></span>
      <span class="nav-toggle__bar"></span>
      <span class="sr-only">メニューを開く</span>
    </button>
  </div>

  <div class="drawer" id="drawer" data-drawer hidden>
    <nav aria-label="メインメニュー（モバイル）">
      <ul class="drawer__list">
        <?php if (!$home) : ?>
        <li><a class="drawer__link" href="<?php echo esc_url(home_url('/')); ?>">ホーム</a></li>
        <?php endif; ?>
        <li><a class="drawer__link" href="<?php echo esc_url(hph_hash('question')); ?>">その工事、本当に必要ですか？</a></li>
        <li><a class="drawer__link" href="<?php echo esc_url(hph_hash('reason')); ?>">選ばれる理由</a></li>
        <li><a class="drawer__link" href="<?php echo esc_url(hph_hash('flow')); ?>">雨漏り修理の流れ</a></li>
        <li><a class="drawer__link" href="<?php echo esc_url($home ? '#works' : hph_works_url()); ?>">施工事例</a></li>
        <li><a class="drawer__link" href="<?php echo esc_url(hph_hash('price')); ?>">料金の目安</a></li>
        <?php if ($home) : ?>
        <li><a class="drawer__link" href="#voice">お客様の評価</a></li>
        <?php endif; ?>
        <li><a class="drawer__link" href="<?php echo esc_url(hph_hash('craftsman')); ?>">職人紹介</a></li>
        <li><a class="drawer__link" href="<?php echo esc_url(hph_hash('faq')); ?>">よくある質問</a></li>
        <li><a class="drawer__link" href="<?php echo esc_url(hph_hash('area')); ?>">対応エリア</a></li>
        <li><a class="drawer__link" href="<?php echo esc_url(hph_hash('company')); ?>">会社概要</a></li>
      </ul>
    </nav>
    <div class="drawer__actions">
      <a class="btn btn--line" href="<?php echo esc_url(hph_info('line_url')); ?>" target="_blank" rel="noopener">
        <svg class="btn__icon" aria-hidden="true"><use href="#i-line"></use></svg>LINEで無料相談
      </a>
      <a class="btn btn--tel" href="<?php echo esc_url(hph_tel_href()); ?>">
        <svg class="btn__icon" aria-hidden="true"><use href="#i-phone"></use></svg><?php echo esc_html(hph_info('tel_display')); ?>
      </a>
    </div>
    <p class="drawer__note">※営業・勧誘のお電話はご遠慮ください。</p>
  </div>
</header>
