<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 04/9/2015
 * Time: 9:33 PM
 */
const TV_APP_ZING_MP3  = 'zing-mp3';
const ZING_MP3_KEYCODE = 'fafd463e2131914934b73310aa34a23f';

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

/**
 * API Download Zing Mp3 by URL
 *
 * @param $args
 */
function tutv_zing_mp3_api_by_url( $args ) {
	$url = $args['url'];
	$id  = tutv_zing_mp3_parse_url_to_id( $url );
	tutv_zing_mp3_api_by_id( $id );
}

add_action( 'tvtv_zing_mp3_ajax', 'tutv_zing_mp3_api_by_url', 10, 1 );

/**
 * API Download Zing Mp3 by ID
 *
 * @param $id
 */
function tutv_zing_mp3_api_by_id( $id ) {
	$tutv_mp3 = array();
	if ( ! $id ) {
		//Status
		$tutv_mp3['validate'] = false;
		tutv_json_e( $tutv_mp3 );

		return;
	}
	$tutv_mp3['validate'] = true;

	$url     = sprintf( 'http://api.mp3.zing.vn/api/mobile/song/getsonginfo?keycode=%s&requestdata={"id":"%s"}', ZING_MP3_KEYCODE, $id );
	$content = tutv_file_get_contents_json( $url );

	if ( $content->response->msgCode == 1 ) {
		//Status
		$tutv_mp3['status'] = true;
		//ID
		$tutv_mp3['id'] = $content->song_id;
		//Title
		$tutv_mp3['title'] = $content->title;
		//Artist
		$tutv_mp3['artist'] = $content->artist;
		//Composer
		$tutv_mp3['composer'] = $content->composer;
		//Link download
		$tutv_mp3['music_128'] = $content->source->{'128'};
		$tutv_mp3['music_320'] = $content->source->{'320'};
	} else {
		//Status
		$tutv_mp3['status'] = false;
	}

	tutv_json_e( $tutv_mp3 );
}

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

function tutv_zing_mp3_validate_url( $url ) {
	if ( strpos( $url, 'mp3.zing.vn' ) === false ) {
		return false;
	}

	return true;
}