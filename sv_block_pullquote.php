<?php
	namespace sv100;
	
	/**
	 * @version         4.000
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.000
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_block_pullquote extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Pullquote', 'sv100' ) )
				 ->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				 ->load_settings()
				 ->register_scripts()
				 ->set_section_title( $this->get_module_title() )
				 ->set_section_desc( $this->get_module_desc() )
				 ->set_section_type( 'settings' )
				->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				 ->get_root()
				 ->add_section( $this );
		}
		
		protected function load_settings(): sv_block_pullquote {
			$this->get_setting( 'border_top_color' )
				 ->set_title( __( 'Border top color', 'sv100' ) )
				 ->set_default_value( '0,0,0' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'border_bottom_color' )
				 ->set_title( __( 'Border bottom color', 'sv100' ) )
				 ->set_default_value( '0,0,0' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'margin' )
				 ->set_title( __( 'Margin', 'sv100' ) )
				 ->load_type( 'margin' );
			
			return $this;
		}
		
		protected function register_scripts(): sv_block_pullquote {
				// Register Styles
				$this->get_script( 'default' )
					->set_is_gutenberg()
					 ->set_path( 'lib/frontend/css/default.css' );
				
				$this->get_script( 'inline_config' )
					 ->set_path( 'lib/frontend/css/config.php' )
					->set_is_gutenberg()
					 ->set_inline( true );
			
			add_action('wp', array($this,'enqueue_scripts'));
			add_action('admin_init', array($this,'enqueue_scripts'));
			
			return $this;
		}
		public function enqueue_scripts(): sv_block_pullquote {
			if( ! is_admin() ) {
				$post = get_post();
				
				if ( !has_block( 'pullquote', $post )) {
					return $this;
				}
			}
			
			$this->get_script( 'default' )->set_is_enqueued();
			$this->get_script( 'inline_config' )->set_is_enqueued();
			
			return $this;
		}
	}