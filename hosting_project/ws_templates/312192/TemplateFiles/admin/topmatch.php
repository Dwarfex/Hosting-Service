<?php
/*
 ########################################################################
#                                                                        #
#           Version 4       /                        /   /               #
#          -----------__---/__---__------__----__---/---/-               #
#           | /| /  /___) /   ) (_ `   /   ) /___) /   /                 #
#          _|/_|/__(___ _(___/_(__)___/___/_(___ _/___/___               #
#                       Free Content / Management System                 #
#                                   /                                    #
#                                                                        #
#                                                                        #
#   Copyright 2005-2006 by webspell.org                                  #
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
 ########################################################################
*/

$_language->read_module('topmatch');
if(!ispageadmin($userID) OR substr(basename($_SERVER[REQUEST_URI]),0,15) != "admincenter.php") die('Access denied.');
$filepath = "../images/topmatch/";
$settings=safe_query("SELECT * FROM ".PREFIX."topmatch_settings");
$ds=mysql_fetch_array($settings);	
$logowidth = $ds[logowidth];
$logoheight = $ds[logoheight];
$clanlogo = $ds[logo];
$clancountry = $ds[country];
$clanname = $ds[team];
$clanhomepage = $ds[homepage];

if(isset($_GET['action'])) $action = $_GET['action'];
else $action = '';

if(isset($_POST["save"])) {

$matchlink=$_POST['matchlink'];
$league=$_POST['league'];
$maps=$_POST['maps'];
$server=$_POST['server'];
$teamclan=$_POST['team1clan'];


if(isset($_POST["displayed"])) $displayed = $_POST['displayed'];
else $displayed="";
if(!$displayed) $displayed=0;

if(isset($_POST["team1clan"])) $country1 = $clancountry;
else $country1 = $_POST['country1'];

if(isset($_POST["team1clan"])) $team1 = $clanname;
else $team1=$_POST['team1'];

if(isset($_POST["team1clan"])) $homepage1 = $clanhomepage;
else $homepage1 = $_POST['homepage1'];

$country2=$_POST['country2'];
$team2=$_POST['team2'];
$homepage2 = $_POST['homepage2'];
$hour = (int)$_POST['hour'];
$minute = (int)$_POST['minute'];
$day = (int)$_POST['day'];
$month = (int)$_POST['month'];
$year = (int)$_POST['year'];
$date=mktime($hour,$min,0,$month,$day,$year);

$CAPCLASS = new Captcha;
if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
if($date AND $team1 AND $team2) {

if(eregi('http://', $homepage1)) $homepage1=$homepage1;
else $homepage1='http://'.$homepage1;
if(eregi('http://', $homepage2)) $homepage2=$homepage2;
else $homepage2='http://'.$homepage2;

safe_query("INSERT INTO ".PREFIX."topmatch (date, matchlink, league, maps, server, teamclan, country1, team1, homepage1, country2, team2, homepage2, displayed)
	             values('$date', '$matchlink', '$league', '$maps', '$server','$teamclan','$country1', '$team1', '$homepage1', '$country2', '$team2', '$homepage2', '$displayed' )");

$id=mysql_insert_id();	

$logo1= $_FILES['logo1'];
$logo2= $_FILES['logo2'];
$timestamp = time();

			if(isset($_POST["team1clan"])) {
				safe_query("UPDATE ".PREFIX."topmatch SET logo1='".$clanlogo."' WHERE topmID='".$id."'");
				}
				else {
if($logo1['name'] != "") {
			move_uploaded_file($logo1['tmp_name'], $filepath.$logo1['name'].".tmp");
			@chmod($filepath.$logo1['name'].".tmp", 0777);
			$getimg = getimagesize($filepath.$logo1['name'].".tmp");
			if($getimg[0] < 91 && $getimg[1] < 91) {
				$pic = '';
				if($getimg[2] == 1) $pic=$timestamp.'.gif';
				elseif($getimg[2] == 2) $pic=$timestamp.'.jpg';
				elseif($getimg[2] == 3) $pic=$timestamp.'.png';
				if($pic != "") {
					if(file_exists($filepath.$timestamp.'.gif')) unlink($filepath.$timestamp.'.gif');
					if(file_exists($filepath.$timestamp.'.jpg')) unlink($filepath.$timestamp.'.jpg');
					if(file_exists($filepath.$timestamp.'.png')) unlink($filepath.$timestamp.'.png');
					rename($filepath.$logo1['name'].".tmp", $filepath.$pic);
					safe_query("UPDATE ".PREFIX."topmatch SET logo1='".$pic."' WHERE topmID='".$id."'");
				}  else {
					if(unlink($filepath.$logo1['name'].".tmp")) {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatch&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					} else {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatc&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					}
				}
			} else {
				@unlink($filepath.$logo1['name'].".tmp");
				$error = $_language->module['icon_to_big'];
				die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatc&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
			}
		}
		}

if($logo2['name'] != "") {
			move_uploaded_file($logo2['tmp_name'], $filepath.$logo2['name'].".tmp");
			@chmod($filepath.$logo2['name'].".tmp", 0777);
			$getimg = getimagesize($filepath.$logo2['name'].".tmp");
			if($getimg[0] < 91 && $getimg[1] < 91) {
				$pic = '';
				if($getimg[2] == 1) $pic=$timestamp.'_2.gif';
				elseif($getimg[2] == 2) $pic=$timestamp.'_2.jpg';
				elseif($getimg[2] == 3) $pic=$timestamp.'_2.png';
				if($pic != "") {
					if(file_exists($filepath.$timestamp.'_2.gif')) unlink($filepath.$timestamp.'_2.gif');
					if(file_exists($filepath.$timestamp.'_2.jpg')) unlink($filepath.$timestamp.'_2.jpg');
					if(file_exists($filepath.$timestamp.'_2.png')) unlink($filepath.$timestamp.'_2.png');
					rename($filepath.$logo2['name'].".tmp", $filepath.$pic);
					safe_query("UPDATE ".PREFIX."topmatch SET logo2='".$pic."' WHERE topmID='".$id."'");
				}  else {
					if(unlink($filepath.$logo2['name'].".tmp")) {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatch&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					} else {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatc&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					}
				}
			} else {
				@unlink($filepath.$logo2['name'].".tmp");
				$error = $_language->module['icon_to_big'];
				die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatc&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
			}
		}
		
		redirect("admincenter.php?site=topmatch","",0);
		} else echo'<b>'.$_language->module['fill_correctly'].'</b><br /><br /><a href="javascript:history.back()">&laquo; '.$_language->module['back'].'</a>';
	} else echo $_language->module['transaction_invalid'];
}


