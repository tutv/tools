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
	$html = '
		<div id="zing-mp3">
			<form role="form">
                <div class="form-group zing-input">
                    <label>' . esc_html__( 'Link mp3.zing.vn:', 'tutv' ) . '</label>
                    <input type="text" class="form-control" id="link-mp3">
                </div>
                <div class="form-group zing-action">
                    <button type="button" class="btn btn-primary btn-lg" id="btn_get_zing_mp3">Download</button>
                    <span id="img_loading"><img src="' . tutv_get_url_file( __FILE__, 'images/load.gif' ) . '" /></span>
                    <button type="button" class="btn btn-success btn-lg" id="btn_reset">Reset</button>
                </div>
            </form>
            <div id="zing_result">
            </div>
        </div>';

	do_action( 'tutv_equeue_script_zing_mp3' );

	return $html;
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