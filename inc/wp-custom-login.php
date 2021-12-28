<?php 
/**
 * Enqueue Custom Login
 */
function evolve_starter_custom_login() {
	 echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/assets/css/wplogin.css" />';
 }
 
 add_action('login_head', 'evolve_starter_custom_login');

/**
* Change URL for Logo on Login Screen
*/
function evolve_starter_login_logo_url() {
    return get_home_url();
}
add_filter( 'login_headerurl', 'evolve_starter_login_logo_url' );

function evolve_starter_login_logo_url_title() {
    return 'evolve_starter';
}
add_filter( 'login_headertext', 'evolve_starter_login_logo_url_title' );