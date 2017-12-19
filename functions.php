<?php

// Load core functionality.
include 'core/core-init.php';

add_theme_support('post-thumbnails');

// Set up an ACF options page.
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
