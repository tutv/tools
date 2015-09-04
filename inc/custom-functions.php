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
function tutv_stylesheet_uri( $stylesheet_uri, $stylesheet_dir_uri ) {

	return $stylesheet_dir_uri . '/css/style.min.css';
}

add_filter( 'stylesheet_uri', 'tutv_stylesheet_uri', 10, 2 );

/**
 * Print url admin ajax
 */
add_action( 'wp_print_scripts', 'tutv_print_url_admin_ajax' );
function tutv_print_url_admin_ajax() { ?>
	<script type="text/javascript">
		var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
	</script>
	<?php
}