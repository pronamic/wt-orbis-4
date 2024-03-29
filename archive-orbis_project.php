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
						<?php if ( orbis_plugin_activated( 'companies' ) ) : ?>
							<th><?php esc_html_e( 'Client', 'orbis-4' ); ?></th>
						<?php endif ?>
						<th><?php esc_html_e( 'Project', 'orbis-4' ); ?></th>

						<?php if ( current_user_can( 'read_orbis_project_price', get_the_ID() ) ) : ?>
						
							<th><?php esc_html_e( 'Price', 'orbis-4' ); ?></th>

						<?php endif; ?>

						<th><?php esc_html_e( 'Time', 'orbis-4' ); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					<?php
					while ( have_posts() ) :
						the_post();
						?>

						<tr id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php if ( orbis_plugin_activated( 'companies' ) ) : ?>
								<td>
									<?php

									if ( $orbis_project->has_principal() ) {
										printf(
											'<a href="%s">%s</a>',
											esc_attr( get_permalink( $orbis_project->get_principal_post_id() ) ),
											esc_html( $orbis_project->get_principal_name() )
										);
									}

									?>
								</td>
							<?php endif ?>
							<td>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

								<?php get_template_part( 'templates/table-cell-comments' ); ?>
							</td>

							<?php if ( current_user_can( 'read_orbis_project_price', get_the_ID() ) ) : ?>
							
								<td>
									<?php

									$price = $orbis_project->get_price();

									if ( ! empty( $price ) ) {
										$money = new Money( $price, 'EUR' );
									
										echo esc_html( $money->format_i18n() );
									}

									?>
								</td>

							<?php endif; ?>

							<td class="project-time">
								<?php

								if ( isset( $orbis_project ) ) {
									echo esc_html( $orbis_project->get_available_time()->format() );

									if ( function_exists( 'orbis_project_the_logged_time' ) ) :

										$classes   = [];
										$classes[] = orbis_project_in_time() ? 'text-success' : 'text-error';

										?>

										<span class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"><?php orbis_project_the_logged_time(); ?></span>

									<?php endif;
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
