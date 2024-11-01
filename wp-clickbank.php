<?php
/*
Plugin Name: WordPress Clickbank Integration
Version: 1.0
Description: A simple wordpress plugin to sell clickbank products from your website.
Author: Noor Alam
Author URI: http://www.wordpress-ecommerce.com/
Plugin URI: http://www.wordpress-ecommerce.com/?p=936
*/
define('WP_CLICKBANK_INTEGRATION_VERSION', "1.0");

include_once('wp_clickbank_includes.php');
add_action('admin_menu', 'wordpress_clickbank_integration_menu');

function wordpress_clickbank_integration_menu() 
{
  add_options_page('WP Clickbank Integration Options', 'WP Clickbank Integration', 'manage_options', 'wp-clickbank-integration', 'wp_clickbank_integration_plugin_options'); 
}

add_shortcode('wp_clickbank_product', 'wp_clickbank_integration_shortcode_handler');

add_shortcode('wp_clickbank_fancy_product', 'wp_clickbank_integration_fancy_shortcode_handler');

function wp_clickbank_integration_shortcode_handler($atts)
{
	extract(shortcode_atts(array(
		'id' => 'no id',
	), $atts));
	return wp_clickbank_integration_shortcode_process($id);
}

function wp_clickbank_integration_shortcode_process($id)
{
	$vendor_id = get_option('wp_clickbank_integration_vendor_id');
	$image_url = get_option('wp_clickbank_integration_image_url');
	 
	$wp_clickbank_output ='
	<form action="http://'.$id.'.'.$vendor_id.'.pay.clickbank.net" method="post"> 
	<input src="'.$image_url.'" type="image" />
	</form>
	';
	return $wp_clickbank_output;
}

function wp_clickbank_integration_fancy_shortcode_handler($atts)
{
	extract(shortcode_atts(array(
		'id' => 'no id',
	    'image' => 'no image',
	), $atts));
	return wp_clickbank_integration_fancy_shortcode_process($id,$image);
}

function wp_clickbank_integration_fancy_shortcode_process($id,$image)
{
	$vendor_id = get_option('wp_clickbank_integration_vendor_id');
	
	$wp_clickbank_fancy_output ='
	<form action="http://'.$id.'.'.$vendor_id.'.pay.clickbank.net" method="post"> 
	<input src="'.$image.'" type="image" />
	</form>
	';
	return $wp_clickbank_fancy_output;	
}

?>