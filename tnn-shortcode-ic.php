<?php
/*
Plugin Name: Tnn Shortcode Ic
Plugin URL: https://example.com/code-execution-plugin.html
Description: This plugin allows users to execute PHP code snippets directly from the WordPress site. It provides a simple interface for inputting and running custom code.
Version: 1.0
Author: Hasan
Author URI: https://example.com/
License: GPL2 or later
Text Domain: code-execution
*/

// Rest of the plugin code should be placed here, but note that this is just an example.

if (!defined('ABSPATH')) {
    exit;
}

define('TNN_BASE_PATH', plugin_dir_path(__FILE__));
define('TNN_BASE_URL', plugins_url('', __FILE__));
define('TNN_VERSION_', '1.0');


class Tnn_shortcode_Ic
{
    function __construct()
    {
        add_action('plugins_loaded', [$this, 'load_dependencies']);
        add_action('init', [$this, 'init']);

    }

    function load_dependencies()
    {
        if (file_exists(TNN_BASE_PATH . 'includes/class-simple-shortcode.php')) {
            require_once(TNN_BASE_PATH . 'includes/class-simple-shortcode.php');
        }

        if (file_exists(TNN_BASE_PATH . 'includes/class-shortcode-admin-page.php')) {
            require_once(TNN_BASE_PATH . 'includes/class-shortcode-admin-page.php');
        }
    }

    function init()
    {

        load_plugin_textdomain('tnn-shortcode-ic', false, dirname(plugin_basename(__FILE__)) . '/languages');

    }



}

new Tnn_shortcode_Ic();

/******************************* */

register_activation_hook(__FILE__, 'activate_tnn_shortcode_ic');

function activate_tnn_shortcode_ic()
{
    // Activation code here
}
