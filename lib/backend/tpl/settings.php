<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'border_top_color' )->form();
			echo $module->get_setting( 'border_bottom_color' )->form();
			echo $module->get_setting( 'margin' )->form();
		?>
    </div>
<?php } ?>