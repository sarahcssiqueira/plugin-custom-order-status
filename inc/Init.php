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

	public $order_statuses = array();

	/**
	 * Custom constructor for handle WordPress Hooks
	 */
	public static function initialize() {

		$self = new self();
		add_action( 'init', array( $self, 'new_order_status_list' ) );
		add_action( 'init', array( $self, 'register_new_order_status' ) );
		add_filter( 'wc_order_statuses', array( $self, 'add_status_to_list' ) );

	}

	/**
	 * Store the custom order status inside an
	 * array
	 */
	public function new_order_status_list() {

		$this->order_statuses = array(
			array(
				'slug'  => 'wc-custom-status',
				'label' => 'Custom Label',
			),
			array(
				'slug'  => 'wc-other-custom-status',
				'label' => 'other-custom-label',
			),
		);

	}

	/**
	 * Register the new orders status
	 */
	public function register_new_order_status() {

		foreach ( $this->order_statuses as $order_status ) {

			register_post_status(
				$order_status['slug'],
				array(
					'label'                     => $order_status['label'],
					'public'                    => true,
					'show_in_admin_status_list' => true,
					'show_in_admin_all_list'    => true,
					'exclude_from_search'       => false,
					'label_count'               => _n_noop( $order_status['label'] . '<span class="count">(%s)</span>', $order_status['label'] . '<span class="count">(%s)</span>' ),

				)
			);
		}
	}

	/**
	 * Add the new custom order statuses to the existing WooCommerce
	 * order statuses array.
	 *
	 * @param string $order_status - order status.
	 */
	public function add_status_to_list( $order_status ) {

		$new_order_statuses = array();

		foreach ( $order_status as $id => $label ) {

			if ( 'wc-completed' === $id ) {
				$new_order_statuses['wc-custom-status']       = 'Custom Label';
				$new_order_statuses['wc-other-custom-status'] = 'Other Custom Label';
			}

			$new_order_statuses[ $id ] = $label;

		}

		return $new_order_statuses;
	}
};

Init::initialize();
