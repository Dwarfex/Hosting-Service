<!-- Designcopyright by scappi Portfolio -->
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
#   Copyright 2005-2010 by webspell.org                                  #
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

<!-- Head & Title include -->
<title><?php echo PAGETITLE; ?></title>
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<!-- end Head & Title include -->


<script type="text/JavaScript">
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
<style type="text/css">
<!--
.Stil2 {color: #666666}
-->
</style>
</head>

<body onload="MM_preloadImages('images/Mouseover/index_03.jpg','images/Mouseover/index_04.jpg','images/Mouseover/index_05.jpg','images/Mouseover/index_06.jpg','images/Mouseover/index_07.jpg','images/Mouseover/index_08.jpg')">
<center>
  <table width="1024" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td scope="col"><img src="images/index_01.jpg" width="1024" height="246" alt="" /></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td scope="col"><img src="images/index_02.jpg" width="159" height="48" alt="" /></td>
              <td scope="col"><a href="index.php?site=news" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','images/Mouseover/index_03.jpg',1)"><img src="images/index_03.jpg" name="Image3" width="113" height="48" border="0" id="Image3" alt="" /></a></td>
              <td scope="col"><a href="index.php?site=squads" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/Mouseover/index_04.jpg',1)"><img src="images/index_04.jpg" name="Image4" width="112" height="48" border="0" id="Image4" alt="" /></a></td>
              <td scope="col"><a href="index.php?site=clanwars" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','images/Mouseover/index_05.jpg',1)"><img src="images/index_05.jpg" name="Image5" width="130" height="48" border="0" id="Image5" alt="" /></a></td>
              <td scope="col"><a href="index.php?site=forum" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/Mouseover/index_06.jpg',1)"><img src="images/index_06.jpg" name="Image6" width="104" height="48" border="0" id="Image6" alt="" /></a></td>
              <td scope="col"><a href="index.php?site=sponsors" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/Mouseover/index_07.jpg',1)"><img src="images/index_07.jpg" name="Image7" width="120" height="48" border="0" id="Image7" alt="" /></a></td>
              <td scope="col"><a href="index.php?site=imprint" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/Mouseover/index_08.jpg',1)"><img src="images/index_08.jpg" name="Image8" width="128" height="48" border="0" id="Image8" alt="" /></a></td>
              <td scope="col"><img src="images/index_09.jpg" width="158" height="48" alt="" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td scope="col"><img src="images/index_10.jpg" width="162" height="103" alt="" /></td>
              <td width="701" height="103" align="center" valign="middle" style="background-image: url(images/index_11.jpg);" scope="col"><?php include("partners.php"); ?></td>
              <td scope="col"><img src="images/index_12.jpg" width="161" height="103" alt="" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td scope="col"><img src="images/index_13.jpg" width="162" height="39" alt="" /></td>
              <td scope="col"><img src="images/index_14.jpg" width="701" height="39" alt="" /></td>
              <td scope="col"><img src="images/index_15.jpg" width="161" height="39" alt="" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td scope="col" width="162" height="100%" style="background-image: url(images/index_16.jpg);">&nbsp;</td>
              <td scope="col" width="701" height="100%" style="background-image: url(images/index_17.jpg);"><?php
					if(!isset($site)) $site="news";
					$invalide = array('\\','/','/\/',':','.');
					$site = str_replace($invalide,' ',$site);
					if(!file_exists($site.".php")) $site = "news";
					include($site.".php");
					?></td>
              <td scope="col" width="161" height="100%" style="background-image: url(images/index_18.jpg);"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td scope="col"><img src="images/index_19.jpg" width="162" height="276" alt="" /></td>
              <td scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td scope="col"><img src="images/index_20.jpg" width="701" height="36" alt="" /></td>
                </tr>
                <tr>
                  <td width="701" height="29" align="center" style="background-image: url(images/index_22.jpg);"><span class="Stil2">&copy; by <strong><?php echo $myclanname ?></strong> | Design &amp; Anpassung by <strong>scappi Portfolio</strong> | <a href="http://www.templates4all.de" target="_blank" title="webSPELL Templates">webSPELL Templates</a></span></td>
                </tr>
                <tr>
                  <td><img src="images/index_23.jpg" width="701" height="211" alt="" /></td>
                </tr>
              </table></td>
              <td scope="col"><img src="images/index_21.jpg" width="161" height="276" alt="" /></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</center>
</body>
</html>