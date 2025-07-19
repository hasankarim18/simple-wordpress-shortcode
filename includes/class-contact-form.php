<?php
if (!defined('ABSPATH')) {
    exit;
}


class Tnn_Contact_Form
{
    public function __construct()
    {
        //   error_log('Tnn_Contact_Form loaded');

        add_shortcode('tnn_contact_form', [$this, 'render']);
    }

    public function render($atts, $content = null)
    {
        $atts = array_change_key_case((array) $atts, CASE_LOWER);
        $attributes = shortcode_atts([
            'style_type' => '1',
        ], $atts);

        ob_start();

        ?>
        <div class="">
            <h2>

            </h2>
            <?php
            require TNN_BASE_PATH . 'includes/templates/template-form.php';
            ?>


        </div>
        <?php $data = ob_get_clean();
        return $data;
    }
}


new Tnn_Contact_Form();
