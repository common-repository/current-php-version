<?php
/*
Plugin Name: Current PHP Version
Description: Know the current PHP version in the "At a Glance" admin dashboard widget.
Version: 1.0
Author: Sravan Bhaskaravajjula
Author URI: http://www.wppluginworks.com
*/

function cpv_enqueue_script( $hook ) {

	// only run on dashboard page
	if ( 'index.php' != $hook ) {
		return;
	}

	// enqueue script to show PHP version
	wp_enqueue_script( 'cpv_script', plugin_dir_url( __FILE__ ) . 'cpv.js' );

	// pass the PHP version to JavaScript
	wp_localize_script( 'cpv_script', 'cpvObj', array(
		'phpVersion' => phpversion()
	) );

}

add_action( 'admin_enqueue_scripts', 'cpv_enqueue_script' );