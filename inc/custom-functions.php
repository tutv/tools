<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 04/9/2015
 * Time: 2:22 AM
 */

/**
 * Filter stylesheet theme
 *
 * @param $stylesheet_uri
 * @param $stylesheet_dir_uri
 *
 * @return string
 */
function wpi_stylesheet_uri( $stylesheet_uri, $stylesheet_dir_uri ) {

	return $stylesheet_dir_uri . '/css/style.css';
}

add_filter( 'stylesheet_uri', 'wpi_stylesheet_uri', 10, 2 );