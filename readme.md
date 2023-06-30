# Custom Order Status for WooCommerce

[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)

Custom order status for WooCommerce allows us to create additional order statuses beyond the default ones provided by WooCommerce. By default, the WooCommerce order status according to [WooCommerce documentation](https://woocommerce.com/document/managing-orders/) are:

- Pending payment;
- Failed;
- Processing;
- Completed;
- On hold;
- Canceled;
- Refunded;
- Authentication required;
- Checkout draft.

## Customize Order Status

On some occasions, we may need more **specific order statuses to better suit the needs of the project**, like to provide a more personalized experience for the users. To achieve that, we can create new order statuses.

Although the existence of amazing plugins to perform that goal, like the [WooCommerce Order Status Manager](https://woocommerce.com/pt-br/products/woocommerce-order-status-manager/), we can also create custom orders using just a [few lines of code](https://github.com/sarahcssiqueira/plugin-custom-order-status/blob/master/class-custom-orders-status.php), using the `'wc_order_statuses'` filter, as done in this repository.

## Considerations

Some reasons to customize your WooCommerce order status:

- It allows store owners to tailor the order management process to their business needs;
- It can help keep customers informed about the progress of their orders with more detailed and descriptive updates;
- It lets store owners sort and filter orders based on their unique business requirements;
- It allows store owners to adapt and evolve their order management process as their business grows or changes.
