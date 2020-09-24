<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.etienne-reunion.re
 * @since      1.0.0
 *
 * @package    Bacasable
 * @subpackage Bacasable/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bacasable
 * @subpackage Bacasable/admin
 * @author     VAYTILINGOM ETIENNE <formation.etienne.re@gmail.com>
 */
class Bacasable_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bacasable_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bacasable_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bacasable-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bacasable_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bacasable_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bacasable-admin.js', array( 'jquery' ), $this->version, false );

	}

    public function wporg_filter_title( $title ) {
        return  $title . ' - Etienne';
	}
	
	public function badgeuse_Menu_admin(){
		add_menu_page(
			'Badgeuse', // Title of the page
			'Badgeuse', // Text to show on the menu link
			'manage_options', // Capability requirement to see the link
			'BACASABLE/includes/badgeuse_Menu_admin.php' // The 'slug' - file to display when clicking the link
		);
	}

	public function badgeuse_post(){
		global $wpdb;
		$table = $wpdb->prefix.'badgeuse';
		$current_time = current_time( 'mysql' );
		$id = $_POST['id'] ; 
		$data = array('user'=>$id, 'date'=>$current_time);
		$wpdb->insert($table,$data);
		wp_redirect(admin_url('admin.php?page=BACASABLE%2Fincludes%2Fbadgeuse_Menu_admin.php'));
	}

}
