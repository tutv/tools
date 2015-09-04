<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 04/9/2015
 * Time: 9:33 PM
 */
const DIRECTORY_ZING_MP3 = 'zing-mp3';

/**
 * Enqueue script
 */
function tutv_equeue_script_zing_mp3() {
	wp_enqueue_script( 'main-zing-mp3', plugin_dir_url( __FILE__ ) . '/js/main.js', array( 'jquery' ) );
}

add_action( 'wp_enqueue_scripts', 'tutv_equeue_script_zing_mp3' );