<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 05/9/2015
 * Time: 2:06 AM
 */

/**
 * Add short code Zing Mp3
 *
 */
function tutv_zing_mp3_short_code() {
	require 'template.php';
	do_action( 'tutv_equeue_script_zing_mp3' );

	return '';
}

add_shortcode( 'zing-mp3', 'tutv_zing_mp3_short_code' );

/**
 * Enqueue script
 */
function tutv_equeue_script_zing_mp3() {
	wp_enqueue_script( 'main-zing-mp3', tutv_get_url_file( __FILE__, 'js/app.js' ), array( 'jquery' ) );
	wp_enqueue_style( 'zing-mp3-css', tutv_get_url_file( __FILE__, 'css/app.css' ) );
}

add_action( 'tutv_equeue_script_zing_mp3', 'tutv_equeue_script_zing_mp3' );