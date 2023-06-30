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

require WP_PLUGIN_DIR . '/custom-order-status/class-custom-orders-status.php';

new Custom_Orders_Status();
