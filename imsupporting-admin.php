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
<hr>
<?php
// IMsupporting oneclick installer.
// If this goes well, we will have an account setup for this user.

function get_current_url() {

  $protocol = 'http';
  if ($_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')) {
    $protocol .= 's';
    $protocol_port = $_SERVER['SERVER_PORT'];
  } else {
    $protocol_port = 80;
  }

  $host = $_SERVER['HTTP_HOST'];
  $port = $_SERVER['SERVER_PORT'];
  $request = $_SERVER['PHP_SELF'];
  $query = isset($_SERVER['argv']) ? substr($_SERVER['argv'][0], strpos($_SERVER['argv'][0], ';') + 1) : '';

  $toret = $protocol . '://' . $host . ($port == $protocol_port ? '' : ':' . $port) . $request . (empty($query) ? '' : '?' . $query);

  return $toret;
}

$clienturl = get_current_url();
if ($clienturl == "") {
        $clienturl = "Unknown";
}


$current_siteid = get_option('ims_siteid');

if ($current_siteid == "000000000") {
        // Response,siteid,username,md5pass,clearpassword  ( Clear password only shown once then its gone foreverrrr )
        $oci_data = file_get_contents('http://console.imsupporting.com/apps/wordpress/onetouchinstall.php?url='.$clienturl.'');

        $oci_datas = explode(",", $oci_data);
        $oci_reply = $oci_datas[0];
        $oci_siteid = $oci_datas[1];
        $oci_username = $oci_datas[2];
        $oci_md5 = $oci_datas[3];
        $oci_password = $oci_datas[4];

        if ($oci_reply == "ok") {
	$adddetails = "1";
                // it worked!
                // lets get the user ready..
        //      echo "Siteid = $oci_siteid . Username = $oci_username . MD5 = $oci_md5 . Password = $oci_password <br>";
        echo "<h1>Congratulations!</h1><h2>A chat account has been created for you automatically!</h2><br>";
echo "<b>(1) To continue, Please click >";?> <input type="submit" value="<?php _e('Save Changes') ?>" /><?php echo"< to save your account and then click Login on the next page</b><br>";
echo "<br>For your records, <br>Your username is:\"$oci_username\"<br>Your password is:\"$oci_password\" <i>(We store this password as a Md5 hash and cannot be retrieved)</i>";
echo "<br>Dont worry though, After clicking save changes, you will be able to OneClick login.<br><br><hr>";

// get_option('ims_password');
// get_option('ims_username');

}else{
	// Uhoh, it failed.. lets let the end user down nicely.. ( and help if possible )

echo "<b>Nooo..Something went wrong. Support have been notified</b>
<br> We are sorry. We couldnt create an account for you. <br>
The error code returned was:<b>\"$oci_reply\"</b><br>
Please contact our support team at <a href=\"http://www.imsupporting.com\" target=\"_BLANK\">IMsupporting.com</a> Alternatively, please sign up manually and enter your siteid in settings below.";
}

}else{
// show a login button, they have a siteid!

// get_option('ims_password');
// get_option('ims_username');
$iusername = get_option('ims_username');
$ipassword = get_option('ims_password');

echo "<h1>Welcome - Thats it! Everythings done. Please login to chat.</h1>";
echo "Your account should already be setup now and you should have a unique SiteID below.<br>";
echo "You shouldnt need to do anything else now. Simply click below to login , click Go Online and start chatting to your visitors";

echo "<br><br><h2>(2) <a href=\"http://console.imsupporting.com/admin.php?method=get&username=$iusername&md5=$ipassword\" target=\"_BLANK\">Click here to login to your console</a></h2>";
echo "Direct link: <a href=\"http://console.imsupporting.com/admin.php?method=get&username=$iusername&md5=$ipassword\">http://console.imsupporting.com/admin.php?method=get&username=$iusername&md5=$ipassword</a>";

echo "<hr>";

}


$optsiteid = get_option('ims_siteid');

if ($optsiteid == "000000000"){
$optsiteid = $oci_siteid;
}

?>

<p>&nbsp;</p>

<?php wp_nonce_field('update-options'); ?>

<table width="950" style="text-align:left;">

  <tr valign="top">
    <td colspan="2" bgcolor="#F2F2F2" scope="row"><strong>These settings below probably dont need to be changed.</strong></td>
    </tr>
  <tr valign="top">
    <td bgcolor="#F2F2F2" scope="row">&nbsp;</td>
    <td bgcolor="#F2F2F2">&nbsp;</td>
  </tr>
  <tr valign="top">
<td width="180" bgcolor="#F2F2F2" scope="row">Your SiteID</td>
<td width="758" bgcolor="#F2F2F2"> <input name="ims_siteid" id="ims_siteid" type="text" value="<?php echo $optsiteid; ?>" /> 
  (ex. &quot;123412345&quot;)<br />
  <span style="font-size:12px;">This should already be filled in for you if the auto-install went ok.</span></td>
</tr>
<tr valign="top">
  <th scope="row">&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr valign="top">
  <td bgcolor="#F2F2F2" scope="row">Use Uploaded Button</td>
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
  <th scope="row">&nbsp;</th>
  <td>&nbsp;</td>
</tr>



</table>
<?php
if ($adddetails == "1") {
echo '<input type="hidden" name="ims_username" value="'.$oci_username.'" />';
echo '<input type="hidden" name="ims_password" value="'.$oci_md5.'" />';
}
?>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="ims_siteid, ims_uploaded, ims_position, ims_leftcss, ims_topcss, ims_username, ims_password" />

<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<?php
}
?>
