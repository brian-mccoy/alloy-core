<?php

define( '_blogURL', home_url() );
define( '_templateDir', get_template_directory() );
define( '_templateURL', get_template_directory_uri() );
define( '_coreDir', _templateDir . '/core' );
define( '_appDir', _templateDir . '/app' );

$theme_data = wp_get_theme();
define( '_themeVer', $theme_data->Version );
