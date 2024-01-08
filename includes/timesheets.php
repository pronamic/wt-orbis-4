<?php

function orbis_project_sections_timesheet( $sections ) {
	$sections[] = [
		'id'            => 'activities',
		'slug'          => __( 'activities', 'orbis-4' ),
		'name'          => __( 'Activities', 'orbis-4' ),
		'template_part' => 'templates/project_flot_activities',
	];

	$sections[] = [
		'id'            => 'persons',
		'slug'          => __( 'persons', 'orbis-4' ),
		'name'          => __( 'Persons', 'orbis-4' ),
		'template_part' => 'templates/project_flot_persons',
	];

	return $sections;
}

add_filter( 'orbis_project_sections', 'orbis_project_sections_timesheet' );
