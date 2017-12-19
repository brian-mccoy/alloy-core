<?php
function load_css( $url="", $args=array() ) {

	if( !$args['handle'] ) {
		$args['handle'] = $url;
	}

	if( !$args['ver'] ) {
		$args['ver'] = _themeVer;
	}

	wp_enqueue_style( $args['handle'], $url, $args['deps'], $args['ver'], $args['media'] );

}

function load_js( $url="", $args=array() ) {

	if( !$args['handle'] ) {
		$args['handle'] = $url;
	}

	if( !$args['ver'] ) {
		$args['ver'] = _themeVer;
	}

	if( !$args['in_footer'] ) {
		$args['in_footer'] = true;
	}

	wp_enqueue_script( $args['handle'], $url, $args['deps'], $args['ver'], $args['in_footer'] );

}
