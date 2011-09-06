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
/*this is just a test for the subversion branch feature, just ignore it!*/
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
<title><?php echo PAGETITLE; ?></title>
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/tabcontent.css" />
<script type="text/javascript" src="js/tabcontent.js"></script>
<style type="text/css">
<!--
body {
	background-color: #2d2d2d;
	margin-top: 0px;
	margin-bottom: 0px;
	background-image: url(slike/bg.jpg);
	background-repeat: repeat-x;
}
-->
</style>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>
<body onload="MM_preloadImages('slike/nav/_hover_09.jpg','slike/nav/_hover_10.jpg','slike/nav/_hover_11.jpg','slike/nav/_hover_12.jpg')">
<center>
<table width="1010" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="slike/header/slika_02.jpg" width="736" height="169" /></td>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="slike/header/slika_03.jpg" width="208" height="35" /></td>
              </tr>
              <tr>
                <td background="slike/header/slika_06.jpg" height="112" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php include("sc_topmatch.php"); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><img src="slike/header/slika_07.jpg" width="208" height="22" /></td>
              </tr>
            </table></td>
            <td><img src="slike/header/slika_04.jpg" width="66" height="169" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="700" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="slike/nav/slika_08.jpg" width="30" height="76" /></td>
                <td id="subnav"><a href="#" rel="info" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','slike/nav/_hover_09.jpg',1)"><img src="slike/nav/slika_09.jpg" name="Image7" width="127" height="76" border="0" id="Image7" /></a><a href="#" rel="clan" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','slike/nav/_hover_10.jpg',1)"><img src="slike/nav/slika_10.jpg" name="Image8" width="127" height="76" border="0" id="Image8" /></a><a href="#" rel="comm" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','slike/nav/_hover_11.jpg',1)"><img src="slike/nav/slika_11.jpg" name="Image9" width="127" height="76" border="0" id="Image9" /></a><a href="#" rel="misc" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','slike/nav/_hover_12.jpg',1)"><img src="slike/nav/slika_12.jpg" name="Image10" width="137" height="76" border="0" id="Image10" /></a></td>
                <td><img src="slike/nav/slika_13.jpg" width="152" height="76" /></td>
              </tr>
              <tr>
                <td background="slike/subnav.jpg" height="36" colspan="6" valign="top" style="padding-left:25px; padding-top:7px">
                <div id="info" class="tabcontent"><a href="index.php?site=news"><img src="slike/links/news.jpg" border="0" /></a> <a href="index.php?site=news&amp;action=archive"><img src="slike/links/archive.jpg" border="0" /></a> <a href="index.php?site=articles"><img src="slike/links/articles.jpg" border="0" /></a> <a href="index.php?site=calendar"><img src="slike/links/calendar.jpg" border="0" /></a> <a href="index.php?site=search"><img src="slike/links/search.jpg" border="0" /></a></div>
                <div id="clan" class="tabcontent"><a href="index.php?site=clanwars"><img src="slike/links/clanwars.jpg" border="0" /></a> <a href="index.php?site=squads"><img src="slike/links/squads.jpg" border="0" /></a> <a href="index.php?site=about"><img src="slike/links/about.jpg" border="0" /></a> <a href="index.php?site=history"><img src="slike/links/history.jpg" border="0" /></a> <a href="index.php?site=awards"><img src="slike/links/awards.jpg" border="0" /></a></div>
                <div id="comm" class="tabcontent"><a href="index.php?site=forum"><img src="slike/links/forums.jpg" border="0" /></a> <a href="index.php?site=registered_users"><img src="slike/links/reg_users.jpg" border="0" /></a> <a href="index.php?site=polls"><img src="slike/links/polls.jpg" border="0" /></a> <a href="index.php?site=guestbook"><img src="slike/links/guestbook.jpg" border="0" /></a> <a href="index.php?site=whoisonline"><img src="slike/links/whoisonline.jpg" border="0" /></a></div>
                <div id="misc" class="tabcontent"><a href="index.php?site=sponsors"><img src="slike/links/sponsors.jpg" border="0" /></a> <a href="index.php?site=files"><img src="slike/links/downloads.jpg" border="0" /></a> <a href="index.php?site=gallery"><img src="slike/links/gallery.jpg" border="0" /></a> <a href="index.php?site=server"><img src="slike/links/servers.jpg" border="0" /></a> <a href="index.php?site=linkus"><img src="slike/links/linkus.jpg" border="0" /></a></div>
                <script type="text/javascript">
