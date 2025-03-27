<?php
/*
 * Plugin Name: TB Affiliate
 * Plugin URI: http://Bearsthemes.com
 * Description: Affiliate.
 * Author: Bearsthemes
 * Version: 1.0
 * Author URI: http://Bearsthemes.com
 * License: GPL2+
 * Text Domain: affiliate
 */

define( 'AFFILIATE__PLG_URL', plugin_dir_url( __FILE__ ) );
define( 'AFFILIATE__PLG_DIR', plugin_dir_path( __FILE__ ) );

class TBAffiliate {
	public function __construct() {
		require_once( AFFILIATE__PLG_DIR . 'includes/AffiliatePageSetting.class.php' );
		require_once( AFFILIATE__PLG_DIR . 'includes/AffiliateShortcodes.class.php' );
		// Enable the use of shortcodes in text widgets.
		add_filter( 'widget_text', 'do_shortcode' );
		add_action( 'wp_enqueue_scripts', array( $this, 'affiliate_register_script' ) );
		$this->settings = new AffiliatePageSetting();
		$this->shortcodes = new AffiliateShortcodes();
		$affiliate_enable = get_option('affiliate_enable');
		if($affiliate_enable == 1 || $affiliate_enable == '1' ):
			add_action('wp_footer',array( $this,'affiliate_doshortcode') );
		endif;
		register_activation_hook( __FILE__, array( $this, 'affiliate_install' ) );
		register_deactivation_hook( __FILE__, array( $this, 'affiliate_uninstall' ) );
	}
			
	public function affiliate_register_script() {
		wp_register_style('affiliate', AFFILIATE__PLG_URL . 'css/affiliate.css' );
		wp_enqueue_style('affiliate');
			
	}
	
	function affiliate_doshortcode(){
		echo do_shortcode('[affiliate]');
	}
	
	function affiliate_install(){
		
	}
	
	
	function affiliate_uninstall(){
		
	}
}
$TBAffiliate = new TBAffiliate();