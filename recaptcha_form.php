<div class="wrap">
    <h2></h2>
    <p></p>
    <form action="options.php" method="post">
		<?php
		settings_fields( 'evg_google_recaptcha_settings_id' );
		do_settings_sections( 'evg-google-recaptcha-for-login-page' );
		submit_button();
		?>
    </form>
</div>
