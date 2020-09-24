<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.etienne-reunion.re
 * @since             1.0.0
 * @package           Bacasable
 *
 * @wordpress-plugin
 * Plugin Name:       BACASABLE
 * Plugin URI:        www.etienne-reunion.re/BACASABLE
 * Description:       Ce plugin sert de bac à sable (Sandbox).
 * Version:           1.0.0
 * Author:            VAYTILINGOM ETIENNE
 * Author URI:        www.etienne-reunion.re
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bacasable
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
add_shortcode( 'macard', 'BAS_macard' );
function BAS_macard( $atts = [], $content = null,$tag=[]) {
	$BAS_macard_atts = shortcode_atts(
        array(
			'title' => 'WordPress.org',
			'name' => 'Button',
			'url_img'=> null
        ), $atts, $tag
	);
	$content = '
	<div class="col-sm-6 col-md-4">
	<div class="thumbnail">
	<img src="'.$BAS_macard_atts['url_img'].'">
      <div class="caption">
        <h3>'.$BAS_macard_atts['title'].'</h3>
        <p>'.$content.'</p>
        <p><a href="#" class="btn btn-primary" role="button">'.$BAS_macard_atts['name'].'</a></p>
      </div>
    </div>
  </div>';
	
	return $content;
}

	

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BACASABLE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bacasable-activator.php
 */
function activate_bacasable() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bacasable-activator.php';
	Bacasable_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bacasable-deactivator.php
 */
function deactivate_bacasable() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bacasable-deactivator.php';
	Bacasable_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bacasable' );
register_deactivation_hook( __FILE__, 'deactivate_bacasable' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bacasable.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bacasable() {

	$plugin = new Bacasable();
	$plugin->run();

}
run_bacasable();
