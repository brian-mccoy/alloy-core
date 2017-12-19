<?php
add_action( 'init', 'core_load_content_types' );
function core_load_content_types() {

	include_once _appDir . '/content/content-types.php';

}

add_action( 'wp_enqueue_scripts', 'core_load_assets' );
function core_load_assets() {

	include_once _coreDir . '/core-assets.php';

	include_once _appDir . '/assets/css-assets.php';
	include_once _appDir . '/assets/js-assets.php';

}

add_action( 'acf/init', 'core_load_custom_fields' );
function core_load_custom_fields() {

	$cf_dir = _appDir . '/custom-fields';
	$custom_fields = scandir( $cf_dir );

	if( !$custom_fields ) {
		return;
	}

	foreach( $custom_fields as $field_set ) {

		$file_info = pathinfo( $cf_dir . '/' . $field_set );

		if( $file_info['extension'] == 'php' ) {
			include $cf_dir . '/' . $field_set;

		}

	}
}
