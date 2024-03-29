<?php
/**
 * Template Name: Dashboard
 */

get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	?>

	<?php the_content(); ?>

	<div class="dashboard-loader">
		<?php esc_html_e( 'Loading…', 'orbis-4' ); ?>
	</div>

	<div id="dashboard-content-holder">
		<?php if ( is_active_sidebar( 'dashboard-sidebar' ) ) : ?>

			<div class="row">
				<?php dynamic_sidebar( 'dashboard-sidebar' ); ?>
			</div>

		<?php endif; ?>
	</div>

<?php endwhile; ?>

<?php get_footer(); ?>
