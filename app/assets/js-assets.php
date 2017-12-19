<?php
$default_url = _templateURL . '/assets/js';

wp_deregister_script( 'jquery' );

load_js( '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(
	'handle' => 'jquery'
) );

load_js( $default_url . '/application.js' );
