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

##########################################################################
#                                                                        #
#           Version 4       /                        /   /               #
#          -----------__---/__---__------__----__---/---/-               #
#           | /| /  /___) /   ) (_ `   /   ) /___) /   /                 #
#          _|/_|/__(___ _(___/_(__)___/___/_(___ _/___/___               #
#                            Society / Edition                           #
#                                   /                                    #
#                                                                        #
#   modified by webspell|k3rmit (Stefan Giesecke) in 2009                #
#                                                                        #
#   - Modifications are released under the GNU GENERAL PUBLIC LICENSE    #
#   - It is NOT allowed to remove this copyright-tag                     #
#   - http://www.fsf.org/licensing/licenses/gpl.html                     #
#                                                                        #
##########################################################################
*/

$_language->read_module('loginoverview');

if($userID && !isset($_GET['userID']) && !isset($_POST['userID'])) {
	
	if(isset($_GET["action"])) $action=$_GET["action"];
else $action='';




	eval ("\$title_loginoverview = \"".gettemplate("title_loginoverview")."\";");
	echo $title_loginoverview;

	$pagebg=PAGEBG;
	$border=BORDER;
	$bghead=BGHEAD;
	$bgcat=BGCAT;

	$ds=mysql_fetch_array(safe_query("SELECT registerdate FROM `".PREFIX."user` WHERE userID='".$userID."'"));
	$username='<a href="index.php?site=profile&amp;id='.$userID.'">'.getnickname($userID).'</a>';
	$lastlogin = date('d.m.Y, H:i',$_SESSION['ws_lastlogin']);
	$registerdate = date('d.m.Y, H:i',$ds['registerdate']);

	//messages?
	$newmessages = getnewmessages($userID);
	if($newmessages==1) $newmessages=$_language->module['one_new_message'];
	elseif($newmessages>1) $newmessages=str_replace('%new_messages%', $newmessages, $_language->module['x_new_message']);
	else $newmessages=$_language->module['no_new_messages'];

	//boardposts?

	$posts=safe_query("SELECT
					p.topicID, 
					p.date, 
					p.message, 
					p.boardID,
					t.topic,
					t.readgrps
				FROM 
					`".PREFIX."forum_posts` AS p, 
					`".PREFIX."forum_topics` AS t 
				WHERE 
					p.date>".$_SESSION['ws_lastlogin']." AND 
					p.topicID = t.topicID
				LIMIT
					0,10");
	$topics=safe_query("SELECT * FROM ".PREFIX."forum_topics WHERE date > ".$_SESSION['ws_lastlogin']." LIMIT 0,10");

	$new_posts=mysql_num_rows(safe_query("SELECT p.postID FROM `".PREFIX."forum_posts` AS p, `".PREFIX."forum_topics` AS t WHERE p.date>".$_SESSION['ws_lastlogin']." AND p.topicID = t.topicID"));
	$new_topics=mysql_num_rows(safe_query("SELECT * FROM ".PREFIX."forum_topics WHERE date > ".$_SESSION['ws_lastlogin']));

	//new topics

  $topiclist="";
	if(mysql_num_rows($topics)) {
		$n=1;
		while($db=mysql_fetch_array($topics)) {
			if($db['readgrps'] != "") {
				$usergrps = explode(";", $db['readgrps']);
				$usergrp = 0;
				foreach($usergrps as $value) {
					if(isinusergrp($value, $userID)) {
						$usergrp = 1;
						break;
					}
				}
				if(!$usergrp and !ismoderator($userID, $db['boardID'])) continue;
			}
			$n%2 ? $bgcolor=BG_1 : $bgcolor=BG_2;
			$posttime=date("d.m.y H:i",$db['date']);

			$topiclist.='<tr bgcolor="'.$bgcolor.'">
          <td>
          <table width="100%" cellpadding="1" cellspacing="1">
            <tr>
              <td colspan="3"><a href="index.php?site=forum_topic&amp;topic='.$db['topicID'].'">'.$posttime.'<br /><b>'.str_break(getinput($db['topic']), 34).'</b></a><br /><i>'.$db['views'].' '.$_language->module['views'].' - '.$db['replys'].' '.$_language->module['replys'].'</i></td>
            </tr>
          </table>
          </td>
        </tr>';
        
			$n++;
		}
	}
	else $topiclist='<tr>
      <td bgcolor="'.BG_1.'">'.$_language->module['no_new_topics'].'</td>
    </tr>';

	//new posts

	$postlist="";
  if(mysql_num_rows($posts)) {
		$n=1;
		while($db=mysql_fetch_array($posts)) {
			if($db['readgrps'] != "") {
				$usergrps = explode(";", $db['readgrps']);
				$usergrp = 0;
				foreach($usergrps as $value) {
					if(isinusergrp($value, $userID)) {
						$usergrp = 1;
						break;
					}
				}
				if(!$usergrp and !ismoderator($userID, $db['boardID'])) continue;
			}
			$n%2 ? $bgcolor1=BG_1 : $bgcolor1=BG_2;
			$n%2 ? $bgcolor2=BG_3 : $bgcolor2=BG_4;
			$posttime=date("d.m.y H:i",$db['date']);
			if(mb_strlen($db['message']) > 100) $message=mb_substr($db['message'],0,90+mb_strpos(mb_substr($db['message'],90,mb_strlen($db['message']))," "))."...";
			else $message = $db['message'];

      $postlist.='<tr bgcolor="'.$bgcolor1.'">
          <td>
          <table width="100%" cellpadding="2" cellspacing="1">
            <tr>
              <td colspan="3"><a href="index.php?site=forum_topic&amp;topic='.$db['topicID'].'">'.$posttime.' <br /><b>'.str_break(strip_tags(stripslashes(($db['topic']))), 34).'</b></a></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <td width="1%">&nbsp;</td>
              <td bgcolor="'.$bgcolor2.'" width="98%"><div style="overflow:hidden;">'.str_break(clearfromtags($message), 34).'</div></td>
              <td width="1%">&nbsp;</td>
            </tr>
          </table>
          </td>
         </tr>';
          
			$n++;
		}
	}
	else $postlist='<tr>
      <td bgcolor="'.BG_1.'" valign="top">'.$_language->module['no_new_posts'].'</td>
    </tr>';

	//member/admin/referer

	if(isanyadmin($userID)) $admincenterpic = '<input type="button" value="'.$_language->module['ac'].'" onclick="window.location=\'admin/admincenter.php\'" />';
	else $admincenterpic = '';
  
	if(isset($_SESSION['referer'])) {
		$referer_uri = '<tr><td bgcolor="'.$bgcat.'" colspan="4"><br /><a href="'.$_SESSION['referer'].'" style="padding:8px 0;"><b>&laquo; '.$_language->module['back_last_page'].'</b></a><br />&nbsp;</td></tr>';
		unset($_SESSION['referer']);
	}
	else $referer_uri = '';

	//upcoming
	
	unset($events);
	
	$bg1=BG_1;
	$bg2=BG_2;
	$bg3=BG_3;
	$bg4=BG_4;
		
	$events = '';
	$ergebnis=safe_query("SELECT * FROM `".PREFIX."upcoming` WHERE type='d' AND date>".time()." ORDER by date");
	$anz = mysql_num_rows($ergebnis);
	if($anz) {
		$n=1;
		while($ds=mysql_fetch_array($ergebnis)) {
			$n%2 ? $bg=BG_1 : $bg=BG_2;
			$events.='<tr>
				<td bgcolor="'.$bg.'">'.$ds['title'].'</td>
				<td bgcolor="'.$bg.'">'.date('d.m.y, H:i', $ds['date']).'</td>
				<td bgcolor="'.$bg.'">'.date('d.m.y, H:i', $ds['enddate']).'</td>
				<td bgcolor="'.$bg.'">'.$ds['location'].'</td>
				<td bgcolor="'.$bg.'"><a href="index.php?site=calendar&amp;tag='.date('d',$ds['date']).'&amp;month='.date('m',$ds['date']).'&amp;year='.date('Y',$ds['date']).'#event">'.$_language->module['click'].'</a></td>
			</tr>';
			$n++;
		}
	}
	else $events='<tr>
		<td colspan="5" bgcolor="'.$bg1.'"><i>'.$_language->module['no_events'].'</i></td>
	</tr>';
    //my hosting projects
	unset($myhostings);
	
	$bg1=BG_1;
	$bg2=BG_2;
	$bg3=BG_3;
	$bg4=BG_4;
		
	$myhostings = '';
	$ergebnis=safe_query("SELECT * FROM `".PREFIX."hosting` WHERE UserID='".$userID."'  ORDER by ProjectID");
	$anz = mysql_num_rows($ergebnis);
	if($anz) {
		$n=1;
		while($ds=mysql_fetch_array($ergebnis)) {
			$n%2 ? $bg=BG_1 : $bg=BG_2;
			//abfrage nach template name 
			if ($ds['TemplateID'] == 0) { 
			$Templatename = 'Basic';} else {
			$ergebnis2=safe_query("SELECT * FROM `".PREFIX."hosting_templates` WHERE TemplateID='".$ds['TemplateID']."'   ");
			$ds2=mysql_fetch_array($ergebnis2);//$ds2['name']
			$Templatename = $ds2['name'];
			}
			// abfrage nach webspell name
			
			$ergebnis3=safe_query("SELECT * FROM `".PREFIX."hosting_wsversion` WHERE WebspellID='".$ds['WebspellID']."'   ");
			$ds3=mysql_fetch_array($ergebnis3);//$ds3['Name']
		    if ($ds['installed'] == 0) {
			 $templaedinstalled = '<a href="hosting_project/admincenter.php?site=hosting&amp;action=edit&amp;projectID='.$ds['ProjectID'].'">'.$_language->module['install'].'</a>';	
			}else {
			  $templaedinstalled = '<a href="hosting_project/admincenter.php?site=hosting&amp;action=edit&amp;projectID='.$ds['ProjectID'].'">'.$_language->module['edit'].'</a>';	
			}
		
			
			$myhostings.='<tr>
				<td bgcolor="'.$bg.'"><a href="../hosting_projects/'.$ds['subdomain'].'/" style="font-weight:bold;" target="_blank" class="link1">'.htmlspecialchars($ds['ProjectName']).'</a></td>
				<td bgcolor="'.$bg.'">'.htmlspecialchars($ds3['Name']).'</td>
				<td bgcolor="'.$bg.'">'.$ds['subdomain'].'</td>
				<td bgcolor="'.$bg.'">'.htmlspecialchars($Templatename).'</td>
				<td bgcolor="'.$bg.'">'.$templaedinstalled.'</td>
				
				
				
				
			</tr>';
			$n++;
		}
	}
	else  { $myhostings='<tr>
		<td colspan="5" bgcolor="'.$bg1.'"><i>'.$_language->module['no_hostings'].'</i></td>
		</tr>'; }
		
	if (!ishostingusr($userID)) {  
	
	$hostingactivation = '<tr>
		<td colspan="5" bgcolor="'.$bg1.'">'.$_language->module['activate_hosting'].'&nbsp;&nbsp;<a href="index.php?site=loginoverview&amp;action=unlockhosting">&raquo;'.$_language->module['click'].'&laquo;</a> </td>
	</tr>';
	
	
	
	
	
	
	} else {
		$count=safe_query("SELECT * FROM ".PREFIX."hosting WHERE UserID=".$userID."");
	$maxpro=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
	$maxproj=mysql_fetch_array($maxpro);
	$maxprojects = $maxproj['maxprojects'];
	$menge = mysql_num_rows($count);
	if (!ishostingadmin($userID)){
	$hostingactivation = '<tr>
		<td colspan="5" bgcolor="'.$bg1.'">You use '.$menge.' of '.$maxprojects.' available Hosting-Projects</td>
	</tr>';
	}else {
		$hostingactivation = '';
	}
	}
		
	
	//end
	if($action == "unlockhosting") {
		
	// mysql query update user set hosting 1 
	$timestamp = time();
	$release = mktime(11,10,59,2,24,2011);
	
	
	if (($timestamp > $release) || issuperadmin($userID) ) {
		safe_query("UPDATE ".PREFIX."user_groups SET hostingusr = '1' WHERE userID='".$userID."'  ");
		
	}else {
		echo '<br /><div class="errorbox"> Public Beta has not started yet. You can not activate hosting now. </div><br />';
	}
	
	
	
	
	
	
	
	
	
	eval ("\$loginoverview = \"".gettemplate("loginoverview2")."\";");
	echo $loginoverview;
	
	
	}elseif($action == "lockhosting") {
		
	
	
	// safe_query("UPDATE ".PREFIX."user_groups SET hostingusr = '0' WHERE userID='".$userID."'  ");
	
	/* possibilities for unlocking? 
	   - delete all Projects ? 
	   -...
	*/
	
	
	eval ("\$loginoverview = \"".gettemplate("loginoverview2")."\";");
	echo $loginoverview;
	
	}else{
		
		
	
	

	
	
	eval ("\$loginoverview = \"".gettemplate("loginoverview")."\";");
	echo $loginoverview;

	}
}
else echo $_language->module['you_have_to_be_logged_in'];

?>