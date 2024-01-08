<?php use Pronamic\WordPress\Money\Money; ?>
<div class="card mb-3">
	<div class="card-header"><?php esc_html_e( 'Subscription Product Details', 'orbis-4' ); ?></div>
	<div class="card-body">

		<div class="content">
			<dl>
				<dt><?php esc_html_e( 'Price', 'orbis-4' ); ?></dt>
				<dd>
					<?php

					$price = get_post_meta( get_the_ID(), '_orbis_subscription_product_price', true );

					if ( empty( $price ) ) {
						echo '—';
					} else {
						$price = new Money( $price, 'EUR' );
						echo esc_html( $price->format_i18n() );
					}

					?>
				</dd>

				<dt><?php esc_html_e( 'Cost Price', 'orbis-4' ); ?></dt>
				<dd>
					<?php

					$price = get_post_meta( get_the_ID(), '_orbis_subscription_product_cost_price', true );

					if ( empty( $price ) ) {
						echo '—';
					} else {
						$price = new Money( $price, 'EUR' );
						echo esc_html( $price->format_i18n() );
					}

					?>
				</dd>

				<dt><?php esc_html_e( 'Auto Renew', 'orbis-4' ); ?></dt>
				<dd>
					<?php

					$auto_renew = get_post_meta( get_the_ID(), '_orbis_subscription_product_auto_renew', true );

					echo esc_html( $auto_renew ? __( 'Yes', 'orbis-4' ) : __( 'No', 'orbis-4' ) );

					?>
				</dd>
			</dl>
		</div>
	</div>

</div>
