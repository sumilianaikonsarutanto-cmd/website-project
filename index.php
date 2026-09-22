<?php
/**
 * フォールバック。トップと同じ提案ページを出す。
 *
 * @package Shinjuen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/home' );
get_footer();
