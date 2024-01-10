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
						<th><?php esc_html_e( 'Task', 'orbis-4' ); ?></th>
						<th><?php esc_html_e( 'Assignee', 'orbis-4' ); ?></th>
						<th><?php esc_html_e( 'Due At', 'orbis-4' ); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ( have_posts() ) :
						the_post();

						$task = \Pronamic\Orbis\Tasks\Task::from_post( get_post() );

						?>
						<tr id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<td>
								<a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <br />

								<div class="entry-meta">
									<i class="fa fa-file" aria-hidden="true"></i>
									<?php

									if ( isset( $post->project_post_id ) ) {
										printf( 
											'<a href="%s">%s</a>',
											esc_attr( get_permalink( $post->project_post_id ) ),
											esc_html( get_the_title( $post->project_post_id ) )	
										);
									}

									?>

									<i class="fa fa-user" aria-hidden="true"></i>
									<?php

									if ( isset( $post->task_assignee_display_name ) ) {
										echo $post->task_assignee_display_name;
									}

									?>

									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<?php

									$post_id = get_the_ID();

									$seconds = get_post_meta( $post_id, '_orbis_task_seconds', true );

									echo orbis_time( $seconds );

									?>
								</div>
							</td>
							<td>
								<?php echo get_avatar( get_post_meta( get_the_ID(), '_orbis_task_assignee_id', true ), 40 ); ?>
							</td>
							<td>
								<?php

								if ( null === $task->due_date ) {
									echo '—';
								}

								if ( null !== $task->due_date ) {
									$today = new DateTime();

									echo esc_html( wp_date( 'D j M Y', $task->due_date->getTimestamp() ) );

									if ( $task->due_date < $today ) {
										$diff = $task->due_date->diff( $today );

										printf(
											' <span class="badge text-bg-danger">%s</span>',
											esc_html(
												sprintf(
													_n( '%s day', '%s days', $diff->days, 'orbis-4' ),
													number_format_i18n( $diff->days, 0 )
												)
											)
										);
									}
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
