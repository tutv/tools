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
function tvtv_ajax_zing_mp3() {
	$id = $_POST['id'];

	do_action( 'tvtv_zing_mp3_ajax', $id );
	wp_die();
}

add_action( 'wp_ajax_' . TV_APP_ZING_MP3, 'tvtv_ajax_zing_mp3' );

/**
 * API Download Zing Mp3
 */
function tutv_api_zing_mp3( $id ) {
	$url     = sprintf( 'http://api.mp3.zing.vn/api/mobile/song/getsonginfo?keycode=%s&requestdata={"id":"%s"}', ZING_MP3_KEYCODE, $id );
	$content = tutv_file_get_contents_json( $url );

	$tutv_mp3 = array();

	if ( $content->response == 1 ) {
		//ID
		$tutv_mp3['id'] = $content->song_id;
		//Title
		$tutv_mp3['title'] = $content->title;
		//Artist
		$tutv_mp3['artist'] = $content->artist;
		//Composer
		$tutv_mp3['composer'] = $content->composer;
		//Linkdownload
		$tutv_mp3['music_128'] = $content->source->{'128'};
		$tutv_mp3['music_320'] = $content->source->{'320'};
	}

	tutv_json_e( $tutv_mp3 );
}

add_action( 'tvtv_zing_mp3_ajax', 'tutv_api_zing_mp3' );
