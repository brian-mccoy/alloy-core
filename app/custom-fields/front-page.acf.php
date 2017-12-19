<?php
core_register_field_group( array(
	'title' => 'Home Options',
	'location' => array(
		array(
			array(
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page'
			)
		)
	),
	'hide_on_screen' => array( 'the_content' ),
	'fields' => array(

	)
) );
