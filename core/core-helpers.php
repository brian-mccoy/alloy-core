<?php
add_action('after_setup_theme', 'core_theme_support');
function core_theme_support() {

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

}

function _log($input) {
    error_log(print_r($input, true));
}

function core_get_fields( $key='', $prefix='', $fields=array(), $single=false ) {

    if( !$fields ) {
        return;
    }

    $field_data = array();

    foreach( $fields as $field ) {

        if( $prefix ) {
            $field_key = $prefix . $field;
        } else {
            $field_key = $field;
        }

        $field_data[$field] = get_field( $field_key, $key );
    }

    if( $single ) {
        $field_data = current( $field_data );
    }

    return $field_data;

}

function sanitize_title_underscore( $string='' ) {
    return str_replace( '-', '_', sanitize_title( $string ) );
}

function core_default( $key='', $args=array(), $default='' ) {

    if( !array_key_exists( $key, $args ) ) {
		return $default;
	}

    return $args[$key];

}
