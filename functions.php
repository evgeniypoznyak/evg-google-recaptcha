<?php
function evg_google_recaptcha_menu() {

	add_options_page( 'Login With Google reCaptcha',
	                  'Login With Google reCaptcha',
	                  'administrator',
	                  'evg-google-recaptcha-for-login-page',
	                  'evg_google_recaptcha_settings_page_cb' );

}

function evg_google_recaptcha_settings_page_cb() {
	require_once( plugin_dir_path( __FILE__ ) . 'recaptcha_form.php' );
}

function evg_google_recaptcha_settings() {

	register_setting( 'evg_google_recaptcha_settings_id',
	                  'evg_google_recaptcha_setting_group',
	                  'evg_google_recaptcha_setting_group_cb' );

	add_settings_section( 'evg_google_recaptcha_section_id',
	                      'Google reCaptcha Settings',
	                      '',
	                      'evg-google-recaptcha-for-login-page' );

	add_settings_field( 'evg_google_recaptcha_site_key',
	                    'Site Key (Public)',
	                    'evg_google_recaptcha_site_key_cb',
	                    'evg-google-recaptcha-for-login-page',
	                    'evg_google_recaptcha_section_id',
	                    [ 'label_for' => 'evg_google_recaptcha_site_key' ] );

	add_settings_field( 'evg_google_recaptcha_secret_key',
	                    'Secret Key (Private)',
	                    'evg_google_recaptcha_secret_key_cb',
	                    'evg-google-recaptcha-for-login-page',
	                    'evg_google_recaptcha_section_id',
	                    [ 'label_for' => 'evg_google_recaptcha_secret_key' ] );

	add_settings_field( 'evg_google_recaptcha_theme',
	                    'Theme',
	                    'evg_google_recaptcha_theme_cb',
	                    'evg-google-recaptcha-for-login-page',
	                    'evg_google_recaptcha_section_id',
	                    [ 'label_for' => 'evg_google_recaptcha_theme' ] );

	add_settings_field( 'evg_google_recaptcha_size',
	                    'Size',
	                    'evg_google_recaptcha_size_cb',
	                    'evg-google-recaptcha-for-login-page',
	                    'evg_google_recaptcha_section_id',
	                    [ 'label_for' => 'evg_google_recaptcha_size' ] );

	add_settings_field( 'evg_google_recaptcha_errors',
	                    'Hide Errors?',
	                    'evg_google_recaptcha_errors_cb',
	                    'evg-google-recaptcha-for-login-page',
	                    'evg_google_recaptcha_section_id',
	                    [ 'label_for' => 'evg_google_recaptcha_errors' ] );


}


function evg_google_recaptcha_site_key_cb() {
	$options = get_option( 'evg_google_recaptcha_setting_group' );
	?><label for="evg_google_recaptcha_site_key"></label>
    <input type="text" name="evg_google_recaptcha_setting_group[evg_google_recaptcha_site_key]"
           id="evg_google_recaptcha_site_key"
           value="<?php echo esc_attr( $options[ 'evg_google_recaptcha_site_key' ] ) ?>"
           class="regular-text">
	<?php
}


function evg_google_recaptcha_secret_key_cb() {
	$options = get_option( 'evg_google_recaptcha_setting_group' );
	?><label for="evg_google_recaptcha_secret_key"></label>
    <input type="text" name="evg_google_recaptcha_setting_group[evg_google_recaptcha_secret_key]"
           id="evg_google_recaptcha_secret_key"
           value="<?php echo esc_attr( $options[ 'evg_google_recaptcha_secret_key' ] ) ?>"
           class="regular-text">
	<?php
}