elseif(isset($_POST['saveedit'])) {
$topmID = $_POST['topmID'];

$matchlink=$_POST['matchlink'];
$league=$_POST['league'];
$maps=$_POST['maps'];
$server=$_POST['server'];
$teamclan=$_POST['team1clan'];
if(isset($_POST["displayed"])) $displayed = $_POST['displayed'];
else $displayed="";
if(!$displayed) $displayed=0;
if(isset($_POST["team1clan"])) $country1 = $clancountry;
else $country1 = $_POST['country1'];

if(isset($_POST["team1clan"])) $team1 = $clanname;
else $team1=$_POST['team1'];

if(isset($_POST["team1clan"])) $homepage1 = $clanhomepage;
else $homepage1 = $_POST['homepage1'];
$country2=$_POST['country2'];
$team2=$_POST['team2'];
$homepage2 = str_replace('http://', '', $_POST['homepage2']);
$hour = (int)$_POST['hour'];
$minute = (int)$_POST['minute'];
$day = (int)$_POST['day'];
$month = (int)$_POST['month'];
$year = (int)$_POST['year'];
$date=mktime($hour,$min,0,$month,$day,$year);

$CAPCLASS = new Captcha;
if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
	if($date AND $team1 AND $team2) {
	
	safe_query("UPDATE ".PREFIX."topmatch SET date='$date',
								 matchlink='$matchlink',
									league='$league',
									maps='$maps',
								 server='$server',
									teamclan='$teamclan',
								 displayed='$displayed',
								 country1='$country1',	
								 team1='$team1',
								 homepage1='$homepage1',
								 country2='$country2',	
								 team2='$team2',
								 homepage2='$homepage2'
									WHERE topmID='$topmID' ");
	
$id = $_POST['topmID'];

$logo1= $_FILES['logo1'];
$logo2= $_FILES['logo2'];
$timestamp = time();

if(isset($_POST["team1clan"])) {
				safe_query("UPDATE ".PREFIX."topmatch SET logo1='".$clanlogo."' WHERE topmID='".$id."'");
				}
				else {
if($logo1['name'] != "") {
			move_uploaded_file($logo1['tmp_name'], $filepath.$logo1['name'].".tmp");
			@chmod($filepath.$logo1['name'].".tmp", 0777);
			$getimg = getimagesize($filepath.$logo1['name'].".tmp");
			if($getimg[0] < 91 && $getimg[1] < 91) {
				$pic = '';
				if($getimg[2] == 1) $pic=$timestamp.'.gif';
				elseif($getimg[2] == 2) $pic=$timestamp.'.jpg';
				elseif($getimg[2] == 3) $pic=$timestamp.'.png';
				if($pic != "") {
					if(file_exists($filepath.$timestamp.'.gif')) unlink($filepath.$timestamp.'.gif');
					if(file_exists($filepath.$timestamp.'.jpg')) unlink($filepath.$timestamp.'.jpg');
					if(file_exists($filepath.$timestamp.'.png')) unlink($filepath.$timestamp.'.png');
					rename($filepath.$logo1['name'].".tmp", $filepath.$pic);
					safe_query("UPDATE ".PREFIX."topmatch SET logo1='".$pic."' WHERE topmID='".$id."'");
				}  else {
					if(unlink($filepath.$logo1['name'].".tmp")) {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatch&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					} else {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatc&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					}
				}
			} else {
				@unlink($filepath.$logo1['name'].".tmp");
				$error = $_language->module['icon_to_big'];
				die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatc&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
			}
		}
}

if($logo2['name'] != "") {
			move_uploaded_file($logo2['tmp_name'], $filepath.$logo2['name'].".tmp");
			@chmod($filepath.$logo2['name'].".tmp", 0777);
			$getimg = getimagesize($filepath.$logo2['name'].".tmp");
			if($getimg[0] < 91 && $getimg[1] < 91) {
				$pic = '';
				if($getimg[2] == 1) $pic=$timestamp.'_2.gif';
				elseif($getimg[2] == 2) $pic=$timestamp.'_2.jpg';
				elseif($getimg[2] == 3) $pic=$timestamp.'_2.png';
				if($pic != "") {
					if(file_exists($filepath.$timestamp.'_2.gif')) unlink($filepath.$timestamp.'_2.gif');
					if(file_exists($filepath.$timestamp.'_2.jpg')) unlink($filepath.$timestamp.'_2.jpg');
					if(file_exists($filepath.$timestamp.'_2.png')) unlink($filepath.$timestamp.'_2.png');
					rename($filepath.$logo2['name'].".tmp", $filepath.$pic);
					safe_query("UPDATE ".PREFIX."topmatch SET logo2='".$pic."' WHERE topmID='".$id."'");
				}  else {
					if(unlink($filepath.$logo2['name'].".tmp")) {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatch&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					} else {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatc&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					}
				}
			} else {
				@unlink($filepath.$logo2['name'].".tmp");
				$error = $_language->module['icon_to_big'];
				die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatc&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
			}
		}
		 
redirect("admincenter.php?site=topmatch","",0);
		} else echo'<b>'.$_language->module['fill_correctly'].'</b><br /><br /><a href="javascript:history.back()">&laquo; '.$_language->module['back'].'</a>';
	} else echo $_language->module['transaction_invalid'];
}


