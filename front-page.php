<?php
/**
 * サイトのフロント。
 *
 * @package Shinjuen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/home' );
get_footer();
