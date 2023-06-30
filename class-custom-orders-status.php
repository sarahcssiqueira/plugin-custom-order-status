<?php
/**
 * Register new order status
 */
class Custom_Orders_Status {
	/**
	 * Hooks
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'register_on_production_order_status' ) );
		add_filter( 'wc_order_statuses', array( $this, 'add_on_production_order_statuses' ) );

	}
	/**
	 * Register new order status = 'On Production'
	 */
	public function register_on_production_order_status() {
		register_post_status(
			'wc-on-production',
			array(
				'label'                     => 'My Custom Status',
				'public'                    => true,
				'show_in_admin_status_list' => true,
				'show_in_admin_all_list'    => true,
				'exclude_from_search'       => false,
				'label_count'               => _n_noop( 'My Custom Status <span class="count">(%s)</span>', 'My Custom Status <span class="count">(%s)</span>' ),
			)
		);
	}

	/**
	 * Added the new custom order status = 'On Production' to the existing WooCommerce
	 * order statuses array.
	 */
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
