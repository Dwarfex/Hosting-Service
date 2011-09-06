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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Clanpage using a free template of starrave.net" />
<meta name="author" content="sTaRRaVe.net" />
<meta name="keywords" content="webspell, webspell4, clan, cms" />
<meta name="copyright" content="Copyright &copy; 2005 - 2009 by clanname.net" />
<meta name="generator" content="webSPELL" />

<!-- Head & Title include -->
<title><?php echo PAGETITLE; ?></title>
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<!-- end Head & Title include -->
    <style type="text/css">
.navigation {
  color:            #ffffff;
}

.navigation a:link {
  color:            #ffffff;
}

.navigation a:visited {
  color:            #ffffff;
}

.navigation a:hover {
  color:            #d60000;
}

.navigation a:active {
  background-color: #CCCCFF;
  color:            #CC0000;
}
</style>

</head>

<body>
<center>
<table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="Bilder/improved_01.jpg" width="1024" height="15" alt="" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="518"><img src="Bilder/improved_02.jpg" width="518" height="147" alt="" /></td>
        <td width="506"><img src="Bilder/improved_03.jpg" width="506" height="147" alt="" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="518"><a href="http://www.sTaRRaVe.net" target="_blank">
		<img src="Bilder/improved_04.jpg" width="518" height="15" alt="" border="0" /></a></td>
        <td width="506"><img src="Bilder/improved_05.jpg" width="506" height="15" alt="" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="136"><a href="#" onclick="showit(0)"; MM_swapImage('Image1','','Bilder/improved_06.jpg',1)">
			<img alt="" src="Bilder/improved_06.jpg" name="Image1" id="Image1" border="0"></a></td>
        <td width="138"><a href="#" onclick="showit(1)"; MM_swapImage('Image2','','Bilder/improved_07.jpg',2)">
			<img alt="" src="Bilder/improved_07.jpg" name="Image2" id="Image2" border="0"></a></td>
        <td width="143"><a href="#" onclick="showit(2)"; MM_swapImage('Image3','','Bilder/improved_08.jpg',3)">
			<img alt="" src="Bilder/improved_08.jpg" name="Image3" id="Image3" border="0"></a></td>
        <td width="116"><a href="#" onclick="showit(3)"; MM_swapImage('Image4','','Bilder/improved_09.jpg',4)">
			<img alt="" src="Bilder/improved_09.jpg" name="Image4" id="Image4" border="0"></a></td>
        <td width="491"><img src="Bilder/improved_10.jpg" alt="" width="491" height="40" border="0" usemap="#Map" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="72"><img src="Bilder/improved_11.jpg" width="1" height="27" /><img src="Bilder/improved_12.jpg" width="71" height="27" alt="" /></td>
        <td width="952" background="Bilder/improved_13.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
                                <td width="2%">&nbsp;</td>
                                <td width="89%">&nbsp;<div class="navigation" id="describe" onMouseover="clear_delayhide()" onMouseout="resetit(event)"></div></td>
                                <td width="9%">&nbsp;</td>
                              </tr>
							  <script language="JavaScript1.2">
var submenu=new Array()
submenu[0]='<a href="?site=news">News<\/a> | <a href="?site=news&action=archive">Newsarchiv<\/a> | <a href="?site=articles">Articles<\/a> | <a href="?site=counter_stats">Statistics<\/a> | <a href="?site=imprint">Imprint<\/a> | <a href="?site=polls">Polls<\/a>'
submenu[1]='<a href="?site=squads">Teams<\/a> | <a href="?site=clanwars">Results<\/a> | <a href="?site=awards">Awards<\/a> | <a href="?site=sponsors">Sponsors<\/a> | <a href="?site=linkus">Linkus<\/a>'
submenu[2]='<a href="?site=forum">Forum<\/a> | <a href="?site=guestbook">Guestbook<\/a> | <a href="?site=contact">Calendar<\/a> | <a href="?site=server">Server<\/a> | <a href="?site=registered_users">Userlist<\/a>'
submenu[3]='<a href="?site=files">Files<\/a> | <a href="?site=links">Links<\/a> | <a href="?site=contact">Contact<\/a>'
var delay_hide=5000


var menuobj=document.getElementById? document.getElementById("describe") : document.all? document.all.describe : document.layers? document.dep1.document.dep2 : ""

function showit(which){
clear_delayhide()
thecontent=(which==-1)? "" : submenu[which]
if (document.getElementById||document.all)
menuobj.innerHTML=thecontent
else if (document.layers){
menuobj.document.write(thecontent)
menuobj.document.close()
}
}


