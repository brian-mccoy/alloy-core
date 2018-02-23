<?php

// Load core functionality.
include 'core/core-init.php';

// Set up an ACF options page.
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
