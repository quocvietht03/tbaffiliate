<?php
/**
 * Class to handle all custom post type definitions for Restaurant Reservations
 */
if ( !defined( 'ABSPATH' ) )
	exit;

if ( !class_exists( 'AffiliateShortcodes' ) ) {
	class AffiliateShortcodes {
		
		public function __construct() {

			// Call when plugin is initialized on every page load
			add_shortcode( 'affiliate', array( $this, 'affiliate_render') );

		}
		
		function affiliate_render($atts, $content = null) {			
			extract(shortcode_atts(array(), $atts));
			
			$affiliate_el_class = get_option('affiliate_el_class');
			$affiliate_link = get_option('affiliate_link');
			$affiliate_item_name = get_option('affiliate_item_name');
			$affiliate_item_price = get_option('affiliate_item_price');
			ob_start();			
			?>
			<div class="bears-purchaseref-wrap <?php echo $affiliate_el_class ?>">
				<a class="bears-purchase-theme-btn" href="<?php echo esc_url($affiliate_link) ?>" target="_blank" title="<?php echo 'Buy ' . $affiliate_item_name . ' Now!'; ?>">
					<span class="currency-symbol">$</span><?php echo $affiliate_item_price; ?>
					<span class="envato-logo"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M10.9868 20C11.4808 20 11.8814 19.5995 11.8814 19.1055C11.8814 18.6114 11.4808 18.2109 10.9868 18.2109C10.4928 18.2109 10.0923 18.6114 10.0923 19.1055C10.0923 19.5995 10.4928 20 10.9868 20Z"></path>
						<path d="M16.1249 13.0141L11.0852 13.554C10.993 13.5641 10.9453 13.4462 11.0187 13.3891L15.9507 9.54932C16.271 9.2876 16.4749 8.87979 16.3874 8.44308C16.2999 7.77355 15.7468 7.33683 15.0484 7.42433L9.68984 8.2087C9.59531 8.22277 9.54453 8.10167 9.62031 8.04386L14.932 3.98843C15.9804 3.17359 16.0671 1.57203 15.107 0.640798C14.2336 -0.232631 12.8359 -0.203725 11.9625 0.669704L3.40318 9.37432C3.08287 9.72353 2.93756 10.1892 3.02506 10.6845C3.17037 11.4704 3.9563 11.9946 4.74301 11.8493L9.35703 10.9079C9.45703 10.8876 9.51172 11.0212 9.425 11.0759L4.30552 14.3524C3.6649 14.7602 3.37428 15.4875 3.5774 16.2157C3.7813 17.1766 4.74223 17.7297 5.67347 17.4969L13.3258 15.6118C13.4117 15.5907 13.475 15.6907 13.4195 15.7594L12.2242 17.2344C11.9039 17.6422 12.4281 18.1953 12.8648 17.875L16.7953 14.6438C17.4937 14.0618 17.0281 12.9258 16.1257 13.0133L16.1249 13.0141Z"></path>
					</svg></span>
				</a>
			</div>
			<?php
			return ob_get_clean();
		}
	}
}