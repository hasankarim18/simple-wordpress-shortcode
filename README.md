# A very simple wordpress shortcode plugin (For Reference)

- It shows how to use $atts and $content in shortcode.
- $atts keys need to lower case.
- attributes need to pass by `shortcode_atts` function

```
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
        $attributes = shortcode_atts([
            'title' => 'Wordpress.org',
            'warning' => 'no_warning'
        ], $atts, $tag);


        // if (strtolower($short_code['title']) === 'post') {
        //     $short_code['title'] = get_the_title();
        // }

        $warning = $attributes['warning'];
        $style = '';

        if ($warning === 'no_warning') {
            $style = '';
        }
        if ($warning === 'success') {
            $style = 'background-color:green; color:white;';
        } elseif ($warning === 'danger') {
            $style = 'background-color:red; color:white;';
        } elseif ($warning === 'no_warnng') {

        } elseif ($warning === 'no_warnng') {
            $style = '';
        } else {
            $style = '';
        }

        $style .= 'border-radius:5px; padding:10px;';


        ob_start();
        ?>
        <div style="<?php echo $style; ?>">
            <h2>The Warning is: <?php echo esc_html($attributes['title']); ?> </h2>
            <?php if (!is_null($content)): ?>
                <div class="shortcode-content">
                    <?php echo wp_kses_post(wpautop(do_shortcode($content))); ?>
                </div>
            </div>
        <?php endif; ?>

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

```