function resetit(e){
if (document.all&&!menuobj.contains(e.toElement))
delayhide=setTimeout("showit(-1)",delay_hide)
else if (document.getElementById&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhide=setTimeout("showit(-1)",delay_hide)
}

function clear_delayhide(){
if (window.delayhide)
clearTimeout(delayhide)
}

function contains_ns6(a, b) {
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

</script>

            </table></div></td>
      </tr>
    </table></td>
  </tr>
    <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><table width="186" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top"><img src="Bilder/improved_15.jpg" width="186" height="40" alt="" /></td>
          </tr>
          <tr>
            <td valign="top" background="Bilder/improved_19.jpg">
			<p align="center"><?php include("sc_mainsponsor.php"); ?></p>
              </td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_21.jpg" width="186" height="14" alt="" /></td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_23.jpg" width="186" height="39" alt="" /></td>
          </tr>
          <tr>
            <td valign="top" background="Bilder/improved_25.jpg">
					<center><?php include("sc_sponsors.php"); ?></center>
</td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_28.jpg" width="186" height="13" alt="" /></td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_29.jpg" width="186" height="42" alt="" /></td>
          </tr>
          <tr>
            <td valign="top" background="Bilder/improved_31.jpg">
					<center><?php include("partners.php"); ?></center></td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_37.jpg" width="186" height="24" alt="" /><p>
<?php include("navigation.php"); ?></td>
          </tr>
        </table></td>
        <td width="649" valign="top">
						<div align="center">
						<table border="0" width="95%" cellspacing="0" cellpadding="0">
							<tr>
								<td>
					<!-- php site include -->
					<?php
					if(!isset($site)) $site="news";
					$invalide = array('\\','/','/\/',':','.');
					$site = str_replace($invalide,' ',$site);
					if(!file_exists($site.".php")) $site = "news";
					include($site.".php");
					?>
					<!-- content include --></td>
							</tr>
						</table>
							</div>
		</td>
        <td valign="top" width="189"><table width="186" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td  background="Bilder/improved_17.jpg" height="33">
			<p align="center"><div id="menu">
				<p align="center"><?php echo $myclanname.".".$index_language['login']; ?></div>
          </tr>
          <tr>
            <td valign="top" background="Bilder/improved_18.jpg">
<table border="0" width="90%" align="center" cellspacing="0" cellpadding="0">
						<tr>
							<td><?php include("login.php"); ?></td>
						</tr>
					</table>
              </td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_20.jpg" width="189" height="21" alt="" /></td>
          </tr>
          <tr>
            <td valign="bottom" background="Bilder/improved_22.jpg" height="31">
			<p align="center"><div id="menu">
				<p align="center"><?php echo $myclanname.".".$index_language['latest_news']; ?></div></td>
          </tr>
          <tr>
            <td valign="top" background="Bilder/improved_24.jpg">
				<table border="0" width="90%" align="center" cellspacing="0" cellpadding="0">
						<tr>
							<td><?php include("sc_headlines.php"); ?>						</tr>
					</table></td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_26.jpg" width="189" height="16" alt="" /></td>
          </tr>
                    <tr>
            <td valign="bottom" background="Bilder/improved_22.jpg" height="31">
			<p align="center"><div id="menu">
				<p align="center"><?php echo $myclanname.".".$index_language['matches']; ?></div></td>
          </tr>
          <tr>
            <td valign="top" background="Bilder/improved_24.jpg">
								<table border="0" width="90%" align="center" cellspacing="0" cellpadding="0">
						<tr>
							<td><?php include("sc_results.php"); ?>						</tr>
					</table></td></td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_26.jpg" width="189" height="16" alt="" /></td>
          </tr>
          <tr>
            <td valign="bottom" background="Bilder/improved_27.jpg" height="30">
			<div id="menu">
				<p align="center"><?php echo $myclanname.".".$index_language['random_user']; ?></div></td>
          </tr>
          <tr>
            <td valign="top" background="Bilder/improved_30.jpg"><b>
									<table border="0" width="90%" align="center" cellspacing="0" cellpadding="0">
						<tr>
							<td><?php include("sc_randompic.php"); ?>						</tr>
					</table></td></td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_32.jpg" width="189" height="17" alt="" /></td>
          </tr>
                    </tr>
          <tr>
            <td valign="bottom" background="Bilder/improved_27.jpg" height="30">
			<p align="center"><div id="menu">
				<p align="center"><?php echo $myclanname.".".$index_language['poll']; ?></div></td>
          </tr>
          <tr>
            <td valign="top" background="Bilder/improved_30.jpg">				<table border="0" width="90%" align="center" cellspacing="0" cellpadding="0">
						<tr>
							<td><?php include("poll.php"); ?>						</tr>
					</table></td></td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_32.jpg" width="189" height="17" alt="" /></td>
          </tr>
                    </tr>
          <tr>
            <td valign="bottom" background="Bilder/improved_27.jpg" height="30">
			<p align="center"><div id="menu">
				<p align="center"><?php echo $myclanname.".".$index_language['statistics']; ?></div></td>
          </tr>
          <tr>
            <td valign="top" background="Bilder/improved_30.jpg">
								<table border="0" width="90%" align="center" cellspacing="0" cellpadding="0">
						<tr>
							<td><?php include("counter.php"); ?>						</tr>
					</table></td></td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_32.jpg" width="189" height="17" alt="" /></td>
          </tr>
          <tr>
            <td valign="bottom" background="Bilder/improved_33.jpg" height="31">
			<p align="center"><div id="menu">
				<p align="center"><?php echo $myclanname.".".$index_language['shoutbox']; ?></div></td>
          </tr>
          <tr>
            <td valign="top" background="Bilder/improved_34.jpg">				<table border="0" width="90%" align="center" cellspacing="0" cellpadding="0">
						<tr>
							<td><center><?php include("shoutbox.php"); ?></center>						</tr>
					</table></td></td>
          </tr>
          <tr>
            <td valign="top"><img src="Bilder/improved_35.jpg" width="189" height="53" alt="" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</center>

<map name="Map" id="Map"><area shape="rect" coords="427,8,482,36" href="http://www.templates-royal.de" alt="webSPELL Templates" />
</map></body>
</html>