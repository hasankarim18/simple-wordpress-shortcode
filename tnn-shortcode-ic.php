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

class Tnn_shortcode_Ic
{
    function __construct()
    {
        add_action('init', [$this, 'init']);

    }

    function init()
    {
        add_shortcode('tnn_helloworld', [$this, 'shortcode_ic_hello_world']);

        load_plugin_textdomain('tnn-shortcode-ic', false, dirname(plugin_basename(__FILE__)) . '/languages');

    }


    function shortcode_ic_hello_world($atts, $content = null, $tag = '')
    {
        $atts = array_change_key_case($atts, CASE_LOWER);
        $short_code = shortcode_atts([
            'title' => 'Wordpress.org'
        ], $atts, $tag);


        // if (strtolower($short_code['title']) === 'post') {
        //     $short_code['title'] = get_the_title();
        // }

        ob_start();
        ?>
        <h2>Hello world <?php echo esc_html($short_code['title']); ?> </h2>

        <?php return ob_get_clean();
    }

}

new Tnn_shortcode_Ic();

/******************************* */

register_activation_hook(__FILE__, 'activate_tnn_shortcode_ic');

function activate_tnn_shortcode_ic()
{
    // Activation code here
}
