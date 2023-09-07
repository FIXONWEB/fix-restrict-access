<?php
/**
 * Plugin Name:     Fix Restrict Access
 * Plugin URI:      https://fixonweb.com.br/plugin/fix-restrict-access
 * Description:     Enable restricted access for logged in users
 * Author:          Edinaldo H Vieira
 * Author URI:      https://fixonweb.com.br/
 * Text Domain:     fix-restrict-access
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Fix_Restrict_Access
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }


function fix1694082223( &$wp ) {
	if($wp->request == 'login'){
		//All good. This one can.
	} else if($wp->request == 'restrict-access'){
		get_header();
		echo "Access restricted to logged in users.";
		get_footer();
		exit;
	} else {
		if ( !is_user_logged_in() ) {
			$site_url = site_url()."/restrict-access/";
			wp_redirect( $site_url );
			exit;
		}
	}
}
add_action( 'parse_request', 'fix1694082223');