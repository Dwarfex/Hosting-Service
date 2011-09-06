<?
// important data include
include("_mysql.php");
include("_settings.php");
include("_functions.php");

$_language->read_module('index');
$index_language = $_language->module;
// end important data include
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="webSPELL 4 CMS development page. webSPELL is a free content management system under GNU GPL for creating websites easily" />
	<meta name="author" content="www.kode-designs.com" />
	<meta name="keywords" content="webspell, webspell4, clan, cms, free, content management system, design, templates, kode, designs" />
	<meta name="copyright" content="Copyright © 2008-2009 by www.kode-designs.com" />
	<meta name="generator" content="webSPELL" />
	<meta name="robots" content="all" />
<title><?php echo PAGETITLE; ?></title>
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-color: #07080a;
	margin-top: 0px;
	background-image: url(slike/bg.png);
	background-repeat: repeat-x;
}
-->
</style></head>
<body onload="MM_preloadImages('slike/nav/_hover_home.jpg','slike/nav/_hover_teams.jpg','slike/nav/_hover_matches.jpg','slike/nav/_hover_forum.jpg','slike/nav/_hover_files.jpg','slike/nav/_hover_contact.jpg')">
<center>
<table width="900" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td background="slike/header.jpg" height="236" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="700" valign="top"><?php include("sc_language.php"); ?></td>
            <td style="padding-top:15px"><?php include("login.php"); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="slike/nav/start.jpg" width="19" height="50" /></td>
            <td><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image11','','slike/nav/_hover_home.jpg',1)"><img src="slike/nav/home.jpg" name="Image11" width="145" height="50" border="0" id="Image11" /></a></td>
            <td><a href="index.php?site=squads" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image12','','slike/nav/_hover_teams.jpg',1)"><img src="slike/nav/teams.jpg" name="Image12" width="143" height="50" border="0" id="Image12" /></a></td>
            <td><a href="index.php?site=clanwars" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image13','','slike/nav/_hover_matches.jpg',1)"><img src="slike/nav/matches.jpg" name="Image13" width="143" height="50" border="0" id="Image13" /></a></td>
            <td><a href="index.php?site=forum" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image14','','slike/nav/_hover_forum.jpg',1)"><img src="slike/nav/forum.jpg" name="Image14" width="143" height="50" border="0" id="Image14" /></a></td>
            <td><a href="index.php?site=files" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image15','','slike/nav/_hover_files.jpg',1)"><img src="slike/nav/files.jpg" name="Image15" width="143" height="50" border="0" id="Image15" /></a></td>
            <td><a href="index.php?site=contact" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image16','','slike/nav/_hover_contact.jpg',1)"><img src="slike/nav/contact.jpg" name="Image16" width="145" height="50" border="0" id="Image16" /></a></td>
            <td><img src="slike/nav/end.jpg" width="19" height="50" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="222" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td background="slike/left/top.jpg" height="30" class="left_top"><?php echo $index_language['latest_news']; ?></td>
              </tr>
              <tr>
                <td background="slike/left/bg.jpg" valign="top" class="left_main"><?php include("sc_headlines.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/left/bottom.jpg" width="222" height="20" /></td>
              </tr>
              <tr>
                <td background="slike/left/top.jpg" height="30" class="left_top"><?php echo $index_language['matches']; ?></td>
              </tr>
              <tr>
                <td background="slike/left/bg.jpg" valign="top" class="left_main"><?php include("sc_results.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/left/bottom.jpg" width="222" height="20" /></td>
              </tr>
              <tr>
                <td background="slike/left/top.jpg" height="30" class="left_top"><?php echo $index_language['topics']; ?></td>
              </tr>
              <tr>
                <td background="slike/left/bg.jpg" valign="top" class="left_main"><?php include("latesttopics.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/left/bottom.jpg" width="222" height="20" /></td>
              </tr>
              <tr>
                <td background="slike/left/top.jpg" height="30" class="left_top"><?php echo $index_language['shoutbox']; ?></td>
              </tr>
              <tr>
                <td background="slike/left/bg.jpg" valign="top" class="left_main"><?php include("shoutbox.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/left/bottom.jpg" width="222" height="20" /></td>
              </tr>
              <tr>
                <td background="slike/left/top.jpg" height="30" class="left_top"><?php echo $index_language['statistics']; ?></td>
              </tr>
              <tr>
                <td background="slike/left/bg.jpg" valign="top" class="left_main"><?php include("counter.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/left/left_end.jpg" width="222" height="18" /></td>
              </tr>
              <tr>
                <td align="center" class="top_text"><a href="#">#Top</a></td>
              </tr>
            </table></td>
            <td bgcolor="#FFFFFF" width="455" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td style="padding-left:4px; padding-right:4px;"><?php
					if(!isset($site)) $site="news";
					$invalide = array('\\','/','/\/',':','.');
					$site = str_replace($invalide,' ',$site);
					if(!file_exists($site.".php")) $site = "news";
					include($site.".php");
					?></td>
              </tr>
            </table></td>
            <td width="223" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="right" background="slike/right/top.jpg" height="30" class="right_top"><?php echo $index_language['sponsors']; ?></td>
              </tr>
              <tr>
                <td align="center" valign="top" background="slike/right/bg.jpg" class="right_main"><?php include("sc_sponsors.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/right/bottom.jpg" width="223" height="20" /></td>
              </tr>
              <tr>
                <td align="right" background="slike/right/top.jpg" height="30" class="right_top"><?php echo $index_language['partners']; ?></td>
              </tr>
              <tr>
                <td align="center" valign="top" background="slike/right/bg.jpg" class="right_main"><?php include("partners.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/right/right_end.jpg" width="223" height="18" /></td>
              </tr>
              <tr>
                <td align="center" class="top_text"><a href="index.php?site=imprint">IMPRINT</a> - <a href="index.php?site=contact">CONTACT</a> - <a href="index.php?site=faq">FAQ</a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="222">&nbsp;</td>
            <td align="left"><img src="slike/footer.jpg" width="455" height="20" /></td>
            <td width="223">&nbsp;</td>
          </tr>
          <tr>
            <td width="222">&nbsp;</td>
            <td align="center" class="top_text">..:: Design by <a href="http://www.kode-designs.com">www.kode-designs</a> | More <a href="http://www.templates-royal.de" target="_blank" title="webSPELL Templates">webSPELL Templates</a> ::..</td>
            <td width="223">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</center>
</body>
</html>
