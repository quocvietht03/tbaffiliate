<?php
/**
 * Class to handle all custom post type definitions for Restaurant Reservations
 */

if ( !defined( 'ABSPATH' ) )
	exit;

if ( !class_exists( 'AffiliatePageSetting' ) ) {
	class AffiliatePageSetting {
		public function __construct() {
			// Call when plugin is initialized on every page load
			add_action( 'admin_init', array( $this, 'affiliate_register_plgsettings' ));
			add_action( 'admin_menu', array( $this, 'affiliate_add_page_setting_menu'), 99 );

		}
		
		function affiliate_add_page_setting_menu() {
			add_submenu_page('options-general.php', __('Affiliate','affiliate'), __('Affiliate','affiliate'), 'manage_options', 'settings', array($this,'affiliate_pagesettings'));
		}
		 
		function affiliate_pagesettings(){
			ob_start();
			require_once( AFFILIATE__PLG_DIR.'views/settings.php' );
			echo ob_get_clean();
		}
	
		function affiliate_register_plgsettings() {
			$options = array( 'affiliate_enable','affiliate_el_class','affiliate_link','affiliate_item_name','affiliate_item_price' );
			foreach( $options as $k=>$v ):
				register_setting( 'affiliate-plugin-settings', $v );	
			endforeach;
		}
	}
}
