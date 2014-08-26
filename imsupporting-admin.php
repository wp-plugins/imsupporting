<?php
// Admin page
// 2014 - IMsupporting.com - Coded by Gsmart Lead Operations

if ( is_admin() ){

/* Call the html code */
add_action('admin_menu', 'imsupporting_admin_menu');

function imsupporting_admin_menu() {
add_options_page('IMsupporting Chat', 'IMsupporting Chat', 'administrator',
'imsupportingchat', 'imsupporting_admin_html_page');
}
}



function imsupporting_admin_html_page() {
?>

<div>
<form method="post" action="options.php">

<h2><img src="http://www.imsupporting.com/wp-content/uploads/2014/01/logo-text-glow4.png" alt="IMsupporting OneClick" /></h2>
<h3>You are only a few steps away from chatting to your website visitors!</h3>
<hr>
<p>
  <?php
$optsiteid = get_option('ims_siteid');
$ims_imageid = get_option('ims_imageid');



?>
</p>
<p><a href="http://www.imsupporting.com/live-chat-plugin-word-press-registration/" target="_blank"><img src="http://i.imgur.com/9SNwYDD.png" width="267" height="72" border="0" /></a><br />
  <a href="http://www.imsupporting.com/live-chat-plugin-word-press-registration/" target="_blank">Get your chat account now</a></p>
<p><img src="http://i.imgur.com/DyTvkOO.png" width="267" height="72" /><br />
  <strong>Site/Account ID</strong>:
  <input name="ims_siteid" id="ims_siteid" type="text" value="<?php echo $optsiteid; ?>" />
  <em>( Example: 12343211234 )</em><br />
    <br />
    <span style="color:#900;">Your account ID can be found in your welcome email.</span><br />
    <strong>Need help?</strong> <a href="http://www.imsupporting.com/contact/" target="_blank">Contact Us </a></p>
<p><a href="http://www.imsupporting.com/login/" target="_blank">Login to your live chat account and manage your chats!</a></p>
<p><input type="submit" value="<?php _e('Save Changes') ?>" /></p>
<p>
  <?php wp_nonce_field('update-options'); ?>

</p>
<hr />
<br />
<table width="950" style="text-align:left;">
  <tr valign="top">
  <th colspan="2" scope="row">Extra Settings - Normally no need to modify these</th>
  </tr>
<tr valign="top">
  <td width="180" bgcolor="#F2F2F2" scope="row">Use Uploaded Button</td>
  <td width="758" bgcolor="#F2F2F2"><table width="136">
    <tr>
      <td><label>
        <input type="radio" name="ims_uploaded" value="yes" id="ims_uploaded_0" <?php if (get_option('ims_uploaded') == "yes") { echo 'checked="checked"'; } ?> />
        Yes</label></td>
    </tr>
    <tr>
      <td><label>
        <input name="ims_uploaded" type="radio" id="ims_uploaded_1" value="no" <?php if (get_option('ims_uploaded') == "no") { echo 'checked="checked"'; } ?> />
        No</label></td>
    </tr>
  </table>
    <span style="font-size:12px;">If you have uploaded an image and want to use it, Click yes.<br />
    You can upload an image by clicking &quot;Html code&quot; , Selecting the HTML button and then clicking &quot;Upload images&quot; within the live chat console</span></td>
</tr>
<tr valign="top">
  <th scope="row">&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr valign="top">
  <th scope="row">Button Type Override</th>
  <td><input name="ims_imageid" id="ims_imageid" type="text" value="<?php echo $ims_imageid; ?>" /> 
   <span style="font-size:12px;">A different number equals a different button style</span></td>
</tr>



</table>
<?php
if ($adddetails == "1") {
echo '<input type="hidden" name="ims_username" value="'.$oci_username.'" />';
echo '<input type="hidden" name="ims_password" value="'.$oci_md5.'" />';
}
?>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="ims_siteid, ims_uploaded, ims_position, ims_leftcss, ims_topcss, ims_imageid, ims_username, ims_password" />

<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<?php
}
?>
