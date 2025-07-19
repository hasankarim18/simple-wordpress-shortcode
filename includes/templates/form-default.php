<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<form class="tnn-contact-form" method="post" action="">
    <label for="name">
        <?php
        esc_html_e('Name Form Default', 'tnn-shortcode-ic');

        ?>
    </label>
    <input type="text" id="name" name="name" required>

    <label for="email">
        <?php
        esc_html_e('Email', 'tnn-shortcode-ic');
        ?>
    </label>
    <input type="email" id="email" name="email" required>

    <label for="message">
        <?php
        esc_html_e('Message', 'tnn-shortcode-ic');
        ?>
    </label>
    <textarea id="message" name="message" rows="5" required></textarea>

    <button type="submit">
        <?php
        esc_html_e('Send Message', 'tnn-shortcode-ic');
        ?>
    </button>
</form>