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
$_language->read_module('referer');

if(!ispageadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);

//echo '<h1>&curren; '.$_language->module['referer'].' by referrer Clicks</h1>';

function cut($text,$max){
    if(strlen($text)>$max) {
	    $text=substr($text, 0, $max);
		$text.='..';
	}
	return $text;
}
echo '<h1>&curren; '.$_language->module['referer'].' by referrer ID</h1>';


$sql2 = safe_query("SELECT * FROM ".PREFIX."referer WHERE referer NOT LIKE 'http://%webspell-cms.org/%' and referer NOT LIKE 'http://%gag-gaming.de/%' ORDER BY refererID DESC LIMIT 50");


if(mysql_num_rows($sql2))
{
			echo '<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#DDDDDD">'.
		        "  <tr>".
		        '    <td class="title" align=\"center\"><strong>'.$_language->module['date'].':</strong></td>'.
		        '    <td class="title" align=\"center\"><strong>'.$_language->module['link'].':</strong></td>'.
		        '    <td class="title" align=\"center\"><strong>'.$_language->module['clicks'].':</strong></td>'.
		        "  </tr>";
		        $hint1 = BG_1;
		        $hint2 = BG_2;
			echo "<br/>";
			echo "<b>".$ds[dates]."</b>";
				while($ds = mysql_fetch_assoc($sql2))
				{
						echo "  <tr>".
								"    <td bgcolor=\"".$hint2."\" align=\"center\">".$ds[dates]."</td>".
								"    <td bgcolor=\"".$hint1."\">&nbsp;&nbsp;<a href=\"".$ds[referer]."\" target=\"_blank\">".cut($ds[referer],40)."</a></td>".
								"    <td bgcolor=\"".$hint2."\" align=\"center\">".$ds[clicks]."</td>".
								"  </tr>";
			
							if($hint1 == BG_1) {
									$hint1 = BG_2;
									$hint2 = BG_1;
							} else {
									$hint1 = BG_1;
									$hint2 = BG_2;
							}
					$Date_Var = $ds[dates];
				}
    		echo "</table>";
	
} else { 
			echo $_language->module['empty']; 
}
echo '<h1>&curren; '.$_language->module['referer'].' by referrer Clicks</h1>';
//$sql = safe_query("SELECT * FROM ".PREFIX."referer ORDER BY clicks DESC");
$sql = safe_query("SELECT * FROM ".PREFIX."referer WHERE referer NOT LIKE 'http://%webspell-cms.org/%' ORDER BY clicks DESC LIMIT 50");

if(mysql_num_rows($sql))
{
			echo '<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#DDDDDD">'.
		        "  <tr>".
		       
		        '    <td class="title" align=\"center\"><strong>'.$_language->module['link'].':</strong></td>'.
		        '    <td class="title" align=\"center\"><strong>'.$_language->module['clicks'].':</strong></td>'.
		        "  </tr>";
		        $hint1 = BG_1;
		        $hint2 = BG_2;
			echo "<br/>";
			echo "<b>".$ds[dates]."</b>";
				while($ds = mysql_fetch_assoc($sql))
				{
						echo "  <tr>".
								
								"    <td bgcolor=\"".$hint1."\">&nbsp;&nbsp;<a href=\"".$ds[referer]."\" target=\"_blank\">".cut($ds[referer],40)."</a></td>".
								"    <td bgcolor=\"".$hint2."\" align=\"center\">".$ds[clicks]."</td>".
								"  </tr>";
			
							if($hint1 == BG_1) {
									$hint1 = BG_2;
									$hint2 = BG_1;
							} else {
									$hint1 = BG_1;
									$hint2 = BG_2;
							}
					$Date_Var = $ds[dates];
				}
    		echo "</table>";
	
} else { 
			echo $_language->module['empty']; 
}
?>
