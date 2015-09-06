<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 06/9/2015
 * Time: 10:01 AM
 */

require 'unirest/Unirest.php';

/**
 * File get contents
 *
 * @param $url
 *
 * @return \Unirest\Unirest\Response
 */
function tutv_file_get_contents( $url ) {
	$header = null;
	$body   = null;

	$reponse = Unirest\Request::get( $url, $header, $body );
	if ( $reponse->code == 200 ) {
		return $reponse->raw_body;
	}

	return '';
}

/**
 * File get headers
 *
 * @param $url
 *
 * @return string
 */
function tutv_file_get_headers( $url ) {
	$header = null;
	$body   = null;

	$reponse = Unirest\Request::get( $url, $header, $body );
	if ( $reponse->code == 200 ) {
		return $reponse->headers;
	}

	return '';
}

/**
 * File get contents json to Object
 *
 * @param $url
 *
 * @return array|mixed|null|object
 */
function tutv_file_get_contents_json( $url ) {
	$content = tutv_file_get_contents( $url );

	if ( $content != '' ) {
		$obj = json_decode( $content );

		return $obj;
	}

	return null;
}

/**
 * Json encode
 *
 * @param $content
 *
 * @return mixed|string|void
 */
function tutv_json__( $content ) {
	return json_encode( $content );
}

/**
 * Echo json code of content
 *
 * @param $content
 */
function tutv_json_e( $content ) {
	echo tutv_json__( $content );
}

/**
 * Get url file
 */
function tutv_get_url_file($dir, $name) {
	return plugin_dir_url($dir) . $name;
}