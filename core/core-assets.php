<?php
function load_css( $url="", $args=array() ) {

	$args['handle'] = core_default( 'url', $args, $url );
	$args['ver']    = core_default( 'ver', $args, _themeVer );

	wp_enqueue_style( $args['handle'], $url, $args['deps'], $args['ver'], $args['media'] );

}

function load_js( $url="", $args=array() ) {

	$args['handle']    = core_default( 'url', $args, $url );
	$args['ver']       = core_default( 'ver', $args, _themeVer );
	$args['in_footer'] = core_default( 'in_footer', $args, true );

	wp_enqueue_script( $args['handle'], $url, $args['deps'], $args['ver'], $args['in_footer'] );

}
