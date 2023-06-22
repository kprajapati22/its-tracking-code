<?php
/**
 * Plugin Name:     IT's Tracking Code
 * Description:     Add a tracking code to header & footer section
 * Version:         1.0.2
 * Author:          kprajapati22
 * Author URI:      https://profiles.wordpress.org/kprajapati22
 * Text Domain:     trackingcode
 * License: GPLv2
 *
 * @package IT's Tracking Code
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Basic plugin definitions
 *
 * @package IT's Tracking Code
 * @since 1.0.0
 */

if ( ! defined( 'TRACKING_CODE_VERSION' ) ) {
	define( 'TRACKING_CODE_VERSION', '1.0.1' ); // version of plugin.
}
if ( ! defined( 'TRACKING_CODE_DIR' ) ) {
	define( 'TRACKING_CODE_DIR', dirname( __FILE__ ) ); // plugin dir.
}
if ( ! defined( 'TRACKING_CODE_URL' ) ) {
	define( 'TRACKING_CODE_URL', plugin_dir_url( __FILE__ ) ); // plugin url.
}
if ( ! defined( 'TRACKING_CODE_ADMIN' ) ) {
	define( 'TRACKING_CODE_ADMIN', TRACKING_CODE_DIR . '/includes/admin' ); // plugin admin dir.
}

/**
 * Load Text Domain
 *
 * This gets the plugin ready for translation.
 *
 * @package IT's Tracking Code
 * @since 1.0.0
 */
load_plugin_textdomain( 'trackingcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Settings Link
 *
 * Adds a settings link to the plugin list.
 *
 * @param string $links plugin settings link.
 * @param string $file plugin file name.
 * @package IT's Tracking Code
 * @since 1.0.0
 */
function tracking_code_add_settings_link( $links, $file ) {

	static $this_plugin;
	if ( ! $this_plugin ) {
		$this_plugin = plugin_basename( __FILE__ );
	}
	if ( $file === $this_plugin ) {
		$settings_link = '<a href="options-general.php?page=tracking-code">' . esc_html__( 'Settings', 'trackingcode' ) . '</a>';
		array_unshift( $links, $settings_link );
	}
	return $links;
}
// adding setting link below plugin name in plugins list.
add_filter( 'plugin_action_links', 'tracking_code_add_settings_link', 10, 2 );

// global variables.
global $tracking_code_public, $tracking_code_admin;

/**
 * Includes Files
 *
 * Includes some required files for plugin
 *
 * @package IT's Tracking Code
 * @since 1.0.0
 */

// Public Pages Class for handling front side functionalities.
require_once TRACKING_CODE_DIR . '/includes/class-tracking-code-public.php';
$tracking_code_public = new Tracking_Code_Public();
$tracking_code_public->add_hooks();

// Admin Pages Class for admin site.
require_once TRACKING_CODE_ADMIN . '/class-tracking-code-admin.php';
$tracking_code_admin = new Tracking_Code_Admin();
$tracking_code_admin->add_hooks();
