<?php

/**
 * Plugin Name: Login With Google reCaptcha For WordPress And Woocomerce
 * Description: Implements Google reCaptcha To Login Page For WordPress and Woocommerce
 * Author: Evgeniy Poznyak
 * Author URI: https://wordpress.poznyaks.com/
 * Version: 1.00
 */

/*  Copyright 2017  Evgeniy Poznyak  (email: ek@35mm@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once( plugin_dir_path( __FILE__ ) . 'functions.php' );

register_uninstall_hook( __FILE__, 'evg_google_recaptcha_delete' );

function evg_google_recaptcha_delete() {
	delete_option( 'evg_google_recaptcha_setting_group' );
}

add_action( 'admin_menu', 'evg_google_recaptcha_menu' );

add_action( 'admin_init', 'evg_google_recaptcha_settings' );

add_action('login_form','evg_login_recaptcha_form_cb');

add_action('woocommerce_login_form','evg_login_recaptcha_form_cb');

add_action( 'login_form', 'evg_add_google_recaptcha_script', 99 );

add_action( 'woocommerce_login_form', 'evg_add_google_recaptcha_script', 99 );

if(is_login_page()){
	add_action( 'wp_authenticate_user', 'evg_login_recaptcha_process' );
} else {
	add_action( 'wp_authenticate_user', 'evg_login_recaptcha_process_woocomerce' );
}
if(get_option( 'evg_google_recaptcha_setting_group' )) {
	extract( get_option( 'evg_google_recaptcha_setting_group' ) );
	if (isset($evg_google_recaptcha_errors) && $evg_google_recaptcha_errors == 'hide'){
		add_filter( 'login_errors', 'evg_no_wordpress_errors' );
	}

}

