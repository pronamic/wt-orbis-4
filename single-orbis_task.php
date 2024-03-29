<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<div class="col-md-8">
				<?php do_action( 'orbis_before_main_content' ); ?>

				<div class="card mb-3">
					<div class="card-header"><?php esc_html_e( 'Description', 'orbis-4' ); ?></div>
					<div class="card-body">

						<div class="card-text clearfix">
							<?php if ( has_post_thumbnail() ) : ?>

								<div class="thumbnail">
									<?php the_post_thumbnail( 'thumbnail' ); ?>
								</div>

							<?php endif; ?>

							<?php the_content(); ?>
						</div>	
					</div>
				</div>

				<?php do_action( 'orbis_after_main_content' ); ?>

				<?php comments_template( '', true ); ?>
			</div>

			<div class="col-md-4">
				<?php do_action( 'orbis_before_side_content' ); ?>

				<?php do_action( 'orbis_after_side_content' ); ?>
			</div>
		</div>
	</div>

<?php endwhile; ?>

<?php get_footer(); ?>
