<?php

class Gmap_Shortcode_Ic
{
    function __construct()
    {
        add_shortcode('tnn_gmap_shortcode_ic', [$this, 'render']);
    }

    function render($atts, $content)
    {
        $atts = array_change_key_case($atts, CASE_LOWER);
        $attributes = shortcode_atts([
            'lat' => '23.777176',
            'lon' => '90.399452',
            "zoom" => '14'
        ], $atts);

        $lat = esc_attr($attributes['lat']);
        $lon = esc_attr($attributes['lon']);
        $zoom = esc_attr($attributes['zoom']);

        ob_start();
        ?>
        <?php
        ?>
        <p>
            <iframe width="700" height="500" frameborder="0" style="border:0" referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/?q=<?php echo $lat . ',' . $lon; ?>&hl-es;z=<?= $zoom; ?>&output=embed"
                allowfullscreen>
            </iframe>

        </p>

        <?php
        $data = ob_get_clean();

        return $data;

    }

}


new Gmap_Shortcode_Ic();