<?php
function core_post_type( $label='', $args=[] ) {

	$args['label'] = $label;

	// Set defaults.
	$args['slug']   = core_default( 'slug', $args, sanitize_title( $label ) );
	$args['public'] = core_default( 'public', $args, true );

	register_post_type( $args['slug'], $args );

}

function core_taxonomy( $label='', $post_type='', $args=[] ) {

	$args['label'] = $label;

	// Set defaults.
	$args['slug']         = core_default( 'slug', $args, sanitize_title( $label ) );
	$args['public']       = core_default( 'public', $args, true );
	$args['hierarchical'] = core_default( 'hierarchical', $args, true );

	register_taxonomy( $args['slug'], $post_type, $args );

}
