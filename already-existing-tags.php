<?php
/*
Plugin Name: Already Existing Tags
Plugin URI: http://www.digitalemphasis.com/wordpress-plugins/already-existing-tags/
Description: Looks for already existing tags within your posts.
Version: 1.9
Author: digitalemphasis
Author URI: http://www.digitalemphasis.com/
License: GPLv2 or later
*/

defined( 'ABSPATH' ) || die( 'Cannot access pages directly.' );

function aet_the_settings() {
	register_setting( 'aet-settings-group', 'aet_automatic_tagging' );
	register_setting( 'aet-settings-group', 'aet_block_manually_added_tags' );
	register_setting( 'aet-settings-group', 'aet_examine_post_title' );
	register_setting( 'aet-settings-group', 'aet_included_categories' );
	register_setting( 'aet-settings-group', 'aet_clean_uninstall' );
}
add_action( 'admin_init', 'aet_the_settings' );

function aet_admin_init() {
	wp_register_style( 'aet-admin-style', plugins_url( 'admin/already-existing-tags-admin.css', __FILE__ ), array(), null );
	wp_register_script( 'aet-admin-script', plugins_url( 'admin/already-existing-tags-admin.js', __FILE__ ), array(), null );
}
add_action( 'admin_init', 'aet_admin_init' );

function aet_settings_page() {
	include( 'admin/already-existing-tags-admin.php' );
}

function aet_admin_enqueue() {
	wp_enqueue_style( 'aet-admin-style' );
	wp_enqueue_script( 'aet-admin-script' );
}

function aet_menu() {
	$page = add_submenu_page( 'edit.php', 'Already Existing Tags', 'Already Existing Tags', 'manage_options', 'already-existing-tags', 'aet_settings_page' );
	add_action( 'load-' . $page, 'aet_admin_enqueue' );
}
add_action( 'admin_menu', 'aet_menu' );

function aet_add_settings_link( $links ) {
	$settings_link = '<a href="edit.php?page=already-existing-tags">Settings</a>';
	array_unshift( $links, $settings_link );
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'aet_add_settings_link' );

function aet_update_db_check() {
	if ( get_option( 'aet_automatic_tagging_included_categories' ) || get_option( 'aet_automatic_tagging_included_categories' ) === '' ) {
		add_option( 'aet_included_categories', get_option( 'aet_automatic_tagging_included_categories' ) );
		delete_option( 'aet_automatic_tagging_included_categories' );
	}
}
add_action( 'plugins_loaded', 'aet_update_db_check' );

function aet_activation() {
	add_option( 'aet_automatic_tagging', '' );
	add_option( 'aet_block_manually_added_tags', '' );
	add_option( 'aet_examine_post_title', '' );
	add_option( 'aet_included_categories', '' );
	add_option( 'aet_clean_uninstall', '1' );
}

function aet_deactivation() {
	unregister_setting( 'aet-settings-group', 'aet_automatic_tagging' );
	unregister_setting( 'aet-settings-group', 'aet_block_manually_added_tags' );
	unregister_setting( 'aet-settings-group', 'aet_examine_post_title' );
	unregister_setting( 'aet-settings-group', 'aet_included_categories' );
	unregister_setting( 'aet-settings-group', 'aet_clean_uninstall' );
}

function aet_uninstall() {
	if ( get_option( 'aet_clean_uninstall' ) ) {
		delete_option( 'aet_automatic_tagging' );
		delete_option( 'aet_block_manually_added_tags' );
		delete_option( 'aet_examine_post_title' );
		delete_option( 'aet_included_categories' );
		delete_option( 'aet_clean_uninstall' );
	}
}

register_activation_hook( __FILE__, 'aet_activation' );
register_deactivation_hook( __FILE__, 'aet_deactivation' );
register_uninstall_hook( __FILE__, 'aet_uninstall' );

include( 'already-existing-tags-core.php' );
