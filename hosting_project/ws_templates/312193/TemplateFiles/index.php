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
<script src="js/button.js" language="jscript" type="text/javascript"></script>
<script src="js/contentslider.js" language="jscript" type="text/javascript"></script>
<script src="js/jquery132.js" type="text/javascript"></script>
<script src="js/stepcarousel.js" type="text/javascript"></script>
<script src="js/tabcontent.js" type="text/javascript">
/***********************************************
* © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code's
***********************************************/
</script>
<!--[if lt IE 8]>
<style type="text/css">
#scbuttons li { list-style-type:none; margin:0; padding:0 0 4px 0; font-size:0px; }
</style>
<![endif]-->
</head>
<body>
<div id="page">
<div id="stats"><span class="white">Welcome to</span><span class="orange">&nbsp;Clanname /&nbsp;</span><span class="grey">Gaming since 2009</span><span class="grey" style="padding-left:250px; padding-right:29px;">Pageviews</span><?php include("counter.php"); ?></div>
<!--END STATS-->
<div id="header"></div><!--END HEADER-->
<div id="partnersbg">
 <div style="text-align:right; padding:5px 15px 0 0;"><?php include("sc_language.php"); ?></div>
 <div id="mygallery" class="stepcarousel">
   <div class="belt">
     <?php include("sc_sponsors.php"); ?>
   </div>
 </div>
</div><!--PARTNERSBG-->
<div id="navi">
 <ul>
  <li id="navilinks"></li>
  <li id="home"><a href="index.php?site=news">Home</a></li>
  <li id="members"><a href="index.php?site=squads">Members</a></li>
  <li id="matches"><a href="index.php?site=clanwars">Matches</a></li>
  <li id="sponsors"><a href="index.php?site=sponsors">Sponsors</a></li>
  <li id="forum"><a href="index.php?site=forum">Forum</a></li>
  <li id="awards"><a href="index.php?site=awards">Files</a></li>
  <li id="contact"><a href="index.php?site=contact">Contact</a></li>
  <li id="navirechts"></li>
 </ul>
</div><!--END NAVI-->
<div id="scbg">
 <div id="scbuttons">
  <ul id="switchit">
   <li onclick="naviover(1);" ondblclick="naviout(1);"><a rel="news1"><img src="styles/topbox/latestnews.jpg" width="119" height="23" alt="" name="sc1" style="cursor:pointer;" /></a></li>
   <li onclick="naviover(2);" ondblclick="naviout(2);"><a rel="wars2"><img src="styles/topbox/latestwars.jpg" width="119" height="23" alt="" name="sc2" style="cursor:pointer;" /></a></li>
   <li onclick="naviover(3);" ondblclick="naviout(3);"><a rel="files3"><img src="styles/topbox/latestposts.jpg" width="119" height="23" alt="" name="sc3" style="cursor:pointer;" /></a></li>
   <li onclick="naviover(4);" ondblclick="naviout(4);"><a rel="user4"><img src="styles/topbox/latesuser.jpg" width="119" height="23" alt="" name="sc4" style="cursor:pointer;" /></a></li>
  </ul> 
 </div>
 <div id="scinhalt">
  <div id="news1">
  <?php include("sc_headlines.php"); ?>
  </div><!--END NEWS1--> 
  <div id="wars2" class="tabcontent">
  <?php include("sc_results.php"); ?>
  </div><!--END WARS2-->
  <div id="files3" class="tabcontent">
  <?php include("latesttopics.php"); ?>
  </div><!--END FILES3-->
  <div id="user4" class="tabcontent">
  <?php include("sc_lastregistered.php"); ?>
  </div><!--END USER4-->
 </div><!--END SCINHALT-->
</div><!--END SCBG-->
<div id="features">
<?php include("features.php"); ?>
</div><!--END FEATURES-->
<div id="content">
 <div id="contleft">
  <div id="cont"> 
 <?php
if(!isset($site)) $site="news";
$invalide = array('\\','/','/\/',':','.');
$site = str_replace($invalide,' ',$site);
if(!file_exists($site.".php")) $site = "news";
include($site.".php");
 ?> 
  </div>
 <br style="clear:both;" />
 <h2>Advertisment</h2>
 <div style="text-align:center;"><?php include("sc_bannerrotation.php"); ?></div>
 </div><!--END CONTLEFT-->
 <div id="contright">
 <h3>Login</h3>
 <div id="loginbg"><?php include("login.php"); ?></div>
 <h3>Topmatch</h3>
 <div id="topmatchbg"><?php include("sc_topmatch.php"); ?></div>
 <h3><?php $_language->read_module('navigation'); echo $_language->module['polls']; ?></h3>
 <div class="righttop"></div>
 <div class="rightbg"><?php include("poll.php"); ?></div>
 <div class="rightbottom"></div> 
 </div><!--END CONTRIGHT-->
 <div style="clear:both;"></div>
</div><!--END CONTENT-->
<!-- Start licence -->		
<!-- RESPECT THE WORK FROM THE DESIGNER -->		
<!-- CC - Attribution-Share Alike 3.0 Unported - Do not remove links here! -->
<div id="footer"><span class="white" style="float:left;">Design &copy; by <a class="orangewh" href="http://www.pixelkoenig.deviantart.com">Pixelk&ouml;nig</a> - Adaption by <a class="orangewh" href="http://www.templates4all.de">Templates4all.de</a></span> <span style="float:right; padding-right:21px; text-transform:uppercase;"><a class="whiteor" href="#">Top</a> &nbsp; <a class="whiteor" href="index.php?site=impressum"><?php $_language->read_module('navigation'); echo $_language->module['imprint']; ?></a> &nbsp; <a class="whiteor" href="index.php?site=challenge"><?php $_language->read_module('navigation'); echo $_language->module['fight_us']; ?></a> &nbsp; <a class="whiteor" href="index.php?site=faq"><?php $_language->read_module('navigation'); echo $_language->module['faq']; ?></a></span><br style="clear:both;" /></div>
<!-- RESPECT THE WORK FROM THE DESIGNER -->		
<!-- CC - Attribution-Share Alike 3.0 Unported - Do not remove links here! -->
<!-- End licence -->
</div><!--END PAGE-->
<script type="text/javascript">
var scswitcher=new ddtabcontent("switchit")
scswitcher.setpersist(true)
scswitcher.setselectedClassTarget("link")
scswitcher.init()
</script>
<script type="text/javascript">
stepcarousel.setup({ galleryid: 'mygallery', beltclass: 'belt', panelclass: 'panel', autostep: {enable:true, moveby:1, pause:3000},	panelbehavior: {speed:500, wraparound:false, persist:true}, defaultbuttons: {enable: true, moveby: 1, leftnav: ['styles/head/pfeillinks.jpg', -31, 17], rightnav: ['styles/head/pfeilrechts.jpg', 20, 17]}, statusvars: ['statusA', 'statusB', 'statusC'], contenttype: ['inline'] })
</script>
<script type="text/javascript">
featuredcontentslider.init({ id: "slider1", contentsource: ["inline", ""], toc: "markup", nextprev: ["", "Next"], revealtype: "mouseover", enablefade: [true, 0.1],	autorotate: [true, 10000], onChange: function(previndex, curindex){ } })
</script>
</body>
</html>