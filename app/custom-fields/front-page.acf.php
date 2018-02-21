<?php

$group_args = [
	'title'          => 'Home Options',
	'location_is'    => [ 'page_type', 'front_page' ],
	'hide_on_screen' => [ 'the_content' ]
];

$fields = [
	[ 'text', 'Hello' ]
];

$field_group = core_register_field_group( 'homepage-acf', $group_args, $fields );
