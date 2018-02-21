<?php

$group_args = [
	'title'          => 'Site Options',
	'location_is'    => [ 'options_page', 'acf-options' ]
];

$fields = [

];

$field_group = core_register_field_group( 'options-acf', $group_args, $fields );
