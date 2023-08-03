<?php
/**
 * Plugin Name:       Order Status Admin
 * Plugin URI:        https://sarahjobs.com/wordpress/plugins/order-status-admin
 * Description:       Order Status Admin for WooCommerce
 * Version:           1.0.0
 * Requires at least: 5.6
 * Requires PHP:      7.4
 * Author:            Sarah Siqueira
 * Author URI:        https://sarahjobs.com/about
 * License:           GPLv3 or later
 * License URI:       https://www.gnu.org/licenses/gpl.html
 * Text Domain:       order-status-admin
 * Domain Path:       /languages
 * Update URI:        https://sarahjobs.com/wordpress/plugins/order-status-admin/update
 *
 * @package OrderStatusAdmin
 * @author sarahcssiqueira
 *
 */

defined( 'ABSPATH' ) || exit;


/**
 * Composer Autoload
 */
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


/**
 * Bootstrap the plugin
 */
use OrderStatusAdmin\Inc\Init;

$start = new Init();
