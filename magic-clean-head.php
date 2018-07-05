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
 * Description: Cleans the wordpress head. Removes wp_generator.
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

add_action( 'init', function() {
  remove_action('wp_head', 'wp_generator');
  remove_action ('wp_head', 'rsd_link');
  remove_action( 'wp_head', 'wlwmanifest_link');
  remove_action( 'wp_head', 'wp_shortlink_wp_head');
  remove_action('wp_head', 'wp_resource_hints', 2);
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action('wp_head', 'feed_links_extra', 3 );

  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
} );
