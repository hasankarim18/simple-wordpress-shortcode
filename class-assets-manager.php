<?php

class AssetsManager
{
    private $assets = [];

    function __construct()
    {
        $this->assets = [
            'css' => [
                'sic_main' => [
                    'src' => plugin_dir_url(__FILE__) . 'assets/css/main.css',
                    'deps' => [],
                    'ver' => '1.0.0',
                    'media' => 'all'
                ],
                'shortcode-ic' => [
                    'src' => plugin_dir_url(__FILE__) . 'assets/css/shortcode-ic.css',
                    'deps' => [],
                    'ver' => '1.0.0',
                    'media' => 'all'
                ],
            ],
            'js' => [
                'sic_main' => [
                    'src' => plugin_dir_url(__FILE__) . 'assets/js/main.js',
                    'deps' => [],
                    'ver' => '1.0.0',
                    'in_footer' => true
                ]

            ]
        ];

        add_action('wp_enqueue_scripts', [$this, 'load_assets']);
    }

    function load_assets()
    {
        foreach ($this->assets['css'] as $handle => $data) {
            wp_enqueue_style($handle, $data['src'], $data['deps'], $data['ver'], $data['media']);
        }
        // load js
        foreach ($this->assets['js'] as $handle => $data) {
            wp_enqueue_script(
                $handle,
                $data['src'],
                $data['deps'],
                $data['ver'],
                $data['in_footer']
            );
        }
    }

}