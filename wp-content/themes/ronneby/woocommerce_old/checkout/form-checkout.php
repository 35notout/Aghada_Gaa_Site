<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'dfd' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">
	<div class="row">

		<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="seven columns" id="customer_details">

				<div class="col-1">

					<?php do_action( 'woocommerce_checkout_billing' ); ?>

				</div>

				<div class="col-2">

					<?php do_action( 'woocommerce_checkout_shipping' ); ?>

				</div>

			</div>

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			<div class="five columns">
				
				<div class="checkout-details-cover">

					<div class="box-name" id="order_review_heading"><?php _e( 'Your order', 'dfd' ); ?></div>

		<?php else : ?>
			
			<div class="twelve columns">
				
				<div class="checkout-details-cover">
			
		<?php endif; ?>


			<?php do_action( 'woocommerce_checkout_order_review' ); ?>

			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	(function($) {
		$(document).ready(function() {
			$('#payment .payment_method_paypal img').attr('src', '<?php echo esc_js(get_template_directory_uri().'/assets/img/paypal_image.jpg') ?>').show();
		});
	})(jQuery);
</script>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>