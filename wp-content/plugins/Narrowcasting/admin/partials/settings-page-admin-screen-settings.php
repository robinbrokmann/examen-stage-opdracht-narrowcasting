<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Narrowcasting
 * @subpackage Narrowcasting/admin/partials
 */
?>
<div class="wrap">
    <div id="icon-themes" class="icon32"></div>
    <h2>Narrowcasting</h2>
    <!--NEED THE settings_errors below so that the errors/success messages are shown after submission - wasn't working once we started using add_menu_page and stopped using add_options_page so needed this-->
    <?php settings_errors(); ?>
    <form method="POST" action="options.php">
        <?php
        settings_fields('settings_page_general_settings');
        do_settings_sections('settings_page_general_settings');
        submit_button('wporg_custom_post_type'()); ?>
    </form>


</div>
<?php
// Creates the narrowcasting page in a custom post type
function wporg_custom_post_type() {
    register_post_type('wporg_narrowcasting',
        array(
            'labels'      => array(
                'name'          => __('narrowcasting', 'textdomain'),
                'singular_name' => __('narrowcasting', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => false,
        )
    );
}
add_action('init', 'wporg_custom_post_type');
