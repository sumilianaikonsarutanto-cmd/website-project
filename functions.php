<?php
/**
 * 新樹園テーマ
 *
 * @package Shinjuen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * トップ内のアンカー。プライバシー画面ではトップのURLへ戻す。
 *
 * @param string $hash 先頭の # は付けても付けなくてもよい。
 */
function shinjuen_link( $hash ) {
	$hash = '#' . ltrim( (string) $hash, '#' );
	if ( get_query_var( 'shinjuen_privacy' ) ) {
		return esc_url( home_url( '/' ) ) . $hash;
	}
	return $hash;
}

/**
 * プライバシーポリシーのURL。
 */
function shinjuen_privacy_url() {
	return esc_url( add_query_arg( 'shinjuen_privacy', '1', home_url( '/' ) ) );
}

/**
 * テーマの初期設定。
 */
function shinjuen_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'shinjuen_setup' );

/**
 * プライバシー画面用のクエリ。
 *
 * @param array $vars クエリ変数。
 */
function shinjuen_query_vars( $vars ) {
	$vars[] = 'shinjuen_privacy';
	return $vars;
}
add_filter( 'query_vars', 'shinjuen_query_vars' );

/**
 * トップURLにクエリを付けたとき、WordPressがクエリを捨ててリダイレクトしないようにする。
 *
 * @param string|false $redirect リダイレクト先。
 */
function shinjuen_keep_privacy_query( $redirect ) {
	if ( get_query_var( 'shinjuen_privacy' ) ) {
		return false;
	}
	return $redirect;
}
add_filter( 'redirect_canonical', 'shinjuen_keep_privacy_query' );

/**
 * プライバシー画面だけ別テンプレートにする。
 *
 * @param string $template テンプレートパス。
 */
function shinjuen_template( $template ) {
	if ( get_query_var( 'shinjuen_privacy' ) ) {
		$privacy = get_template_directory() . '/privacy-page.php';
		if ( file_exists( $privacy ) ) {
			return $privacy;
		}
	}
	return $template;
}
add_filter( 'template_include', 'shinjuen_template' );

/**
 * タイトル。
 *
 * @param array $parts タイトル要素。
 */
function shinjuen_document_title( $parts ) {
	if ( get_query_var( 'shinjuen_privacy' ) ) {
		$parts['title'] = 'プライバシーポリシー';
		$parts['site']  = '新樹園';
		unset( $parts['tagline'] );
		return $parts;
	}

	$parts['title'] = '大阪市東淀川区の園芸店｜観葉植物・多肉植物・珍しい植物なら新樹園';
	unset( $parts['tagline'], $parts['site'] );
	return $parts;
}
add_filter( 'document_title_parts', 'shinjuen_document_title' );

/**
 * CSS と JS。
 */
function shinjuen_assets() {
	$theme_dir = get_template_directory();
	$theme_uri = get_template_directory_uri();

	wp_enqueue_style(
		'shinjuen-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@500;600&family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@600;700&display=swap',
		array(),
		'1.0.0'
	);

	wp_enqueue_style(
		'shinjuen-main',
		$theme_uri . '/assets/css/style.css',
		array( 'shinjuen-fonts' ),
		filemtime( $theme_dir . '/assets/css/style.css' )
	);

	wp_enqueue_style(
		'shinjuen-theme',
		get_stylesheet_uri(),
		array( 'shinjuen-main' ),
		filemtime( $theme_dir . '/style.css' )
	);

	wp_enqueue_script(
		'shinjuen-main',
		$theme_uri . '/assets/js/main.js',
		array(),
		filemtime( $theme_dir . '/assets/js/main.js' ),
		true
	);

	wp_localize_script(
		'shinjuen-main',
		'shinjuenTheme',
		array(
			'uri' => $theme_uri,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'shinjuen_assets' );

/**
 * フォントの事前接続と、ページ共通のメタ情報。
 */
function shinjuen_head() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	echo '<meta name="theme-color" content="#263D2C">' . "\n";
	echo '<meta name="format-detection" content="telephone=no">' . "\n";
	echo '<meta name="robots" content="noindex, nofollow">' . "\n";
	echo '<link rel="icon" href="' . esc_url( get_template_directory_uri() . '/assets/img/favicon.svg' ) . '" type="image/svg+xml">' . "\n";

	if ( get_query_var( 'shinjuen_privacy' ) ) {
		echo '<meta name="description" content="新樹園の提案デモサイトにおける個人情報の取り扱いについて。">' . "\n";
		return;
	}

	echo '<meta name="description" content="大阪市東淀川区菅原の園芸店「新樹園」。草花や観葉植物、多肉植物など、植物との出会いを楽しめる園芸店です。植物選びに迷った方もお気軽にご相談ください。">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:site_name" content="新樹園">' . "\n";
	echo '<meta property="og:title" content="大阪市東淀川区の園芸店｜観葉植物・多肉植物・珍しい植物なら新樹園">' . "\n";
	echo '<meta property="og:description" content="大阪市東淀川区菅原の園芸店「新樹園」。草花から観葉植物、多肉植物まで。植物選びに迷った方もお気軽にご相談ください。">' . "\n";
	echo '<meta property="og:locale" content="ja_JP">' . "\n";
	echo '<meta name="twitter:card" content="summary">' . "\n";
}
add_action( 'wp_head', 'shinjuen_head', 1 );

/**
 * トップだけの構造化データ。
 */
function shinjuen_schema() {
	if ( get_query_var( 'shinjuen_privacy' ) ) {
		return;
	}

	$store = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'GardenStore',
		'name'        => '新樹園',
		'description' => '大阪市東淀川区菅原の園芸店。草花、観葉植物、多肉植物、蘭などを扱う。',
		'telephone'   => '+81-6-6327-1587',
		'address'     => array(
			'@type'           => 'PostalAddress',
			'postalCode'      => '533-0022',
			'addressCountry'  => 'JP',
			'addressRegion'   => '大阪府',
			'addressLocality' => '大阪市東淀川区',
			'streetAddress'   => '菅原2丁目9-10',
		),
		'areaServed'  => '大阪市東淀川区',
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $store, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'shinjuen_schema', 20 );
