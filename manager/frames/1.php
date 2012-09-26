<?php
if (IN_MANAGER_MODE!="true") die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the MODx Content Manager instead of accessing this file directly.");
$_SESSION['browser'] = (strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!==false) ? 'ie' : 'other';
$mxla = $modx_lang_attribute ? $modx_lang_attribute : 'en';
if($_SESSION['mgrForgetPassword']) $action = '28';
else                               $action = '2';
$modx->invokeEvent('OnManagerPreFrameLoader',array('action'=>$action));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html <?php echo ($modx_textdir ? 'dir="rtl" lang="' : 'lang="').$mxla.'" xml:lang="'.$mxla.'"'; ?>>
<head>
	<title><?php echo $site_name?> - (MODX CMS Manager)</title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $modx_manager_charset?>" />
</head>
<frameset rows="70,*" border="0">
	<frame name="mainMenu" src="index.php?a=1&amp;f=menu" scrolling="no" frameborder="0" noresize="noresize">
<?php if (!$modx_textdir) {
	// Left-to-Right reading (sidebar on left)
	?>
	<frameset cols="260,*" border="1" frameborder="3" framespacing="3" bordercolor="#f7f7f7">
		<frame name="tree" src="index.php?a=1&amp;f=tree" scrolling="no" frameborder="0" onresize="top.tree.resizeTree();">
		<frame name="main" src="index.php?a=<?php echo $action;?>"  scrolling="auto" frameborder="0" onload="if (top.mainMenu.stopWork()) top.mainMenu.stopWork();">
<?php } else {
	// Right-to-Left reading (sidebar on right)
	?>
    	<frameset cols="*,260" border="1" frameborder="3" framespacing="3" bordercolor="#f7f7f7">
		<frame name="main" src="index.php?a=<?php echo $action;?>" scrolling="auto" frameborder="0" onload="if (top.mainMenu.stopWork()) top.mainMenu.stopWork();">
		<frame name="tree" src="index.php?a=1&amp;f=tree" scrolling="no" frameborder="0" onresize="top.tree.resizeTree();">
<?php } ?>
	</frameset>
</frameset>
<noframes>This software requires a browser with support for frames.</noframes>
</html>
<?php
$modx->invokeEvent('OnManagerFrameLoader',array('action'=>$action));
