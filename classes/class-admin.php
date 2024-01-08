<?php

/**
 * Admin
 */
class Orbis_Theme_Admin {
	/**
	 * Construct
	 */
	public function __construct() {
		// Filters
		add_filter( 'mce_buttons_2', [ $this, 'mce_buttons_2' ] );

		add_filter( 'tiny_mce_before_init', [ $this, 'tiny_mce_before_init' ] );
	}

	/**
	 * Add extra styles to the TinyMCE editor
	 */
	public function mce_buttons_2( $buttons ) {
		array_unshift( $buttons, 'styleselect' );

		return $buttons;
	}

	/**
	 * TinyMCE before init
	 */
	public function tiny_mce_before_init( $settings ) {
		$settings['style_formats_merge'] = false;
		$settings['style_formats']       = wp_json_encode( $this->get_tiny_mce_style_formats() );

		return $settings;
	}

	/**
	 * Get TinyMCE style format
	 */
	private function get_tiny_mce_style_formats() {
		return [
			// @see http://v4-alpha.getbootstrap.com/components/buttons/
			[
				'title' => __( 'Buttons', 'orbis-4' ),
				'items' => [
					[
						'title'    => __( 'Default', 'orbis-4' ),
						'selector' => 'a',
						'classes'  => 'btn',
					],
					[
						'title'    => __( 'Primary', 'orbis-4' ),
						'selector' => '.btn',
						'classes'  => 'btn-primary',
					],
					[
						'title'    => __( 'Success', 'orbis-4' ),
						'selector' => '.btn',
						'classes'  => 'btn-success',
					],
					[
						'title'    => __( 'Info', 'orbis-4' ),
						'selector' => '.btn',
						'classes'  => 'btn-info',
					],
					[
						'title'    => __( 'Warning', 'orbis-4' ),
						'selector' => '.btn',
						'classes'  => 'btn-warning',
					],
					[
						'title'    => __( 'Danger', 'orbis-4' ),
						'selector' => '.btn',
						'classes'  => 'btn-danger',
					],
					[
						'title'    => __( 'Link', 'orbis-4' ),
						'selector' => '.btn',
						'classes'  => 'btn-link',
					],
				],
			],
			// @see http://v4-alpha.getbootstrap.com/content/tables/
			[
				'title' => __( 'Tables', 'orbis-4' ),
				'items' => [
					[
						'title'    => __( 'Default', 'orbis-4' ),
						'selector' => 'table',
						'classes'  => 'table',
					],
					[
						'title'    => __( 'Inverse', 'orbis-4' ),
						'selector' => '.table',
						'classes'  => 'table-inverse',
					],
					[
						'title'    => __( 'Striped Rows', 'orbis-4' ),
						'selector' => '.table',
						'classes'  => 'table-striped',
					],
					[
						'title'    => __( 'Bordered Table', 'orbis-4' ),
						'selector' => '.table',
						'classes'  => 'table-bordered',
					],
					[
						'title'    => __( 'Hover Rows', 'orbis-4' ),
						'selector' => '.table',
						'classes'  => 'table-hover',
					],
					[
						'title'    => __( 'Small Table', 'orbis-4' ),
						'selector' => '.table',
						'classes'  => 'table-sm',
					],
				],
			],
			// @see http://v4-alpha.getbootstrap.com/content/typography/#blockquotes
			[
				'title' => __( 'Blockquotes', 'orbis-4' ),
				'items' => [
					[
						'title'    => __( 'Default', 'orbis-4' ),
						'selector' => 'blockquote',
						'classes'  => 'blockquote',
					],
					[
						'title'    => __( 'Reverse Layout', 'orbis-4' ),
						'selector' => '.blockquote',
						'classes'  => 'blockquote-reverse',
					],
				],
			],
		];
	}
}
