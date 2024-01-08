<?php

function orbis_project_sections_tasks( $sections ) {
	$sections[] = [
		'id'            => 'tasks',
		'slug'          => __( 'tasks', 'orbis-4' ),
		'name'          => __( 'Tasks', 'orbis-4' ),
		'template_part' => 'templates/project_tasks',
	];

	return $sections;
}

add_filter( 'orbis_project_sections', 'orbis_project_sections_tasks' );
