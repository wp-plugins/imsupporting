<?php
/*
Plugin Name: IMsupporting Live Chat for WordPress
Plugin URI: http://www.IMsupporting.com
Description: U;tra Easy Instant live chat software "OneCLICK" installation of live chat into your website. Live chat software for any wordpress website. Add a live chat widget / live chat plugin to your site with a single click!
Version: 3.8.0.4
Author: IMsupporting
Author URI: http://www.IMsupporting.com
License: GPL
*/


// 2013 IMsupporting - Live chat software for websites.
// Powered by IMsurfing technologies

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'imsupporting_install');

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'imsupporting_remove' );

function imsupporting_install() {
/* Creates new database field */
// Siteid of the user
add_option("ims_siteid", '000000000', '', 'yes');
// Username of the user
add_option("ims_username", 'unknownuser', '', 'yes');
// Md5Pass of the user
add_option("ims_password", 'somerandompasswordthatwouldmakeitfailtologin', '', 'yes');

// Image number they want to use xxon.png etc..
add_option("ims_imageid", '109', '', 'yes'); // 109 by default
// Pixels from the left that the image iwll appear. ( used whne on bottom position )
add_option("ims_leftcss", '0', '', 'yes');
// Pixels from the top when used on right or left hand side.
add_option("ims_topcss", '250', '', 'yes');
// Where will the image be? Left, Right or Bottom
add_option("ims_position", 'right', '', 'yes');
// Is the user using their own uploaded image to the IMS syststem? if so, use imageid of their siteid .. imageid=siteid
add_option("ims_uploaded", 'no', '', 'yes');
//
add_option("ims_fixed", 'yes', '', 'yes'); // CSS fixed..
}

function imsupporting_remove() {
/* Deletes the database field */
delete_option('ims_siteid');
delete_option('ims_imageid');
delete_option('ims_leftcss');
delete_option('ims_topcss');
delete_option('ims_position');
delete_option('ims_uploaded');
delete_option('ims_fixed');
delete_option('ims_username');
delete_option('ims_password');
}



// Add settings link on plugin page ( Imsupportingchat is referenced in the admin page )
function your_plugin_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=imsupportingchat">Settings & Chat Dashboard</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'your_plugin_settings_link' );




// IMsupporting live chat software main display file.
// Powered by IMsurfing networks - IMsurfing.co.uk 2013

// What gets displayed to the clients visitors.
include('imsupporting-screen-display.php');
// Admin page
include('imsupporting-admin.php');
?>
