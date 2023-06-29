<?php
/**
 * Plugin Name:       Custom Order Status
 * Plugin URI:        https://sarahjobs.com/wordpress/plugins/custom-order-status
 * Description:       WooCommerce Custom Order Status
 * Version:           1.0.0
 * Requires at least: 5.6
 * Requires PHP:      7.4
 * Author:            Sarah Siqueira
 * Author URI:        https://sarahjobs.com/about
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl.html
 * Text Domain:       custom-order-status
 * Domain Path:       /languages
 * Update URI:        https://sarahjobs.com/wordpress/plugins/custom-order-status/update
 */

new custom_orders_status();

class custom_orders_status {

	function __construct() {

		add_action( 'init', array( $this, 'register_on_production_order_status' ) );
		add_filter( 'wc_order_statuses', array( $this, 'add_on_production_order_statuses' ) );

	}

	public function register_on_production_order_status() {
		register_post_status(
			'wc-on-production',
			array(
				'label'                     => 'My Custom Status',
				'public'                    => true,
				'show_in_admin_status_list' => true,
				'show_in_admin_all_list'    => true,
				'exclude_from_search'       => false
			)
		);
	}

	public function add_on_production_order_statuses( $order_statuses ) {
		$new_order_statuses = array();
		foreach ( $order_statuses as $key => $status ) {
			$new_order_statuses[ $key ] = $status;
			if ( 'wc-processing' === $key ) {
				$new_order_statuses['wc-on-production'] = 'My Custom Status';
			}
		}
		return $new_order_statuses;
	}

}
