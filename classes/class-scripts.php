<?php

/**
 * Scripts
 */
class Orbis_Theme_Scripts {
	/**
	 * Construct
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'register' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
	}

	/**
	 * Register
	 */
	public function register() {
		$uri = get_template_directory_uri();

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		// Tether - http://tether.io/
		wp_register_script(
			'tether',
			$uri . '/assets/tether/js/tether' . $min . '.js',
			[],
			'1.4.6',
			true
		);

		wp_register_style(
			'tether',
			$uri . '/assets/tether/css/tether' . $min . '.css',
			[],
			'1.4.6'
		);

		// Popper.js - https://popper.js.org/
		wp_register_script(
			'popper',
			$uri . '/assets/popper/popper' . $min . '.js',
			[],
			'1.16.1',
			true
		);

		// Bootstrap
		wp_register_script(
			'bootstrap',
			$uri . '/assets/bootstrap/js/bootstrap' . $min . '.js',
			[
				'jquery',
				'popper',
			],
			'5.2.3',
			true
		);

		wp_register_style(
			'bootstrap',
			$uri . '/assets/bootstrap/css/bootstrap' . $min . '.css',
			[],
			'5.2.3'
		);

		// Font Awesome - http://fortawesome.github.io/Font-Awesome/
		wp_register_style(
			'fontawesome',
			$uri . '/assets/fontawesome/css/all' . $min . '.css',
			[],
			'5.15.4'
		);

		// Flotcharts
		wp_register_script(
			'flotcharts',
			$uri . '/assets/flot/jquery.flot' . $min . '.js',
			[ 'jquery' ],
			'0.8.3'
		);

		// Flotcharts
		wp_register_script(
			'flotcharts-time',
			$uri . '/assets/flot/jquery.flot.time' . $min . '.js',
			[ 'jquery' ],
			'1.0.0'
		);

		// Orbis
		wp_register_script(
			'wt-orbis',
			$uri . '/assets/orbis/js/script' . $min . '.js',
			[
				'jquery',
				'bootstrap',
				'tether',
			],
			'3.0.1',
			true
		);

		wp_localize_script(
			'wt-orbis',
			'orbis_timesheets_vars',
			[
				'ajax_url' => admin_url( 'admin-ajax.php' ),
			]
		);

		wp_register_style(
			'wt-orbis',
			$uri . '/css/style' . $min . '.css',
			[
				'bootstrap',
				'fontawesome',
			],
			'3.0.1'
		);
	}

	/**
	 * Enqueue
	 */
	public function enqueue() {
		// Theme
		wp_enqueue_script( 'wt-orbis' );
		wp_enqueue_style( 'wt-orbis' );

		// Comment reply
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
