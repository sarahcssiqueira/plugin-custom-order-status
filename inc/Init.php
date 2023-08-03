<?php
/**
 *
 * Class to bootstrap the plugin
 *
 * @package OrderStatusAdmin
 * @author sarahcssiqueira
 */

namespace OrderStatusAdmin\Inc;

/**
 * Main Class
 */
class Init {
	/**
	 * Custom constructor for handle WordPress Hooks
	 */
	public static function initialize() {

		$self = new self();
		add_action( 'init', [ $self, 'register_new_order_status' ] );
		add_action( 'init', [ $self, 'register_new_order_status_two' ] );
		add_filter( 'wc_order_statuses', [ $self, 'add_status_to_list' ] );

	}

	/**
	 * Register new order status
	 */
	public function register_new_order_status() {
		register_post_status(
			'wc-custom-status',
			[
				'label'                     => 'My Custom Status',
				'public'                    => true,
				'show_in_admin_status_list' => true,
				'show_in_admin_all_list'    => true,
				'exclude_from_search'       => false,
				'label_count'               => _n_noop( 'My Custom Status <span class="count">(%s)</span>', 'My Custom Status <span class="count">(%s)</span>' ),

			]
		);
	}

	/**
	 * Register other new order status
	 */
	public function register_new_order_status_two() {
		register_post_status(
			'wc-custom-status-two',
			[
				'label'                     => 'My Custom Status Two',
				'public'                    => true,
				'show_in_admin_status_list' => true,
				'show_in_admin_all_list'    => true,
				'exclude_from_search'       => false,
				'label_count'               => _n_noop( 'My Custom Status Two <span class="count">(%s)</span>', 'My Custom Status <span class="count">(%s)</span>' ),

			]
		);
	}

	/**
	 * Add the new custom order status to the existing WooCommerce
	 * order statuses array.
	 *
	 * @param string $order_status sets order status.
	 */
	public function add_status_to_list( $order_status ) {

		$new_order_statuses = [];

		foreach ( $order_status as $id => $label ) {

			if ( 'wc-completed' === $id ) {
				$new_order_statuses['wc-custom-status']     = 'My Custom Status';
				$new_order_statuses['wc-custom-status-two'] = 'My Custom Status Two';
			}

			$new_order_statuses[ $id ] = $label;

		}

		return $new_order_statuses;
	}
};

Init::initialize();
