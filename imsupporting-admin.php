<?php
// Admin page

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
<h2>&nbsp;</h2>
<h2>IMsupporting Live Chat Options &amp; Installation</h2>
<div style="border:1px solid #FC0; background:#FFF5D5">
  <p style="color:#C00; font-size:18px;"><strong>Note:</strong> You will need a live chat account to get a &quot;SiteID&quot; , Simply register for <strong>FREE</strong> at <a href="http://www.IMsupporting.com" title="Live chat" target="_blank">IMsupporting.com</a> and login.<br />
    Your live chat &quot;SiteID&quot; will be visible in the Top Right hand corner of the chat console.
  </p></div>
<p><a href="http://www.imsupporting.com/register_now.php" title="Register free" target="_blank">Get a live chat account FREE</a> or <a href="http://www.imsupporting.com/live-chat-login.php" title="Login to chat" target="_blank">Login and chat</a></p>
<p><img src="http://i.imgur.com/SCxzBNd.png" alt="Free for 3 months" width="363" height="144" /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<iframe src="http://www.paywithatweet.com/dlbutton02.php?id=bf8fb73afcd2bd88b3729e15f8eb8e9e" name="paytweet_button2" width = "240px" height = "24px" scrolling="No" frameborder="no" id="paytweet_button2"></iframe></p>
<div style="border:1px solid #A3FEA0; background:#E0FFD7"><form id="logintochat" name="logintochat" method="post" action="http://console.imsupporting.com/admin.php" target="_blank">
<strong>Login to your live chat account</strong> ( <em>And chat to your visitors when they click a button from below</em> )<br />
  <input name="username" type="text" id="username" value="Username" maxlength="50" />
  <label for="password"></label>
  <input name="password" type="password" id="password" value="password" maxlength="50" />
  <input type="submit" name="submite" id="submite" value="Login to chat" />
</form>
</div>
<br />
<br />

<div style="border:1px solid #CED1FF; background:#E6EBFF">
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table width="950" style="text-align:left;">

<tr valign="top">
<th width="180" bgcolor="#F2F2F2" scope="row">Your SiteID</th>
<td width="758" bgcolor="#F2F2F2"> <input name="ims_siteid" id="ims_siteid" type="text" value="<?php echo get_option('ims_siteid'); ?>" /> 
  (ex. &quot;123412345&quot;)<br />
  <span style="font-size:12px;">This can be found in the Top Right of your chat console.</span></td>
</tr>
<tr valign="top">
  <th bgcolor="#F2F2F2" scope="row">Button Position</th>
  <td bgcolor="#F2F2F2"><label for="ims_position"></label>
    <select name="ims_position" id="ims_position">
    <?php 
	
	switch (get_option('ims_position')) {
    case left:
	$imschoosepos = '    
      <option value="left" selected="selected">Left</option>
      <option value="right">Right</option>
      <option value="bottom">Bottom</option>
      <option value="top">Top</option>';
        break;
    case right:
	$imschoosepos = '    
      <option value="left">Left</option>
      <option value="right" selected="selected">Right</option>
      <option value="bottom">Bottom</option>
      <option value="top">Top</option>';
        break;
    case top:
	$imschoosepos = '    
      <option value="left">Left</option>
      <option value="right">Right</option>
      <option value="bottom">Bottom</option>
      <option value="top" selected="selected">Top</option>';
        break;
	case bottom:
	$imschoosepos = '    
      <option value="left">Left</option>
      <option value="right">Right</option>
      <option value="bottom" selected="selected">Bottom</option>
      <option value="top">Top</option>';
        break;
    default:
	$imschoosepos = '    
      <option value="left">Left</option>
      <option value="right" selected="selected">Right</option>
      <option value="bottom">Bottom</option>
      <option value="top">Top</option>';
}
	
echo $imschoosepos;
	?>
    

    </select></td>
</tr>
<tr valign="top">
  <th scope="row">&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr valign="top">
  <th colspan="2" scope="row"><input type="submit" value="<?php _e('Save Changes') ?>" /></th>
  </tr>
<tr valign="top">
  <th scope="row">&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr valign="top">
  <th scope="row">&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr valign="top">
  <th colspan="2" scope="row"><h2>Advanced Button Options</h2></th>
  </tr>
<tr valign="top">
  <th scope="row">&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr valign="top">
  <th height="52" bgcolor="#F2F2F2" scope="row">LeftCSS
    </th>
  <td bgcolor="#F2F2F2"><label for="ims_leftcss"></label>
    <input type="text" style="width:100px;" name="ims_leftcss" id="ims_leftcss" value="<?php echo get_option('ims_leftcss'); ?>" />
    Pixels<br />
    <span style="font-size:12px;">Only used when the button is on Top or Right positions.</span></td>
