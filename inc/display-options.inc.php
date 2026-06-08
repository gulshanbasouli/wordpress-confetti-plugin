<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function mg_confetti_content() {

	$options = get_option( 'mg_confetti_array', array() );

	$price         = $options['mg_confetti_price'] ?? '';
	$discount_code = $options['mg_confetti_discount_code'] ?? '';
	$status        = $options['mg_confetti_status'] ?? '';

	?>

	<div class="wrap">

		<h1><?php esc_html_e( 'Minigiv Confetti Settings', 'minigiv-confetti' ); ?></h1>

		<?php if ( isset( $_GET['m'] ) && absint( $_GET['m'] ) === 1 ) : ?>
			<div class="notice notice-success is-dismissible">
				<p>
					<strong>
						<?php esc_html_e( 'Settings saved successfully.', 'minigiv-confetti' ); ?>
					</strong>
				</p>
			</div>
		<?php endif; ?>

		<p class="description">
			<?php esc_html_e(
				'Display confetti when cart value exceeds this amount.',
				'minigiv-confetti'
			); ?>
		</p>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">

			<input type="hidden" name="action" value="mgConfetti_save_option" />

			<?php wp_nonce_field( 'mg_confetti_verify' ); ?>

			<table class="form-table">

				<tbody>

					<tr>
						<th scope="row">
							<label for="confetti_price">
								<?php esc_html_e( 'Confetti Price', 'minigiv-confetti' ); ?>
							</label>
						</th>

						<td>
							<input
								id="confetti_price"
								class="regular-text"
								type="number"
								name="confetti_price"
								value="<?php echo esc_attr( $price ); ?>"
							/>
						</td>
					</tr>

					<tr>
						<th scope="row">
							<label for="confetti_discount">
								<?php esc_html_e( 'Discount Coupon Code', 'minigiv-confetti' ); ?>
							</label>
						</th>

						<td>
							<input
								id="confetti_discount"
								class="regular-text"
								type="text"
								name="confetti_discount"
								value="<?php echo esc_attr( $discount_code ); ?>"
							/>
						</td>
					</tr>

					<tr>
						<th scope="row">
							<label for="confetti_status">
								<?php esc_html_e( 'Confetti Status', 'minigiv-confetti' ); ?>
							</label>
						</th>

						<td>
							<select
								id="confetti_status"
								class="regular-text"
								name="confetti_status"
							>

								<option value="">
									<?php esc_html_e( 'Select Status', 'minigiv-confetti' ); ?>
								</option>

								<option
									value="enabled"
									<?php selected( $status, 'enabled' ); ?>
								>
									<?php esc_html_e( 'Active', 'minigiv-confetti' ); ?>
								</option>

								<option
									value="disabled"
									<?php selected( $status, 'disabled' ); ?>
								>
									<?php esc_html_e( 'Inactive', 'minigiv-confetti' ); ?>
								</option>

							</select>
						</td>
					</tr>

				</tbody>

			</table>

			<?php submit_button( __( 'Save Settings', 'minigiv-confetti' ) ); ?>

		</form>

		<hr>

		<h2>
			<?php esc_html_e( 'Shortcode', 'minigiv-confetti' ); ?>
		</h2>

		<p>
			<code>[confetti-data]</code>
		</p>

		<p>
			<code>&lt;?php echo do_shortcode('[confetti-data]'); ?&gt;</code>
		</p>

	</div>

	<?php
}
