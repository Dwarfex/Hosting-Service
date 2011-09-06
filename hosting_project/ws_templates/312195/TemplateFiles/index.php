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
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<script src="js/contentslider.js" language="jscript" type="text/javascript">
/***********************************************
* © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code's
***********************************************/
</script>
</head>
<body>
<div id="container">
  <div id="header">
    <div id="language">
      <?php include("sc_language.php"); ?>
    </div>
    <div id="rotation">
      <?php include("sc_bannerrotation.php"); ?>
    </div>
  </div>
  <div id="navibutton">
    <ul>
      <li id="infos"><a id="ainfos" class="aktiv" onclick="nav(1);">Information</a></li>
      <li id="teams"><a id="ateams" onclick="nav(2);">Teams</a></li>
      <li id="comm"><a id="acomm" onclick="nav(3);">Community</a></li>
      <li id="media"><a id="amedia" onclick="nav(4);">Mediacenter</a></li>
    </ul>
  </div>
  <div id="navitext">
    <?php include("navigation.php"); ?>
  </div>
  <div class="clear"></div>
  <div id="contentpuffer">
    <div id="contenttop"></div>
    <div id="left">
      <div class="bgtop" style="margin-right:6px;">
        <?php include("sc_topnews.php"); ?>
      </div>
      <div class="bgtop">
        <h2><?php echo $index_language['latest_news']; ?></h2>
        <ul>
          <?php include("sc_headlines.php"); ?>
        </ul>
      </div>
      <div class="clear"></div>
      <div id="contop"></div>
      <div id="conpuffer">
        <?php
if(!isset($site)) $site="news";
$invalide = array('\\','/','/\/',':','.');
$site = str_replace($invalide,' ',$site);
if(!file_exists($site.".php")) $site = "news";
include($site.".php");
 ?>
      </div>
      <div id="conbottom"></div>
    </div>
    <div id="right">
      <?php include("features.php"); ?>
      <div class="righttop"></div>
      <div class="rightpuffer">
        <?php include("login.php"); ?>
      </div>
      <div class="rightbottom"></div>
      <div class="righttop"></div>
      <div class="rightpuffer">
        <h4><?php echo $index_language['matches']; ?></h4>
        <ul>
          <?php include("sc_results.php"); ?>          
        </ul>
        <br class="clear" />
      </div>
      <div class="rightbottom"></div>
      <div class="righttop"></div>
      <div class="rightpuffer">
        <h4><?php echo $index_language['sponsors']; ?></h4>
        <?php include("sc_sponsors.php"); ?>
      </div>
      <div class="rightbottom"></div>
    </div>
    <div class="clear"></div>
    <div id="contentbottom"></div>
  </div>
</div>
<!-- Start licence -->
<!-- RESPECT THE WORK FROM THE DESIGNER -->
<!-- CC - Attribution-Share Alike 3.0 Unported - Do not remove links here! -->
<div id="copy"><span class="white">Design &copy; by <a href="http://www.pixelkoenig.deviantart.com" target="_blank">Pixelk&ouml;nig</a> - Adaption by <a href="http://www.templates4all.de" title="webSPELL Templates" target="_blank">templates4ALL </a> - <a href="http://validator.w3.org/check?uri=referer" target="_blank">xHTML</a> - <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank">CSS</a></span></div>
<!-- RESPECT THE WORK FROM THE DESIGNER -->
<!-- CC - Attribution-Share Alike 3.0 Unported - Do not remove links here! -->
<!-- End licence -->
<script type="text/javascript">
featuredcontentslider.init({
id: "slider1",  //id of main slider DIV
contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
toc: "",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
nextprev: ["", ""],  //labels for "prev" and "next" links. Set to "" to hide.
revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
enablefade: [true, 0.2],  //[true/false, fadedegree]
autorotate: [true, 7000],  //[true/false, pausetime]
onChange: function(previndex, curindex){ }
})
</script>
</body>
</html>