<?php
/**
 * Magic Clean Head
 *
 * @package   Magic-Clean-Head
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Magic Clean Head
 * Plugin URI:
 * Description: Cleans the WordPress head. Removes wp_generator.
 * Version:     0.0.1
 * Author:      Jascha Ehrenreich
 * Author URI:  http://github.com/wp-magic/clean-head
 * Text Domain: magic_clean_head
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'MAGIC_CLEAN_HEAD_SLUG', 'magic_clean_head' );

define(
	'MAGIC_CLEAN_HEAD_OPTIONS',
	array(
		'wp_generator'                    => 'Wp Generator tag',
		'rsd_link'                        => 'Rsd link tag',
		'feed'                            => 'rss feed links',
		'wlwmanifest_link'                => 'wlmanifest link',
		'wp_shortlink_wp_head'            => 'wp shortlink',
		'wp_resource_hints'               => 'resource hints',
		'rest_output_link_wp_head'        => 'rest api link',
		'adjacent_posts_rel_link_wp_head' => 'pagination links',
		'emojis'                          => 'emojis',
		'oembed'                          => 'disable oembed js and server discovery. embedding your site should continue to work.',
		'noindex'                         => 'remove robot noindex tag',
	)
);

require_once plugin_dir_path( __FILE__ ) . 'includes/plugin.php';

register_activation_hook(
	__FILE__,
	function () {
		flush_rewrite_rules();
	}
);

register_deactivation_hook(
	__FILE__,
	function () {
		flush_rewrite_rules();
	}
);