function evg_google_recaptcha_theme_cb() {
	if(get_option( 'evg_google_recaptcha_setting_group' )) {
		$options = get_option( 'evg_google_recaptcha_setting_group' );
		extract( $options );
	}

	// $evg_google_recaptcha_theme
	?><label for="evg_google_recaptcha_theme"></label>
    <select name="evg_google_recaptcha_setting_group[evg_google_recaptcha_theme]" id="evg_google_recaptcha_theme">
        <option value="light"<?php
		if ( isset( $evg_google_recaptcha_theme ) && $evg_google_recaptcha_theme == 'light' ) {
			echo 'selected="selected"';
		}
		?>>Light
        </option>
        <option value="dark" <?php
		if ( isset( $evg_google_recaptcha_theme ) && $evg_google_recaptcha_theme == 'dark' ) {
			echo 'selected="selected"';
		}
		?>>Dark
        </option>
    </select>
	<?php
}

function evg_google_recaptcha_errors_cb() {
	if(get_option( 'evg_google_recaptcha_setting_group' )) {
		$options = get_option( 'evg_google_recaptcha_setting_group' );
		extract( $options );
	}
	// $evg_google_recaptcha_theme
	?><label for="evg_google_recaptcha_errors"></label>
    <select name="evg_google_recaptcha_setting_group[evg_google_recaptcha_errors]" id="evg_google_recaptcha_errors">
        <option value="show"<?php
		if ( isset( $evg_google_recaptcha_errors ) && $evg_google_recaptcha_errors == 'show' ) {
			echo 'selected="selected"';
		}
		?>>Show
        </option>
        <option value="hide" <?php
		if ( isset( $evg_google_recaptcha_errors ) && $evg_google_recaptcha_errors == 'hide' ) {
			echo 'selected="selected"';
		}
		?>>Hide
        </option>
    </select>
	<?php
}

function evg_google_recaptcha_size_cb() {
	if(get_option( 'evg_google_recaptcha_setting_group' )) {
		$options = get_option( 'evg_google_recaptcha_setting_group' );
		extract( $options );
	}
	// $evg_google_recaptcha_theme
	?><label for="evg_google_recaptcha_size"></label>
    <select name="evg_google_recaptcha_setting_group[evg_google_recaptcha_size]" id="evg_google_recaptcha_size">
        <option value="normal" <?php
		if ( isset( $evg_google_recaptcha_size ) && $evg_google_recaptcha_size == 'normal' ) {
			echo 'selected="selected"';
		}
		?>>Normal
        </option>
        <option value="compact"<?php
	    if ( isset( $evg_google_recaptcha_size ) && $evg_google_recaptcha_size == 'compact' ) {
		    echo 'selected="selected"';
	    }
	    ?>>Compact
        </option>
    </select>
	<?php
}



function evg_google_recaptcha_setting_group_cb( $data ) {
	return $data;
}

function evg_login_recaptcha_form_cb() {
	if(get_option( 'evg_google_recaptcha_setting_group' )) {
		$options = get_option( 'evg_google_recaptcha_setting_group' );
		extract( $options );
	}
	// $evg_google_recaptcha_secret_key
	// $evg_google_recaptcha_site_key
	// $evg_google_recaptcha_theme

	if ( ( isset( $evg_google_recaptcha_secret_key ) ) && ( isset( $evg_google_recaptcha_site_key ) ) ) {
		if ( strlen( $evg_google_recaptcha_secret_key ) > 5 && strlen( $evg_google_recaptcha_site_key ) > 5 ) {

			$captchaForm = '<style>.login form{padding: 26px 9px 46px;}</style>' .
                           '<div class="x_recaptcha_wrapper">' .
			               '<p><div class="g-recaptcha" data-sitekey="' . htmlentities( trim( $evg_google_recaptcha_site_key ) ) . '" data-size="'.$evg_google_recaptcha_size.'" data-theme="' . $evg_google_recaptcha_theme . '">' .
			               '</div></p></div>';

			echo $captchaForm;


		}
	}

}

function evg_add_google_recaptcha_script() {

	echo '<script src="https://www.google.com/recaptcha/api.js"></script>';

}

