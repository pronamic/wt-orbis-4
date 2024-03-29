<?php
/**
 * Orbis 4 deploy
 * 
 * @package casinowizard-rtp
 */

namespace Deployer;

require 'recipe/common.php';

set( 'theme_slug', 'orbis-4' );

set( 'build_path', './build/' );

host( 'orbis.pronamic.nl' )
	->set( 'hostname', 'esm7.siteground.biz' )
	->set( 'remote_user', 'u155-jlog1cramrrx' )
	->set( 'port', 18765 )
	->set( 'deploy_path', '~/projects/wt-orbis-4' )
	->set( 'themes_dir', '~/www/orbis.pronamic.nl/public_html/wp-content/themes' );

/**
 * Build.
 *
 * @link https://github.com/woocommerce/woocommerce/blob/48fdb94bf311c977d15cbaa3d8dab66bac01feb7/plugins/woocommerce/.distignore
 * @link https://github.com/woocommerce/woocommerce/blob/48fdb94bf311c977d15cbaa3d8dab66bac01feb7/plugins/woocommerce/bin/build-zip.sh
 */
task(
	'build',
	function () {
		/**
		 * Copy.
		 *
		 * @link https://github.com/woocommerce/woocommerce/blob/48fdb94bf311c977d15cbaa3d8dab66bac01feb7/plugins/woocommerce/bin/build-zip.sh#L20-L21
		 */
		runLocally( 'rsync --recursive --exclude-from="./.distignore" --delete --delete-excluded "./" "{{build_path}}"' );

		/**
		 * Composer.
		 *
		 * @link https://github.com/woocommerce/woocommerce/blob/48fdb94bf311c977d15cbaa3d8dab66bac01feb7/plugins/woocommerce/bin/build-zip.sh
		 * @link https://github.com/deployphp/deployer/blob/cfcb963ead5f993157d20478c8332c0c93908337/recipe/deploy/vendors.php
		 */
		runLocally(
			'composer install --verbose --prefer-dist --no-progress --no-interaction --no-dev --optimize-autoloader',
			[
				'cwd' => get( 'build_path' ),
			]
		);
	}
);

task(
	'deploy:update_code',
	function () {
		upload( '{{build_path}}/', '{{release_path}}' );
	}
);

task(
	'deploy:symlink_theme',
	function () {
		run( 'ln -sfn {{deploy_path}}/current {{themes_dir}}/{{theme_slug}}' );
	}
);

after( 'deploy:symlink', 'deploy:symlink_theme' );

task(
	'deploy',
	[
		'build',
		'deploy:prepare',
		'deploy:publish',
	]
);
