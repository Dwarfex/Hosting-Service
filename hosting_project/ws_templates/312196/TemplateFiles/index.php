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
#   - Design by Zenavio                                                  #
#     (http://www.zenavio.com/)                                          #
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

// important data include
include("_mysql.php");
include("_settings.php");
include("_functions.php");

$_language->read_module('index');
$index_language = $_language->module;
// end important data include
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Clanpage using webSPELL 4 CMS" />
<meta name="author" content="webspell.org" />
<meta name="keywords" content="webspell, webspell4, clan, cms" />
<meta name="copyright" content="Copyright &copy; 2005 - 2009 by webspell.org" />
<meta name="generator" content="webSPELL" />
<title><?php echo PAGETITLE; ?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="page.css" rel="stylesheet" type="text/css" />
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title=" - RSS Feed" />
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<script src="navi.js" language="jscript" type="text/javascript"></script>
<!--[if lte IE 6]>
<script type="text/javascript" src="pngfix/supersleight-min.js"></script>
<style type="text/css">
* html #left { margin-left:2px; margin-top:11px; } 
</style>
<![endif]-->
</head>
<body>
<div id="container">
<div id="logo"></div>
<div id="bg1puffer">
<div id="head">
<div id="headerbg">
<div id="headerlayer">
<ul>
<li onmouseover="MM_showHideLayers('info','','show','clan','','hide','comm','','hide','media','','hide');"><img src="styles/header/info.jpg" width="113" height="24" border="0" alt="info" /></li>
<li onmouseover="MM_showHideLayers('info','','hide','clan','','show','comm','','hide','media','','hide');"><img src="styles/header/clan.jpg" width="113" height="24" border="0" alt="clan" /></li>
<li onmouseover="MM_showHideLayers('info','','hide','clan','','hide','comm','','show','media','','hide');"><img src="styles/header/community.jpg" width="113" height="24" border="0" alt="community" /></li>
<li onmouseover="MM_showHideLayers('info','','hide','clan','','hide','comm','','hide','media','','show');"><img src="styles/header/media.jpg" width="113" height="24" border="0" alt="media" /></li>
</ul>
<div id="login"><?php include("login.php"); ?></div>
</div><!--END HEADERLAYER-->
<div id="navi">
<ul id="info">
<li><a href="index.php?site=news"><?php $_language->read_module('navigation'); echo $_language->module['news']; ?></a> -</li>
<li><a href="index.php?site=news&amp;action=archive"><?php $_language->read_module('navigation'); echo $_language->module['archives']; ?></a> -</li>
<li><a href="index.php?site=articles"><?php $_language->read_module('navigation'); echo $_language->module['articles']; ?></a> -</li>
<li><a href="index.php?site=calendar"><?php $_language->read_module('navigation'); echo $_language->module['calendar']; ?></a> -</li>
<li><a href="index.php?site=faq"><?php $_language->read_module('navigation'); echo $_language->module['faq']; ?></a> -</li>
<li><a href="index.php?site=search"><?php $_language->read_module('navigation'); echo $_language->module['search']; ?></a></li>
</ul>
<ul id="clan">
<li><a href="index.php?site=about"><?php $_language->read_module('navigation'); echo $_language->module['about_us']; ?></a> -</li>
<li><a href="index.php?site=squads"><?php $_language->read_module('navigation'); echo $_language->module['squads']; ?></a> -</li>
<li><a href="index.php?site=members"><?php $_language->read_module('navigation'); echo $_language->module['members']; ?></a> -</li>
<li><a href="index.php?site=clanwars"><?php $_language->read_module('navigation'); echo $_language->module['matches']; ?></a> -</li>
<li><a href="index.php?site=history"><?php $_language->read_module('navigation'); echo $_language->module['history']; ?></a> -</li>
<li><a href="index.php?site=awards"><?php $_language->read_module('navigation'); echo $_language->module['awards']; ?></a></li>
</ul>
<ul id="comm">
<li><a href="index.php?site=forum"><?php $_language->read_module('navigation'); echo $_language->module['forums']; ?></a> -</li>
<li><a href="index.php?site=guestbook"><?php $_language->read_module('navigation'); echo $_language->module['guestbook']; ?></a> -</li>
<li><a href="index.php?site=registered_users"><?php $_language->read_module('navigation'); echo $_language->module['registered_users']; ?></a> -</li>
<li><a href="index.php?site=whoisonline"><?php $_language->read_module('navigation'); echo $_language->module['who_is_online']; ?></a> -</li>
<li><a href="index.php?site=polls"><?php $_language->read_module('navigation'); echo $_language->module['polls']; ?></a> -</li>
<li><a href="index.php?site=servers"><?php $_language->read_module('navigation'); echo $_language->module['servers']; ?></a></li>
</ul>
<ul id="media">
<li><a href="index.php?site=files"><?php $_language->read_module('navigation'); echo $_language->module['downloads']; ?></a> -</li>
<li><a href="index.php?site=demos"><?php $_language->read_module('navigation'); echo $_language->module['demos']; ?></a> -</li>
<li><a href="index.php?site=links"><?php $_language->read_module('navigation'); echo $_language->module['links']; ?></a> -</li>
<li><a href="index.php?site=gallery"><?php $_language->read_module('navigation'); echo $_language->module['gallery']; ?></a> -</li>
<li><a href="index.php?site=linkus"><?php $_language->read_module('navigation'); echo $_language->module['links_us']; ?></a></li>
</ul>
</div><!--END NAVI-->
</div><!--END HEADERBG-->
</div><!--END HEAD-->
<div id="bg2puffer">
<div id="bgredtop"></div>
<div id="bgredpuffer">
<div id="left">
<div class="pollhead"></div>
<div class="leftinhalt">
<?php include("poll.php"); ?>
</div>
<div class="leftboxend"><a href="index.php?site=polls"><img src="styles/spaltelinks/showall.jpg" width="95" height="14" border="0" alt="Show All" /></a></div>
<div class="leftabstand"></div>
<div class="shoutboxhead"></div>
<div class="leftinhalt">
<?php include("shoutbox.php"); ?>
</div>
<div class="leftboxend"><a href="index.php?site=shoutbox_content&amp;action=showall"><img src="styles/spaltelinks/showall.jpg" width="95" height="14" border="0" alt="Show All" /></a></div>
<div class="leftabstand"></div>
<div class="sponsorhead"></div>
<div class="leftinhalt">
<?php include("sc_sponsors.php"); ?>
</div>
<div class="sponsorend"></div>
</div><!--END LEFT-->
<div id="middle">
<div id="bgredinnerpuffer">
<div id="top">
<div id="topinner"><?php include("sc_bannerrotation.php"); ?></div>
<div id="allp"><a href="index.php?site=partners"><img src="styles/content/partners.jpg" width="77" height="5" border="0" alt="" /></a></div>
<div id="interesse"><a href="index.php?site=contact"><img src="styles/content/interesse.jpg" width="144" height="5" border="0" alt="" /></a></div>
</div>
<div id="overcontent"></div>
<div id="content">
<?php
if(!isset($site)) $site="news";
$invalide = array('\\','/','/\/',':','.');
$site = str_replace($invalide,' ',$site);
if(!file_exists($site.".php")) $site = "news";
include($site.".php");
?> 
</div>
<div id="contentend"></div>
</div><!--END BGREDINNERPUFFER-->
<div id="bgredinnerend"></div>
<div style="text-align:center;"><?php include("sc_language.php"); ?></div>
</div><!--END MIDDLE-->
<div id="right">
<div class="lheadlines"></div>
<div class="rightinhalt">
<?php include("sc_headlines.php"); ?>
</div>
<div class="rightbuttons"><a href="index.php?site=news&amp;action=archive"><img src="styles/spalterechts/newsarchive.jpg" width="96" height="14" border="0" alt="News Archive" /></a></div>
<div class="rightboxend"></div>
<div class="rightabstand"></div>
<div class="lclanwars"></div>
<div class="rightinhalt">
<?php include("sc_results.php"); ?>
</div>
<div class="rightbuttons"><a href="index.php?site=clanwars"><img src="styles/spalterechts/warsarchive.jpg" width="96" height="14" border="0" alt="Upcoming Wars" /></a></div>
<div class="rightboxend"></div>
<div class="rightabstand"></div>
<div class="lthreads"></div>
<div class="rightinhalt">
<?php include("latesttopics.php"); ?>
</div>
<div class="rightbuttons"><a href="index.php?site=news&amp;action=archive"><img src="styles/spalterechts/viewforum.jpg" width="96" height="14" border="0" alt="View Forum" /></a></div>
<div class="rightend"></div>
<div class="clear"></div><!--notwendig wegen IE6-->
</div><!--END RIGHT-->
<div class="clear"></div>
</div><!--END BGREDPUFFER-->
<div id="bgredend"></div>
</div><!--END BG2PUFFER-->
<div id="bg2end"></div>
</div><!--END BG1PUFFER-->
<div id="bg1end"></div><!-- CC - Attribution-Share Alike 3.0 Unported - Do not remove this links!  -->
<p style="text-align:center;">Design by <a href="http://www.zenavio.com" target="_blank">Zenavio.com</a> | Adaption by <a href="http://www.webspell.org/index.php?site=profile&amp;id=31295" target="_blank">LoWSolidSnake</a> | Best free<a href="http://www.templates-royal.de" target="_blank"> webSPELL Templates</a> by Templates-Royal.de| <a href="http://validator.w3.org/check?uri=referer" target="_blank">XHTML 1.0</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/refer" target="_blank">CSS 2.1</a> valid W3C standards | <a href="/tmp/rss.xml" target="_blank"><img src="/images/icons/rss.png" alt="" width="16" height="16" /></a> <a href="/tmp/rss.xml" target="_blank">RSS Feed</a></p>
<!-- CC - Attribution-Share Alike 3.0 Unported - Do not remove this links end!  -->
</div><!--END CONTAINER-->
</body>
</html>