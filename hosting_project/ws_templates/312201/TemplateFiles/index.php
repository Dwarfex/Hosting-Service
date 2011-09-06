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

$_language->read_module('index');
$index_language = $_language->module;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Website using webSPELL 4 CMS - Society Edition - Template by Kode-Designs.com" />
<meta name="author" content="kode-designs.com" />
<meta name="keywords" content="webspell, webspell4, clan, cms, society, edition, kode, designs" />
<meta name="copyright" content="Copyright &copy; 2005 - 2009 by webspell.org" />
<meta name="generator" content="webSPELL" />
<title><?php echo PAGETITLE; ?></title>
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<script src="js/bbcode.js" language="JavaScript" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.backgroundPosition.js"></script>
<script type="text/javascript">
$(function(){
	$('#a a')
		.css( {backgroundPosition: "-20px 35px"} )
		.mouseover(function(){
			$(this).stop().animate({backgroundPosition:"(-20px 94px)"}, {duration:500})
		})
		.mouseout(function(){
			$(this).stop().animate({backgroundPosition:"(40px 35px)"}, {duration:200, complete:function(){
				$(this).css({backgroundPosition: "-20px 35px"})
			}})
		})
});
</script>
</head>
<body>
<center>
<table width="940" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td style="background-image:url(slike/pagebg.jpg);" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
         <td height="456" valign="top" style="background-repeat:repeat-x; background-image:url(slike/top.jpg);"><table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td valign="top" style="padding:30px;"><span class="header_logo">Grunge<span class="blog">BLOG</span></span></td>
             <td align="center"><div id="advert"><?php include('sc_bannerrotation.php'); ?></div></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td valign="top" align="center">
             <ul id="a">
		<li><a href="index.php">News</a></li>
		<li><a href="index.php?site=news&amp;action=archive">Archive</a></li>
		<li><a href="index.php?site=about">About us</a></li>
        <li><a href="index.php?site=forum">Forum</a></li>
        <li><a href="index.php?site=gallery">Gallery</a></li>
        <li><a href="index.php?site=files">Downloads</a></li>
        <li><a href="index.php?site=links">Links</a></li>
        <li><a href="index.php?site=contact">Contact</a></li>
	</ul></td>
           </tr>
           <tr>
             <td valign="top" align="center">&nbsp;</td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="630" valign="top" class="pad">
                 <div>
				 <?php
			if((!isset($site)) || $site=='') $site="news";
			
			$checkmodul=safe_query("SELECT `activated`, `access` FROM ".PREFIX."modules WHERE `filename`='".$site.".php'");
			$modulfound=mysql_num_rows($checkmodul);
			if($modulfound){
				$modulrow=mysql_fetch_array($checkmodul);
			  if($modulrow['activated']==1){
			  	if(hasaccess($modulrow['access'], $useraccessgroups)){
						$invalide = array('\\','/','/\/',':','.');
						$site = str_replace($invalide,' ',$site);
						if(!file_exists($site.".php")) $site = "news";
						include($site.".php");
			  	}
			  	else{
			  		echo '<br />'.$index_language['access_denied'];
			  	}
			  }
			  else{
			  	echo '<br />'.$index_language['mod_deactivated'];
			  }
			}
			else{
				echo '<br />'.$index_language['mod_not_available'];
		  }
		 	?></div></td>
                 <td align="left" style="padding-right:30px;"><table width="280" border="0" cellspacing="0" cellpadding="0">
                   <tr>
                     <td>
				<?php boxinclude(6); ?>
				<?php boxinclude(7); ?>
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
				<?php boxinclude(1); ?></td>
                   </tr>
                 </table></td>
               </tr>
             </table></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td valign="top">&nbsp;</td>
           </tr>
         </table>
         </td>
       </tr>
     </table><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background-image:url(slike/footer.jpg);" width="940" height="30" align="center" class="footer">Design by <a href="http://www.kode-designs.com"><strong>Kode-Designs</strong></a>&nbsp; | &nbsp;Copyright by <b><?php echo $myclanname ?></b>&nbsp; | <b><a href="http://www.templates-royal.de" target="_blank" title="Society Edition Templates">Society Edition Templates</a></b> | &nbsp;<a href="http://validator.w3.org/check?uri=referer" target="_blank">XHTML 1.0</a> valid W3C standards&nbsp; | &nbsp;<a href="tmp/rss.xml" target="_blank"><img src="images/icons/rss.png" width="16" height="16" style="vertical-align:bottom;" alt="" /></a> <a href="tmp/rss.xml" target="_blank">RSS Feed</a></td>
  </tr>
</table></td>
   </tr>
</table>
</center>
</body>
</html>
