<?php
/**
 * ステルン WordPress テーマ
 *
 * 電話番号・営業時間・LINE URL は「外観 → カスタマイズ → ステルン 店舗情報」から変更できます。
 *
 * @package Stern
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'STERN_VERSION', '1.0.0' );

/* ==========================================================================
   店舗情報（1か所で管理。カスタマイザー未設定時の初期値）
   ========================================================================== */
function stern_phone() {
	return get_theme_mod( 'stern_phone', '050-3184-1212' );
}

function stern_phone_href() {
	$digits = preg_replace( '/\D+/', '', stern_phone() );
	return 'tel:' . $digits;
}

function stern_hours() {
	return get_theme_mod( 'stern_hours', '9:00〜18:00' );
}

function stern_line_url() {
	return trim( (string) get_theme_mod( 'stern_line_url', '' ) );
}

function stern_section_url( $id ) {
	$id = ltrim( (string) $id, '#' );
	if ( is_front_page() ) {
		return '#' . $id;
	}
	return home_url( '/#' . $id );
}

/* ==========================================================================
   セットアップ
   ========================================================================== */
function stern_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
}
add_action( 'after_setup_theme', 'stern_setup' );

function stern_document_title( $title ) {
	if ( is_front_page() ) {
		$title['title']   = '大阪市東淀川区の不用品回収ならステルン';
		$title['tagline'] = '迅速・丁寧・安心の不用品回収';
	}
	return $title;
}
add_filter( 'document_title_parts', 'stern_document_title' );

/* ==========================================================================
   CSS / JS
   ========================================================================== */
function stern_assets() {
	wp_enqueue_style(
		'stern-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700&family=Noto+Sans+JP:wght@400;500;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'stern-style',
		get_template_directory_uri() . '/assets/css/style.css',
		array( 'stern-fonts' ),
		STERN_VERSION
	);
	wp_enqueue_script(
		'stern-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		STERN_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'stern_assets' );

function stern_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.googleapis.com',
			'crossorigin' => false,
		);
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'stern_resource_hints', 10, 2 );

function stern_favicon() {
	$href = get_template_directory_uri() . '/assets/img/favicon.svg';
	echo '<link rel="icon" href="' . esc_url( $href ) . '" type="image/svg+xml">' . "\n";
}
add_action( 'wp_head', 'stern_favicon', 2 );

function stern_meta_description() {
	if ( ! is_front_page() ) {
		return;
	}
	$desc = '大阪市東淀川区の不用品回収ならステルン。家具・家電などの不用品回収からリサイクル回収、オフィス・店舗什器までご相談ください。迅速・丁寧な対応を大切にしています。お見積もりのご相談はお電話またはフォームから。';
	echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
}
add_action( 'wp_head', 'stern_meta_description', 1 );

function stern_json_ld() {
	if ( ! is_front_page() ) {
		return;
	}
	$business = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'LocalBusiness',
		'name'        => 'ステルン',
		'description' => '大阪市東淀川区を拠点とする不用品回収・リサイクル回収の事業者。家具・家電などの不用品回収、オフィス・店舗什器の回収、パソコン・情報機器の買取・リユースに対応しています。',
		'telephone'   => '+81-50-3184-1212',
		'address'     => array(
			'@type'           => 'PostalAddress',
			'addressCountry'  => 'JP',
			'postalCode'      => '533-0002',
			'addressRegion'   => '大阪府',
			'addressLocality' => '大阪市東淀川区',
			'streetAddress'   => '北江口4丁目2-8',
		),
		'knowsAbout'  => array( '不用品回収', 'リサイクル回収', '家具回収', '家電回収', 'オフィス什器回収', 'パソコン買取' ),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $business, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'stern_json_ld', 20 );

/* ==========================================================================
   カスタマイザー（電話・営業時間・LINE）
   ========================================================================== */
function stern_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'stern_info',
		array(
			'title'    => 'ステルン 店舗情報',
			'priority' => 30,
		)
	);

	$wp_customize->add_setting( 'stern_phone', array(
		'default'           => '050-3184-1212',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'stern_phone', array(
		'label'   => '電話番号',
		'section' => 'stern_info',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'stern_hours', array(
		'default'           => '9:00〜18:00',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'stern_hours', array(
		'label'   => '営業時間',
		'section' => 'stern_info',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'stern_line_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'stern_line_url', array(
		'label'       => '公式LINEのURL',
		'description' => '空欄のときは「LINEの受付は準備中です」と表示されます。',
		'section'     => 'stern_info',
		'type'        => 'url',
	) );
}
add_action( 'customize_register', 'stern_customize_register' );

/* ==========================================================================
   お問い合わせフォーム
   ========================================================================== */
function stern_handle_contact() {
	if ( ! isset( $_POST['stern_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['stern_contact_nonce'] ) ), 'stern_contact' ) ) {
		wp_safe_redirect( home_url( '/#contact' ) );
		exit;
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$tel     = isset( $_POST['tel'] ) ? sanitize_text_field( wp_unslash( $_POST['tel'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$area    = isset( $_POST['area'] ) ? sanitize_text_field( wp_unslash( $_POST['area'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( $name === '' || $tel === '' || $message === '' ) {
		wp_safe_redirect( home_url( '/?contact=error#contact' ) );
		exit;
	}

	$to      = get_option( 'admin_email' );
	$subject = '【ステルン】ホームページからのお問い合わせ';
	$body    = "お名前: {$name}\n電話番号: {$tel}\nメール: {$email}\n地域: {$area}\n\nご相談内容:\n{$message}\n";
	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );
	if ( $email ) {
		$headers[] = 'Reply-To: ' . $email;
	}

	$sent = wp_mail( $to, $subject, $body, $headers );
	wp_safe_redirect( home_url( $sent ? '/?contact=sent#contact' : '/?contact=error#contact' ) );
	exit;
}
add_action( 'admin_post_nopriv_stern_contact', 'stern_handle_contact' );
add_action( 'admin_post_stern_contact', 'stern_handle_contact' );
