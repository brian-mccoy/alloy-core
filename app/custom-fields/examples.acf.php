<?php
core_register_field_group( array(
	'title' => 'Example Fields',
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page.php'
			)
		)
	),
	'fields' => array(

		// Field example. The first parameter is field type. Second is label. Third is all other arguments.
		core_field( 'text', 'Heading' ),

		core_field( 'image', 'Photo', array(
			'instructions' => 'Please upload a photo.'
		) ),

		// Repeater field example:
		core_field( 'repeater', 'Repeater Example', array(
			'sub_fields' => array(

				core_field( 'text', 'Button Text' ),
				core_field( 'text', 'Button Link' )

			),
			'max' => 4,
			'layout' => 'block',
			'button_label' => 'Add Button'
		) ),

		// Flexible content example:
		core_field( 'flexible_content', 'Content Blocks', array(
			'key' => 'content_blocks_flexible_content',
			'button_label' => 'Add Block',
			'layouts' => array(

				core_layout( 'Intro Banner', array(
					'layout' => 'block',
					'sub_fields' => array(

						core_field( 'text', 'Heading' ),
						core_field( 'wysiwyg', 'Description' ),
						core_field( 'image', 'Background Image', array(
							'instructions' => 'Dimensions: 1300 x 600. Format: JPG, PNG',
							'return_format' => 'url'
						) ),

					)
				) )
			)

		) )

	)
) );
