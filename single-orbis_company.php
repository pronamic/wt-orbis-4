<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row row-cols-1 row-cols-md-3 mb-3">
			<div class="col">
				<div class="card">
					<div class="card-header"><?php esc_html_e( 'Details', 'orbis-4' ); ?></div>

					<div class="card-body">
						<?php get_template_part( 'template-parts/company-general-details' ); ?>
					</div>
				</div>
			</div>

			<div class="col">
				<div class="card">
					<div class="card-header"><?php esc_html_e( 'Contacts', 'orbis-4' ); ?></div>

					<?php get_template_part( 'template-parts/company-contacts' ); ?>
				</div>
			</div>

			<div class="col">
				<div class="card">
					<div class="card-header"><?php esc_html_e( 'Users', 'orbis-4' ); ?></div>

					<?php get_template_part( 'template-parts/company-users' ); ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
				<?php do_action( 'orbis_before_main_content' ); ?>

				<?php if ( ! empty( get_the_content() ) ) : ?>

				<div class="card mb-3">
					<div class="card-header"><?php esc_html_e( 'Description', 'orbis-4' ); ?></div>

					<div class="card-body">
						<?php the_content(); ?>
					</div>
				</div>

				<?php endif; ?>

				<?php get_template_part( 'templates/company_sections' ); ?>

				<?php do_action( 'orbis_after_main_content' ); ?>

				<?php comments_template( '', true ); ?>
			</div>

			<div class="col-md-4">
				<?php do_action( 'orbis_before_side_content' ); ?>

				<?php get_template_part( 'templates/company_twitter' ); ?>

				<div class="card">
					<div class="card-header"><?php esc_html_e( 'Additional Information', 'orbis-4' ); ?></div>

					<div class="card-body">
						<dl>
							<dt><?php esc_html_e( 'Posted on', 'orbis-4' ); ?></dt>
							<dd><?php echo esc_html( get_the_date() ); ?></dd>

							<dt><?php esc_html_e( 'Posted by', 'orbis-4' ); ?></dt>
							<dd><?php echo esc_html( get_the_author() ); ?></dd>

							<?php if ( null !== get_edit_post_link() ) : ?>

								<dt><?php esc_html_e( 'Actions', 'orbis-4' ); ?></dt>
								<dd><?php edit_post_link( __( 'Edit', 'orbis-4' ) ); ?></dd>

							<?php endif; ?>
						</dl>
					</div>
				</div>

				<?php do_action( 'orbis_after_side_content' ); ?>
			</div>
		</div>
	</div>

<?php endwhile; ?>

<?php get_footer(); ?>
