<?php
function core_field( $type='text', $label='', $args=array(), $unique_key='' ) {

	// Define the field type.
	$args['type'] = $type;

	// Define the field label.
	$args['label'] = $label;

	// If the "name" of the field is not defined create it based on the field label.
	if( !array_key_exists( 'name', $args ) ) {

		// Give the tab field some extra uniqueness to prevent conflicts.
		if( $type == 'tab' ) {
			$args['name'] = 'core_tab_' . $unique_key . '_' . sanitize_title_underscore( $label );
		} else {
			$args['name'] = sanitize_title_underscore( $label );
		}

	}

	// If the "key" arg is not defined create it based on the field label.
	if( !array_key_exists( 'key', $args ) ) {

		if( $type == 'tab' ) {
			$args['key'] = 'core_field_tab_' . $unique_key . '_' . $args['name'];
		} else {
			$args['key'] = 'core_field_' . $unique_key . '_' . $args['name'];
		}

	}

	// Set up flexible content fields
	if( $type == 'flexible_content' && array_key_exists( 'layouts', $args ) ) {

		$layouts = [];

		foreach( $args['layouts'] as $layout ) {

			// Define a unique key for the layout.
			$layout_key = 'core_layout_' . $args['key'] . '_' . sanitize_title_underscore( $layout[0] );

			// Set layout args.
			$layouts[$layout_key] = $layout[1];
			$layouts[$layout_key]['name'] = sanitize_title_underscore( $layout[0] );
			$layouts[$layout_key]['label'] = $layout[0];

			// Create the sub fields for the layout.
			if( array_key_exists( 'sub_fields', $layout[1] ) ) {

				$layout_fields = array();

				foreach( $layout[1]['sub_fields'] as $field ) {
					$field_key = $layout_key;
					$layout_fields[] = core_field( $field[0], $field[1], $field[2], $field_key );
				}

				$layouts[$layout_key]['sub_fields'] = $layout_fields;

			}

		}

		$args['layouts'] = $layouts;

	}

	// Need to modify the keys to add the repeater key to the field key doesn't end up duplicated elsewhere.
	if( $type == 'repeater' && array_key_exists( 'sub_fields', $args ) ) {

		foreach( $args['sub_fields'] as $key => $sub_field ) {

			$new_key = 'core_repeater_field_' . $args['key'];
			$args['sub_fields'][$key] = core_field( $sub_field[0], $sub_field[1], $sub_field[2], $new_key );

		}

	}

	return $args;

}

function core_register_field_group( $unique_key='', $group_args=array(), $fields=array() ) {

	if( !array_key_exists( 'title', $group_args ) ) { return; }

	// Get a unique key to use for this group and these fields.
	$unique_key = md5( $unique_key );

	// If location is not defined and location_is is then we can set up the locations array for them
	if( !array_key_exists( 'location', $group_args ) && array_key_exists( 'location_is', $group_args ) ) {
		$group_args['location'] = core_location_is( $group_args['location_is'] );
	}

	// Set the group key.
	$group_args['key'] = 'core_field_group_' . $unique_key . '_' . sanitize_title_underscore( $group_args['title'] );

	// Define the fields.
	foreach( $fields as $field ) {

		$group_args['fields'][] = core_field( $field[0], $field[1], $field[2], $unique_key );

	}

	acf_add_local_field_group( $group_args );

	return $group_args;

}

function core_location_is( $location_is=array() ) {

	if( !is_array( $location_is ) ) {
		return;
	}

	$location[][] = [
		'param'    => $location_is[0],
		'operator' => '==',
		'value'    => $location_is[1]
	];

	return $location;

}
