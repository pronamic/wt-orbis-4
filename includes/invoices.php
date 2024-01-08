<?php

function orbis_project_sections_invoices( $sections ) {
	$sections[] = [
		'id'            => 'invoices',
		'slug'          => __( 'invoices', 'orbis-4' ),
		'name'          => __( 'Invoices', 'orbis-4' ),
		'template_part' => 'templates/project_invoices',
	];

	return $sections;
}

add_filter( 'orbis_project_sections', 'orbis_project_sections_invoices' );
