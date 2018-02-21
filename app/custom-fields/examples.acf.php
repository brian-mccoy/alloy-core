<?php

$group_args = [
	'title'          => 'Example Field Group',
	'location_is'    => [ 'options_page', 'acf-options' ],
	'hide_on_screen' => [ 'the_content' ]
];

$fields = [

	[ 'tab', 'Example Tab', [ 'placement' => 'left' ] ],

	[ 'text', 'Example Field' ],

	[ 'repeater', 'Files', [
		'sub_fields' => [
			[ 'text', 'File URL' ],
			[ 'textarea', 'File Description' ]
		],
		'max' => 4,
		'layout' => 'block',
		'button_label' => 'Add Link or File'
	] ],

	[ 'flexible_content', 'Content Blocks 123', [
		'button_label' => 'Add Block',
		'layouts' => [

			[ 'Hero', [
				'display' => 'block',
				'sub_fields' => [

					[ 'text', 'Heading' ],
					[ 'textarea', 'Description' ]

				]
			] ],

			[ 'Intro', [
				'layout' => 'block',
				'sub_fields' => [

					[ 'text', 'Heading' ],
					[ 'textarea', 'Description' ]

				]
			] ]

		]
	] ]

];

$field_group = core_register_field_group( 'example-acf', $group_args, $fields );
