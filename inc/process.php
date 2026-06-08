<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function process_mgConfetti_option() {

	if ( ! current_user_can( 'manage_options' ) ) {

		wp_die(
			esc_html__(
				'You are not allowed to be on this page.',
				'minigiv-confetti'
			)
		);

	}

	// Verify nonce.
	check_admin_referer( 'mg_confetti_verify' );

	$options = get_option( 'mg_confetti_array', array() );

	// Confetti Price.
	if ( isset( $_POST['confetti_price'] ) ) {

		$options['mg_confetti_price'] = absint(
			wp_unslash(
				$_POST['confetti_price']
			)
		);

	}

	// Discount Code.
	if ( isset( $_POST['confetti_discount'] ) ) {

		$options['mg_confetti_discount_code'] = sanitize_text_field(
			wp_unslash(
				$_POST['confetti_discount']
			)
		);

	}

	// Confetti Status.
	$allowed_status = array(
		'enabled',
		'disabled',
	);

	if ( isset( $_POST['confetti_status'] ) ) {

		$status = sanitize_text_field(
			wp_unslash(
				$_POST['confetti_status']
			)
		);

		if ( in_array( $status, $allowed_status, true ) ) {

			$options['mg_confetti_status'] = $status;

		}
	}

	// Save options.
	update_option( 'mg_confetti_array', $options );

	// Redirect back to settings page.
	wp_safe_redirect(
		admin_url(
			'options-general.php?page=minigiv-confetti&m=1'
		)
	);

	exit;
}