elseif(isset($_POST['savesettings'])) {
$logowidth = (int)$_POST['logowidth'];
$logoheight = (int)$_POST['logoheight'];
$country=$_POST['country'];
$team=$_POST['team'];
$homepage = str_replace('http://', '', $_POST['homepage']);

$CAPCLASS = new Captcha;
if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
	safe_query("UPDATE ".PREFIX."topmatch_settings SET logowidth='$logowidth',
								 logoheight='$logoheight',
									country='$country',
									team='$team',
								 homepage='$homepage'");

$logo1= $_FILES['logo1'];
$timestamp = time();
if($logo1['name'] != "") {
			move_uploaded_file($logo1['tmp_name'], $filepath.$logo1['name'].".tmp");
			@chmod($filepath.$logo1['name'].".tmp", 0777);
			$getimg = getimagesize($filepath.$logo1['name'].".tmp");
			if($getimg[0] < $logowidth && $getimg[1] < $logoheight) {
				$pic = '';
				if($getimg[2] == 1) $pic=$timestamp.'.gif';
				elseif($getimg[2] == 2) $pic=$timestamp.'.jpg';
				elseif($getimg[2] == 3) $pic=$timestamp.'.png';
				if($pic != "") {
					if(file_exists($filepath.$timestamp.'.gif')) unlink($filepath.$timestamp.'.gif');
					if(file_exists($filepath.$timestamp.'.jpg')) unlink($filepath.$timestamp.'.jpg');
					if(file_exists($filepath.$timestamp.'.png')) unlink($filepath.$timestamp.'.png');
					rename($filepath.$logo1['name'].".tmp", $filepath.$pic);
					safe_query("UPDATE ".PREFIX."topmatch_settings SET logo='".$pic."'");
				}  else {
					if(unlink($filepath.$logo1['name'].".tmp")) {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatch&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					} else {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatc&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					}
				}
			} else {
				@unlink($filepath.$logo1['name'].".tmp");
				$error = $_language->module['icon_to_big'];
				die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=topmatc&amp;action=edit&amp;topmID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
			}
		}

}								 
redirect("admincenter.php?site=topmatch","",0);
}

