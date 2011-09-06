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

##########################################################################
#     ________                                                           # 
#        /                      /                                        #
#       /   __   _  _     __   /   __   _/_   __   __                    #
#      /  /___) / /  )  /   ) /   /   ) /   /___) (_ `                   #
#     /  (___  / /  /  /___/ /__ (___(_(_  (___  (__)                    #
#                     /                 ____                             #                         
#                    /                 /    )                    /       #                                                 
#      	                              /___ /   __          __   /        #      
#                                    /    |  /   ) /   / /   ) /         #
#                                   /     | (___/ (___/ (___(_/__        #         
#                                                 ___/                   #
#   Exclusive Society Edition - GPL Templates -                          #
#                                                                        #
#   - Design by Wesir                                                    #
#     (http://www.Annpixel.de)                                           #
#   - Adaption by LoWSolidSnake                                          #
#     (http://www.webspell.org/index.php?site=profile&id=31295)          #
#                                                                        #
#    More Exclusive Society Edition Templates                            #    
#                                                                        #
#    - Templates Royal | Best free websolution                           #
#      (http://www.templates-royal.de)                                   #
#                                                                        #
#    It is NOT allowed to remove this copyright-tags                     #
#    More Infos: http://www.fsf.org/licensing/licenses/gpl.html          #
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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Website using webSPELL 4 CMS - Society Edition" />
<meta name="author" content="webspell.org" />
<meta name="keywords" content="webspell, webspell4, clan, cms, society, edition" />
<meta name="copyright" content="Copyright &copy; 2005 - 2009 by webspell.org" />
<meta name="generator" content="webSPELL" />
<title><?php echo PAGETITLE; ?></title>
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title=" - RSS Feed" />
<link href="page.css" rel="stylesheet" type="text/css" />
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />	
<script src="js/bbcode.js" language="JavaScript" type="text/javascript"></script>
<script src="contentslider.js" language="JavaScript" type="text/javascript"></script>
</head>
<body>
<div id="container">
<div id="page">
 <div id="head">
  <div id="header"></div>
  <div id="loginsection">
   <div id="logintop"><?php include("sc_language.php"); ?></div>
   <div id="loginbg"><?php include("login.php"); ?></div>
   <div id="loginbottom"></div>
  </div>
  <div id="headend"></div>
 </div><!--END HEAD--> 
 <div id="navi">
  <ul>
  <li id="navistart"></li>
  <li class="menu1"><a href="index.php?site=news"><?php $_language->read_module('navigation'); echo $_language->module['news']; ?></a></li>
  <li class="menu2"><a href="index.php?site=articles"><?php $_language->read_module('navigation'); echo $_language->module['articles']; ?></a></li>
  <li class="menu1"><a href="index.php?site=about"><?php $_language->read_module('navigation'); echo $_language->module['about_us']; ?></a></li>
  <li class="menu2"><a href="index.php?site=forum"><?php $_language->read_module('navigation'); echo $_language->module['forums']; ?></a></li>
  <li class="menu1"><a href="index.php?site=gallery"><?php $_language->read_module('navigation'); echo $_language->module['gallery']; ?></a></li>
  <li class="menu2"><a href="index.php?site=files"><?php $_language->read_module('navigation'); echo $_language->module['downloads']; ?></a></li>
  <li class="menu1"><a href="index.php?site=contact"><?php $_language->read_module('navigation'); echo $_language->module['contact']; ?></a></li>
  <li class="menu2"><a href="index.php?site=imprint"><?php $_language->read_module('navigation'); echo $_language->module['imprint']; ?></a></li>
  <li id="naviend"></li>
  </ul>
 </div><!--END NAVI-->
 <div id="pagepuffer">
  <div id="left">
   <div id="contentbalken">Content</div>
    <div id="content">
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
   ?>   
   </div>
  </div><!--END LEFT-->
  <div id="right">
   <div id="sliderbalken">Specials</div>
    <div id="slider1" class="sliderwrapper">
     <div class="contentdiv">
     <a href="index.php?site=news"><img src="styles/slider/gallery.jpg" width="239" height="81" border="0" alt="" /></a>
     </div>     
    </div>
   <div id="paginate-slider1">
   </div>
   <div class="menu">   
   <?php boxinclude(1); ?>
   <?php boxinclude(2); ?>
   <?php boxinclude(3); ?>
   <?php boxinclude(4); ?>
   <?php boxinclude(5); ?>
   <?php boxinclude(6); ?>
   <?php boxinclude(7); ?>
   <?php boxinclude(8); ?>
   <?php boxinclude(9); ?>
   </div>
  </div><!--END RIGHT-->
  <div class="clear"></div>
  <div id="pageend"></div>
 </div><!--END PAGEPUFFER-->
</div><!--END PAGE-->
<div id="footer"></div>
</div><!--END CONTAINER-->
<div class="footext"><br style="line-height:5px;" />
  Design by <a href="http://www.t-websolutions.de" target="_blank">t-websolutions.de</a> | Adaption by <a href="http://www.webspell.org/index.php?site=profile&amp;id=31295" target="_blank">LoWSolidSnake</a> | Free <a href="http://www.templates-royal.de" target="_blank" title="Society Edition Templates">Society Edition Templates</a> | <a href="http://validator.w3.org/check?uri=referer" target="_blank">XHTML 1.0</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/refer" target="_blank">CSS 2.1</a> valid W3C standards | <a href="http://webspelldemo.we.funpic.de/society-edition/red-stripes/tmp/rss.xml" target="_blank"><img src="http://webspelldemo.we.funpic.de/society-edition/red-stripes/images/icons/rss.png" alt="" width="16" height="16" /></a> <a href="http://webspelldemo.we.funpic.de/society-edition/red-stripes/tmp/rss.xml" target="_blank">RSS Feed</a></div>
<script type="text/javascript">
featuredcontentslider.init({
id: "slider1", //id of main slider DIV
contentsource: ["inline", ""], //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
toc: "", //Valid values: "#increment", "markup", ["label1", "label2", etc]
nextprev: ["", ""], //labels for "prev" and "next" links. Set to "" to hide.
revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
enablefade: [true, 0.2], //[true/false, fadedegree]
autorotate: [true, 3000], //[true/false, pausetime]
onChange: function(previndex, curindex){ //event handler fired whenever script changes slide
//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
}
})
</script>
</body>
</html>