</tr>
<tr valign="top">
  <th height="49" bgcolor="#F2F2F2" scope="row">TopCSS</th>
  <td bgcolor="#F2F2F2"><input style="width:100px;" type="text" name="ims_topcss" id="ims_topcss" value="<?php echo get_option('ims_topcss'); ?>" />
    Pixels<br />
    <span style="font-size:12px;">Only used when the button is on Left or Right positions.</span></td>
</tr>
<tr valign="top">
  <th scope="row">&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr valign="top">
  <th bgcolor="#F2F2F2" scope="row">Use Uploaded Button</th>
  <td bgcolor="#F2F2F2"><table width="136">
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
  <th bgcolor="#F2F2F2" scope="row">Pre-Designed Buttons</th>
  <td bgcolor="#F2F2F2">&nbsp;</td>
</tr>
<tr valign="top">
  <th scope="row">&nbsp;</th>
  <td><table width="743">
    <tr>
      <td width="421"><label>
        <input name="ims_imageid" type="radio" id="ims_imageid_0" value="48" <?php if (get_option('ims_imageid') == "48") { echo 'checked="checked"'; } ?> />
        <img src="http://status.imsupporting.com/48on.png" /></label></td>
      <td width="310"><label><input type="radio" name="ims_imageid" value="45" id="ims_imageid_2" <?php if (get_option('ims_imageid') == "45") { echo 'checked="checked"'; } ?> />
        <img src="http://status.imsupporting.com/45on.png" alt="" /></label></td>
      </tr>
    <tr>
      <td><label>
        <input type="radio" name="ims_imageid" value="107" id="ims_imageid_1" <?php if (get_option('ims_imageid') == "107") { echo 'checked="checked"'; } ?>/>
        <img src="http://status.imsupporting.com/107on.png" alt="" /></label></td>
      <td><label>
        <input type="radio" name="ims_imageid" value="109" id="ims_imageid_10" <?php if (get_option('ims_imageid') == "109") { echo 'checked="checked"'; } ?>/>
        <img src="http://status.imsupporting.com/109on.png" alt="" /></label></td>
      </tr>
    <tr>
      <td><label><input type="radio" name="ims_imageid" value="105" id="ims_imageid_3" <?php if (get_option('ims_imageid') == "105") { echo 'checked="checked"'; } ?>/>
        <img src="http://status.imsupporting.com/105on.png" alt="" /></label></td>
      <td><label><input type="radio" name="ims_imageid" value="46" id="ims_imageid_4" <?php if (get_option('ims_imageid') == "46") { echo 'checked="checked"'; } ?>/>
        <img src="http://status.imsupporting.com/46on.png" alt="" /></label></td>
      </tr>
    <tr>
      <td><label><input type="radio" name="ims_imageid" value="16" id="ims_imageid_5" <?php if (get_option('ims_imageid') == "16") { echo 'checked="checked"'; } ?> />
        <img src="http://status.imsupporting.com/16on.png" alt="" /></label></td>
      <td><label><input type="radio" name="ims_imageid" value="33" id="ims_imageid_6" <?php if (get_option('ims_imageid') == "33") { echo 'checked="checked"'; } ?>/>
        <img src="http://status.imsupporting.com/33on.png" alt="" /></label></td>
      </tr>
    <tr>
      <td><label><input type="radio" name="ims_imageid" value="36" id="ims_imageid_7" <?php if (get_option('ims_imageid') == "36") { echo 'checked="checked"'; } ?> />
        <img src="http://status.imsupporting.com/36on.png" alt="" /></label></td>
      <td><label><input type="radio" name="ims_imageid" value="37" id="ims_imageid_8" <?php if (get_option('ims_imageid') == "37") { echo 'checked="checked"'; } ?>/>
        <img src="http://status.imsupporting.com/37on.png" alt="" /></label></td>
      </tr>
    <tr>
      <td><label><input type="radio" name="ims_imageid" value="103" id="ims_imageid_9" <?php if (get_option('ims_imageid') == "103") { echo 'checked="checked"'; } ?> />
        <img src="http://status.imsupporting.com/103on.png" alt="" /></label></td>
      <td>&nbsp;</td>
      </tr>
  </table></td>
</tr>
<tr valign="top">
  <th scope="row">&nbsp;</th>
  <td>&nbsp;</td>
</tr>



</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="ims_siteid, ims_uploaded, ims_position, ims_leftcss, ims_topcss, ims_imageid" />

<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div></div>
<?php
}
?>
