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
		
		safe_query("INSERT INTO ".PREFIX."hosting_wsversion ( name ) values( '".$_POST['name']."' ) ");
		$id=mysql_insert_id();
		safe_query("UPDATE ".PREFIX."hosting_wsversion SET description= '".$_POST['description']."' WHERE WebspellID='".$id."'");
		$target = 'ws_versions/ws'.$id;
		@mkdir( $target );
		echo $_language->module['upload_files'].$target;
		
		
	} else echo $_language->module['transaction_invalid'];
}

elseif(isset($_POST['saveedit'])) {
 	if(!ishostingadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);
	$CAPCLASS = new Captcha;
	if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
		$pic = $_FILES['pic'];
		safe_query("UPDATE ".PREFIX."hosting_wsversion SET name='".$_POST['name']."' WHERE WebspellID='".$_POST['WebspellID']."'");
		$id=$_POST['WebspellID'];
		safe_query("UPDATE ".PREFIX."hosting_wsversion SET description= '".$_POST['description']."' WHERE WebspellID='".$id."'");
		
	} else echo $_language->module['transaction_invalid'];
		
}

elseif(isset($_GET['delete'])) {
	
	if(!ishostingadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);
 	$CAPCLASS = new Captcha;
	if($CAPCLASS->check_captcha(0, $_GET['captcha_hash'])) {
		$WebspellID = $_GET['webspellID'];
		$ergebnis=safe_query("SELECT COUNT(*) AS anzahl FROM ".PREFIX."hosting_templates WHERE WebspellID='".$WebspellID."' ");
		$ds=mysql_fetch_array($ergebnis);
		if ($ds['anzahl'] > 0) {
			$ergebnis2=safe_query("SELECT * FROM ".PREFIX."hosting_templates WHERE WebspellID='".$WebspellID."' ");
			echo "".$_language->module['cant_delete']."";
			while($ds2=mysql_fetch_array($ergebnis2)) {
				echo '<br>';
				echo '<br>';
				echo $ds2['name'];
			} 
			echo '<br>';
			
			
		}else{
		safe_query("DELETE FROM ".PREFIX."hosting_wsversion WHERE WebspellID='".$WebspellID."'");
		$versionerror = '';
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
  echo '<h1>&curren; <a href="admincenter.php?site=hosting_wsversion" class="white">'.$_language->module['new_wsversion'].'</a> &raquo; '.$_language->module['add_version'].'</h1>';
  echo '<form method="post" action="admincenter.php?site=hosting_wsversion" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td width="15%"><b>'.$_language->module['template_name'].'</b></td>
      <td width="85%"><input type="text" name="name" size="50" /></td>
    </tr>
    <tr>
      <td><b>'.$_language->module['description'].'</b></td>
      <td><textarea name="description" cols="32" rows="4" >250&nbsp;'.$_language->module['char'].'</textarea></td>
    </tr>
	 <tr>
      <td><input type="hidden" name="captcha_hash" value="'.$hash.'" /></td>
      <td><input type="submit" name="save" value="'.$_language->module['add_version'].'" /></td>
    </tr>
  </table>
  </form>';
}

elseif($action=="edit") {
	if(!ishostingadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);
	//fertig
	
	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
  echo'<h1>&curren; <a href="admincenter.php?site=hosting_wsversion" class="white">'.$_language->module['wsversion'].$_language->module['plural'].'</a> &raquo; '.$_language->module['edit_version'].'</h1>';


	$WebspellID = $_GET['webspellID'];
	$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion WHERE WebspellID='".$WebspellID."'");
	$ds=mysql_fetch_array($ergebnis);

	echo'<form method="post" action="admincenter.php?site=hosting_wsversion" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="1" cellpadding="3">
   
    <tr>
      <td width="15%"><b>'.$_language->module['wsversion'].'</b></td>
      <td width="85%"><input type="text" name="name" size="50" value="'.htmlspecialchars($ds['Name']).'"/></td>
    </tr>
    
	 <tr>
      <td><b>'.$_language->module['description'].'</b></td>
      <td><textarea name="description" cols="32" rows="4" >'.htmlspecialchars($ds['description']).'</textarea></td>
    </tr>
	
    <tr>';
	$target = 'ws_versions/ws'.$WebspellID;
		
		echo $_language->module['upload_files'].$target;
		
	
	echo '
    
    <tr>
	<td><input type="hidden" name="captcha_hash" value="'.$hash.'" /><input type="hidden" name="WebspellID" value="'.$ds['WebspellID'].'" /></td>
      <td><input type="submit" name="saveedit" value="'.$_language->module['edit_version'].'" /></td>
    </tr>
  </table>
  </form>';
}

else {

  echo'<h1>&curren; '.$_language->module['wsversion'].$_language->module['plural'].'</h1>';

	  if(ishostingadmin($userID)) { echo'<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting_wsversion&amp;action=add\');return document.MM_returnValue" value="'.$_language->module['new_wsversion'].'" /><br /><br />';}

	$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion ORDER BY WebspellID");
	
  echo'<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#DDDDDD">
    <tr>
      <td width="20%" class="title"><b>'.$_language->module['wsversion'].'</b></td>';
	 
	  
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
      <td class="'.$td.'">'.$ds['Name'].'</td>';
	 
	  
	   if(ishostingadmin($userID)) {echo '<td class="'.$td.'" align="center"><input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting_wsversion&amp;action=edit&amp;webspellID='.$ds['WebspellID'].'\');return document.MM_returnValue" value="'.$_language->module['edit'].'" />
      <input type="button" onclick="MM_confirm(\''.$_language->module['really_delete_wsversion'].'\', \'admincenter.php?site=hosting_wsversion&amp;delete=true&amp;webspellID='.$ds['WebspellID'].'&amp;captcha_hash='.$hash.'\')" value="'.$_language->module['delete'].'" /></td>
    </tr>';}
      
      $i++;
	}
	echo'</table>';
	
	
		
}
?>


