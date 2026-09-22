<?php
/**
 * ヘッダー
 *
 * @package Shinjuen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip" href="#main">本文へスキップ</a>

<svg xmlns="http://www.w3.org/2000/svg" style="display:none" aria-hidden="true" focusable="false">
  <symbol id="i-phone" viewBox="0 0 24 24" fill="currentColor"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.24 11.4 11.4 0 0 0 3.6.58 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .58 3.6 1 1 0 0 1-.25 1z"/></symbol>
  <symbol id="i-pin" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a7 7 0 0 0-7 7c0 5.1 6.2 12.2 6.47 12.5a.7.7 0 0 0 1.06 0C12.8 21.2 19 14.1 19 9a7 7 0 0 0-7-7m0 9.6A2.6 2.6 0 1 1 14.6 9 2.6 2.6 0 0 1 12 11.6"/></symbol>
</svg>

<header class="header">
  <div class="wrap header__inner">
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <svg class="logo__mark" viewBox="0 0 64 64" aria-hidden="true">
        <rect width="64" height="64" rx="6" fill="#263D2C"/>
        <path d="M32 48V28" stroke="#F6F3EA" stroke-width="2.2" stroke-linecap="round"/>
        <path d="M32 34c-8 0-12-6-12-12 6 0 12 4 12 12z" fill="#C5D6BE"/>
        <path d="M32 30c8-1 13-7 12-14-6 1-12 6-12 14z" fill="#8FB089"/>
        <rect x="24" y="48" width="16" height="4" rx="1" fill="#A57C4B"/>
      </svg>
      <span class="logo__text">
        <span class="logo__name">新樹園</span>
        <span class="logo__sub">東淀川区菅原の園芸店</span>
      </span>
    </a>

    <nav class="gnav" aria-label="メインメニュー">
      <ul class="gnav__list">
        <li><a class="gnav__link" href="<?php echo shinjuen_link( '#about' ); ?>">新樹園とは</a></li>
        <li><a class="gnav__link" href="<?php echo shinjuen_link( '#reasons' ); ?>">選ばれる理由</a></li>
        <li><a class="gnav__link" href="<?php echo shinjuen_link( '#lineup' ); ?>">植物</a></li>
        <li><a class="gnav__link" href="<?php echo shinjuen_link( '#arrivals' ); ?>">今週の入荷</a></li>
        <li><a class="gnav__link" href="<?php echo shinjuen_link( '#beginners' ); ?>">初めての方</a></li>
        <li><a class="gnav__link" href="<?php echo shinjuen_link( '#access' ); ?>">アクセス</a></li>
      </ul>
    </nav>

    <a class="header__tel" href="tel:0663271587">06-6327-1587</a>
    <a class="btn btn--primary header__go" href="<?php echo shinjuen_link( '#access' ); ?>">店舗へ行く</a>

    <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="drawer">
      <span class="nav-toggle__bar"></span>
      <span class="nav-toggle__bar"></span>
      <span class="nav-toggle__bar"></span>
      <span class="sr-only">メニューを開く</span>
    </button>
  </div>
</header>

<div class="drawer" id="drawer" data-drawer hidden>
  <nav aria-label="メインメニュー（モバイル）">
    <a href="<?php echo shinjuen_link( '#about' ); ?>">新樹園とは</a>
    <a href="<?php echo shinjuen_link( '#reasons' ); ?>">選ばれる理由</a>
    <a href="<?php echo shinjuen_link( '#lineup' ); ?>">植物</a>
    <a href="<?php echo shinjuen_link( '#arrivals' ); ?>">今週の入荷</a>
    <a href="<?php echo shinjuen_link( '#beginners' ); ?>">初めての方</a>
    <a href="<?php echo shinjuen_link( '#soil' ); ?>">土・園芸用品</a>
    <a href="<?php echo shinjuen_link( '#voices' ); ?>">評価</a>
    <a href="<?php echo shinjuen_link( '#faq' ); ?>">よくある質問</a>
    <a href="<?php echo shinjuen_link( '#access' ); ?>">アクセス</a>
    <a class="drawer__tel" href="tel:0663271587">06-6327-1587</a>
  </nav>
</div>
