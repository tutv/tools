<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 04/9/2015
 * Time: 9:33 PM
 */
const TV_APP_ZING_MP3  = 'zing-mp3';
const ZING_MP3_KEYCODE = 'fafd463e2131914934b73310aa34a23f';

require 'song.php';

/**
 * Parse Link to ID
 *
 * @param $url
 *
 * @return null|string
 */
function tutv_zing_mp3_parse_url_to_id( $url ) {
	if ( ! tutv_zing_mp3_validate_url( $url ) ) {
		return null;
	}
	$arr = explode( '/', $url );
	$id  = $arr[ count( $arr ) - 1 ];
	$id  = explode( '.', $id )[0];

	return $id;
}

/**
 * Validate url Mp3 Zing
 *
 * @param $url
 *
 * @return bool
 */
function tutv_zing_mp3_validate_url( $url ) {
	if ( strpos( $url, 'mp3.zing.vn' ) === false ) {
		return false;
	}

	return true;
}

/**
 * Ajax
 */
function tvtv_zing_mp3_ajax() {
	$args = array(
		'id'  => ( isset( $_POST['id'] ) ) ? $_POST['id'] : null,
		'url' => ( isset( $_POST['url'] ) ) ? $_POST['url'] : null
	);

	do_action( 'tvtv_zing_mp3_ajax', $args );
	wp_die();
}

add_action( 'wp_ajax_' . TV_APP_ZING_MP3, 'tvtv_zing_mp3_ajax' );

function tutv_zing_mp3_get_type_url( $url ) {
	$tutv_type_url = explode( 'mp3.zing.vn/', $url )[1];
	$tutv_type_url = explode( '/', $tutv_type_url )[0];

	return $tutv_type_url;
}

/**
 * API Download Zing Mp3 by URL
 *
 * @param $args
 */
function tutv_zing_mp3_api_by_url( $args ) {
	$url = $args['url'];
	$id  = tutv_zing_mp3_parse_url_to_id( $url );

	//Song
	if ( tutv_zing_mp3_get_type_url( $url ) == 'bai-hat' ) {
		tutv_zing_mp3_api_song_by_id( $id );
	}

}

add_action( 'tvtv_zing_mp3_ajax', 'tutv_zing_mp3_api_by_url', 10, 1 );