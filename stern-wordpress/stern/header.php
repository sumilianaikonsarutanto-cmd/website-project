<?php
/**
 * 共通ヘッダー
 *
 * @package Stern
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="theme-color" content="#17232f">
<?php wp_head(); ?>
<script>document.documentElement.classList.remove('no-js');</script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">本文へスキップ</a>

<!-- ===== アイコン（インライン SVG スプライト） ====================== -->
<svg xmlns="http://www.w3.org/2000/svg" style="display:none" aria-hidden="true" focusable="false">
  <symbol id="i-sparkle" viewBox="0 0 24 24" fill="currentColor"><path d="M12 1.6c.9 4.7 2.4 7.4 5.1 8.6-2.7 1.2-4.2 3.9-5.1 8.6-.9-4.7-2.4-7.4-5.1-8.6C9.6 9 11.1 6.3 12 1.6Z"/><path d="M19.2 14.4c.45 2.35 1.2 3.7 2.55 4.3-1.35.6-2.1 1.95-2.55 4.3-.45-2.35-1.2-3.7-2.55-4.3 1.35-.6 2.1-1.95 2.55-4.3Z" opacity=".55"/></symbol>
  <symbol id="i-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 12.5 9.5 18 20 6"/></symbol>
  <symbol id="i-phone" viewBox="0 0 24 24" fill="currentColor"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.24 11.4 11.4 0 0 0 3.6.58 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .58 3.6 1 1 0 0 1-.25 1z"/></symbol>
  <symbol id="i-mail" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"><rect x="2.5" y="4.5" width="19" height="15" rx="2"/><path d="m3 6 9 6.5L21 6"/></symbol>
  <symbol id="i-line" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.2c5.52 0 10 3.64 10 8.13 0 1.78-.69 3.38-2.13 4.98-2.1 2.42-6.8 5.37-7.87 5.82-1.07.45-.91-.29-.87-.54l.14-.85c.04-.25.07-.64-.03-.89-.11-.28-.56-.42-.89-.49C5.55 17.72 2 14.35 2 10.33 2 5.84 6.48 2.2 12 2.2Z"/></symbol>
  <symbol id="i-pin" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a7 7 0 0 0-7 7c0 5.1 6.2 12.2 6.47 12.5a.7.7 0 0 0 1.06 0C12.8 21.2 19 14.1 19 9a7 7 0 0 0-7-7m0 9.6A2.6 2.6 0 1 1 14.6 9 2.6 2.6 0 0 1 12 11.6"/></symbol>
  <symbol id="i-clock" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"><circle cx="12" cy="12" r="9"/><path d="M12 6.8V12l3.4 2.2" stroke-linecap="round"/></symbol>
  <symbol id="i-star" viewBox="0 0 24 24" fill="currentColor"><path d="m12 2.6 2.9 5.9 6.5.95-4.7 4.58 1.1 6.47L12 17.45 6.2 20.5l1.1-6.47-4.7-4.58 6.5-.95z"/></symbol>
  <symbol id="i-camera" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3.5 7.5h3.2l1.4-2.2h6.8l1.4 2.2h3.2a1 1 0 0 1 1 1v9.2a1 1 0 0 1-1 1h-17a1 1 0 0 1-1-1V8.5a1 1 0 0 1 1-1Z"/><circle cx="12" cy="13" r="3.6"/></symbol>
</svg>


<!-- ===== ヘッダー ================================================== -->
<header class="header" data-header>
  <div class="header__inner">
    <a class="logo" href="<?php echo esc_url( home_url('/') ); ?>" aria-label="ステルン トップへ">
      <!-- 要確認（docs/content-source.md A-1）：正式なロゴデータ支給後に差し替え -->
      <svg class="logo__mark" viewBox="0 0 40 40" role="img" aria-label="ステルン ロゴ">
        <circle cx="20" cy="20" r="20" fill="#17232f"/>
        <path d="M20 8.5c1.5 7.5 3.9 11.6 8.3 13.5-4.4 1.9-6.8 6-8.3 13.5-1.5-7.5-3.9-11.6-8.3-13.5 4.4-1.9 6.8-6 8.3-13.5Z" fill="#e9b949"/>
      </svg>
      <span class="logo__text">
        <span class="logo__name">ステルン</span>
        <span class="logo__sub">大阪市東淀川区の不用品回収</span>
      </span>
    </a>

    <nav class="gnav" aria-label="メインメニュー">
      <ul class="gnav__list">
        <li><a class="gnav__link" href="<?php echo esc_url( stern_section_url('service') ); ?>">サービス</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url( stern_section_url('reason') ); ?>">選ばれる理由</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url( stern_section_url('price') ); ?>">料金</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url( stern_section_url('works') ); ?>">作業事例</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url( stern_section_url('faq') ); ?>">よくある質問</a></li>
        <li><a class="gnav__link" href="<?php echo esc_url( stern_section_url('access') ); ?>">アクセス</a></li>
      </ul>
    </nav>

    <div class="header__cta">
      <a class="header__tel" href="<?php echo esc_attr( stern_phone_href() ); ?>">
        <svg class="icon" aria-hidden="true"><use href="#i-phone"></use></svg>
        <span class="header__tel-body">
          <span class="header__tel-num"><?php echo esc_html( stern_phone() ); ?></span>
          <span class="header__tel-time">受付 <?php echo esc_html( stern_hours() ); ?></span>
        </span>
      </a>
      <a class="btn btn--primary btn--sm" href="<?php echo esc_url( stern_section_url('contact') ); ?>">無料見積もり</a>
    </div>

    <button class="hamburger" type="button" aria-expanded="false" aria-controls="drawer" data-nav-toggle>
      <span class="hamburger__bars" aria-hidden="true"></span>
      <span class="hamburger__label">メニュー</span>
    </button>
  </div>

  <!-- モバイル用ドロワー -->
  <div class="drawer" id="drawer" data-drawer hidden>
    <nav aria-label="モバイルメニュー">
      <ul class="drawer__list">
        <li><a href="<?php echo esc_url( stern_section_url('service') ); ?>">サービス</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('reason') ); ?>">選ばれる理由</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('price') ); ?>">料金・お見積もり</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('works') ); ?>">作業事例</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('voice') ); ?>">お客様からの評価</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('flow') ); ?>">ご利用の流れ</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('faq') ); ?>">よくある質問</a></li>
        <li><a href="<?php echo esc_url( stern_section_url('access') ); ?>">アクセス・会社情報</a></li>
      </ul>
    </nav>
    <div class="drawer__cta">
      <a class="btn btn--primary btn--block" href="<?php echo esc_url( stern_section_url('contact') ); ?>">無料見積もりを依頼する</a>
      <a class="btn btn--ghost btn--block" href="<?php echo esc_attr( stern_phone_href() ); ?>">
        <svg class="icon" aria-hidden="true"><use href="#i-phone"></use></svg>電話で相談する
      </a>
    </div>
  </div>
</header>


