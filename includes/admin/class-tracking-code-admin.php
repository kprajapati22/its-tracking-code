<?php
/**
 * Handle all backend functionality
 *
 * @package IT's Tracking Code
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin Class
 *
 * Handles generic Admin functionality and AJAX requests.
 *
 * @package IT's Tracking Code
 * @since 1.0.0
 */
class Tracking_Code_Admin {

	/**
	 * Add a tracking code menu
	 *
	 * @package IT's Tracking Code
	 * @since 1.0.0
	 */
	public function tracking_code_admin_menu_pages() {
		$page = add_submenu_page( 'options-general.php', esc_html__( 'Tracking Code', 'trackingcode' ), esc_html__( 'Tracking Code', 'trackingcode' ), 'manage_options', 'tracking-code', array( $this, 'tracking_code_page' ) );
	}

	/**
	 * Add a tracking code menu page
	 *
	 * @package IT's Tracking Code
	 * @since 1.0.0
	 */
	public function tracking_code_page() {
		include_once TRACKING_CODE_ADMIN . '/forms/tracking-code-settings.php';
	}

	/**
	 * Adding Hooks
	 *
	 * @package IT's Tracking Code
	 * @since 1.0.0
	 */
	public function add_hooks() {

		// add admin menu pages.
		add_action( 'admin_menu', array( $this, 'tracking_code_admin_menu_pages' ) );
	}
}

