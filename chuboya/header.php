<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">本文へスキップ</a>

<!-- ============================================================
     Header（WP: header.php）
     ロゴ画像が用意できたら .logo のテキストを <img> に差し替え
     ============================================================ -->
<header class="header" id="header">
  <div class="header__inner">
    <a class="logo" href="<?php echo esc_url(chuboya_url('top')); ?>" aria-label="<?php echo esc_attr(chuboya_get('shop_name')); ?> トップへ">
      <span class="logo__mark" aria-hidden="true">中</span>
      <span class="logo__text">
        <span class="logo__name"><?php chuboya_text('shop_name'); ?></span>
        <span class="logo__sub"><?php chuboya_text('shop_logo_sub'); ?></span>
      </span>
    </a>

    <nav class="nav" id="globalNav" aria-label="メインメニュー">
      <ul class="nav__list">
        <li><a href="<?php echo esc_url(chuboya_url('about')); ?>">中房家について</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('menu')); ?>">お品書き</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('lunch')); ?>">ランチ</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('night')); ?>">夜の楽しみ方</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('seats')); ?>">店内</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('access')); ?>">アクセス</a></li>
        <li><a href="<?php echo esc_url(chuboya_url('faq')); ?>">よくある質問</a></li>
      </ul>
      <a class="nav__tel" href="<?php echo esc_url(chuboya_tel_href()); ?>">
        <span class="nav__tel-label"><?php chuboya_text('nav_tel_label'); ?></span>
        <span class="nav__tel-num"><?php chuboya_text('phone_display'); ?></span>
      </a>
    </nav>

    <button class="hamburger" id="navToggle" type="button" aria-controls="globalNav" aria-expanded="false">
      <span class="hamburger__bars" aria-hidden="true"></span>
      <span class="hamburger__label">メニュー</span>
    </button>
  </div>
</header>
