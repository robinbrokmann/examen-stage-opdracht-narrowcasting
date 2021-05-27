<?php

/**
 * Plugin Name: Narrowcasting
 * Description: Narrowcasting systeem
 * Version: 1.0
 * Author: Robin Brokmann
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 */
define( 'SETTINGS_PAGE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-settings-page-activator.php
 */
function activate_settings_page() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-settings-page-activator.php';
	Settings_Page_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-settings-page-deactivator.php
 */
function deactivate_settings_page() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-settings-page-deactivator.php';
	Settings_Page_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_settings_page' );
register_deactivation_hook( __FILE__, 'deactivate_settings_page' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-settings-page.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_settings_page() {

	$plugin = new Settings_Page();
	$plugin->run();

}
run_settings_page();
