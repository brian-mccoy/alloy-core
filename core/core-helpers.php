<?php
add_action('after_setup_theme', 'core_theme_support');
function core_theme_support() {

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

}

function _log($input) {
    error_log(print_r($input, true));
}

function core_get_fields( $key='', $fields=array() ) {

    if( !$fields ) {
        return;
    }

    $field_data = array();

    foreach( $fields as $field ) {
        $field_data[$field] = get_field( $field, $key );
    }

    return $field_data;

}

function sanitize_title_underscore( $string='' ) {
    return str_replace( '-', '_', sanitize_title( $string ) );
}
