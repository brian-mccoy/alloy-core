<?php
class Core_Template {

  public $template_file;
  public $cur_class;
  public $obj_id;

  public function __construct( $obj_id=null ) {

    $this->cur_class = get_called_class();

    // Set up the file name based on the class name.
    $this->template_file = $this->template_file();

    $this->obj_id = $obj_id;

    $this->render();

  }

  public function template_file() {

    $filename = sanitize_title( $this->cur_class );
    $filename = strtolower( $filename );
    $filename = str_replace( '_', '-', $filename) . '.twig';

    return _templateDir . '/views/' . $filename;

  }

  public function render() {

    $attributes = get_class_methods( $this->cur_class );

    if( !$attributes ) {
      return;
    }

    $data = array();

    $exempt_attr = array(
      '__construct',
      'render',
      'template_file'
    );

    foreach( $attributes as $attr ) {

      if( in_array( $attr, $exempt_attr ) ) {
        continue;
      }

      $data[$attr] = $this->{$attr}();

    }

    // Add some commonly used variables to the data.
    $data['constants'] = array(
        'blogURL' => _blogURL,
        'templateURL' => _templateURL,
	    'templateDir' => _templateDir,
        'mediaURL' => _templateURL . '/assets/resources',
        'currentUrl' => $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
    );

    // Display the template.
    Timber::render( $this->template_file, $data);

  }

}
