<?php
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-pullquote__citation' : '.wp-block-pullquote cite',
		array_merge(
			$module->get_setting('cite_font')->get_css_data('font-family'),
			$module->get_setting('cite_font_size')->get_css_data('font-size','','px'),
			$module->get_setting('cite_line_height')->get_css_data('line-height'),
			$module->get_setting('cite_text_color')->get_css_data(),
			$module->get_setting('cite_padding')->get_css_data('padding'),
			$module->get_setting('cite_margin')->get_css_data(),
			$module->get_setting('cite_border')->get_css_data()
		)
	);