elseif($action == "settings"){
echo'<h1>&curren; <a href="admincenter.php?site=topmatch" class="white">Topmatch</a> &raquo; Topmatch '.$_language->module['settings'].'</h1>';	

	$top=safe_query("SELECT * FROM ".PREFIX."topmatch_settings");
 	$ds=mysql_fetch_array($top);	

	$countrya=safe_query("SELECT short, country FROM ".PREFIX."countries ORDER BY country");
		while($dv=mysql_fetch_array($countrya)) {
		$country.='<option value="'.$dv[short].'">'.$dv[country].'</option>';}
	
	$country=str_replace(' selected', '', $country);
	$country=str_replace('value="'.$ds[country].'"', 'value="'.$ds[country].'" selected', $country);
	
 $CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();	
	
	echo'<form method="post" action="admincenter.php?site=topmatch" enctype="multipart/form-data">
	<table width="100%" border="0" cellspacing="2" cellpadding="4">
<tr>
<td colspan="2"><strong><em>Logo '.$_language->module['settings'].'</em></strong></td>
</tr>
<tr>
<td width="130"><b>Logo '.$_language->module['width'].'</b></td>
<td><input type="text" name="logowidth" value="'.$ds[logowidth].'" size="10" /> 
px</td>
</tr>
<tr>
<td width="130"><b>Logo '.$_language->module['height'].'</b></td>
<td><input type="text" name="logoheight" value="'.$ds[logoheight].'" size="10" />
px</td>
</tr>
<tr>
<td colspan="2"><strong><em><span style="color:#4E6C86;">Team  '.$_language->module['settings'].'</span></em></strong> <small>'.$_language->module['des_settings'].'</small></td>
</tr>
<tr>
<td width="130"><b>Logo</b></td>
<td align="center" ><img src="../images/topmatch/'.$ds[logo].'" alt="" /></td>
<td><input name="logo1" type="file" size="40" /> 
<small>(max. '.$logowidth.' x '.$logoheight.')</small></td>
</tr>
<tr>
<td width="130"><b>'.$_language->module['country'].'</b></td>
<td><select name="country">'.$country.'</select></td>
</tr>
<tr>
<td width="130"><b>Team</b></td>
<td><input type="text" name="team" value="'.$ds[team].'" size="30" /></td>
</tr>
<tr>
<td width="130"><b>Homepage</b></td>
<td><input type="text" name="homepage" value="'.$ds[homepage].'" size="30" /></td>
</tr>
</table>
<br />
<input type="hidden" name="captcha_hash" value="'.$hash.'" />
<input type="submit" name="savesettings" value="'.$_language->module['edit_topmatch'].'" />
<br />
</form>';
}
elseif($action == "add") {
	echo'<h1>&curren; <a href="admincenter.php?site=topmatch" class="white">Topmatch</a> &raquo; '.$_language->module['new_topmatch'].'</h1>';
    for($i=1; $i<32; $i++) {
		    if($i==date("d", $ds[date])) $day.='<option selected>'.$i.'</option>';
			else $day.='<option>'.$i.'</option>';
		}
		for($i=1; $i<13; $i++) {
		    if($i==date("n", $ds[date])) $month.='<option value="'.$i.'" selected>'.date("M", $ds[date]).'</option>';
			else $month.='<option value="'.$i.'">'.date("M", mktime(0,0,0,$i,1,2000)).'</option>';
		}
		for($i=2009; $i<2013; $i++) {
		    if($i==date("Y", $ds[date])) $year.='<option selected>'.$i.'</option>';
			else $year.='<option>'.$i.'</option>';
		}
	
	

			if($ds[displayed]) $displayed = '<option value="0">'.$_language->module['no'].'</option><option value="1" selected>'.$_language->module['yes'].'</option>';
  	else $displayed = '<option value="0" selected>'.$_language->module['no'].'</option><option value="1">'.$_language->module['yes'].'</option>';
			
			
				$countrya=safe_query("SELECT short, country FROM ".PREFIX."countries ORDER BY country");
					while($dv=mysql_fetch_array($countrya)) {
				$country1.='<option value="'.$dv[short].'">'.$dv[country].'</option>';
				}
				
				while($dp=mysql_fetch_array($countrya)) {
				$country2.='<option value="'.$dp[short].'">'.$dp[country].'</option>';
				}
			
				$country1=str_replace(' selected', '', $country1);
				$country1=str_replace('value="'.$ds[country1].'"', 'value="'.$ds[country1].'" selected', $country1);
				$country2=str_replace(' selected', '', $country1);
				$country2=str_replace('value="'.$ds[country2].'"', 'value="'.$ds[country2].'" selected', $country2);
		
		  $CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
	
	echo"<script type=\"text/javascript\">
var box = new Array();
box[0] = 'team1';

function hidd(id)
{
    if(document.getElementById(id).style.display==\"none\")
    	{
							for(i=0;i<box.length;i++)
								{
								document.getElementById(box[i]).style.display=\"none\";
								}
						document.getElementById(id).style.display=\"block\";
     }
    else
					{
						document.getElementById(id).style.display=\"none\";
					}
}        
</script>";
	echo'<form method="post" action="admincenter.php?site=topmatch" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td align="center"><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['date'].'</b></td>
<td><select name="day">
'.$day.'
</select>
<select name="month">
'.$month.'
</select>
<select name="year">
'.$year.'
</select>
-
<input type="text" name="hour" size="2" value="20" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'" />
:
<input type="text" name="min" value="00" size="2" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'" /></td>
</tr>
<tr>
<td><b>'.$_language->module['matchlink'].'</b></td>
<td><input type="text" name="matchlink" size="30" /></td>
</tr>
<tr>
<td><b>'.$_language->module['league'].'</b></td>
<td><input type="text" name="league" size="30" /></td>
</tr>
<tr>
<td><b>'.$_language->module['maps'].'</b></td>
<td><input type="text" name="maps" size="30" /></td>
</tr>
<tr>
<td><b>'.$_language->module['server'].'</b></td>
<td><input type="text" name="server" size="30" /></td>
</tr>
<tr>
<td><b>'.$_language->module['topmatch_displayed'].'</b></td>
<td><input type="checkbox" name="displayed" value="1" checked="checked" /></td>
</tr>';
echo"
<tr>
<td><b>".$_language->module['team1_our']."</b></td>
<td><input type=\"checkbox\" name=\"team1clan\" value=\"1\" onclick=\"hidd('team1')\" /></td></tr>";
echo'
</table>
</td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0" id="team1" style="display:inline;">
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td align="left" width="130"><strong><em><span style="color:#4E6C86;">Team 1</span></em></strong></td>
</tr>
<tr>
<td align="left" width="130" height="79"><b>'.$_language->module['logo1'].'</b></td>
<td align="left" height="79"><input name="logo1" type="file" size="40" /> <small>(max. '.$logowidth.' x '.$logoheight.')</small>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['country'].'</b></td>
<td><select name="country1">'.$country1.'</select></td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['team1'].'</b></td>
<td><input type="text" name="team1" size="30" /></td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['hp1'].'</b></td>
<td><input type="text" name="homepage1" size="30" /></td>
</tr>
</table></td>
</tr>
</table></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td align="left" width="130" style="padding-top:10px"><strong><em><span style="color:#4E6C86;">Team 2</span></em></strong></td>
</tr>
<tr>
<td align="left" width="130" height="79"><b>'.$_language->module['logo2'].'</b></td>
<td align="left" height="79">
      <input name="logo2" type="file" size="40" /> <small>(max. '.$logowidth.' x '.$logoheight.')</small>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['country'].'</b></td>
<td><select name="country2">'.$country2.'</select></td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['team2'].'</b></td>
<td><input type="text" name="team2" size="30" /></td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['hp2'].'</b></td>
<td><input type="text" name="homepage2" size="30" /></td>
</tr>
</table></td>
</tr>
</table></td>
</tr>
</table>
</table>
<br />
<input type="hidden" name="captcha_hash" value="'.$hash.'" />
<input type="submit" name="save" value="'.$_language->module['add_topmatch'].'" />
<br />
</form>';
	
}
elseif($action == "edit") {
	echo'<h1>&curren; <a href="admincenter.php?site=topmatch" class="white">Topmatch</a> &raquo; '.$_language->module['edit_topmatch'].'</h1>';
	$topmID = $_GET['topmID'];
	
	$top=safe_query("SELECT * FROM ".PREFIX."topmatch WHERE topmID='$topmID'");
    $ds=mysql_fetch_array($top);	

 $countrya=safe_query("SELECT short, country FROM ".PREFIX."countries ORDER BY country");
 	while($dv=mysql_fetch_array($countrya)) {
	$country.='<option value="'.$dv[short].'">'.$dv[country].'</option>';
	}
	
				for($i=1; $i<32; $i++) {
								if($i==date("d", $ds[date])) $day.='<option selected>'.$i.'</option>';
					else $day.='<option>'.$i.'</option>';
				}
				for($i=1; $i<13; $i++) {
								if($i==date("n", $ds[date])) $month.='<option value="'.$i.'" selected>'.date("M", $ds[date]).'</option>';
					else $month.='<option value="'.$i.'">'.date("M", mktime(0,0,0,$i,1,2000)).'</option>';
				}
				for($i=2000; $i<2010; $i++) {
								if($i==date("Y", $ds[date])) $year.='<option selected>'.$i.'</option>';
					else $year.='<option>'.$i.'</option>';
				}
		
				$countrya=safe_query("SELECT short, country FROM ".PREFIX."countries ORDER BY country");
					while($dv=mysql_fetch_array($countrya)) {
				$country1.='<option value="'.$dv[short].'">'.$dv[country].'</option>';
				}
				
				while($dp=mysql_fetch_array($countrya)) {
				$country2.='<option value="'.$dp[short].'">'.$dp[country].'</option>';
				}
				
			
				$country1=str_replace(' selected', '', $country1);
				$country1=str_replace('value="'.$ds[country1].'"', 'value="'.$ds[country1].'" selected', $country1);
				$country2=str_replace(' selected', '', $country1);
				$country2=str_replace('value="'.$ds[country2].'"', 'value="'.$ds[country2].'" selected', $country2);
				
				if($ds['displayed']=='1') $displayed='<input type="checkbox" name="displayed" value="1" checked="checked" />';
  		else $displayed='<input type="checkbox" name="displayed" value="1" />';
				
				
				if($ds['teamclan']=='1') {
				$teamclan1 = "<input type=\"checkbox\" name=\"team1clan\" value=\"1\" checked=\"checked\" onclick=\"hidd('team1')\" />";
				$tabledisplay = 'display:none';
				}
  		else{
				$teamclan1 = "<input type=\"checkbox\" name=\"team1clan\" value=\"1\" onclick=\"hidd('team1')\" />";
				$tabledisplay = 'display:inline';
				}
				
				
		$hour=date("H", $ds[date]);
		$min=date("i", $ds[date]);

	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
		
	echo"<script type=\"text/javascript\">
var box = new Array();
box[0] = 'team1';

function hidd(id)
{
    if(document.getElementById(id).style.display==\"none\")
    	{
							for(i=0;i<box.length;i++)
								{
								document.getElementById(box[i]).style.display=\"none\";
								}
						document.getElementById(id).style.display=\"block\";
     }
    else
					{
						document.getElementById(id).style.display=\"none\";
					}
}        
</script>";
	echo'<form method="post" action="admincenter.php?site=topmatch" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td align="center"><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['date'].'</b></td>
<td><select name="day">
'.$day.'
</select>
<select name="month">
'.$month.'
</select>
<select name="year">
'.$year.'
</select>
-
<input type="text" name="hour" size="2" value="'.$hour.'" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'" />
:
<input type="text" name="min" value="'.$min.'" size="2" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'" /></td>
</tr>
<tr>
<td><b>'.$_language->module['matchlink'].'</b></td>
<td><input type="text" name="matchlink" value="'.$ds[matchlink].'" size="30" /></td>
</tr>
<tr>
<td><b>'.$_language->module['league'].'</b></td>
<td><input type="text" name="league" value="'.$ds[league].'" size="30" /></td>
</tr>
<tr>
<td><b>'.$_language->module['maps'].'</b></td>
<td><input type="text" name="maps" value="'.$ds[maps].'" size="30" /></td>
</tr>
<tr>
<td><b>'.$_language->module['server'].'</b></td>
<td><input type="text" name="server" value="'.$ds[server].'" size="30" /></td>
</tr>
<tr>
<td><b>'.$_language->module['topmatch_displayed'].'</b></td>
<td>'.$displayed.'</td>
</tr>';
echo"
<tr>
<td><b>".$_language->module['team1_our']."</b></td>
<td>".$teamclan1."</td></tr>";
echo'
</table>
</td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0" id="team1" style="'.$tabledisplay.'">
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td align="left" width="130"><strong><em><span style="color:#4E6C86;">Team 1</span></em></strong></td>
</tr>
<tr>
<td align="left" width="130" height="79"><b>'.$_language->module['logo1'].'</b></td>
<td align="center" ><img src="../images/topmatch/'.$ds[logo1].'" alt="" /></td>
<td align="left" height="79"><input name="logo1" type="file" size="40" /> <small>(max. '.$logowidth.' x '.$logoheight.')</small>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['country'].'</b></td>
<td><select name="country1">'.$country1.'</select></td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['team1'].'</b></td>
<td><input type="text" name="team1" value="'.$ds[team1].'" size="30" /></td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['hp1'].'</b></td>
<td><input type="text" name="homepage1" value="'.$ds[homepage1].'" size="30" /></td>
</tr>
</table></td>
</tr>
</table></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td align="left" width="130" style="padding-top:10px;"><strong><em><span style="color:#4E6C86;">Team 2</span></em></strong></td>
</tr>
<tr>
<td align="left" width="130" height="79"><b>'.$_language->module['logo2'].'</b></td>
<td align="center"><img src="../images/topmatch/'.$ds[logo2].'" alt="" /></td>
<td align="left" height="79">
      <input name="logo2" type="file" size="40" /> <small>(max. '.$logowidth.' x '.$logoheight.')</small>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['country'].'</b></td>
<td><select name="country2">'.$country2.'</select></td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['team2'].'</b></td>
<td><input type="text" name="team2" value="'.$ds[team2].'" size="30" /></td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td width="130"><b>'.$_language->module['hp2'].'</b></td>
<td><input type="text" name="homepage2" value="'.$ds[homepage2].'" size="30" /></td>
</tr>
</table></td>
</tr>
</table></td>
</tr>
</table>
</table>
<br />
<input type="hidden" name="captcha_hash" value="'.$hash.'" />
<input type="hidden" name="topmID" value="'.$topmID.'" />
<input type="submit" name="saveedit" value="'.$_language->module['edit_topmatch'].'" />
<br />
</form>';

	}
	
elseif(isset($_GET['delete'])) {
		$CAPCLASS = new Captcha;
		if($CAPCLASS->check_captcha(0, $_GET['captcha_hash'])) {
		$logos=safe_query("SELECT * FROM ".PREFIX."topmatch WHERE topmID='".$_GET["topmID"]."'");
		$ds=mysql_fetch_array($logos);	
		if(file_exists($filepath.$ds[logo1])) unlink($filepath.$ds[logo1]);
		if(file_exists($filepath.$ds[logo2])) unlink($filepath.$ds[logo2]);
		safe_query("DELETE FROM ".PREFIX."topmatch WHERE topmID='".$_GET["topmID"]."'");
		redirect("admincenter.php?site=topmatch","",0);
	} else echo $_language->module['transaction_invalid'];
}

	else{
	echo'<h1>&curren; Topmatch</h1>';

	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
	
	$all=safe_query("SELECT * FROM ".PREFIX."topmatch order by date ASC");
	$all=mysql_num_rows($all);
		
	if($all) {
	    
			echo'<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		<td align="left"><input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=topmatch&amp;action=add\');return document.MM_returnValue" value="'.$_language->module['new_topmatch'].'" /></td>
		<td align="right"><input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=topmatch&amp;action=settings\');return document.MM_returnValue" value="Topmatch '.$_language->module['settings'].'" /></td>
		</tr>
</table><br />';
			echo'<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#DDDDDD">
			<tr> 
					<td class="title" width="20%"><b>'.$_language->module['date'].'</b></td>
					<td class="title" width="15%"><b>'.$_language->module['league'].'</b></td>
					<td class="title" width="30%"><b>'.$_language->module['how'].'</b></td> 
					<td class="title" width="15%"><b>'.$_language->module['is_displayed'].'</b></td> 
					<td class="title" width="20%"><b>'.$_language->module['actions'].'</b></td>
			</tr>';
			$ergebnis = safe_query("SELECT * FROM ".PREFIX."topmatch ORDER BY date ASC");
			$i=1;
			while($ds=mysql_fetch_array($ergebnis)) {
				
					if($i%2) { $td='td1'; }
					else { $td='td2'; }
				
				$date=date("d.m.Y", $ds[date]);
						$time = date("H:i", $ds['date']);
				$ds['displayed']==1 ? $displayed='<font color="green"><b>'.$_language->module['yes'].'</b></font>' : $displayed='<font color="red"><b>'.$_language->module['no'].'</b></font>';
			
			echo'<tr> 
					<td class="'.$td.'" width="20%">'.$date.' - '.$time.' Uhr</td>
					<td class="'.$td.'" width="15%"><a href="http://'.getinput($ds[matchlink]).'" target="_blank">'.getinput($ds[league]).'</a></td>
					<td class="'.$td.'" width="30%"><a href="'.getinput($ds[homepage1]).'" target="_blank"><img src="../images/flags/'.$ds[country1].'.gif" alt="" /> '.getinput($ds[team1]).'</a> vs. <a href="'.getinput($ds[homepage2]).'" target="_blank"><img src="../images/flags/'.$ds[country2].'.gif" alt="" /> '.getinput($ds[team2]).'</a></td>
					<td class="title" width="15%" align="center">'.$displayed.'</td> 
					<td class="'.$td.'" width="20%"><input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=topmatch&amp;action=edit&amp;topmID='.$ds[topmID].'\');return document.MM_returnValue" value="'.$_language->module['edit'].'" /> <input type="button" onclick="MM_confirm(\''.$_language->module['really_delete'].'\', \'admincenter.php?site=topmatch&amp;delete=true&amp;topmID='.$ds['topmID'].'&amp;captcha_hash='.$hash.'\')" value="'.$_language->module['delete'].'" /></td> 
			</tr>';
				$i++;
			}
											
	echo'<tr class="td_head">
							<td colspan="5" align="right"></td>
					</tr></table>';
			unset($ds);
			
		}
		else echo'<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		<td align="left"><input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=topmatch&amp;action=add\');return document.MM_returnValue" value="'.$_language->module['new_topmatch'].'" /></td>
		<td align="right"><input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=topmatch&amp;action=settings\');return document.MM_returnValue" value="Topmatch '.$_language->module['settings'].'" /></td>
		</tr>
</table><p>Keine Eintr&auml;ge</p>';
				if($pages>1) echo $page_link;
		}
?>