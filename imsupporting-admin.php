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

<h2><img src="http://www.imsupporting.com/wp-content/uploads/2014/09/live-chat-software-293x951.png" alt="IMsupporting Live Chat" /></h2>
<hr>
<p>
  <?php
$optsiteid = get_option('ims_siteid'); // 000000000 = not active yet
$ims_imageid = get_option('ims_imageid');



?>
</p>
<p>
<?php
if ($optsiteid == "000000000") {
	
	echo '
<br /><a href="http://www.imsupporting.com/live-chat-plugin-word-press-registration/" target="_BLANK" style="-moz-box-shadow:inset 0px 1px 0px 0px #9acc85;
	-webkit-box-shadow:inset 0px 1px 0px 0px #9acc85;
	box-shadow:inset 0px 1px 0px 0px #9acc85;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #74ad5a), color-stop(1, #68a54b));
	background:-moz-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-webkit-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-o-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-ms-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:linear-gradient(to bottom, #74ad5a 5%, #68a54b 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#74ad5a\', endColorstr=\'#68a54b\',GradientType=0);
	background-color:#74ad5a;
	border:1px solid #3b6e22;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:arial;
	font-size:13px;
	font-weight:bold;
	padding:20px 30px;
	text-decoration:none;">Step1 : Get An Account Now</a> ';
}
?>
    
  
<a href="http://www.imsupporting.com/login/" target="_blank" style="-moz-box-shadow:inset 0px 1px 0px 0px #91b8b3;
	-webkit-box-shadow:inset 0px 1px 0px 0px #91b8b3;
	box-shadow:inset 0px 1px 0px 0px #91b8b3;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #768d87), color-stop(1, #6c7c7c));
	background:-moz-linear-gradient(top, #768d87 5%, #6c7c7c 100%);
	background:-webkit-linear-gradient(top, #768d87 5%, #6c7c7c 100%);
	background:-o-linear-gradient(top, #768d87 5%, #6c7c7c 100%);
	background:-ms-linear-gradient(top, #768d87 5%, #6c7c7c 100%);
	background:linear-gradient(to bottom, #768d87 5%, #6c7c7c 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#768d87', endColorstr='#6c7c7c',GradientType=0);
	background-color:#768d87;
	border:1px solid #566963;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:arial;
	font-size:13px;
	font-weight:bold;
	padding:20px 30px;
	text-decoration:none;">Login to your Chat Console Here</a></p>
<p>&nbsp;</p>
<p><strong>Enter Your Site/Account ID Here<br />
  </strong>
  <input style="border:1px solid #36C; width:300px; height:40px; font-size:20px;" name="ims_siteid" id="ims_siteid" type="text" value="<?php echo $optsiteid; ?>" />
  <em><br />
    </em><span style="color:#900;"><em>Your account ID can be found in your welcome email or in the Statistics and Info panel within live chat</em></span><br />
</p>
<p><input type="submit" value="<?php _e('Save Changes') ?>" /></p>
<p>&nbsp;</p>
<hr />
<p>
  <?php wp_nonce_field('update-options'); ?>
</p>
<p><strong>Have a Question? Need some Help?</strong><br />
  Contact us Below:<br /><!-- START IMsupporting.com Live support software, Live help software code -->
<script type="text/javascript" src="http://support1.imsupporting.com/welcome2/popup.js"></script>
<SCRIPT LANGUAGE=JAVASCRIPT TYPE="TEXT/JAVASCRIPT">
<!-- Hide script from older browsers
var docref = "noref";
if (document.referrer != '') {
docref = document.referrer;
}
document.write('<a href="javascript:openSupport(\'1234567890\',\'Welcome\');"><img src="http://status.imsupporting.com/status.php?siteid=1234567890&amp;style=40&amp;docref='+docref+'" border="0" alt="live chat software" title="Launch live chat"/></a>');
//-- Stop hiding script -->
</SCRIPT>
<noscript><a href="http://www.imsupporting.com" title="Live chat software" target="_blank">Contact Imsupporting Here</a></noscript>
<!-- End IMsupporting Code -->
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
