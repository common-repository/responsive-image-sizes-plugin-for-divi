<?php
/**
 * Plugin Name:     Responsive Image Sizes Plugin For Divi
 * Description:     Divi image module with srcset attribute support. Make your website load faster
 * Author:          WP Tools
 * Author URI:      https://wptools.app
 * Text Domain:     divi-responsive-image-sizes-plugin
 * Domain Path:     /languages
 * Version:         1.1.0
 *
 * @package         Divi_Image_Srcset_Module
 */

require_once __DIR__ . '/vendor/autoload.php';

$loader = \WPT\DiviImageModule\Loader::get_instance();

$loader['name']    = 'Responsive Image Sizes Plugin For Divi';
$loader['version'] = '1.1.0';
$loader['dir']     = __DIR__;
$loader['url']     = plugins_url('/' . basename(__DIR__));
$loader['file']    = __FILE__;
$loader['slug']    = 'divi-responsive-image-sizes-plugin';

$loader->run();
