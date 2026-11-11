<?php
if (!defined('ABSPATH')) {
    exit;
}
$brand = tsn_info('brand_name');
$tagline = tsn_info('brand_tagline');
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

<header class="header" data-header>
  <div class="container header__inner">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr($brand); ?> ホーム">
      <span class="logo__mark">ツナグ<span>WEB</span>製作</span>
      <span class="logo__sub"><?php echo esc_html($tagline !== '' ? $tagline : 'Connect Value'); ?></span>
    </a>

    <nav class="nav" aria-label="主要ナビゲーション">
      <a href="<?php echo esc_url(tsn_hash('problem')); ?>">課題</a>
      <a href="<?php echo esc_url(tsn_hash('philosophy')); ?>">考え方</a>
      <a href="<?php echo esc_url(tsn_hash('services')); ?>">サービス</a>
      <a href="<?php echo esc_url(tsn_hash('industries')); ?>">業種</a>
      <a href="<?php echo esc_url(tsn_hash('works')); ?>">コンセプト</a>
      <a href="<?php echo esc_url(tsn_hash('price')); ?>">費用</a>
      <a href="<?php echo esc_url(tsn_hash('faq')); ?>">FAQ</a>
      <a class="nav__cta" href="<?php echo esc_url(tsn_hash('contact')); ?>">相談する</a>
    </nav>

    <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="drawer" aria-label="メニューを開く">
      <span class="nav-toggle__bar" aria-hidden="true"></span>
    </button>
  </div>
</header>

<nav id="drawer" class="drawer" data-drawer hidden aria-label="モバイルメニュー">
  <a href="<?php echo esc_url(tsn_hash('problem')); ?>">課題</a>
  <a href="<?php echo esc_url(tsn_hash('philosophy')); ?>">考え方</a>
  <a href="<?php echo esc_url(tsn_hash('services')); ?>">サービス</a>
  <a href="<?php echo esc_url(tsn_hash('industries')); ?>">業種</a>
  <a href="<?php echo esc_url(tsn_hash('works')); ?>">コンセプト</a>
  <a href="<?php echo esc_url(tsn_hash('process')); ?>">流れ</a>
  <a href="<?php echo esc_url(tsn_hash('price')); ?>">費用</a>
  <a href="<?php echo esc_url(tsn_hash('faq')); ?>">FAQ</a>
  <a class="btn btn--primary drawer__cta" href="<?php echo esc_url(tsn_hash('contact')); ?>">ホームページ制作を相談する</a>
</nav>
