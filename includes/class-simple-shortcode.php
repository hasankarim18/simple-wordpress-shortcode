<?php


class Warning_Message_Short_code
{
    function __construct()
    {
        //  add_action('init', [$this, 'simple_shortcode_init']);
        add_shortcode('tnn_highlight_message', array($this, 'render'));
    }


    function render($atts, $content = null, $tag = '')
    {
        $atts = array_change_key_case($atts, CASE_LOWER);

        $attributes = shortcode_atts([
            'type' => 'default',
        ], $atts, $tag);

        $type = $attributes['type'];

        $style = '';

        if ($type === 'success') {
            $style = 'background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; border-radius: 5px;';
        } elseif ($type === 'danger') {
            $style = 'background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; border-radius: 5px;';
        } elseif ($type === 'warning') {
            $style = 'background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; padding: 10px; border-radius: 5px;';
        } elseif ($type === 'info') {
            $style = 'background-color: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; padding: 10px; border-radius: 5px;';
        } else {
            $style = 'background-color: #e2e3e5; color: #383d41; border: 1px solid #d6d8db; padding: 10px; border-radius: 5px;';
        }



        ob_start();
        ?>
        <div style="<?php echo esc_attr($style); ?>">
            <?php echo wp_kses_post(wpautop(do_shortcode($content))); ?>
        </div>
        <?php
        $data = ob_get_clean();

        return $data;

    }
}

new Warning_Message_Short_code();
