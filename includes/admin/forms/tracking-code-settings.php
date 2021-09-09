<?php 
if( isset($_POST['trackng-code-settings-updated']) ){
	if( !empty($_POST['tracking_code_options']) ){
		update_option( 'tracking_code_options', $_POST['tracking_code_options'] );
		$settings_updated = true;
	}
}
$tracking_code_options = stripslashes_deep(get_option('tracking_code_options'));
?>
 <div class="wrap">
	<div id="icon-options-general" class="icon32 icon32-posts-page"><br /></div>  
    <form method="post" action="">
        <h2><?php _e( 'Tracking Code', 'trackingcode' ); ?></h2>
        
        <?php if(isset($settings_updated) && $settings_updated == true) : ?>
       		<div class="updated">
        		<p><strong><?php _e( 'Saved Successfully.', 'trackingcode' ); ?></strong></p>
        	</div>
        <?php endif; ?>
            
        <p><?php _e( 'Add web tracking code to html head or footer section.', 'trackingcode' ); ?></p>
       
        <p>
            <h3><?php _e( 'Add Tracking Code to HTML head', 'trackingcode' ); ?></h3>
            <textarea rows="15" style="width:90%" name="tracking_code_options[tracking_head][code]"><?php echo @$tracking_code_options['tracking_head']['code'] ?></textarea>
            <br />
            <input type="checkbox" name="tracking_code_options[tracking_head][disable]" id="tracking_head_disable" <?php checked( @$tracking_code_options['tracking_head']['disable'], 'on' ); ?>  />
            <label for="tracking_head_disable"><?php _e( 'Disable this head tracking code', 'trackingcode' ); ?></label>
      	</p>

        <p><br /></p>

        <p>
           	<h3><?php _e( 'Add Tracking Code to Footer', 'trackingcode' ); ?></h3>
            <textarea rows="15" style="width:90%" name="tracking_code_options[tracking_footer][code]"><?php echo @$tracking_code_options['tracking_footer']['code'] ?></textarea>
            <br />
            <input type="checkbox" name="tracking_code_options[tracking_footer][disable]" id="tracking_footer_disable"  <?php checked( @$tracking_code_options['tracking_footer']['disable'], 'on' ); ?> />
            <label for="tracking_footer_disable"><?php _e( 'Disable this footer tracking code', 'trackingcode' ); ?></label>
       	</p>
                
        <?php wp_nonce_field( 'tracking_code' ); ?>

       	<p><input class="button-primary" type="submit" name="trackng-code-settings-updated" value="<?php _e( 'Save Changes', 'trackingcode');?>"/></p>
	</form>             
</div>