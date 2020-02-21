<?php
	// ##### SETTINGS #####
	
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		if ( $setting->get_type() !== false ) {
			${ $setting->get_ID() } = $setting->run_type()->get_data();
			
			// If setting is color, it gets the value in the RGB-Format
			if ( $setting->get_type() === 'setting_color' ) {
				${ $setting->get_ID() } = $setting->get_rgb( ${ $setting->get_ID() } );
			}
		}
	}
	?>

.sv100_sv_content_wrapper > article .wp-block-pullquote, .wp-block-pullquote{
	border-top-color:rgba(<?php echo $border_top_color; ?>);
	border-bottom-color:rgba(<?php echo $border_bottom_color; ?>);
	margin:<?php echo (isset($margin['top']) && intval($margin['top']) > 0) ? $margin['top'].'px' : '20px'; ?> <?php echo (isset($margin['right']) && intval($margin['right']) > 0) ? $margin['right'].'px' : 'auto'; ?> <?php echo ($margin['bottom'] && intval($margin['bottom']) > 0) ? $margin['bottom'].'px' : '20px' ?> <?php echo ($margin['left'] && intval($margin['left']) > 0) ? $margin['left'].'px' : 'auto'; ?>;
}