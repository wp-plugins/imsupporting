<?php
// Main Chat Screen ( What this plugin will display to the clients users )
add_action('init','ims_main');

function ims_main()
{
$ims_siteid     = get_option('ims_siteid');
$ims_imageid    = get_option('ims_imageid');
$ims_leftcss    = get_option('ims_leftcss');
$ims_topcss     = get_option('ims_topcss');
$ims_position   = get_option('ims_position');
$ims_uploaded   = get_option('ims_uploaded');
$ims_fixed   	= get_option('ims_fixed');


// Debugger
$imsdebug = "0";
if ($imsdebug == "1") {
echo "Siteid = $ims_siteid , ImageId = $ims_imageid , LeftCSS = $ims_leftcss , TopCSS = $ims_topcss , Position = $ims_position , Uploaded = $ims_uploaded ";
}



// Style
if ($ims_position == "left") {
	$ims_style = 'top:'.$ims_topcss.'px; left:0px; position:fixed; z-index:2000;';
}
if ($ims_position == "right") {
	$ims_style = 'top:'.$ims_topcss.'px; right:0px; position:fixed; z-index:2000;';
}
if ($ims_position == "top") {
	$ims_style = 'top:0px; left:'.$ims_leftcss.'px; position:fixed; z-index:2000;';
}
if ($ims_position == "bottom") {
	$ims_style = 'bottom:0px; left:'.$ims_leftcss.'px; position:fixed; z-index:2000;';
}



// So we display the button.. Always set to 1
$imx = "1";

// Display the button..
if ($imx == "1") {
?>

<div id="imsupportingchat" 
style="<?php echo $ims_style;?>">

<!-- START IMsupporting.com Live support software, Live help software code -->
<script type="text/javascript" src="http://support1.imsupporting.com/welcome2/popup.js"></script>
<SCRIPT LANGUAGE=JAVASCRIPT TYPE="TEXT/JAVASCRIPT">
<!-- Hide script from older browsers
var docref = "noref";
if (document.referrer != '') {
docref = document.referrer;
}
document.write('<a href="javascript:openSupport(\'<?php echo $ims_siteid; ?>\',\'Welcome\');"><img src="http://status.imsupporting.com/status.php?siteid=<?php echo $ims_siteid; ?>&amp;style=<?php echo $ims_imageid; ?>&amp;docref='+docref+'" border="0" alt="affordable live chat software" /></a>');
//-- Stop hiding script -->
</SCRIPT>
<noscript><a href="http://www.imsupporting.com" title="Live chat software" target="_blank">Live Chat software</a></noscript>
<!-- End IMsupporting Code -->



</div>


<?php }} ?>
