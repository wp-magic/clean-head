<?php
/**
 * Appointment Gdpr Compliance
 *
 * @package   Magic_Gdpr
 * @license   GPL-2.0+
 */

if ( is_admin() ) {
	require_once 'admin/dashboard.php';
}


add_action(
	'init',
	function() {
		$opts = array();

		foreach ( MAGIC_CLEAN_HEAD_OPTIONS as $option => $val ) {
			$optname = MAGIC_CLEAN_HEAD_SLUG . '_' . $option;
			$on      = magic_get_option( $optname );
			if ( $on ) {
				if ( 'emojis' === $option ) {
						// remove emoji scripts.
						remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
						remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
						remove_action( 'wp_print_styles', 'print_emoji_styles' );
						remove_action( 'admin_print_styles', 'print_emoji_styles' );
				} elseif ( 'feed' === $option ) {
					remove_action( 'wp_head', 'feed_links', 2 );
					remove_action( 'wp_head', 'feed_links_extra', 3 );
				} elseif ( 'wp_resource_hints' === $option ) {
					remove_action( 'wp_head', 'wp_resource_hints', 2 );
				} elseif ( 'oembed' === $option ) {
					// Remove embed.js but not the rest api and the auto discovery functionality.
					// Embedding this blog on other blogs ~should~ work.

					// Remove the REST API endpoint.
					remove_action( 'rest_api_init', 'wp_oembed_register_route' );

					// Turn off oEmbed auto discovery.
					// Don't filter oEmbed results.
					remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

					// Remove oEmbed discovery links.
					remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

					// Remove oEmbed-specific JavaScript from the front-end and back-end.
					remove_action( 'wp_head', 'wp_oembed_add_host_js' );
				} else {
					remove_action( 'wp_head', $option );
				}
			}
		}
	},
	PHP_INT_MAX - 1
);

add_action(
	'init',
	function () {
		$domain = MAGIC_CLEAN_HEAD_SLUG;
		load_plugin_textdomain( $domain, false, plugin_dir_path( __FILE__ ) . 'languages' );
	}
);