var myflowers=new ddtabcontent("subnav") //enter ID of Tab Container
myflowers.setpersist(true) //toogle persistence of the tabs' state
myflowers.setselectedClassTarget("link") //"link" or "linkparent"
myflowers.init()
</script>
                </td>
              </tr>
            </table></td>
            <td background="slike/login/bg.jpg" height="112" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td style="padding:7px;"><?php include("login.php"); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="443" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="slike/box/featured_news.jpg" width="443" height="46" /></td>
              </tr>
              <tr>
                <td background="slike/box/featured.jpg" height="173" valign="top" style="padding-left:15px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php include("features.php"); ?></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            <td width="275" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="slike/box/latest_matches.jpg" width="275" height="46" /></td>
              </tr>
              <tr>
                <td background="slike/box/latest_matches_bg.jpg" height="154" valign="top" style="padding-left:3px; padding-right:6px;"><?php include("sc_results.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/box/m_view_left.jpg" width="212" height="19" /><a href="index.php?site=clanwars"><img src="slike/box/m_view.jpg" width="63" height="19" border="0" /></a></td>
              </tr>
            </table></td>
            <td width="292" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="slike/box/latest_news.jpg" width="292" height="46" /></td>
              </tr>
              <tr>
                <td background="slike/box/latest_news_bg.jpg" height="154" valign="top" style="padding-left:3px; padding-right:20px;"><?php include("sc_headlines.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/box/n_view_left.jpg" width="212" height="19" /><a href="index.php?site=news"><img src="slike/box/n_view.jpg" width="80" height="19" border="0" /></a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td background="slike/box_left/bg.jpg" width="292" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="slike/box_left/forum_topics_top.jpg" width="292" height="46" /></td>
              </tr>
              <tr>
                <td background="slike/box_left/topics_bg.jpg" height="155" valign="top" style="padding-left:37px; padding-right:5px;"><?php include("latesttopics.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/box_left/t_view_l.jpg" width="231" height="17" /><a href="index.php?site=forum"><img src="slike/box_left/t_view.jpg" width="61" height="17" border="0" /></a></td>
              </tr>
              <tr>
                <td><img src="slike/box_left/top_downloads_top.jpg" width="292" height="48" /></td>
              </tr>
              <tr>
                <td background="slike/box_left/top_downloads_bg.jpg" height="153" valign="top" style="padding-left:40px; padding-right:4px;"><?php include("sc_files.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/box_left/d_view_l.jpg" width="235" height="17" /><a href="index.php?site=files"><img src="slike/box_left/d_view.jpg" width="57" height="17" border="0" /></a></td>
              </tr>
              <tr>
                <td><img src="slike/box_left/shoutbox.jpg" width="292" height="46" /></td>
              </tr>
              <tr>
                <td valign="top" style="padding-left:17px;"><?php include("shoutbox.php"); ?></td>
              </tr>
            </table></td>
            <td bgcolor="#FFFFFF" width="469" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="slike/content.jpg" width="469" height="38" /></td>
              </tr>
              <tr>
                <td style="padding-left:3px; padding-top:4px; padding-right:3px;"><?php
					if(!isset($site)) $site="news";
					$invalide = array('\\','/','/\/',':','.');
					$site = str_replace($invalide,' ',$site);
					if(!file_exists($site.".php")) $site = "news";
					include($site.".php");
					?></td>
              </tr>
            </table></td>
            <td background="slike/spon_part/bg.jpg" width="249" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="slike/spon_part/sponsors.jpg" width="249" height="64" /></td>
              </tr>
              <tr>
                <td align="center"><?php include("sc_sponsors.php"); ?></td>
              </tr>
              <tr>
                <td><img src="slike/spon_part/partners.jpg" width="249" height="66" /></td>
              </tr>
              <tr>
                <td align="center"><?php include("partners.php"); ?><br />More <a href="http://www.templates-royal.de" target="_blank" title="webSPELL Templates">webSPELL Templates</a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><a href="http://www.kode-designs.com"><img src="slike/footer/start.jpg" width="292" height="50" border="0" /></a></td>
            <td><img src="slike/footer/mid.jpg" width="469" height="50" /></td>
            <td><img src="slike/footer/end.jpg" width="249" height="50" border="0" usemap="#Map" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</center>

<map name="Map" id="Map"><area shape="rect" coords="153,14,231,40" href="http://www.templates-royal.de" />
</map></body>
</html>
