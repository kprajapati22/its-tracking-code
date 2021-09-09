<?php 

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Public Pages Class
 *
 * Handles front end functionality.
 *
 * @package IT's Tracking Code
 * @since 1.0.0
 */
class Tracking_Code_PublicPages {
	
	public function __construct() {
		//constructer code here
	}
	
	/**
	 * Add tracking code to header
	 *
	 * @package IT's Tracking Code
	 * @since 1.0.0
	 */
	function add_tracking_code_wp_head(){
		
		//get options
		$tracking_code_options = get_option('tracking_code_options');
		
		if( empty( $tracking_code_options['tracking_head']['disable'] ) && !empty( $tracking_code_options['tracking_head']['code'] ) )
			echo stripslashes( $tracking_code_options['tracking_head']['code'] );
	}
	
	/**
	 * Add tracking code to footer
	 * 
	 * @package IT's Tracking Code
	 * @since 1.0.0 
	 */
	function add_tracking_code_wp_footer(){
		
		//get options
		$tracking_code_options = get_option('tracking_code_options');
		
		if( empty( $tracking_code_options['tracking_footer']['disable'] ) && !empty( $tracking_code_options['tracking_footer']['code'] ) )
			echo stripslashes( $tracking_code_options['tracking_footer']['code'] );
	}
	
	/**
	 * Adding Hooks
	 *
	 * @package IT's Tracking Code
	 * @since 1.0.0
	 */
	public function add_hooks() {
		
		// Add action for header
		add_action( 'wp_head',      array( $this, 'add_tracking_code_wp_head' ) );
		
		// Add action for footer
		add_action( 'wp_footer',    array( $this, 'add_tracking_code_wp_footer' ) );
	}
}
?>