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

$_language->read_module('hosting');

if(!isanyhosting($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);


if(isset($_POST['save'])) {
	if(!ishostingadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);
	
 	$CAPCLASS = new Captcha;
	if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
		$pic = $_FILES['pic'];
		safe_query("INSERT INTO ".PREFIX."hosting_templates ( name ) values( '".$_POST['name']."' ) ");
		$id=mysql_insert_id();
		
		//Überprüfen der WS Version 
		$TemplateVersion = $_POST['version'];
		
		$ergebnis3=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion WHERE Name='".$TemplateVersion."'");
		
		$ds3=mysql_fetch_array($ergebnis3);	
		
		safe_query("UPDATE ".PREFIX."hosting_templates SET WebspellID='".$ds3['WebspellID']."' WHERE TemplateID='".$id."'");	
		///ende überprüfen
		
		
		safe_query("UPDATE ".PREFIX."hosting_templates SET description= '".$_POST['description']."' WHERE TemplateID='".$id."'");
		safe_query("UPDATE ".PREFIX."hosting_templates SET header_editable= '".$_POST['header_editable']."' WHERE TemplateID='".$id."'");
		if ($_POST['header_editable'] == '1') {
		safe_query("UPDATE ".PREFIX."hosting_templates SET header_location= '".$_POST['header_location']."' WHERE TemplateID='".$id."'");
		
		safe_query("UPDATE ".PREFIX."hosting_templates SET header_name= '".$_POST['header_file']."' WHERE TemplateID='".$id."'");
		}
		$ident= $id + 312114;
		safe_query("UPDATE ".PREFIX."hosting_templates SET location='".$ident."' WHERE TemplateID='".$id."'");
		
		$target = 'ws_templates/'.$ident;

      
            @mkdir( $target );
		
	
		echo $_language->module['upload_files'].$target;
		$filepath = "../images/hosting_templates/";
		
		if($pic['name'] != "") {
			move_uploaded_file($pic['tmp_name'], $filepath.$pic['name'].".tmp");
			@chmod($filepath.$pic['name'].".tmp", 0755);
			$getimg = getimagesize($filepath.$pic['name'].".tmp");
			//               X                    Y 
			if($getimg[0] < 2000 && $getimg[1] < 2000) {
				$templpic = '';
				if($getimg[2] == 1) $templpic=$id.'.gif';
				elseif($getimg[2] == 2) $templpic=$id.'.jpg';
				elseif($getimg[2] == 3) $templpic=$id.'.png';
				if($templpic != "") {
					if(file_exists($filepath.$id.'.gif')) unlink($filepath.$id.'.gif');
					if(file_exists($filepath.$id.'.jpg')) unlink($filepath.$id.'.jpg');
					if(file_exists($filepath.$id.'.png')) unlink($filepath.$id.'.png');
					rename($filepath.$pic['name'].".tmp", $filepath.$templpic);
					safe_query("UPDATE ".PREFIX."hosting_templates SET picture='".$templpic."' WHERE TemplateID='".$id."'");
				}  else {
					if(unlink($filepath.$pic['name'].".tmp")) {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=hosting_templates&amp;action=edit&amp;templateID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					} else {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=hosting_templates&amp;action=edit&amp;templateID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					}
				}
			} else { 		
				
				@unlink($filepath.$pic['name'].".tmp");
				$error = $_language->module['banner_to_big'];
				die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=hosting_templates&amp;action=edit&amp;templateID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
			}
		
		}
	} else echo $_language->module['transaction_invalid'];
}

