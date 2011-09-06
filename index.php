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
#   Copyright 2005-2009 by webspell.org                                  #
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

include("_mysql.php");
include("_settings.php");
include("_functions.php");
include("_referer.php");

$_language->read_module('index');
$index_language = $_language->module;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="copyright" content="Copyright &copy; 2005 - 2011 by wemake-it.de" />

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Webspell-Cms.org - Webspell hosting service" />
	<meta name="author" content="WeMake-IT" />
	<meta name="keywords" content="wemake, it, service, support, society, version, Henrik Oelze, Oelze, Henrik, Design, Support, 4.2, webspell, webspellSE, clan, cms, Society, hosting, free, free hosting, 4.2.2, template" />
	<meta name="copyright" content="Copyright &copy; 2005 - 2011 by webspell-cms.org" />
	<meta name="generator" content="webSPELL" />
<title><?php echo PAGETITLE; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link href="design/css/layout.css" rel="stylesheet" />
<link href="design/css/ddcolortabs.css" rel="stylesheet" />
<link href="_stylesheet.css" rel="stylesheet" />



<script src="js/bbcode.js" language="JavaScript" type="text/javascript"></script>
<script src="design/css/dropdowntabs.js" language="JavaScript" type="text/javascript"></script>



</head> <!-- Remind:! NO CHANGES HERE !!!!! -->

<body>
<div id="holder">
<div class="line"></div>
<div id="main">
  <div id="top"> 
   <?php include("login_top.php"); ?>
  </div>
  <div id="header"></div>
  <div id="navi">
  <div id="home">
  <a href="index.php" style="font-size:15px; font-weight:bold; color:#9aa2a3">HOME</a>
  </div>
  <div id="navidrop">
  
 <?php include("navigation1.php"); ?>
  <?php include("navigation2.php"); ?>

<script type="text/javascript">
//SYNTAX: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("colortab", 1)
</script>


  
  <!--- --->
  
  
  
  
  
  
  
  
  
    </div>
  </div>
  
  <div id="content_holder">
  <div id="content_left">
  
  <div >
  	<?php boxinclude(1); ?>
				<?php boxinclude(2); ?>
				<?php boxinclude(3); ?>
				<?php boxinclude(4); ?>
				<?php boxinclude(5); ?>
                <?php boxinclude(6); ?>
				<?php boxinclude(7); ?>
				<?php boxinclude(8); ?>
				<?php boxinclude(9); ?>
				<?php boxinclude(10); ?>
				<?php boxinclude(11); ?>
				<?php boxinclude(12); ?>
				<?php boxinclude(13); ?>
				<?php boxinclude(14); ?>
				<?php boxinclude(15); ?>
				<?php boxinclude(16); ?>
				<?php boxinclude(17); ?>
				<?php boxinclude(18); ?>
				<?php boxinclude(19); ?>
				<?php boxinclude(20); ?>
				<?php boxinclude(21); ?>
				<?php boxinclude(22); ?>
				<?php boxinclude(23); ?>
				<?php boxinclude(24); ?>
				<?php boxinclude(25); ?>
				<?php boxinclude(26); ?>
				<?php boxinclude(27); ?>
				<?php boxinclude(28); ?>
				<?php boxinclude(29); ?>
				<?php boxinclude(30); ?>
                <?php boxinclude(31); ?>
                <?php boxinclude(32); ?>
                <?php boxinclude(33); ?>
                <?php boxinclude(34); ?>
                <?php boxinclude(35); ?>
                <?php boxinclude(36); ?>
                <?php boxinclude(37); ?>
                <?php boxinclude(38); ?>
                <?php boxinclude(39); ?></div></div>
  <div id="content_right">  <?php if($site=="news" || $site=='' || $site=="404" || $site=="news_comments") { ?>
            <?php include("content1.php"); ?>
 

<?php } else { ?>

<?php include("content2.php"); ?>
<?php } ?></div>
  
  
  </div>
  <div id="footer"> </div>
</div>
<div class="line"></div>
</div>
</body>
</html>
