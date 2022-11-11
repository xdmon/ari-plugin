<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://twocowsdev.co.uk
 * @since             0.1.0
 * @package           Group_Poll
 *
 * @wordpress-plugin
 * Plugin Name:       ARI Plugin
 * Plugin URI:        https://twocowsdev.co.uk
 * Description:       Generates polls for users to show their availability.
 * Version:           0.1.0
 * Author:            Richard Gumbrell
 * Author URI:        https://twocowsdev.co.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       group-poll
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('GROUP_POLL_VERSION', '0.1.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-group-poll-activator.php
 */
function activate_group_poll()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-ari-activator.php';
	Group_Poll_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-group-poll-deactivator.php
 */
function deactivate_group_poll()
{
	require_once plugin_dir_path(__FILE__) . 'includes/ari-deactivator.php';
	Group_Poll_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_ari');
register_deactivation_hook(__FILE__, 'deactivate_ari');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-ari.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_ari()
{

	$plugin = new ari();
	$plugin->run();
}
run_ari();
