<?php

/**
 * Customizer
 */
function orbis_customize_register( $wp_customize ) {
	/**
	 * General
	 */
	$wp_customize->add_section(
		'general',
		[
			'title' => __( 'General', 'orbis-4' ),
		] 
	);

	// Settings
	$wp_customize->add_setting(
		'orbis_logo',
		[
			'capability' => 'edit_theme_options',
		] 
	);

	// Controls
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'orbis_logo',
			[
				'label'    => __( 'Logo', 'orbis-4' ),
				'section'  => 'general',
				'settings' => 'orbis_logo',
			] 
		) 
	);

	/**
	 * Colors
	 */
	$colors = [];

	$colors[] = [
		'setting' => 'orbis_primary_color',
		'default' => '#0088cc',
		'label'   => __( 'Primary color', 'orbis-4' ),
	];

	$colors[] = [
		'setting' => 'orbis_secondary_color',
		'default' => '#f6f6f6',
		'label'   => __( 'Secondary color', 'orbis-4' ),
	];

	foreach ( $colors as $color ) {
		// Settings
		$wp_customize->add_setting(
			$color['setting'],
			[
				'default'    => $color['default'],
				'type'       => 'option',
				'capability' => 'edit_theme_options',
			] 
		);

		// Controls
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['setting'],
				[
					'label'    => $color['label'],
					'section'  => 'colors',
					'settings' => $color['setting'],
				] 
			) 
		);
	}
}

add_action( 'customize_register', 'orbis_customize_register' );