elseif(isset($_POST['saveedit'])) {
 	if(!ishostingadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);
	$CAPCLASS = new Captcha;
	if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
		$pic = $_FILES['pic'];
		
		safe_query("UPDATE ".PREFIX."hosting_templates SET name='".$_POST['name']."' WHERE TemplateID='".$_POST['TemplateID']."'");
		$id=$_POST['TemplateID'];
		
		//Überprüfen der WS Version 
		$TemplateVersion = $_POST['version'];
		
		$ergebnis3=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion WHERE Name='".$TemplateVersion."'");
		
		$ds3=mysql_fetch_array($ergebnis3);	
		
		safe_query("UPDATE ".PREFIX."hosting_templates SET WebspellID='".$ds3['WebspellID']."' WHERE TemplateID='".$id."'");	
		///ende überprüfen
		$ident= $id + 312114;
		safe_query("UPDATE ".PREFIX."hosting_templates SET location='".$ident."' WHERE TemplateID='".$id."'");
		safe_query("UPDATE ".PREFIX."hosting_templates SET header_editable= '".$_POST['header_editable']."' WHERE TemplateID='".$id."'");
if ($_POST['header_editable'] == '1') {
		safe_query("UPDATE ".PREFIX."hosting_templates SET header_location= '".$_POST['header_location']."' WHERE TemplateID='".$id."'");
		
		safe_query("UPDATE ".PREFIX."hosting_templates SET header_name= '".$_POST['header_file']."' WHERE TemplateID='".$id."'");
		}
		safe_query("UPDATE ".PREFIX."hosting_templates SET description= '".$_POST['description']."' WHERE TemplateID='".$id."'");
		
		$filepath = "../images/hosting_templates/";
		
		if($pic['name'] != "") {
			move_uploaded_file($pic['tmp_name'], $filepath.$pic['name'].".tmp");
			@chmod($filepath.$pic['name'].".tmp", 0755);
			$getimg = getimagesize($filepath.$pic['name'].".tmp");
			//               X                    Y 
			if($getimg[0] < 2000 && $getimg[1] < 2000) {
				$templpic = '';
				if($getimg[2] == 1) $templpic=$id.'.gif';
				elseif($getimg[2] == 2) $templpic=$id.'.jpg';
				elseif($getimg[2] == 3) $templpic=$id.'.png';
				if($templpic != "") {
					if(file_exists($filepath.$id.'.gif')) unlink($filepath.$id.'.gif');
					if(file_exists($filepath.$id.'.jpg')) unlink($filepath.$id.'.jpg');
					if(file_exists($filepath.$id.'.png')) unlink($filepath.$id.'.png');
					rename($filepath.$pic['name'].".tmp", $filepath.$templpic);
					safe_query("UPDATE ".PREFIX."hosting_templates SET picture='".$templpic."' WHERE TemplateID='".$id."'");
				}  else {
					if(unlink($filepath.$pic['name'].".tmp")) {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=hosting_templates&amp;action=edit&amp;templateID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					} else {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=hosting_templates&amp;action=edit&amp;templateID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					}
				}
			} else { 		
				
				@unlink($filepath.$pic['name'].".tmp");
				$error = $_language->module['banner_to_big'];
				die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=hosting_templates&amp;action=edit&amp;templateID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
			}
		
		}
	} else echo $_language->module['transaction_invalid'];
	
	//////
	
	
		
		
	
		
		
}

elseif(isset($_GET['delete'])) {
	if(!ishostingadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);
 	$CAPCLASS = new Captcha;
	if($CAPCLASS->check_captcha(0, $_GET['captcha_hash'])) {
		$TemplateID = $_GET['templateID'];
		
		if ($TemplateID == '1' || $TemplateID == '2' || $TemplateID == '0') {
		
		echo $_language->module['cnt_del_basic'];
		
	}else {
		$filepath = "../images/hosting_templates/";
		$filepath2 = "ws_templates/".$TemplateID."/";
		safe_query("DELETE FROM ".PREFIX."hosting_templates WHERE TemplateID='$TemplateID'");
		if(file_exists($filepath.$TemplateID.'.gif')) @unlink($filepath.$TemplateID.'.gif');
		if(file_exists($filepath.$TemplateID.'.jpg')) @unlink($filepath.$TemplateID.'.jpg');
		if(file_exists($filepath.$TemplateID.'.png')) @unlink($filepath.$TemplateID.'.png');
		rec_rmdir($filepath2);
	}
	} else echo $_language->module['transaction_invalid'];
}

if(isset($_GET['action'])) $action = $_GET['action'];
else $action = '';

