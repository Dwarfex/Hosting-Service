<?php
/*
##########################################################################
#                                                                        #
#           Version 4       /                        /   /               #
#          -----------__---/__---__------__----__---/---/-               #
#           | /| /  /___) /   ) (_ `   /   ) /___) /   /                 #
#          _|/_|/__(___ _(___/_(__)___/___/_(___ _/___/___               #
#                       Free Content / Management System                 #
#                                   /                                    #
#                                                                        #
#                                                                        #
#   Copyright 2005-2010 by webspell.org                                  #
#                                                                        #
#   visit webSPELL.org, webspell.info to get webSPELL for free           #
#   - Script runs under the GNU GENERAL PUBLIC LICENSE                   #
#   - It's NOT allowed to remove this copyright-tag                      #
#   -- http://www.fsf.org/licensing/licenses/gpl.html                    #
#                                                                        #
#   Code based on WebSPELL Clanpackage (Michael Gruber - webspell.at),   #
#   Far Development by Development Team - webspell.org                   #
#                                                                        #
#   visit webspell.org                                                   #
#                                                                        #
##########################################################################

##########################################################################
#                                                                        #
#           Version 4       /                        /   /               #
#          -----------__---/__---__------__----__---/---/-               #
#           | /| /  /___) /   ) (_ `   /   ) /___) /   /                 #
#          _|/_|/__(___ _(___/_(__)___/___/_(___ _/___/___               #
#                            Society / Edition                           #
#                                   /                                    #
#                                                                        #
#   modified by webspell|k3rmit (Stefan Giesecke) in 2009                #
#                                                                        #
#   - Modifications are released under the GNU GENERAL PUBLIC LICENSE    #
#   - It is NOT allowed to remove this copyright-tag                     #
#   - http://www.fsf.org/licensing/licenses/gpl.html                     #
#                                                                        #
##########################################################################
*/


include("../_mysql.php");
include("../_settings.php");
include("../_functions.php");

include("_hosting_func.php");


$_language->read_module('admincenter');

if(isset($_GET['site'])) $site = $_GET['site'];
else
if(isset($site)) unset($site);

$admin=isanyhosting($userID);
if(!$loggedin) die($_language->module['not_logged_in']);
if(!$admin) die($_language->module['access_denied']);

if(!isset($_SERVER['REQUEST_URI'])) {
	$arr = explode("/", $_SERVER['PHP_SELF']);
	$_SERVER['REQUEST_URI'] = "/" . $arr[count($arr)-1];
	if ($_SERVER['argv'][0]!="")
	$_SERVER['REQUEST_URI'] .= "?" . $_SERVER['argv'][0];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Website using webSPELL 4 CMS - Society Edition" />
	<meta name="author" content="webspell.org" />
	<meta name="keywords" content="webspell, webspell4, clan, cms, society, edition" />
	<meta name="copyright" content="Copyright &copy; 2005 - 2009 by webspell.org" />
	<meta name="generator" content="webSPELL" />
	<title><?php echo $myclanname ?> - webSPELL Society Edition - Hostingcenter ;)</title>
	<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
	<!--[if IE]>
	<style type="text/css">
	.td1 {  height: 18px; }
	.td2 {  height: 18px; }
	</style>
	<![endif]-->
	<script language="JavaScript" type="text/JavaScript">
	  var calledfrom='admin';
	</script>
	<script src="../js/bbcode.js" language="JavaScript" type="text/javascript"></script>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="1000" align="center">
  <tr>
   <td colspan="5" id="head">
   <div id="links">
   
    <ul>
      <li><a href="../index.php?site=forum&amp;cat=2" target="_blank" class="link1"></a></li>
      <li><a href="../index.php?site=license" target="_blank" class="link2"></a></li>
      <li><a href="http://www.webspell.org" target="_blank" class="link3"></a></li>
    </ul>
   </div>
   </td>
  </tr>
  <tr>
   <td colspan="5"><img src="images/2.jpg" width="1000" height="5" border="0" alt="" /></td>
  </tr>
  <tr>
   <td style="background-image:url(images/3.jpg);" width="5" valign="top"></td>
   <td bgcolor="#f2f2f2" width="202" valign="top">
   <div id="menu">
    <h2>&not; <?php echo $_language->module['main_panel']; ?></h2>
    <ul>
      <li><a href="admincenter.php"><?php echo $_language->module['hosting_projects']; ?></a></li>
      
      <li><a href="admincenter.php?site=support">Support System</a></li>
      <li><a href="../index.php?site=forum&amp;cat=2" target="_blank">Support Forum</a></li>
    </ul>
    
    
    <?php if(ishostingadmin($userID)) { 
	echo'<h2>&not; Hosting Administration</h2>
    <ul>';
	
   
     echo' <li><a href="admincenter.php?site=hosting_templates">Templates</a></li>';
     echo' <li><a href="admincenter.php?site=hosting_wsversion">'.$_language->module['wsversion'].$_language->module['plural'].'</a></li>';
     echo' <li><a href="admincenter.php?site=users">'.$_language->module['user'].'</a></li>';
	 echo' <li><a href="admincenter.php?site=support-rubrics">Support System '.$_language->module['administration'].'</a></li>';
	 echo' <li><a href="admincenter.php?site=hosting_settings">'.$_language->module['hosting_settings'].'</a></li>
    </ul>';
   
	}
   ?>
  
   </div>
   </td>
   <td bgcolor="#2a2a2a" width="2" valign="top"></td>
   <td bgcolor="#ffffff" width="786" valign="top">
   <div class="pad"><?php
   if(isset($site) && $site!="news"){
   $invalide = array('\\','/','//',':','.');
   $site = str_replace($invalide,' ',$site);
   	if(file_exists($site.'.php')) include($site.'.php');
   	else include('hosting.php');
   }
   else include('hosting.php');
   ?></div>
   </td>
   <td style="background-image:url(images/4.jpg);" width="5" valign="top"></td>
  </tr>
  <tr>
   <td colspan="5"><img src="images/5.jpg" width="1000" height="7" border="0" alt="" /></td>
  </tr>
</table>
<center><br /> Webspell Hosting Addon &copy; 2011 <a href="http://www.webspell-cms.org" target="_blank" class="white"><b>webspell-cms.org</b></a> &amp; <a href="http://www.wemake-it.de" target="_blank" class="white"><b>WeMake-IT.de</b></a></center><center> Webspell CMS &copy; <a href="http://www.webspell.org" target="_blank" class="white"><b>webSPELL.org</b></a></center>
</body>
</html>