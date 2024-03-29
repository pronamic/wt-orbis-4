<?php get_header(); ?>

<div class="card">
	<div class="card-block">
		<?php get_template_part( 'templates/search_form' ); ?>
	</div>

	<?php if ( have_posts() ) : ?>

		<div class="table-responsive">
			<table class="table table-striped table-condense table-hover">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Title', 'orbis-4' ); ?></th>
						<th><?php esc_html_e( 'Price', 'orbis-4' ); ?></th>
						<th><?php esc_html_e( 'Expiration or renewal date', 'orbis-4' ); ?></th>
						<th><?php esc_html_e( 'Status', 'orbis-4' ); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ( have_posts() ) :
						the_post();
						?>

						<tr id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<td>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

								<?php get_template_part( 'templates/table-cell-comments' ); ?>
							</td>
							<td>
								<?php orbis_subscription_the_price(); ?>
							</td>
							<td>
								<?php

								$subscription_expiration_date_string = get_post_field( 'subscription_expiration_date' );

								if ( '' !== $subscription_expiration_date_string ) {
									$subscription_expiration_date = DateTimeImmutable::createFromFormat( 'Y-m-d', $subscription_expiration_date_string );

									if ( false !== $subscription_expiration_date ) {
										echo \esc_html( \wp_date( \get_option( 'date_format' ), $subscription_expiration_date->getTimestamp() ) );
									}
								}

								?>
							</td>
							<td>
								<?php get_template_part( 'templates/subscription-badges' ); ?>
							</td>
							<td>
								<?php get_template_part( 'templates/table-cell-actions' ); ?>
							</td>
						</tr>

					<?php endwhile; ?>
				</tbody>
			</table>
		</div>

	<?php else : ?>

		<?php get_template_part( 'templates/content-none' ); ?>

	<?php endif; ?>
</div>

<?php orbis_content_nav(); ?>

<?php get_footer(); ?>
