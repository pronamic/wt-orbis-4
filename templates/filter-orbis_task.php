<div class="pull-right form-inline">
	<?php

	wp_dropdown_users(
		[
			'name'             => 'orbis_task_assignee',
			'selected'         => filter_input( INPUT_GET, 'orbis_task_assignee', FILTER_SANITIZE_STRING ),
			'show_option_none' => __( '— Select Assignee —', 'orbis-4' ),
			'class'            => 'form-control',
		] 
	);

	?>

	<button class="btn btn-secondary ml-1" type="submit"><?php esc_html_e( 'Filter', 'orbis-4' ); ?></button>
</div>
