<?php
$affiliate_enable = get_option('affiliate_enable');
$affiliate_el_class = get_option('affiliate_el_class');
$affiliate_link = get_option('affiliate_link');
$affiliate_item_name = get_option('affiliate_item_name');
$affiliate_item_price = get_option('affiliate_item_price');
?>
<div class="settings_wrap">
	<h2><?php _e('Settings','affiliate'); ?></h2>
	<form method="POST" action="options.php">
		<?php settings_fields( 'affiliate-plugin-settings' ); ?>
		<?php do_settings_sections( 'affiliate-plugin-settings' ); ?>
		<table class="wp-list-table widefat">
			<tr>
				<td><?php _e('Enable Affiliate','affiliate'); ?><td>
				<td>
					<input <?php checked( $affiliate_enable, 1 , true ); ?> type="checkbox" name="affiliate_enable" value="1"/>
				<td>
			</tr>
			<tr>
				<td><?php _e('Extra Class','affiliate'); ?><td>
				<td>
					<input type="text" name="affiliate_el_class" value="<?php echo esc_attr($affiliate_el_class);?>"/>
				<td>
			</tr>			
			<tr>
				<td><?php _e('Item Name','affiliate'); ?><td>
				<td>
					<input type="text" name="affiliate_item_name" value="<?php echo esc_attr($affiliate_item_name);?>"/>
				<td>
			</tr>

			<tr>
				<td><?php _e('Item Price','affiliate'); ?><td>
				<td>
					<input type="text" name="affiliate_item_price" value="<?php echo esc_attr($affiliate_item_price);?>"/>
				<td>
			</tr>
			
			<tr>
				<td><?php _e('Link','affiliate'); ?><td>
				<td>
					<input type="text" name="affiliate_link" value="<?php echo esc_attr($affiliate_link);?>"/>
				<td>
			</tr>
			
			<tr>
				<td colspan="2">
				<?php submit_button(); ?>
				<td>
			</tr>
		</table>
	</form>
</div>