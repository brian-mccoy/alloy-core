<?php

core_register_field_group( array(
        'title' => 'Site Options',
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options'
                )
            )
        ),
        'fields' => array(

            core_field( 'text', 'Email Subscribe form ID', array() )

        )
    )
);
