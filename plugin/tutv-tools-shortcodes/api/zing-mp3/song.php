<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 07/9/2015
 * Time: 11:18 PM
 */

/**
 * API Song Zing Mp3 by ID
 *
 * @param $id
 */
function tutv_zing_mp3_api_song_by_id( $id ) {
	//http://api.mp3.zing.vn/api/mobile/song/getsonginfo?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"ZW67FWWF"}

	$tutv_mp3 = array();
	if ( ! $id ) {
		//Status
		$tutv_mp3['status'] = false;
		$tutv_mp3['msg']    = esc_html__( 'URL not validate!', 'tutv' );
		tutv_json_e( $tutv_mp3 );

		return;
	}

	$url     = sprintf( 'http://api.mp3.zing.vn/api/mobile/song/getsonginfo?keycode=%s&requestdata={"id":"%s"}', ZING_MP3_KEYCODE, $id );
	$content = tutv_file_get_contents_json( $url );

	if ( $content == null ) {
		//Status
		$tutv_mp3['status'] = false;
		$tutv_mp3['msg']    = esc_html__( 'Some thing went wrong!', 'tutv' );
	} else {
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
			//Lyrics
			$tutv_mp3['lyrics'] = nl2br( tutv_zing_mp3_get_lyrics_by_id( $id ) );
		} else {
			//Status
			$tutv_mp3['status'] = false;
			$tutv_mp3['msg']    = esc_html__( 'Song not found!', 'tutv' );
		}
	}


	tutv_json_e( $tutv_mp3 );
}

/**
 * Get Song lyrics by ID
 *
 * @param $id
 *
 * @return null
 */
function tutv_zing_mp3_get_lyrics_by_id( $id ) {
	//http://api.mp3.zing.vn/api/mobile/song/getlyrics?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"ZW67FWWF"}
	$tutv_lyrics = null;

	$url     = sprintf( 'http://api.mp3.zing.vn/api/mobile/song/getlyrics?keycode=%s&requestdata={"id":"%s"}', ZING_MP3_KEYCODE, $id );
	$content = tutv_file_get_contents_json( $url );

	if ( ! $content == null ) {
		$tutv_lyrics = $content->content;

	}

	return $tutv_lyrics;
}

/**
 * Echo Song lyrics by ID
 *
 * @param $id
 */
function tutv_zing_mp3_the_lyrics_by_id( $id ) {
	echo tutv_zing_mp3_get_lyrics_by_id( $id );
}