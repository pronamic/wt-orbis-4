<?php

function orbis_company_sections_projects( $sections ) {
	$sections[] = [
		'id'            => 'projects',
		'name'          => __( 'Projects', 'orbis-4' ),
		'template_part' => 'templates/company_projects',
	];

	return $sections;
}

add_filter( 'orbis_company_sections', 'orbis_company_sections_projects' );
