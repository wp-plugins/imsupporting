<?php
// Main Chat Screen ( What this plugin will display to the clients users )
add_action('get_footer','ims_main');

function ims_main()
{
$ims_siteid     = get_option('ims_siteid');
$ims_imageid    = get_option('ims_imageid');
$ims_leftcss    = get_option('ims_leftcss');
$ims_topcss     = get_option('ims_topcss');
$ims_position   = get_option('ims_position');
$ims_uploaded   = get_option('ims_uploaded');
$ims_fixed      = get_option('ims_fixed');
// For the timed popup.
$ims_popup 		= get_option('ims_popup');
$ims_popuptime 	= get_option('ims_popuptime');
$ims_popupimage = get_option('ims_popupimage');
$ims_popupbutton = get_option('ims_popupbutton');
$ims_popupheight = get_option('ims_popupheight');
$ims_popupwidth = get_option('ims_popupwidth');
$ims_popuptop 	= get_option('ims_popuptop');
$ims_popupleft 	= get_option('ims_popupleft');


// Debugger
$imsdebug = "0";
if ($imsdebug == "1") {
echo "Siteid = $ims_siteid , ImageId = $ims_imageid , LeftCSS = $ims_leftcss , TopCSS = $ims_topcss , Position = $ims_position , Uploaded = $ims_uploaded ";
}



// Style
if ($ims_position == "left") {
	// bottom left;
        $ims_style = 'bottom:0px; position:fixed; left:10px; overflow:visible; text-align:right; line-height:0; z-index:100000;';
}
if ($ims_position == "right") {
	// bottom right
        $ims_style = 'bottom:0px; position:fixed; right:10px; overflow:visible; text-align:right; line-height:0; z-index:100000;';
}
if ($ims_position == "top") {
        $ims_style = 'top:0px; left:'.$ims_leftcss.'px; position:fixed; z-index:2000;';
}
if ($ims_position == "bottom") {
        $ims_style = 'bottom:0px; left:'.$ims_leftcss.'px; position:fixed; z-index:2000;';
}

//bottom:0px; position:fixed; right:10px; overflow:visible; text-align:right; line-height:0; z-index:100000" id="IMsupChat"

// So we display the button.. Always set to 1
$imx = "1";

// Display the button..
if ($imx == "1") {

        if ($ims_uploaded == "yes") {
                $ims_imageid = $ims_siteid;
        }
?>
<div style="<?php echo $ims_style; ?>" id="IMsupChat">
<script type="text/javascript">
// JavaScript Document
var ref = encodeURIComponent(document.referrer);
function openSupport(id,name)
{
supporturl = 'http://support1.imsupporting.com/welcome2/index.php?id='+id;
// Open IMsupporting window.
window.open(supporturl ,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=470px,height=400px");
// End.
}
</script>
<SCRIPT LANGUAGE=JAVASCRIPT TYPE="TEXT/JAVASCRIPT">
<!-- Hide script from older browsers - IMsupporting Plugin .28
var docref = "noref";
if (document.referrer != '') {
docref = document.referrer;
}
document.write('<a href="javascript:openSupport(\'<?php echo $ims_siteid; ?>\',\'Welcome\');"><img src="//status.imsupporting.com/status.php?siteid=<?php echo $ims_siteid; ?>&amp;style=<?php echo $ims_imageid; ?>&amp;docref='+docref+'" border="0" alt="live chat software" title="Launch live chat"/></a>');
//-- Stop hiding script -->
</SCRIPT>
<noscript><a href="http://www.imsupporting.com/get-live-chat-now-free-trial/" title="Live Chat Software" target="_blank">Live Chat Software</a></noscript>
</div>
<?php 
}

if ($ims_popup == "yes") {
// Display timed popup code.... (yes|no)	
?>	
<!-- START IMsupporting.com Proactive Invite -->
<script language=javascript type='text/javascript'>

//---------------------------------------------------------------------------------------------

// Set this value to the amount of time to wait before popping up.
// EG: 1000 = 1second, 5000 = 5 seconds, 20000 = 20 seconds.
setTimeout("showsupdiv()",<?php echo $ims_popuptime; ?>000);
// You can edit the popups position in the <div section named "imsupportingchatpopup"
// IE: Edit style="width:325px; height:230px; top:10:px;
// top = the amount of screen pixels the invite should show up away from the top of the screen.
// If you want this to align to the center of your own website, Ensure the code is placed inside your
// containing div.
// Shouldnt need to edit anything below this line.
// ____________________________________________________________________________________________

function hidesupdiv() {
if (document.getElementById) { // DOM3 = IE5, NS6
document.getElementById('imsupportingchatpopup').style.visibility = 'hidden';
}else {
if (document.layers) { // Netscape 4
document.imsupportingchatpopup.visibility = 'hidden';
}else { // IE 4
document.all.imsupportingchatpopup.style.visibility = 'hidden';
}}}
function showsupdiv() {
if (document.getElementById) { // DOM3 = IE5, NS6
document.getElementById('imsupportingchatpopup').style.visibility = 'visible';
}else {
if (document.layers) { // Netscape 4
document.imsupportingchatpopup.visibility = 'visible';
}else { // IE 4
document.all.imsupportingchatpopup.style.visibility = 'visible';
}}}
</script>

<div id="imsupportingchatpopup" style="width:<?php echo $ims_popupwidth; ?>px; height:<?php echo $ims_popupheight; ?>px; position:absolute; left:<?php echo $ims_popupleft; ?>px; top: <?php echo $ims_popuptop; ?>px; z-index:9999999; background:url(<?php echo $ims_popupimage; ?>) no-repeat; visibility:hidden;  text-align: center;"><br>
<script type="text/javascript" src="//support1.imsupporting.com/welcome2/popup.js"></script>
<a href="javascript:openSupport('<?php echo $ims_siteid; ?>','Welcome');"><br>
<span style="text-align: center"></span><br />
<br />
<img src="//status.imsupporting.com/status.php?siteid=<?php echo $ims_siteid; ?>&style=<?php echo $ims_popupbutton; ?>" alt="Live chat" border="0" /></a>
<noscript><a href="http://www.imsupporting.com" title="Live chat">Live Chat</a></noscript>
<a href="javascript:hidesupdiv();"><br />
<img src="//status.imsupporting.com/remotepopups/closewindow.png" width="116" border="0" height="24"></a>
<br>
</div>
<!-- End IMsupporting Chat Popup Code -->
<?php	
}}
?>