if($action=="add") {
	if(!ishostingadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);
	//fertig
	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
	$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion");
  echo '<h1>&curren; <a href="admincenter.php?site=hosting_templates" class="white">'.$_language->module['new_template'].'</a> &raquo; '.$_language->module['add_template'].'</h1>';
  echo '<form method="post" action="admincenter.php?site=hosting_templates" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td width="15%"><b>'.$_language->module['template_name'].'</b><br /><br /></td>
      <td width="85%"><input type="text" name="name" size="50" /></td>
    </tr>
    <tr>
      <td><b>'.$_language->module['picture_upload'].'</b></td>
      <td><input name="pic" type="file" size="40" /></td>
    </tr>
	 <tr>
      <td><b>'.$_language->module['description'].'</b></td>
      <td><textarea name="description" cols="32" rows="4" >250&nbsp;'.$_language->module['char'].'</textarea><br /><br /></td>
    </tr>
	<tr>
	<td>
	<b>'.$_language->module['header_editable'].'</b>
	</td>
	<td>
	<input type="checkbox" name="header_editable" value="1"  />'.$_language->module['header_info'].'
	</td>
	</tr>
	 <tr>
      <td><b>'.$_language->module['header_location'].'</b></td>
      <td width="85%"><input type="text" name="header_location" size="50" /></td>
    </tr>
	<tr>
	<td></td>
      <td width="85%">'.$_language->module['example'].': design/gfx/</td>
	</tr>
	 <tr>
      <td><b>'.$_language->module['header_file'].'</b></td>
      <td width="85%"><input type="text" name="header_file" size="50" /></td>
	  
	
    </tr>
	<tr>
	<td></td>
      <td width="85%">'.$_language->module['example'].': header.png<br /><br /></td>
	</tr>
	<tr>
      <td><b>'.$_language->module['wsversion'].'</b></td><td><select name="version" >';
	 while($ds=mysql_fetch_array($ergebnis)) {
		 echo'<option>'.$ds['Name'].'</option>';
		 }
	  echo'</select></td>
	  </tr>
    <tr>
      <td><input type="hidden" name="captcha_hash" value="'.$hash.'" /></td>
      <td><input type="submit" name="save" value="'.$_language->module['add_template'].'" /></td>
    </tr>
  </table>
  </form>';
}

