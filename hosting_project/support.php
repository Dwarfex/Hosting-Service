<link href="css/support.css" type="text/css" rel="stylesheet" />

<?php

if(!ishostingusr($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);

if(isset($_GET['action'])) $action = $_GET['action'];
else $action = '';

if($action=="saveticket") {		
	$_language->read_module('support');

	if(!$loggedin)die($_language->module['no_access']);
		 
		$title = $_POST['title'];	
		$stufe = $_POST['stufe'];		
		$rubric = $_POST['rubric'];
		$poster = $_POST['poster'];
		$link = $_POST['link'];

		
		safe_query("INSERT INTO ".PREFIX."support_main (title, stufe, rubric, date, poster, saved, status, link) values ('".$title."', '".$stufe."',  '".$rubric."', '".time()."', '".$poster."', '1', 'open', '".$link."'  )");
		
		
		$query = safe_query("SELECT * FROM ".PREFIX."support_main WHERE date = '".time()."' AND title = '".$title."' ");
		while($qs = mysql_fetch_array($query)) {
			$supmainID = $qs['supmainID'];
		}		
		
		$text = $_POST['text'];		
		
		safe_query("INSERT INTO ".PREFIX."support (text, supmainID, date, replayer, saved) values ('".$text."', '".$supmainID."', '".time()."', '".$poster."', '1' )");
		safe_query("UPDATE ".PREFIX."user SET supmainID=CONCAT(supmainID, '".$supmainID."|') WHERE supmainID NOT LIKE '%|".$supmainID."|%'");
		
		
		safe_query("DELETE FROM `".PREFIX."support_main` WHERE `saved` = '0' and ".time()." - `date` > ".(2 * 60 * 60));
		safe_query("DELETE FROM `".PREFIX."support` WHERE `saved` = '0' and ".time()." - `date` > ".(2 * 60 * 60));
		
		
		if(mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user WHERE supmainID LIKE '%|".$supmainID."|%'  "))) {
		
		$gv=mysql_fetch_array(safe_query("SELECT supmainID FROM ".PREFIX."user WHERE userID='$userID'"));
		$array=explode("|", $gv['supmainID']);
		$new='|';
		
		foreach($array as $split) {
			if($split != "" AND $split!=$supmainID) $new = $new.$split.'|';
		}

		safe_query("UPDATE ".PREFIX."user SET supmainID='".$new."' WHERE userID='$userID'");
	}
		
		redirect("admincenter.php?site=support&amp;action=show&amp;supmainID=".$supmainID."", '<div class="rightsave">'.$_language->module['saved_success'].'</div>', "3");
		
}

	elseif($action=="savereplay") {	
	$_language->read_module('support');
	
	if(!$loggedin)die($_language->module['no_access']);

		$text = $_POST['text'];		
		$supmainID = $_POST['supmainID'];
		$poster = $_POST['poster'];
		
		safe_query("INSERT INTO ".PREFIX."support (text, supmainID, date, replayer, saved) values ('".$text."', '".$supmainID."', '".time()."', '".$poster."', '1' )");
		safe_query("UPDATE ".PREFIX."user SET supmainID=CONCAT(supmainID, '".$supmainID."|') WHERE supmainID NOT LIKE '%|".$supmainID."|%'");
		
		safe_query("DELETE FROM `".PREFIX."support` WHERE `saved` = '0' and ".time()." - `date` > ".(2 * 60 * 60));
		
		
		if(mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user WHERE supmainID LIKE '%|".$supmainID."|%'"))) {
		
		$gv=mysql_fetch_array(safe_query("SELECT supmainID FROM ".PREFIX."user WHERE userID='$userID'"));
		$array=explode("|", $gv['supmainID']);
		$new='|';
		
		foreach($array as $split) {
			if($split != "" AND $split!=$supmainID) $new = $new.$split.'|';
		}

		safe_query("UPDATE ".PREFIX."user SET supmainID='".$new."' WHERE userID='$userID'");
	}
		
		redirect("admincenter.php?site=support&amp;action=show&amp;supmainID=".$supmainID."", '<div class="rightsave">'.$_language->module['saved_success'].'</div>', "3");
		
		
		
		
	}
	
	elseif($action=="delete") {	
	
	$_language->read_module('support');
	
		
		if(!isnewsadmin($userID)) die($_language->module['no_access']);
		
		safe_query("DELETE FROM ".PREFIX."support_main WHERE supmainID='".$_GET['supmainID']."'");
		safe_query("DELETE FROM ".PREFIX."support WHERE supmainID='".$_GET['supmainID']."'");
	
		redirect("admincenter.php?site=support", '<div class="rightsave">'.$_language->module['saved_success'].'</div>', "3");
	}
	
	elseif($action=="saveclose") {	
	$_language->read_module('support');
	if(!$loggedin)die($_language->module['no_access']);
	$supmainID = $_GET['supmainID'];
	
	safe_query("UPDATE ".PREFIX."support_main SET
								 status = 'close'
								 WHERE supmainID='".$supmainID."'");	
								 
								 redirect("admincenter.php?site=support", '<div class="rightsave">'.$_language->module['saved_success'].'</div>', "3");
	
	}
	
	elseif($action=="saveopen") {	
	$_language->read_module('support');
	if(!$loggedin)die($_language->module['no_access']);
	$supmainID = $_GET['supmainID'];
	
	safe_query("UPDATE ".PREFIX."support_main SET
								 status= 'open'
								 WHERE supmainID='".$supmainID."'");	
	
		redirect("admincenter.php?site=support", '<div class="rightsave">'.$_language->module['saved_success'].'</div>', "3");
	}
	
	elseif($action=="newticket") {
	$_language->read_module('support');
			
			if(!$loggedin) die($_language->module['no_access']);
				$_language->read_module('bbcode', true);
				eval ("\$addbbcode = \"".gettemplate("addbbcode")."\";");
				
				
				$rubrics='<select name="rubric">';
				$rubrics2=safe_query("SELECT rubricID, title FROM ".PREFIX."support_rubric ORDER BY rubricID");
				while($dr=mysql_fetch_array($rubrics2)) {
					$rubrics.='<option value="'.$dr['rubricID'].'">'.$dr['title'].'</option>';
				}
				$rubrics.='</select>';
				
			
				eval ("\$support_newticket = \"".gettemplate("support_newticket")."\";");
				echo $support_newticket;
				
	
	}
	
	elseif($action=="newreplay") {
	$_language->read_module('support');
	if(!$loggedin)die($_language->module['no_access']);
	
				$_language->read_module('bbcode', true);
				eval ("\$addbbcode = \"".gettemplate("addbbcode")."\";");
				
				$supmainID =  $_POST['supmainID'];

				
				
				eval ("\$support_newreplay = \"".gettemplate("support_newreplay")."\";");
				echo $support_newreplay;
	
	}
	
	elseif($action=="show") {	
	$_language->read_module('support');
	echo '<h1>'.$_language->module['support'].'</h1>';
	
	if(!$loggedin)die($_language->module['no_access']);
		$supmainID = (int)$_GET['supmainID'];


		$result=safe_query("SELECT * FROM ".PREFIX."support_main WHERE supmainID='".$supmainID."' AND saved = '1'");	
			
					while($ds=mysql_fetch_array($result)) {		
						$id = $ds['supmainID'];
						$poster = '<a href="admincenter.php?site=profile&amp;id='.$ds['poster'].'"><b>'.getnickname($ds['poster']).'</b></a>';
						$status = $ds['status'];
						$stufe = $ds['stufe'];
						$rubric = $ds['rubric'];
						$title = $ds['title'];
						$link = $ds['link'];
						
						if ($link == 'http://' OR $link == '') {
						$link = '';
						}
						else {
						$link = '<tr>
  	<td colspan="2"><small>'.$_language->module['link'].':</small></td>
	<td colspan="2"><a href="'.$link.'" target="_blank">'.$link.'</a></td>
</tr>';
						
}
						
						
						 $result1=safe_query("SELECT title FROM ".PREFIX."support_rubric WHERE rubricID='".$rubric."'");			
				while($ds=mysql_fetch_array($result1)) {
				$rubric = $ds['title'];
				
				}
						
						eval ("\$support_show_head = \"".gettemplate("support_show_head")."\";");
						echo $support_show_head;
						
						
					}
		
		
			$result=safe_query("SELECT * FROM ".PREFIX."support WHERE supmainID='".$supmainID."' AND saved = '1' ORDER BY date DESC");			
				if(mysql_num_rows($result)) {
				$i=mysql_num_rows(safe_query("SELECT supID FROM `".PREFIX."support` WHERE supmainID='".$supmainID."' AND saved='1' "));	
				echo '<form action="admincenter.php?site=support&amp;action=newreplay" method="post" name="post" onsubmit="return chkFormular()">';
					while($ds=mysql_fetch_array($result)) {
								
					$date = date("d.m.Y - H:i", $ds['date']);
					$content = clearfromtags($ds['text']);
					$content = htmloutput($content);
					$id = $ds['supmainID'];
					$content = toggle($content, $ds['supmainID']);
					$poster = '<a href="admincenter.php?site=profile&amp;id='.$ds['replayer'].'"><b>'.getnickname($ds['replayer']).'</b></a>';
					

					
					
					if(mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user WHERE supmainID LIKE '%|".$id."|%'"))) {
		
		$gv=mysql_fetch_array(safe_query("SELECT supmainID FROM ".PREFIX."user WHERE userID='$userID'"));
		$array=explode("|", $gv['supmainID']);
		$new='|';
		
		foreach($array as $split) {
			if($split != "" AND $split!=$id) $new = $new.$split.'|';
		}

		safe_query("UPDATE ".PREFIX."user SET supmainID='".$new."' WHERE userID='$userID'");
	}

					
					
					
					eval ("\$support_show = \"".gettemplate("support_show")."\";");
					echo $support_show;
					$i = $i - 1;
					
					 }
					
					 
					 $result1=safe_query("SELECT * FROM ".PREFIX."support_main WHERE supmainID='".$supmainID."' AND saved = '1' ORDER BY date DESC");			
				if(mysql_num_rows($result1)) {
				while($ds=mysql_fetch_array($result1)) {
				
				
				
				
				
				
				
				if ($ds['status'] == 'close') {
					$action = '<b>'.$_language->module['ticketclosed'].'</b><br /> <input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=support\');return document.MM_returnValue;" value="'.$_language->module['back'].'" /> ';
					
					if ( time() - $ds['date'] > 24 * 60 * 60 AND !isanyadmin($userID)) {
					$action = ''; } else {					
			$action .= '<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=support&amp;action=saveopen&amp;supmainID='.$id.'\');return document.MM_returnValue;" value="'.$_language->module['open'].'" /> ';
					}
					}
					else { 
					
					$action = '<input type="submit" name="submit" value="'.$_language->module['answer'].'" /> <input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=support\');return document.MM_returnValue;" value="'.$_language->module['back'].'" /> ';
					
					$action .= '<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=support&amp;action=saveclose&amp;supmainID='.$id.'\');return document.MM_returnValue;" value="'.$_language->module['close'].'" /> ';
					
					 }
					 
					 
					 if(isanyadmin($userID)) {
						$action .= ' <input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=support&amp;action=delete&amp;supmainID='.$supmainID.'\');return 			document.MM_returnValue;" value="'.$_language->module['delete'].'" /> ';
					
					} else {
					$action .= ''; 
					}
					 
					 
					 
					}
					
					eval ("\$support_show_foot = \"".gettemplate("support_show_foot")."\";");
					echo $support_show_foot;
					
					 echo '</form>';
					}
					
		}
	} else {
	
	$_language->read_module('support');
	echo '<h1>'.$_language->module['open_support'].'</h1>';
	if(isanyadmin($userID)) {
	$abfrage = ''; }
	else { $abfrage = 'AND poster = '.$userID;
	}
	$result=safe_query("SELECT * FROM ".PREFIX."support_main WHERE saved = '1' ".$abfrage." AND status= 'open'");	
	
			if(mysql_num_rows($result)) {
			echo '<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#DDDDDD">
  <tr>
    <td class="title">'.$_language->module['title'].'</td>
    <td class="title">'.$_language->module['answer'].'</td>
    <td class="title">'.$_language->module['action'].'</td>

  </tr>';
					while($ds=mysql_fetch_array($result)) {	
					
					if(isanyadmin($userID)) {
					$action = '<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=support&amp;action=delete\');return document.MM_returnValue;" value="'.$_language->module['delete'].'" />';
					
					} else {
					$action = ''; 
					}
					
					
					
			
					
					$date = date("d.m.Y ", $ds['date']);					
					$id = $ds['supmainID'];		
					$title = '<a href="admincenter.php?site=support&amp;action=show&amp;supmainID='.$id.'">'.$ds['title'].'</a>';
					$anz=mysql_num_rows(safe_query("SELECT supID FROM `".PREFIX."support` WHERE supmainID='".$id."' AND saved='1' "));
					$anz2=mysql_fetch_array(safe_query("SELECT supID FROM `".PREFIX."support` WHERE supmainID='".$id."' AND saved='1' "));
					$anz = $anz - 1;
					$bg1=BG_1;
					
					
					#####################################
					
					
					
					$found = false;
			
			if($userID) {
				
				$gv=mysql_fetch_array(safe_query("SELECT supmainID FROM ".PREFIX."user WHERE userID='$userID'"));
				$array=explode("|", $gv['supmainID']);
		
				foreach($array as $split) {
					if($split != "" AND in_array($split, $anz2)) {
							$found=true;
							break;
					}
				}
			}
			
			if ($found) { $neu = '<font style="color:#FF0000">*'.$_language->module['new'].'*</font>'; }
			else { $neu = ''; }
					
					
					
					
					######################################
					
					
					
					
					
					$action .= '<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=support&amp;action=saveclose&amp;supmainID='.$id.'\');return document.MM_returnValue;" value="'.$_language->module['close'].'" />';
					
					eval ("\$support = \"".gettemplate("support")."\";");
					echo $support;		
				
					
					
				
					}	
					echo '</table>';				
				}	
				
				
				echo '<h1>'.$_language->module['close_support'].'</h1>';				
				$result=safe_query("SELECT * FROM ".PREFIX."support_main WHERE saved = '1' ".$abfrage." AND status= 'close'");	
	
			if(mysql_num_rows($result)) {
			echo '<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#DDDDDD">
  <tr>
     <td class="title">'.$_language->module['title'].'</td>
    <td class="title">'.$_language->module['answer'].'</td>
    <td class="title">'.$_language->module['action'].'</td>

  </tr>';
					while($ds=mysql_fetch_array($result)) {			
					
					
					
					$date = date("d.m.Y", $ds['date']);					
					$id = $ds['supmainID'];		
					$title = '<a href="admincenter.php?site=support&amp;action=show&amp;supmainID='.$id.'">'.$ds['title'].'</a>';
					$anz=mysql_num_rows(safe_query("SELECT supID FROM `".PREFIX."support` WHERE supmainID='".$id."' AND saved='1' "));
					
					
					if(isanyadmin($userID)) {
					$action = '<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=support&amp;action=delete&amp;supmainID='.$id.'\');return document.MM_returnValue;" value="'.$_language->module['delete'].'" />';
					
					} else {
					$action = ''; 
					}
	
					$anz = $anz - 1;
					$bg1=BG_1;
					
					if ( time() - $ds['date'] > 24 * 60 * 60 AND !isanyadmin($userID)) {
					echo ''; } else {					
			$action .= '<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=support&amp;action=saveopen&amp;supmainID='.$id.'\');return document.MM_returnValue;" value="'.$_language->module['open'].'" />';
					}
					$neu = '';
					
					eval ("\$support = \"".gettemplate("support")."\";");
					echo $support;		
				
					
					
				
					}	
					echo '</table>';				
				}
				
				
	
	echo '<br /><br /><center><input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=support&amp;action=newticket\');return document.MM_returnValue;" value="'.$_language->module['new_ticket'].'" /></center>';
}

?>
