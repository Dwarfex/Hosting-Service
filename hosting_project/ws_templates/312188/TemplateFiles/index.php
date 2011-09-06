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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Clanpage using webSPELL 4 CMS" />
<meta name="author" content="webspell.org" />
<meta name="keywords" content="webspell, webspell4, clan, cms" />
<meta name="copyright" content="Copyright &copy; 2005 - 2009 by webspell.org" />
<meta name="generator" content="webSPELL" />

<!-- Head & Title include -->
<title><?php echo PAGETITLE; ?></title>
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<!-- end Head & Title include -->

<!-- standard Design stylesheet -->
<style type="text/css">
body {
	margin: 5px 0 10px 0;
	padding: 0;
	font: 10px Verdana, Arial, Tahoma, Helvetica, sans-serif;
	color: #000000;
	background-image: url(Bilder/bgxlwebsolution.jpg);
	background-color: #000000;
	background-repeat: no-repeat;
	background-position:center top;
}
div#container { width: 1000px; margin: 0 auto; padding: 0; text-align: left; }
div#head { width: 1000px; height: 12px; background-color: #36befc; }
div#content { width: 1000px; margin: 0; background-color: #ffffff; }
div#content .cols { float: left; width: 800px; }
div#content .col1 { float: left; width: 200px; border-right: 1px solid #cccccc; }
div#content .col2 { margin-left: 200px; text-align: justify; }
div#content .col3 { margin-left: 800px; border-left: 1px solid #cccccc; }
div#footer { clear: both; height: 50px; width: 1000px; text-align: center; background-color: <?php echo BG_4; ?>; }
hr.grey { height: 1px; background-color: #cccccc; color: #cccccc; border: none; margin: 10px 0 4px 0; }
.nav { color: #36befc; font-weight: bold; }
body,td,th {
	font-family: Arial;
}
a {
	font-family: Arial;
	color: #e43f19;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #e43f19;
}
a:hover {
	text-decoration: underline;
	color: #F37619;
}
a:active {
	text-decoration: none;
	color: #EE7A62;
}
.Stil2 {color: #666666}
</style>
<!--[if IE]>
<style type="text/css">
div#content .col2 { width: 74%; }
div#content .col3 { width: 19%; }
hr.grey { margin: 3px 0 3px 0; }
</style>
<![endif]-->
<!--[if lte IE 7]>
<style type="text/css">
hr.grey { margin: 3px 0 -3px 0; }
</style>
<![endif]-->
<!--[if gte IE 8]>
<style type="text/css">
hr.grey { margin: 3px 0 3px 0;}
</style>
<![endif]-->
<!-- end standard Design stylesheet -->

<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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

<body onload="MM_preloadImages('Bilder/mouseover/wowxlwebsolutionnaviover_05.png','Bilder/mouseover/wowxlwebsolutionnaviover_06.png','Bilder/mouseover/wowxlwebsolutionnaviover_07.png','Bilder/mouseover/wowxlwebsolutionnaviover_08.png','Bilder/mouseover/wowxlwebsolutionnaviover_09.png')">
<center>
  <table width="1157" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="502"><img src="Bilder/logo.png" width="502" height="145" /></td>
          <td width="654"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="35">&nbsp;</td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="59"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Home','','Bilder/mouseover/wowxlwebsolutionnaviover_05.png',1)"><img src="Bilder/navi/worldofwarcraftxlwebsolution_05.png" name="Home" width="59" height="70" border="0" id="Home" /></a></td>
                  <td width="77"><a href="index.php?site=forum" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Forum','','Bilder/mouseover/wowxlwebsolutionnaviover_06.png',1)"><img src="Bilder/navi/worldofwarcraftxlwebsolution_06.png" name="Forum" width="77" height="70" border="0" id="Forum" /></a></td>
                  <td width="90"><a href="index.php?site=contact" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Kontakt','','Bilder/mouseover/wowxlwebsolutionnaviover_07.png',1)"><img src="Bilder/navi/worldofwarcraftxlwebsolution_07.png" name="Kontakt" width="90" height="70" border="0" id="Kontakt" /></a></td>
                  <td width="71"><a href="index.php?site=aboutus" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Regeln','','Bilder/mouseover/wowxlwebsolutionnaviover_08.png',1)"><img src="Bilder/navi/worldofwarcraftxlwebsolution_08.png" name="Regeln" width="71" height="70" border="0" id="Regeln" /></a></td>
                  <td width="128"><a href="index.php?site=imprint" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Impressum','','Bilder/mouseover/wowxlwebsolutionnaviover_09.png',1)"><img src="Bilder/navi/worldofwarcraftxlwebsolution_09.png" name="Impressum" width="128" height="70" border="0" id="Impressum" /></a></td>
                  <td width="231"><img src="Bilder/navi/worldofwarcraftxlwebsolution_10.png" width="230" height="70" /></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="40">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="262"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="178" background="Bilder/login.jpg" height="145"><div align="center">
            <?php include("login.php"); ?>
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="245">&nbsp;</td>
          <td width="619"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><span style="padding:10px;">
                <?php
					if(!isset($site)) $site="news";
					$invalide = array('\\','/','/\/',':','.');
					$site = str_replace($invalide,' ',$site);
					if(!file_exists($site.".php")) $site = "news";
					include($site.".php");
					?>
              </span></td>
            </tr>
            <tr>
              <td><div align="center"><span class="Stil3 Stil1"><a href="index.php?site=">Home</a> | <a href="index.php?site=linkus">Link Us</a> |<a href="index.php?site=forum"> Forum</a> | <a href="index.php?site=imprint">Impressum</a> | <a href="index.php?site=contact">Kontakt </a></span></div></td>
            </tr>
            <tr>
              <td><div align="center" class="Stil2"><span class="Stil2">Design by © 2009 <a href="http://www.xl-websolution.de" target="_blank">xL-Websolution.de</a><br />
  Graphics ©2009 Blizzard Entertainment. Alle Rechte vorbehalten. Cataclysm ist eine Marke, World of Warcraft und Blizzard Entertainment sind Marken oder eingetragene Marken von Blizzard Entertainment, Inc. in den USA und/oder anderen Länder</span>n.</div></td>
            </tr>
          </table></td>
          <td width="293">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><div align="center" class="Stil2">- More <a href="http://www.templates4all.de" target="_blank" title="webSPELL Templates">webSPELL Templates</a> for all! -</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</center>
</body>
</html>