elseif($action=="edit") {
	if(!ishostingadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);
	//fertig
	$templateID = $_GET['templateID'];
	
	if (($templateID == '1') || ($templateID == '2') || ($templateID == '0')) {
		
		echo $_language->module['cnt_edit_basic'];
		
	}else {
	 
	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
  echo'<h1>&curren; <a href="admincenter.php?site=hosting_templates" class="white">'.$_language->module['templates'].'</a> &raquo; '.$_language->module['edit_template'].'</h1>';

	$templateID = $_GET['templateID'];
	
	$ident= $templateID + 312114;
	$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting_templates WHERE TemplateID='".$templateID."'");
	$ds=mysql_fetch_array($ergebnis);
	if($ds['header_editable'] =='1') $header_editable = " checked=\"checked\"";
	else $header_editable = "";

	echo'<form method="post" action="admincenter.php?site=hosting_templates" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="1" cellpadding="3">
   
    <tr>
      <td width="15%"><b>'.$_language->module['template_name'].'</b></td>
      <td width="85%"><input type="text" name="name" size="50" value="'.htmlspecialchars($ds['name']).'"/></td>
    </tr>
     <tr>
      <td><b>'.$_language->module['picture'].'</b></td>
      <td><img src="../images/hosting_templates/'.$ds['picture'].'" alt="" style="max-width:600px" /></td>
    </tr>
    <tr>
		   <td><b>'.$_language->module['picture_upload'].'</b></td>
       <td><input name="pic" type="file" size="40" /></td>
     </tr>
	 <tr>
      <td><b>'.$_language->module['description'].'</b></td>
      <td><textarea name="description" cols="32" rows="4" >'.htmlspecialchars($ds['description']).'</textarea></td>
    </tr>
	<tr>
	<td>
	<b>'.$_language->module['header_editable'].'</b>
	</td>
	<td>
	<input type="checkbox" name="header_editable" value="1" '.$header_editable.' />'.$_language->module['header_info'].'
	</td>
	</tr>
	<tr>
      <td><b>'.$_language->module['header_location'].'</b></td>
      <td width="85%"><input type="text" name="header_location" size="50" value="'.htmlspecialchars($ds['header_location']).'"/></td>
    </tr>
	<tr>
	<td></td>
      <td width="85%">'.$_language->module['example'].': design/gfx/</td>
	</tr>
	 <tr>
      <td><b>'.$_language->module['header_file'].'</b></td>
      <td width="85%"><input type="text" name="header_file" size="50" value="'.htmlspecialchars($ds['header_name']).'" /></td>
	  
	
    </tr>
	<tr>
	<td></td>
      <td width="85%">'.$_language->module['example'].': header.png<br /><br /></td>
	</tr>
	
	
	
	
	
	<tr>
      <td><b>'.$_language->module['wsversion'].'</b></td><td><select name="version" >';
	$ergebnis2=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion");
	
	 while($ds2=mysql_fetch_array($ergebnis2)) {
		 if ($ds['WebspellID'] == $ds2['WebspellID']) {
		echo'<option selected="selected">'.$ds2['Name'].'</option>';	 
		 }else {
		 echo'<option>'.$ds2['Name'].'</option>';
		 }
		 }
	  echo'</select></td>
	  </tr>
    <tr>
    <tr>';
		$target = 'ws_templates/'.$ident;
		echo '<b>'.$_language->module['upload_files'].'&nbsp;&nbsp;'.$target.'</b><br /> <br />';
	echo'</tr>
    <tr>
	<td><input type="hidden" name="captcha_hash" value="'.$hash.'" /><input type="hidden" name="TemplateID" value="'.$ds['TemplateID'].'" /></td>
      <td><input type="submit" name="saveedit" value="'.$_language->module['edit_template'].'" /></td>
    </tr>
  </table>
  </form>';
}
}

else {
//fertig
  echo'<h1>&curren; '.$_language->module['templates'].'</h1>';

	  if(ishostingadmin($userID)) { echo'<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting_templates&amp;action=add\');return document.MM_returnValue" value="'.$_language->module['new_template'].'" /><br /><br />';}

	$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting_templates ORDER BY WebspellID, TemplateID");
	
  echo'<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#DDDDDD">
    <tr>
      <td width="20%" class="title"><b>'.$_language->module['template_name'].'</b></td>
      <td width="55%" class="title"><b>'.$_language->module['picture'].'</b></td>
      <td width="25%" class="title"><b>'.$_language->module['wsversion'].'</b></td>';
	 
	  
	   if(ishostingadmin($userID)) {echo ' <td width="20%" class="title"><b>'.$_language->module['actions'].'</b></td>
   		</tr>';}
		
		
	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
	$i=1;
  while($ds=mysql_fetch_array($ergebnis)) {
    if($i%2) { $td='td1'; }
    else { $td='td2'; }
    	$ergebnis2=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion  WHERE WebspellID = ".$ds['WebspellID']."");
		
		$ds2=mysql_fetch_array($ergebnis2);
		
		echo'<tr>
      <td class="'.$td.'">'.$ds['name'].'</td>
      <td class="'.$td.'" align="center"><img src="../images/hosting_templates/'.$ds['picture'].'" alt="" style="max-width:400px" /></td>
	  <td class="'.$td.'">'.$ds2['Name'].'</td>';
	 
	  
	   if(ishostingadmin($userID)) {echo '<td class="'.$td.'" align="center"><input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting_templates&amp;action=edit&amp;templateID='.$ds['TemplateID'].'\');return document.MM_returnValue" value="'.$_language->module['edit'].'" />
      <input type="button" onclick="MM_confirm(\''.$_language->module['really_delete_template'].'\', \'admincenter.php?site=hosting_templates&amp;delete=true&amp;templateID='.$ds['TemplateID'].'&amp;captcha_hash='.$hash.'\')" value="'.$_language->module['delete'].'" /></td>
    </tr>';}
      
      $i++;
	}
	echo'</table>';
}
?>