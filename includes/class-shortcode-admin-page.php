<?php
class Tnn_shortcode_admin_page
{
    function __construct()
    {
        add_action('admin_menu', [$this, 'add_menu_item']);
    }

    function add_menu_item()
    {
        add_menu_page(
            'Tnn Shortcode Ic',
            'Tnn Shortcode Ic',
            'manage_options',
            'tnn-shortcode-ic',
            [$this, 'tnn_shortcode_admin_page_display'],
            'dashicons-buddicons-pm', // Optional icon URL
            100
        );
    }

    function tnn_shortcode_admin_page_display()
    {
        ?>
        <div class="wrap">
            <h2>Tnn Shortcode Ic</h2>

            <div style="margin-top: 20px;">
                <h3 style="margin-bottom: 8px;">For Success</h3>
                <span readonly rows="4" onclick="this.select();" style="
                    width: 50%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 6px;
                    background-color: #f9f9f9;
                    font-family: monospace;
                    font-size: 14px;
                    resize: none;
                ">[tnn_highlight_message type="success" ] Write your message here...
                    [/tnn_highlight_message]</span>
            </div>
            <div>
                <h3>Avaiable types: "success" | "danger" | "warning" | "info" </h3>
            </div>
            <br><br>
            <hr>
            <div>
                <h2>💬 Tnn Contact Form Instructions</h2>
                <div>
                    <span readonly rows="4" onclick="this.select();" style="
                    width: 50%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 6px;
                    background-color: #f9f9f9;
                    font-family: monospace;
                    font-size: 14px;
                    resize: none;
                ">[Tnn_Contact_Form style_type="1"]</span>
                    </span>
                </div>
            </div>
        </div>
        <?php
    }
}

new Tnn_shortcode_admin_page();
