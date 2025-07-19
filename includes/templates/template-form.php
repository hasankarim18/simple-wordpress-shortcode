<?php
if (!defined('ABSPATH')) {
    exit;
}

$style = isset($attributes['style_type']) ? $attributes['style_type'] : '1';




switch ($style) {
    case '1':
        require TNN_BASE_PATH . 'includes/templates/form-1.php';
        break;

    default:
        //code block
        require TNN_BASE_PATH . 'includes/templates/form-default.php';

}

?>