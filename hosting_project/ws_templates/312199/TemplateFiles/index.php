<?php

// important data include

include("_mysql.php");
include("_settings.php");
include("_functions.php");

$_language->read_module('index');
$index_language = $_language->module;

$_language->read_module('navigation');
$navigation_language = $_language->module;
// end important data include
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  	<title><? echo PAGETITLE; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
</head>
<script type="text/javascript" src="http://www.sponsorads.de/script.php?s=107047"></script>
<body>
<div align="center">
<table width="995" background="img/bg.jpg" border="0" cellspacing="0" cellpadding="0"><tr><td>
      
     
<div id="header">   
   
    <div class="header_01">
    	<div class="header_01_left"><div style="width:28px; float:left;">&nbsp;</div><div style="padding-top:9px; float:left;"><?php include("sc_language.php"); ?></div></div>
    	<div class="header_01_right">
        
        <table width="745" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="19" ><? include("login.php"); ?></td>
  </tr>
</table>

        
        </div>
    </div>
    
    <div class="header_02"></div>
    <div class="header_03">
    
    	<div class="header_03_left">
        
        <div class="navi_horz"><a style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF; font-weight:bold; text-align:center;" href="index.php?site=news"><?php echo $navigation_language['news']; ?></a></div>
        <div class="navi_horz"><a style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF; font-weight:bold; text-align:center;" href="index.php?site=forum"><?php echo $navigation_language['forums']; ?></a></div>
        <div class="navi_horz"><a style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF; font-weight:bold; text-align:center;" href="index.php?site=members"><?php echo $navigation_language['members']; ?></a></div>
        <div class="navi_horz"><a style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF; font-weight:bold; text-align:center;" href="index.php?site=clanwars"><?php echo $navigation_language['matches']; ?></a></div>
        <div class="navi_horz"><a style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF; font-weight:bold; text-align:center;" href="index.php?site=links"><?php echo $navigation_language['links']; ?></a></div>
        <div class="navi_horz"><a style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF; font-weight:bold; text-align:center;" href="index.php?site=polls"><?php echo $navigation_language['polls']; ?></a></div>
        <div class="navi_horz"><a style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF; font-weight:bold; text-align:center;" href="index.php?site=guestbook"><?php echo $navigation_language['guestbook']; ?></a></div>
        <div class="navi_horz"><a style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF; font-weight:bold; text-align:center;" href="index.php?site=gallery"><?php echo $navigation_language['gallery']; ?></a></div>
        <div class="navi_horz"><a style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF; font-weight:bold; text-align:center;" href="index.php?site=contact"><?php echo $navigation_language['contact']; ?></a></div>
        <div class="navi_horz"><a style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF; font-weight:bold; text-align:center;" href="index.php?site=imprint"><?php echo $navigation_language['imprint']; ?></a></div>
        
        </div>
    	<div class="header_03_right"><div style="width:33px; float:left;">&nbsp;</div><div style="padding-top:9px; float:left;">Community Navigation</div></div>
    
    </div>   
</div>      


<div id="content">

<div id="content_links">
            <div id="boxes_l"><div class="top"><div class="input"><?php echo $index_language['latest_news']; ?></div></div><div class="box_inhalt"><? include("sc_headlines.php"); ?></div></div>
            <div id="boxes_l"><div class="top"><div class="input"><?php echo $index_language['statistics']; ?></div></div><div class="box_inhalt"><? include("counter.php"); ?></div></div>
            <div id="boxes_l"><div class="top"><div class="input"><?php echo $index_language['hotest_news']; ?></div></div><div class="box_inhalt"><? include("sc_topnews.php"); ?></div></div>
            <div id="boxes_l"><div class="top"><div class="input"><?php echo $index_language['demos']; ?></div></div><div class="box_inhalt"><? include("sc_demos.php"); ?></div></div>
            <div id="boxes_l"><div class="top"><div class="input"><?php echo $index_language['upcoming_events']; ?></div></div><div class="box_inhalt"><? include("sc_upcoming.php"); ?></div></div>
</div>

<div id="content_mitte">
<div class="content_mitte_unten">

<table width="577" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="389" align="left" valign="top"><div style="padding:5px;"><!-- php site include -->
            <?
      if(!isset($site)) $site="news";
      //Sichheitsl&uuml;cke beheben
      $invalide = array('/','/\/',':','.');
      $site = str_replace($invalide,' ',$site);
      if(!file_exists($site.".php")) $site = "news";
      include($site.".php");
      ?>
            <!-- end php site include --></div></td>
    <td width="185" align="left" valign="top"><div style="margin-left:3px;" id="boxes_m">
				<div class="top_m">   	<div class="input">Google Adds</div></div>
			  <div style="padding-left:3px;" class="box_inhalt_m"><script type="text/javascript"><!--
google_ad_client = "pub-2076258766706988";
/* 160x600, Erstellt 19.05.08 */
google_ad_slot = "9169120677";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
			</div>
    
    
            
            
            
            
            </td>
  </tr>
</table>


</div>


</div>

<div id="content_rechts">
            <div id="boxes_r"><div class="top_r"><div class="input"><?php echo $index_language['shoutbox']; ?></div></div><div class="box_inhalt_r"><? include("shoutbox.php"); ?></div></div>
            <div id="boxes_r"><div class="top_r"><div class="input"><?php echo $index_language['matches']; ?></div></div><div class="box_inhalt_r"><? include("sc_results.php"); ?></div></div>
            <div id="boxes_r"><div class="top_r"><div class="input"><?php echo $index_language['downloads']; ?></div></div><div class="box_inhalt_r"><? include("files.php"); ?></div></div>
            <div id="boxes_r"><div class="top_r"><div class="input"><?php echo $index_language['articles']; ?></div></div><div class="box_inhalt_r"><? include("articles.php"); ?></div></div>
            <div id="boxes_r"><div class="top_r"><div class="input"><?php echo $index_language['random_user']; ?></div></div><div class="box_inhalt_r"><? include("randompic.php"); ?></div></div>
</div>


</div>

</td></tr></table>
<div class="footer">Design by <a style="color:#333333; font-family:Arial; font-size:11px;" href="http://www.nexor-community.de" target="_blank">nexor-community.de</a> | <a style="color:#333333; font-family:Arial; font-size:11px;" href="http://cms.webspell.org" target="_blank">CMS webSPELL v4.2</a> | webSPELL Templates from <a style="color:#333333; font-family:Arial; font-size:11px;" href="http://www.templates-royal.de" title="webSPELL Templates" target="_blank">Templates Royal</a> </div>
<br /><br />
</div>
</div>
</body>
</html>
