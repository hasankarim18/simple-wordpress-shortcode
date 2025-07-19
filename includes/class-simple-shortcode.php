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

        $class = 'default';

        if ('success' === $type) {
            $class = 'shortcode_ic_success';
        } elseif ('danger' === $type) {
            $class = 'shortcode_ic_danger';
        } elseif ('warning' === $type) {
            $class = 'shortcode_ic_warning';
        } elseif ('info' === $type) {
            $class = 'shortcode_ic_info';

        } else {
            $class = 'shortcode_ic_default';
        }



        ob_start();
        ?>
        <div class="<?php echo esc_attr($class); ?>">
            <?php echo wp_kses_post(wpautop(do_shortcode($content))); ?>
        </div>
        <?php
        $data = ob_get_clean();

        return $data;

    }
}

new Warning_Message_Short_code();
