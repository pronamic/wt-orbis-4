<?php 

use Pronamic\WordPress\Money\Money;

get_header();

?>

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
						<th><?php esc_html_e( 'Cost Price', 'orbis-4' ); ?></th>
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
								<?php

								$price = get_post_meta( get_the_ID(), '_orbis_product_price', true );

								if ( empty( $price ) ) {
									echo '—';
								} else {
									$price = new Money( $price, 'EUR' );
									echo esc_html( $price->format_i18n() );
								}

								?>
							</td>
							<td>
								<?php

								$price = get_post_meta( get_the_ID(), '_orbis_product_cost_price', true );

								if ( empty( $price ) ) {
									echo '—';
								} else {
									$price = new Money( $price, 'EUR' );
									echo esc_html( $price->format_i18n() );
								}

								?>
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
