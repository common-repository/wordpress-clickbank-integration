<?php
include_once('admin_includes.php');
function wp_clickbank_integration_plugin_options()
{
	echo '<div class="wrap">';    
  	echo '<div id="poststuff"><div id="post-body">';  
   
  	echo wp_clickbank_integration_admin_submenu_css();
  	
  	wp_clickbank_integration_general_settings_menu();
  	
  	echo '</div></div>';
	echo '</div>';
}

function wp_clickbank_integration_general_settings_menu()
{
	echo '<h2>WordPress Clickbank Integration - General Setting v'.WP_CLICKBANK_INTEGRATION_VERSION.'</h2>';
	
	if(isset($_POST['update']))
	{
		echo '<div id="message" class="updated fade"><p><strong>';
		update_option('wp_clickbank_integration_vendor_id', (string)$_POST['wp_clickbank_integration_vendor_id']);
		update_option('wp_clickbank_integration_image_url', (string)$_POST['wp_clickbank_integration_image_url']);
		echo 'Settings Saved!';
		echo '</strong></p></div>';
	}
    ?>
    <div class="postbox">
	<h3><label for="title">Quick Usage Guide</label></h3>
	<div class="inside">

	<p>1. First enter your clickbank Vendor ID.
    <p>2. Enter the URL of the image that you want to use as a clickbank payment button.</p>
	<p>3. Now enter the shortcode [wp_clickbank_product id=<strong>PRODUCT-ID</strong>] on a page or post to create a buy now button where <strong>PRODUCT-ID</strong> can be 1,2,3 etc.</p>
	<p>4. You can also use different button images for different clickbank products. For that you need to use the shortcode [wp_clickbank_product id=<strong>PRODUCT-ID</strong> image=<strong>IMAGE-URL</strong>] where <strong>IMAGE-URL</strong> can be http://www.your-site.com/wp-content/plugins/wordpress-clickbank-integration/images/button.gif</p>
	<p><strong>Please checkout out <a href="http://www.wordpress-ecommerce.com/" target="_blank">www.wordpress-ecommerce.com</a> for more info.</strong></p>
    </div></div>
    
    	<div class="postbox">
	<h3><label for="title">General Settings</label></h3>
	<div class="inside">
	
	<form method="post" action="">
	
	<table class="form-table">
	
	<tr valign="top">
	<th scope="row">Vendor ID</th>
	<td><input type="text" name="wp_clickbank_integration_vendor_id" value="<?php echo get_option('wp_clickbank_integration_vendor_id'); ?>" size="20" />
	<br /><i>Enter your clickbank vendor ID here</i>
	</td>
	</tr>
	<tr valign="top">
	<th scope="row">Image URL</th>
	<td><input type="text" name="wp_clickbank_integration_image_url" value="<?php echo get_option('wp_clickbank_integration_image_url'); ?>" size="80" />
	<br /><i>Enter the URL of the Image which will be used as a payment button (e.g. http://www.your-site.com/wp-content/plugins/wp-clickbank/images/button_1_small.gif</i>
	</td>
	</tr>
			
	</table>

	<div class="submit">
    <input type="submit" name="update" value="Update" />
    </div>
	</form>
	
	</div></div>
	<?php 
}
?>
