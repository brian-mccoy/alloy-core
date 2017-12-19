<?php
function core_register_field_group( $args=array() ) {

	if( !$args['key'] ) {
		$args['key'] = 'core_field_group_' . sanitize_title_underscore( $args['title'] );
	}

	acf_add_local_field_group( $args );

}

function core_field( $type='text', $label='', $args=array() ) {

	if( !$args['type'] ) {
		$args['type'] = $type;
	}

	if( !$args['name'] ) {

		if( $type == 'tab' ) {
			$args['name'] = 'tab_' . sanitize_title_underscore( $label );
		} else {
			$args['name'] = sanitize_title_underscore( $label );
		}
	}

	if( !$args['key'] ) {

		if( $type == 'tab' ) {
			$args['key'] = 'core_field_tab_' . sanitize_title_underscore( $args['name'] );
		} else {
			$args['key'] = 'core_field_' . sanitize_title_underscore( $args['name'] );
		}

	}

	$args['label'] = $label;

	// Need to modify the keys to add the layout key to the field key doesn't end up duplicated elsewhere.
	if( $type == 'flexible_content' && $args['layouts'] ) {

		foreach( $args['layouts'] as $key => $layout ) {
			$layout_key = $layout['key'];

			if( !$layout['sub_fields'] ) {
				continue;
			}

			foreach( $layout['sub_fields'] as $sub_key => $sub_field ) {
				$new_key = $layout_key . '_' . $sub_field['key'];
				$args['layouts'][$key]['sub_fields'][$sub_key]['key'] = $new_key;
			}

		}

	}

	// Need to modify the keys to add the repeater key to the field key doesn't end up duplicated elsewhere.
	if( $type == 'repeater' && $args['sub_fields'] ) {

		foreach( $args['sub_fields'] as $key => $sub_field ) {
			$new_key = $args['key'] . '_' . $sub_field['key'];
			$args['sub_fields'][$key]['key'] = $new_key;
		}

	}

	return $args;

}

function core_layouts( $layouts=array() ) {
	return $layouts;
}

function core_layout( $label='', $args=array() ) {

	if( !$args['key'] ) {
		$args['key'] = 'core_layout_' . sanitize_title_underscore( $label );
	}

	if( !$args['name'] ) {
		$args['name'] = sanitize_title_underscore( $label );
	}

	if( !$args['label'] ) {
		$args['label'] = $label;
	}

	return $args;

}

function core_get_fields_by_group( $group_key, $overwrite="" ) {

	if( !$overwrite ) {
		$group_key = 'core_field_group_' . sanitize_title_underscore( $group_key );
	} else {
		$group_key = $overwrite;
	}

	$field_groups = acf_get_local_field_groups();

	if( !$field_groups ) {
		return;
	}

	$group_data = array();

	foreach( $field_groups as $group ) {
		$key = $group['key'];
		if( $key != $group_key ) {
			continue;
		}

		$group_data = $group;

		if( acf_have_local_fields( $key ) ) {
			$group_data['fields'] = acf_get_local_fields( $key );
		}

	}

	return $group_data;

}
