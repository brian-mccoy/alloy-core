# Theme Development

## Plugin Dependencies
* [Timber](https://github.com/timber/timber) / [Timber Docs](https://github.com/timber/timber/wiki/Timber-docs)
* [Advanced Custom Fields](http://advancedcustomfields.com)

## Loading Styles
* Inside your theme open `/app/assets/css-assets.php`
* Add a load_css() call. The first parameter is the URL to the CSS file. The second optional parameter is an array of arguments. [See arguments.](https://developer.wordpress.org/reference/functions/wp_enqueue_style/#parameters)
* If `handle` is not defined as an arg the URL parameter will be used.
* If `ver` is not defined as an arg the theme version will be used.

## Loading Scripts
* Inside your theme open `/app/assets/js-assets.php`
* Add a load_js() call. The first parameter is the URL to the JS file. The second optional parameter is an array of arguments. [See arguments.](https://developer.wordpress.org/reference/functions/wp_enqueue_script/#parameters)
* If `handle` is not defined as an arg the URL parameter will be used.
* If `ver` is not defined as an arg the theme version will be used.

## Custom Post Types & Taxonomies
* [Extended CPTs](https://github.com/johnbillion/extended-cpts/) is integrated
* Register new post types and taxonomies by opening inside your theme `/app/content-types/content-types.php`
* Follow documentation for Extended CPTs [here](https://github.com/johnbillion/extended-cpts/wiki).

## Custom Fields
* [Advanced Custom Fields](http://advancedcustomfields.com) is used to created custom fields.
* It's recommended to [register fields via PHP](https://www.advancedcustomfields.com/resources/register-fields-via-php/).
* For each template, post type or options page you should create a new PHP file in the directory inside your theme `/app/custom-fields`. In terms of naming convention it should match the template or post type name. Examples: `/app/custom-fields/front-page.acf.php` or `/app/custom-fields/articles.acf.php`
* An options page is setup by default in `functions.php`.
* A wrapper is available for the ACF PHP API to streamline development. See `/app/custom-fields/examples.acf.php`.
* Using `core_field` the label will be used as the field name unless the `name` key is present in the args array.

## Template Development
* By default the header, footer and homepage (front-page.php) are set up for you.
* Every template, post type, etc. should be set up with a PHP file and a Twig file. For example if you have `template-about.php` you would have `views/template-about.twig`
* The PHP file should have a class that extends the Core_Template class. Example: `class Template_About extends Core_Template`. Whatever the class name is will be what it tries to load from the views directory. In this example it'd look for `template-about.twig`. You can overwrite this by defining a `template_file` method in your class. See `header.php` for an example.
* Any methods defined in your class will be returned to the Twig template as data. For instance if you have a method `hero` that returns an array you could access it in your Twig file like `{{hero.heading}}` if you have a key in your array called heading. I recommend having a method for each section of the template returning relevant data for that section.
* The `Core_Template` class also supplies your Twig template with some commonly accessed data: `{{constants.blogURL}}`, `{{constants.templateURL}}`, `{{constants.templateDir}}`, `{{constants.mediaURL}}`

## Helpers
* `_log( $array );` - a wrapper for `error_log()` that will print strings, arrays or objects to the system error log.
* `core_get_fields( $key='', $fields=array() )` can help you get your custom fields. See `front-page.php` for an example.
