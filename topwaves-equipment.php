<?php
/*
 * Plugin Name: Topwaves Equipment
 * Version: 1.0
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Hugh Lashbrooke
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: topwaves-equipment
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-topwaves-equipment.php' );
require_once( 'includes/class-topwaves-equipment-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-topwaves-equipment-admin-api.php' );
require_once( 'includes/lib/class-topwaves-equipment-post-type.php' );
require_once( 'includes/lib/class-topwaves-equipment-taxonomy.php' );

/**
 * Returns the main instance of Topwaves_Equipment to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Topwaves_Equipment
 */
function Topwaves_Equipment () {
	$instance = Topwaves_Equipment::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Topwaves_Equipment_Settings::instance( $instance );
	}

	return $instance;
}

Topwaves_Equipment();

Topwaves_Equipment()->register_post_type(
	'equipment',
	__('Equipment', 'topwaves-equipment'),
	__('Equipment', 'topwaves-equipment')
);

Topwaves_Cars()->register_taxonomy(
	'car_type',
	__( 'Equipment Types', 'topwaves-equipment' ),
	__( 'Equipment Type', 'topwaves-equipment' ),
	'equipment'
);