function evg_login_recaptcha_process($data) {


	if (strlen($_POST['g-recaptcha-response']) < 1 && isset($_POST['wp-submit'])){
		global $error;
		$error = 'Warning! reCaptcha verification failed';
		$data->data->user_pass = '';
		return $data;

    }


	if ( empty( $_POST ) ) {
		return true;
	}
	if(get_option( 'evg_google_recaptcha_setting_group' )) {
		$options = get_option( 'evg_google_recaptcha_setting_group' );
		extract( $options );
	}
	// $evg_google_recaptcha_secret_key
	// $evg_google_recaptcha_site_key
	// $evg_google_recaptcha_theme
	if ( ( isset( $evg_google_recaptcha_secret_key ) ) && ( isset( $evg_google_recaptcha_site_key ) ) ) {
		if ( strlen( $evg_google_recaptcha_secret_key ) > 5 && strlen( $evg_google_recaptcha_site_key ) > 5 ) {

			$parameters = array(
				'secret'   => trim( $evg_google_recaptcha_secret_key ),
				'response' => evgReCaptchaResponse(),
				'remoteip' => evgGetServerAddressForReCaptcha()
			);
			$url        = 'https://www.google.com/recaptcha/api/siteverify?' . http_build_query( $parameters );

			$response = evgReCaptchaCurl( $url );

			$json_response = json_decode( $response, true );

			if ( isset( $json_response[ 'success' ] ) && true !== $json_response[ 'success' ] ) {
				global $error;
				$error = 'Warning! reCaptcha verification failed';
				$data->data->user_pass = '';
				return $data;
			}
			return $data;
		}
	}

}

function evg_login_recaptcha_process_woocomerce( $data ) {

	if ( empty( $_POST ) ) {
		return true;
	}
	if(get_option( 'evg_google_recaptcha_setting_group' )) {
		$options = get_option( 'evg_google_recaptcha_setting_group' );
		extract( $options );
	}
	// $evg_google_recaptcha_secret_key
	// $evg_google_recaptcha_site_key
	// $evg_google_recaptcha_theme
	if ( ( isset( $evg_google_recaptcha_secret_key ) ) && ( isset( $evg_google_recaptcha_site_key ) ) ) {
		if ( strlen( $evg_google_recaptcha_secret_key ) > 5 && strlen( $evg_google_recaptcha_site_key ) > 5 ) {

			$parameters = array(
				'secret'   => trim( $evg_google_recaptcha_secret_key ),
				'response' => evgReCaptchaResponse(),
				'remoteip' => evgGetServerAddressForReCaptcha()
			);
			$url        = 'https://www.google.com/recaptcha/api/siteverify?' . http_build_query( $parameters );

			$response = evgReCaptchaCurl( $url );

			$json_response = json_decode( $response, true );

			if ( isset( $json_response[ 'success' ] ) && true !== $json_response[ 'success' ] ) {
				throw new Exception( '<strong>' . __( 'Error', 'woocommerce' ) . ':</strong> ' . __( 'reCaptcha verification failed.', 'woocommerce' ) );

				return false;
			}

		}
	}


	return $data;
}


function is_login_page() {
	return in_array( $GLOBALS[ 'pagenow' ], array( 'wp-login.php', 'wp-register.php' ) );
}


function evgReCaptchaCurl( $url ) {
	$response = wp_remote_get( $url );
	return  $response['body'] ;
}


function evgReCaptchaResponse() {
	if ( isset( $_POST[ 'g-recaptcha-response' ] ) ) {
		return $_POST[ 'g-recaptcha-response' ];
	}

	return '';
}



function evgGetServerAddressForReCaptcha() {
	return $_SERVER[ 'REMOTE_ADDR' ];
}


function evg_no_wordpress_errors($error){

	$pos1 = strpos($error, 'username');

	$pos2 = strpos($error, 'reCaptcha');

	if(is_int($pos1) && is_int($pos2) ) {
		$error = '<strong>Error: </strong> Something is wrong!';
		$error .= '<br><strong>Error: </strong>reCaptcha verification failed';
		return $error;
    }
	if(is_int($pos1)) {
		$error = '<strong>Error: </strong> Something is wrong!';
		return $error;
	}
	if(is_int($pos2)) {
		$error = '<strong>Error: </strong>reCaptcha verification failed';
		return $error;
	}
	return '<strong>Error: </strong> Something is wrong!';
}
