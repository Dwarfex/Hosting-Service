<?php
ini_set('max_execution_time', 180);
$beginn = microtime(true); 
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
##########################################################################
#                                                                        #
#           Version 4       /                        /   /               #
#          -----------__---/__---__------__----__---/---/-               #
#           | /| /  /___) /   ) (_ `   /   ) /___) /   /                 #
#          _|/_|/__(___ _(___/_(__)___/___/_(___ _/___/___               #
#                            Society / Edition  Hosting Addon            #
#                                   /                                    #
#                                                                        #
#   modified by Listener from wemake-it.de (Henrik Oelze) in 2011        #
#                                                                        #
#   - Modifications are released under the GNU GENERAL PUBLIC LICENSE    #
#   - It is NOT allowed to remove this copyright-tag                     #
#   - http://www.fsf.org/licensing/licenses/gpl.html                     #
#                                                                        #
##########################################################################
*/

$_language->read_module('hosting');

if(!ishostingusr($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);

if(isset($_POST['save'])) {
	
	//creating new hosting project
	
	$CAPCLASS = new Captcha;
	if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
		//insert project name to database:
		$name = $_POST['name'];	
		if ($name==''){
			$name = 'no entry';
		}
		safe_query("INSERT INTO ".PREFIX."hosting ( ProjectName ) values( '".$name."' ) ");
		$id=mysql_insert_id();
		
		$subfolder  = $_POST['subfolder'];
		safe_query("UPDATE ".PREFIX."hosting SET hosting_folder='".$subfolder."' WHERE ProjectID='".$id."'");	
		
		//insert project owner ($userID)
		safe_query("UPDATE ".PREFIX."hosting SET UserID='".$userID."' WHERE ProjectID='".$id."'");	
		
		// which webspell version?
		$Version = $_POST['version'];
		$ergebnis3=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion WHERE Name='".$Version."'");
		$ds3=mysql_fetch_array($ergebnis3);	
		
		//insert ws version to project entry
		safe_query("UPDATE ".PREFIX."hosting SET WebspellID='".$ds3['WebspellID']."' WHERE ProjectID='".$id."'");	
		
		//insert "subdomain" "742514" -> start domain
		$ident= $id + 742514;
		safe_query("UPDATE ".PREFIX."hosting SET subdomain='".$ident."' WHERE ProjectID='".$id."'");
		
		//copy ws version files  to subdomain folder
		
		
		$hosting1=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID='".$id."'");
		$hos1=mysql_fetch_array($hosting1);	
		
		$hosting2=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
		$hos2=mysql_fetch_array($hosting2);	
		$hosting_folder = $hos2['hosting_folder_'.$hos1['hosting_folder'].'']; // webspell , clan,esports and so on 
		echo '1-3 &raquo;&nbsp;';
		echo $_language->module['ws_files_copy'].'<br>';
		$target = '../hosting_files/'.$hosting_folder.'/'.$ident;
		$source = 'ws_versions/ws'.$ds3['WebspellID'];
		full_copy( $source, $target );
		include("../_mysql.php");
		echo '2-3 &raquo;&nbsp;';
		echo $_language->module['ws_files_copied'].'<br>'; 
		
		// writing _mysql.php of project
		$file = (''.$target.'/_mysql.php');
		if($fp = fopen ($file, 'wb')) {
			$string='<?php
			$host = "'.$host.'";
			$user = "'.$user.'";
			$pwd = "'.$pwd.'";
			$db = "'.$db.'";
			define("PREFIX", \''.$ident.'_\');
			?>';
			fwrite($fp, $string);
			fclose($fp);
		}else{
			echo $_language->module['write_failed'];}
			echo '3-3 &raquo;&nbsp;';
			echo $_language->module['mysql_written'];
		// mysql install : see action=install
	
		
	} else echo $_language->module['transaction_invalid'];
}

elseif(isset($_POST['edit'])) {
 	$CAPCLASS = new Captcha;
	if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
		
		$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID=".$_POST['projectID']."");
		$ds=mysql_fetch_array($ergebnis);
		
		//Update project name
		safe_query("UPDATE ".PREFIX."hosting SET ProjectName='".$_POST['name']."' WHERE ProjectID='".$_POST['projectID']."'");
		
		//change project name in project's database
		safe_query("UPDATE ".$ds['subdomain']."_settings SET clanname='".$_POST['name']."' WHERE settingID='1'");
		
		$neu = $_POST['TemplateID'];
		$alt = $ds['TemplateID'];
		
		// 1 , 2 , 0 = Template ID's of normal webspell without template installed
		if (  (($neu == '1')||($neu == '2')) && (($alt == '0')||($alt == '1')||($alt == '2')) ){
			// no action : change from basic to basic template! 	
			
			echo $_language->module['basic_basic'];
		}elseif (    (($neu == '1')||($neu == '2')) && (($alt !== '0')||($alt !== '1')||($alt !== '2'))  ){
			echo '1-3 &raquo;&nbsp;';
			echo $_language->module['x_basic'];
			echo '<br />';
			// only re-copy webspell files -> change form template x to normal webspell	
			$id = $ds['ProjectID'];
			$ident= $id + 742514;
			//version kopieren
			$hosting1=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID='".$_POST['projectID']."'");
			$hos1=mysql_fetch_array($hosting1);	
			
			$hosting2=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
			$hos2=mysql_fetch_array($hosting2);	
			$hosting_folder = $hos2['hosting_folder_'.$hos1['hosting_folder'].'']; // webspell , clan,esports and so on 
		
			$target = '../hosting_files/'.$hosting_folder.'/'.$ident;
			$source = 'ws_versions/ws'.$ds['WebspellID'];
			full_copy( $source, $target );
			include("../_mysql.php");
			echo '2-3 &raquo;&nbsp;';		
			echo $_language->module['ws_files_copied'];
			echo '<br />';
			// writing project's  _mysql.php
			$file = (''.$target.'/_mysql.php');
			if($fp = fopen ($file, 'wb')) {
				$string='<?php
				$host = "'.$host.'";
				$user = "'.$user.'";
				$pwd = "'.$pwd.'";
				$db = "'.$db.'";
				define("PREFIX", \''.$ident.'_\');
				?>';
				fwrite($fp, $string);
				fclose($fp);
			}
			else echo $_language->module['write_failed'];
			echo '3-3 &raquo;&nbsp;';
			echo $_language->module['mysql_written'];
			
			//update template ID
			safe_query("UPDATE ".PREFIX."hosting SET TemplateID='0' WHERE ProjectID='".$_POST['projectID']."'");			
			
			
		
		}elseif ( $neu == $alt ){
		
			// no changes at all -> change to same template		
			echo $_language->module['x_x'];
			echo '<br />';
			
		}elseif ($neu !== $alt) {
			// need new template 
			echo '1-5 &raquo;&nbsp;';
			echo $_language->module['x_x'];	
			echo '<br />';		
			//copy basic webspell (cause of possible different template files)
			$id = $ds['ProjectID'];
			$ident= $id + 742514;
			$hosting1=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID='".$id."'");
		    $hos1=mysql_fetch_array($hosting1);	
			
			$hosting2=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
			$hos2=mysql_fetch_array($hosting2);	
			$hosting_folder = $hos2['hosting_folder_'.$hos1['hosting_folder'].'']; // webspell , clan,esports and so on 
		
			$target = '../hosting_files/'.$hosting_folder.'/'.$ident;
			$source = 'ws_versions/ws'.$ds['WebspellID'];
			full_copy( $source, $target );
			echo '2-5 &raquo;&nbsp;';
			echo $_language->module['ws_files_copied']; 
			echo '<br />';   		
			
			// writing project's -mysql.php
			include("../_mysql.php");		
			$file = (''.$target.'/_mysql.php');
			if($fp = fopen ($file, 'wb')) {
				$string='<?php
				$host = "'.$host.'";
				$user = "'.$user.'";
				$pwd = "'.$pwd.'";
				$db = "'.$db.'";
				define("PREFIX", \''.$ident.'_\');
				?>';
				fwrite($fp, $string);
				fclose($fp);
			}
			else echo $_language->module['write_failed'];
			echo '3-5 &raquo;&nbsp;';
			echo $_language->module['mysql_written'];
			echo '<br />';
			
			//update TemplateID
			safe_query("UPDATE ".PREFIX."hosting SET TemplateID='".$neu."' WHERE ProjectID='".$_POST['projectID']."'");
			echo '4-5 &raquo;&nbsp;';
			echo $_language->module['template_ID_updated'];
			echo '<br />';
						
			// copy new template files
			$neut= $neu + 312114;
			$source = 'ws_templates/'.$neut.'/TemplateFiles';
			full_copy( $source, $target );
			echo '5-5 &raquo;&nbsp;';
			echo $_language->module['template_files_copied'];
			echo '<br />';
					
			//install template_install.php if exists 
			$filename = 'ws_templates/'.$neut.'/template-install.php';
			if (file_exists($filename)) {
			define("INST", $ident.'_');
			//installing webspell basic version
				include('ws_templates/'.$neut.'/template-install.php');
			}
			//missing
					
						
		}			
	} else echo $_language->module['transaction_invalid'];
}

elseif(isset($_GET['delete'])) {
		$ownproject ='';
		$projectID = $_GET['projectID']; 
		$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID='$projectID'");
		$ds=mysql_fetch_array($ergebnis);
		
		// olny allow delete if user is owner or hosting admin

		if ($ds['UserID'] == $userID){
			$ownproject = true;
		}else{
			$ownproject = false;
		}
		if (ishostingadmin($userID) OR $ownproject == true) {
			$CAPCLASS = new Captcha;
			if($CAPCLASS->check_captcha(0, $_GET['captcha_hash'])) {
				
			//set paths for delete
			
		
		$hosting1=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID='".$projectID."'");
		$hos1=mysql_fetch_array($hosting1);	
		
		$hosting2=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
		$hos2=mysql_fetch_array($hosting2);	
		$hosting_folder = $hos2['hosting_folder_'.$hos1['hosting_folder'].'']; // webspell , clan,esports and so on 
			
			$dir = "../hosting_files/".$hosting_folder."/".$ds['subdomain']."/";
			$path = $dir;
			$path1 = $path.'admin/';
			$path2 = $path.'downloads/';
			$path3 = $path.'images/';
			$path4 = $path.'js/';
			$path5 = $path.'languages/';
			$path6 = $path.'src/';
			$path7 = $path.'templates/';
			
			//delete files
			rec_rmdir($path1);
			echo '1-10 &raquo;&nbsp;';
			echo $path1.'&nbsp;&nbsp;'.$_language->module['deleted'].'...<br>';
			rec_rmdir($path2);
			echo '2-10 &raquo;&nbsp;';
			echo $path2.'&nbsp;&nbsp;'.$_language->module['deleted'].'...<br>';
			rec_rmdir($path3);
			echo '3-10 &raquo;&nbsp;';
			echo $path3.'&nbsp;&nbsp;'.$_language->module['deleted'].'...<br>';
			rec_rmdir($path4);
			echo '4-10 &raquo;&nbsp;';
			echo $path4.'&nbsp;&nbsp;'.$_language->module['deleted'].'...<br>';
			rec_rmdir($path5);
			echo '5-10 &raquo;&nbsp;';
			echo $path5.'&nbsp;&nbsp;'.$_language->module['deleted'].'...<br>';
			rec_rmdir($path6);
			echo '6-10 &raquo;&nbsp;';
			echo $path6.'&nbsp;&nbsp;'.$_language->module['deleted'].'...<br>';
			rec_rmdir($path7);
			echo '7-10 &raquo;&nbsp;';
			echo $path7.'&nbsp;&nbsp;'.$_language->module['deleted'].'...<br>';
			rec_rmdir($path);
			echo '8-10 &raquo;&nbsp;';
			echo $path.'&nbsp;&nbsp;'.$_language->module['deleted'].'...<br><br>';
			
			//delete Project's database
			deleteprefixtables($ds['subdomain'].'_');
			echo '9-10 &raquo;&nbsp;';
			echo $_language->module['db_deleted'].'<br><br>';
			
			//delete Hosting entry
			safe_query("DELETE FROM ".PREFIX."hosting WHERE ProjectID='$projectID'");
			echo '10-10 &raquo;&nbsp;';
			echo $_language->module['hos_deleted'].'...<br><br>'.$_language->module['complete'].'!<br>';
			}else{
				echo $_language->module['transaction_invalid'];
			}
		}elseif ($ownproject == false) {
			die($_language->module['access_denied']);} 
	
}
elseif(isset($_GET['install'])) {
	
		$id ='';
		$projectID = $_GET['projectID']; 
		$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID='$projectID'");
		$ds=mysql_fetch_array($ergebnis);
		$CAPCLASS = new Captcha;
		if($CAPCLASS->check_captcha(0, $_GET['captcha_hash'])) {
			$prefix = '';
			$adminname = '';
			$adminpassword = '';
			$adminmail = '';
			$homepagename = '';
			$get_id=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID='".$projectID."'");
			$gi=mysql_fetch_array($get_id);	
			$homepagename =  $gi['ProjectName'];
			 
			// check if project could already be installed
			if ($gi['installed'] == 0 ){
				
				//if not:	
				$ident= $projectID + 742514;
				$user_data=safe_query("SELECT * FROM ".PREFIX."user WHERE userID='".$userID."'");
				$ud=mysql_fetch_array($user_data);	
				
				// old user data for projects new admin data
				$prefix = $ident.'_';
				$adminname = $ud['username'];
				$adminpassword = $ud['password'];
				$adminmail = $ud['email'];
				$url = $_POST['url'];
				define("INST", $prefix);
				echo '1-3 &raquo;&nbsp;';
				echo $_language->module['install'].'<br />';
				echo '2-3 &raquo;&nbsp;';
				//installing webspell basic version
				include('ws_versions/inst_ws'.$ds['WebspellID'].'/install/install.php'); //missing -> in file maybe?
				
				// update Project to "installed"
				safe_query("UPDATE ".PREFIX."hosting SET installed='1' WHERE ProjectID='".$projectID."'");
				echo '<br />3-3 &raquo;&nbsp;'.$_language->module['complete'];
			}elseif ($gi['installed'] == 1 ){
				echo $_language->module['alrdy_installed'];
			}
	} else echo $_language->module['transaction_invalid'];
 
}elseif(isset($_POST['header'])) {
	
	
 	$CAPCLASS = new Captcha;
	if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
		// bild hochladen start
		$projectID = $_POST['projectID'];
		$id = $projectID;
		$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID=".$projectID."");
		$ds=mysql_fetch_array($ergebnis);
		
		$hosting2=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
		$hos2=mysql_fetch_array($hosting2);	
		$hosting_folder = $hos2['hosting_folder_'.$ds['hosting_folder'].'']; // webspell , clan,esports and so on 
	
		$subdomain = $ds['subdomain'] ;
	
		$header=safe_query("SELECT * FROM ".PREFIX."hosting_templates WHERE TemplateID=".$ds['TemplateID']."");
		$head=mysql_fetch_array($header);	
	
	
		$header_location = $head['header_location'];
		$header_file = $head['header_name'];
		$PSDFile = 'ws_templates/'.$head['location'].'/PSD/header.psd';
		$filename = '../hosting_files/'.$hosting_folder.'/'.$subdomain.'/'.$header_location.''.$header_file;
		
		
		
		$pic = $_FILES['pic'];
		$filepath = '../hosting_files/'.$hosting_folder.'/'.$subdomain.'/'.$header_location ;
		if($pic['name'] != "") {
			move_uploaded_file($pic['tmp_name'], $filepath.$pic['name'].".tmp");
			@chmod($filepath.$pic['name'].".tmp", 0755);
			$getimg = getimagesize($filepath.$pic['name'].".tmp");
			$getimg2 = getimagesize($filename);
			if($getimg[0] ==  $getimg2[0] && $getimg[1] == $getimg2[1]) {
				//same px x px filesize 
				
				
				if ($getimg[2] == $getimg2[2]) {
					
					unlink($filename);
					echo $filename;
					rename($filepath.$pic['name'].".tmp", $filename);
				
				
				
				}else {
					// not same filetype
					if(unlink($filepath.$pic['name'].".tmp")) {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=hosting&amp;action=header&amp;projectID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					} else {
						$error = $_language->module['format_incorrect'];
						die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=hosting&amp;action=header&amp;projectID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
					}
				}
				}else {
					// not same px x px filesize
				@unlink($filepath.$pic['name'].".tmp");
				$error = 'wrong filesize';
				die('<b>'.$error.'</b><br /><br /><a href="admincenter.php?site=hosting&amp;action=header&amp;projectID='.$id.'">&laquo; '.$_language->module['back'].'</a>');
			}
				
				
				
				
			
				
		}
		// bild hochladen ende
	}else{
		
		echo $_language->module['transaction_invalid']; ;
	}

}

if(isset($_GET['action'])) $action = $_GET['action'];
else $action = '';

if($action=="add") {
	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
	$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion");
	
	//headline 
  	echo '<h1>&curren; <a href="admincenter.php?site=hosting" class="white">'.$_language->module['new_project'].'</a> &raquo; '.$_language->module['add_project'].'</h1>';
	
	//check for maximum projects
	$count=safe_query("SELECT * FROM ".PREFIX."hosting WHERE UserID=".$userID."");
	$maxpro=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
	$maxproj=mysql_fetch_array($maxpro);
	$maxprojects = $maxproj['maxprojects'];
	$menge = mysql_num_rows($count);
	
	if ($menge > $maxprojects || $menge == $maxprojects) {
		
		echo 'cannot add, too much projects<br /><br />';
		
	}elseif ( ($menge < $maxprojects) || (ishostingadmin($userID)) ) {
	
	 
	
	echo '<form method="post" action="admincenter.php?site=hosting" enctype="multipart/form-data">
  	<table width="100%" border="0" cellspacing="1" cellpadding="3">
		<tr>
			<td width="15%"><b>'.$_language->module['project_name'].'</b></td>
			<td width="85%"><input type="text" name="name" size="60" /></td>
			<td><b>'.$_language->module['wsversion'].'</b></td>
			<td><select name="version" >';
			
				//dropdown webspell version chooser
				while($ds=mysql_fetch_array($ergebnis)) {
					echo'<option>'.htmlspecialchars($ds['Name']).'</option>';
				}
			echo'</select></td>
			</tr>
			<tr>
			<td><b>Subdomain</b></td>
			<td><select name="subfolder">';
			
			
		
			$hosting2=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
			$hos2=mysql_fetch_array($hosting2);	
			
				
					echo'<option value="1">'.htmlspecialchars($hos2['hosting_folder_1']).'</option>';
					echo'<option value="2">'.htmlspecialchars($hos2['hosting_folder_2']).'</option>';
					echo'<option value="3">'.htmlspecialchars($hos2['hosting_folder_3']).'</option>';
					echo'<option value="4">'.htmlspecialchars($hos2['hosting_folder_4']).'</option>';
					echo'<option value="5">'.htmlspecialchars($hos2['hosting_folder_5']).'</option>';
				
			echo'</select></td>
		</tr>
		<tr>
			<td><input type="hidden" name="captcha_hash" value="'.$hash.'" /></td>
			<td><input type="submit" name="save" value="'.$_language->module['add_project'].'" /></td>
		</tr>
    </table>
    </form>';
	
	}
	
}

elseif($action=="edit") {
	$ownproject ='';
	$projectID = $_GET['projectID']; 
	$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID='$projectID'");
	$ds=mysql_fetch_array($ergebnis);
	
	//only allow edit if owner or hosting admin
	if ($ds['UserID'] == $userID){
		$ownproject = true;
	}else{
		$ownproject = false;
	}
	if (ishostingadmin($userID) OR $ownproject == true) { 
	
	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
	
	//edit project button
 	 echo'<h1>&curren; <a href="admincenter.php?site=hosting" class="white">'.$_language->module['hosting_projects'].'</a> &raquo; '.$_language->module['edit_project'].'</h1>';

	$projectID = $_GET['projectID'];
	$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID='$projectID'");
	$ds=mysql_fetch_array($ergebnis);
	$aktTempID=$ds['TemplateID'];
	$orgWSID=$ds['WebspellID'];
	$ergebnis2=safe_query("SELECT * FROM ".PREFIX."hosting_templates WHERE TemplateID='".$ds['TemplateID']."'");
	$ds2=mysql_fetch_array($ergebnis2);
	
	//check if template is installed (into database) before editing - would make sense!
	if ($ds['installed'] == 1) {
	
	echo'<form method="post" action="admincenter.php?site=hosting" enctype="multipart/form-data">
  		<table width="100%" border="0" cellspacing="1" cellpadding="3">
			<tr>
				<td width="15%"><b>'.$_language->module['project_name'].'</b></td>
			</tr>
	    	<tr>
        		<td width="85%"><input type="text" name="name" size="60" value="'.htmlspecialchars($ds['ProjectName']).'" /></td>
	  		</tr>
			<tr>
				<td>'.$_language->module['choose_template'].'</td>
				<td><input type="submit" name="edit" value="'.$_language->module['edit_project'].'" /></td>
			</tr>
  		 </table>';
		   
		 //show all availabel templates
		  $ds2=safe_query("SELECT * FROM ".PREFIX."hosting_templates WHERE WebspellID='".$ds['WebspellID']."' ORDER BY name");
	
		
	
	
	 
	 
			while($du=mysql_fetch_array($ds2)) {
			
			if (    ($aktTempID == $du['TemplateID'])   || (($du['name'] == 'Basic')&& (($aktTempID == 0) || ($aktTempID == 1) || ($aktTempID == 2))))  {
			
				// aktuelles Template Vorausgewählt
				echo'
				<table width="100%" border="0" cellspacing="1" cellpadding="3">
				<tr>
					<td width="50%"><h3>'.$du['name'].'</h3></td>
					<td width="50%"></td>
				</tr>
				<tr>
					<td><img src="../images/hosting_templates/'.$du['picture'].'" alt=""  style="max-width:200px;"/></td>
					<td>'.$_language->module['description'].':<br></b></b><text> '.htmlspecialchars($du['description']).'</text></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="radio" name="TemplateID" value="'.htmlspecialchars($du['TemplateID']).'"  checked="checked"/>'.$_language->module['current'].':&nbsp<b>'.htmlspecialchars($du['name']).'</b></td>
				</tr>
				</table>';  
			}else{
	  // ansicht für normales template
	 echo'
				<table width="100%" border="0" cellspacing="1" cellpadding="3">
				<tr>
					<td width="50%"><h3>'.$du['name'].'</h3></td>
					<td width="50%"></td>
				</tr>
				<tr>
					<td><img src="../images/hosting_templates/'.$du['picture'].'" alt=""  style="max-width:200px;"/></td>
					<td>'.$_language->module['description'].':<br></b></b><text> '.htmlspecialchars($du['description']).'</text></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="radio" name="TemplateID" value="'.htmlspecialchars($du['TemplateID']).'"/>'.$_language->module['current'].':&nbsp<b>'.htmlspecialchars($du['name']).'</b></td>
				</tr>
				</table>';  
			}
		}
		 

      echo'
	  <table>
	  <tr>
	  	<td><input type="hidden" name="captcha_hash" value="'.$hash.'" /><input type="hidden" name="projectID" value="'.htmlspecialchars($ds['ProjectID']).'" /></td>
	  </tr>
	  </table>
	  </form>';
   		
		//if template is not installed 
			//show button for install
	}elseif ($ds['installed'] == 0) {
		
		echo '<form method="post" action="admincenter.php?site=hosting" enctype="multipart/form-data">You need to install your Project first:<br /> <br />
		<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting&amp;install=true&amp;projectID='.$ds['ProjectID'].'&amp;captcha_hash='.$hash.'\')" value="'.$_language->module['inst'].'" /></form>';
		
		
	
		}
}

elseif ($ownproject == false) {
	
	die($_language->module['access_denied']);} 

}
// header changer start
elseif($action=="header") {
	$ownproject ='';
	$projectID = $_GET['projectID']; 
	$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting WHERE ProjectID='$projectID'");
	$ds=mysql_fetch_array($ergebnis);
	
	//only allow edit if owner or hosting admin
	if ($ds['UserID'] == $userID){
		$ownproject = true;
	}else{
		$ownproject = false;
	}
	if (ishostingadmin($userID) OR $ownproject == true) { 
	
	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
	
	
	 echo'<h1>&curren; <a href="admincenter.php?site=hosting" class="white">'.$_language->module['hosting_projects'].'</a> &raquo; '.$_language->module['edit_header'].'</h1>';
	// show actual header template uses 
	
	$hosting2=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
	$hos2=mysql_fetch_array($hosting2);	
	$hosting_folder = $hos2['hosting_folder_'.$ds['hosting_folder'].'']; // webspell , clan,esports and so on 
	
	$subdomain = $ds['subdomain'] ;
	
	$header=safe_query("SELECT * FROM ".PREFIX."hosting_templates WHERE TemplateID=".$ds['TemplateID']."");
	$head=mysql_fetch_array($header);	
	if ($head['header_editable'] == 1) {
	
	$header_location = $head['header_location'];
	$header_file = $head['header_name'];
	$PSDFile = 'ws_templates/'.$head['location'].'/PSD/header.psd';
	$filename = '../hosting_files/'.$hosting_folder.'/'.$subdomain.'/'.$header_location.''.$header_file;
	$imagesize = getimagesize($filename);		
	
$Breite = $imagesize[0]*0.4 ;
     $Hoehe = $imagesize[1]*0.4 ;
$Bildtyp = '';	
	if ($imagesize[2] =='1') {
$Bildtyp = '*.gif';
}elseif ($imagesize[2] =='2') { 
$Bildtyp = '*.jpg';
}elseif ($imagesize[2] =='3') { 
$Bildtyp = '*.png';
}	
			echo'<table><form method="post" action="admincenter.php?site=hosting" enctype="multipart/form-data">';
			if (file_exists($filename)) {
				
				echo'<tr>
				<td>'. $_language->module['recent_header'].':</td>
				<td> <img src="'.$filename.'" width="'.$Breite.'" height="'.$Hoehe.'" /></td>
				</tr>';
				
				echo'<tr>
     			<td><b>x-px * y-px</b></td>
   				<td>'.$imagesize[0].'px * '.$imagesize[1].'px &nbsp; &nbsp;'.$Bildtyp.' </td>
  				</tr>';
				
				echo'<tr>
     			<td><b>'.$_language->module['picture_upload'].'</b></td>
   				<td><input name="pic" type="file" size="50" /></td>
  				</tr>';
				
				if (file_exists($PSDFile)) {
				echo'<tr>
				<td><br /><a href="'.$PSDFile.'" >'. $_language->module['DL_PSD'].'</a></td>
				</tr>';
				
				
				}else{
				echo'<tr>
				<td><br /><a href="#" >'. $_language->module['DL_PSD_unavailable'].'</a></td>
				</tr>';	
				}
				
				}else{
					
				echo "<tr><td><b>". $_language->module['header_unavailable']."</b></td></tr>";
				}
				echo '
				 <tr>
	  			<td><input type="hidden" name="captcha_hash" value="'.$hash.'" />
				<input type="hidden" name="projectID" value="'.htmlspecialchars($ds['ProjectID']).'" /></td>
	 
				
				<td><input type="submit" name="header" value="'.$_language->module['edit_project'].'" /></td>
				 </tr>';
	// Download Link to original PSD file
	
	// Upload function for new header
	
 	
	echo '</table>';
	}else{
		echo $_language->module['header_not_editable'];
	}
}

elseif ($ownproject == false) {
	
	die($_language->module['access_denied']);} 

}

//header changer end
else {
// list of all projects
  echo'<h1>&curren; '.$_language->module['hosting_projects'].'</h1>';
 echo'<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting&amp;action=add\');return document.MM_returnValue" value="'.$_language->module['new_project'].'" /><br /><br />';
 // echo own projects
$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting  WHERE UserID='$userID' ORDER BY 'ProjectID'");
  echo'<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#DDDDDD">
    <tr>
      <td width="20%" class="title"><b>'.$_language->module['project_name'].'</b></td>
      <td width="20%" class="title"><b>'.$_language->module['wsversion'].'</b></td>
	  <td width="20%" class="title"><b>'.$_language->module['subdomain'].'</b></td>
      <td width="20%" class="title"><b>Template&nbsp;'.$_language->module['template_name'].'</b></td>
	  <td width="20%" class="title"><b>'.$_language->module['actions'].'</b></td>
   		</tr>';
	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
	$i=1;
  while($ds=mysql_fetch_array($ergebnis)) {
    if($i%2) { $td='td1'; }
    else { $td='td2'; }
    $ergebnis2=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion WHERE WebspellID='".$ds['WebspellID']."'");
	$ds2=mysql_fetch_array($ergebnis2);	
	$ergebnis3=safe_query("SELECT * FROM ".PREFIX."hosting_templates WHERE TemplateID='".$ds['TemplateID']."'");
	$ds3=mysql_fetch_array($ergebnis3);	
	if ($ds['TemplateID'] == 0 ){
		$templatename = 'Basic';
	}else {
		$templatename = $ds3['name'];}
		
	
	if ($ds['installed'] == '1'){
		$hosting2=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
		$hos2=mysql_fetch_array($hosting2);	
		$hosting_folder = $hos2['hosting_folder_'.$ds['hosting_folder'].'']; // webspell , clan,esports and so on 
		$projektdomain = '<a href="http://'.$hosting_folder.'.webspell-cms.org/'.$ds['subdomain'].'/" target="_blank" class="link1">'.htmlspecialchars($ds['ProjectName']).'</a>';
		//$projektdomain = '<a href="../hosting_files/'.$hosting_folder.'/'.$ds['subdomain'].'/" target="_blank" class="link1">'.htmlspecialchars($ds['ProjectName']).'</a>';
		$projektsubdomain = $ds['subdomain'];
	}elseif ($ds['installed'] == '0') {
		$projektdomain = '<a href="#" target="_self" class="link1">'.htmlspecialchars($ds['ProjectName']).'</a>';
		$projektsubdomain = '<hr />';
	}
	
	echo'<tr>
      <td class="'.$td.'">'.$projektdomain.'</td>
	  <td class="'.$td.'">'.htmlspecialchars($ds2['Name']).'</td>
	  <td class="'.$td.'">'.$projektsubdomain.'</td>
	  <td class="'.$td.'">'.htmlspecialchars($templatename).'</td>
      <td class="'.$td.'" align="center">';
	  
	   if ($ds['installed'] == '1') // show edit only when installed
	   {
		echo ' <input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting&amp;action=edit&amp;projectID='.$ds['ProjectID'].'\');return document.MM_returnValue" value="'.$_language->module['edit'].'" />';	  
	  }
	  $header=safe_query("SELECT * FROM ".PREFIX."hosting_templates WHERE TemplateID=".$ds['TemplateID']."");
	$head=mysql_fetch_array($header);	
	 $head['header_editable'];
	 if (($ds['TemplateID'] !== '0') && ($ds['TemplateID'] !== '1') && ($ds['TemplateID']!== '2') && ( $head['header_editable'] == '1') ){
		echo '<br /> <input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting&amp;action=header&amp;projectID='.$ds['ProjectID'].'\');return document.MM_returnValue" value="'.$_language->module['edit_header'].'" />';	
	}
	 
      echo'<br /><input type="button" onclick="MM_confirm(\''.$_language->module['really_delete'].'\', \'admincenter.php?site=hosting&amp;delete=true&amp;projectID='.$ds['ProjectID'].'&amp;captcha_hash='.$hash.'\')" value="'.$_language->module['delete'].'" />
	  ';
	  
	  if ($ds['installed'] == '0'){
		echo '<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting&amp;install=true&amp;projectID='.$ds['ProjectID'].'&amp;captcha_hash='.$hash.'\')" value="'.$_language->module['inst'].'" />';	  
	  }
    echo '</td></tr>';
      
      $i++;
	}
	echo '</table>';
if (ishostingadmin($userID)) {	

// echo all projects for Hosting-Admin
	 
	$ergebnis=safe_query("SELECT * FROM ".PREFIX."hosting  WHERE UserID<>'$userID' ORDER BY 'UserID', 'ProjectID'");
  echo'<h1>&curren; '.$_language->module['hosting_customers'].'</h1>';
	  echo'<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#DDDDDD">
    <tr>
	 <td width="20%" class="title"><b>User</b></td>
      <td width="20%" class="title"><b>'.$_language->module['project_name'].'</b></td>
      <td width="20%" class="title"><b>'.$_language->module['wsversion'].'</b></td>
	  <td width="10%" class="title"><b>'.$_language->module['subdomain'].'</b></td>
      <td width="20%" class="title"><b>Template&nbsp;'.$_language->module['template_name'].'</b></td>
	  <td width="10%" class="title"><b>'.$_language->module['actions'].'</b></td>
   		</tr>';
	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
	$i=1;
  while($ds=mysql_fetch_array($ergebnis)) {
    if($i%2) { $td='td1'; }
    else { $td='td2'; }
	
    $ergebnis2=safe_query("SELECT * FROM ".PREFIX."hosting_wsversion WHERE WebspellID='".$ds['WebspellID']."'");
	$ds2=mysql_fetch_array($ergebnis2);	
	$ergebnis3=safe_query("SELECT * FROM ".PREFIX."hosting_templates WHERE TemplateID='".$ds['TemplateID']."'");
	$ds3=mysql_fetch_array($ergebnis3);	
	
	if ($ds['TemplateID'] == 0 ){
		$templatename = 'Basic';
	}else {
		$templatename = $ds3['name'];}
	
		
	if ($ds['installed'] == '1'){$hosting2=safe_query("SELECT * FROM ".PREFIX."hosting_settings WHERE settingID=1");
		$hos2=mysql_fetch_array($hosting2);	
		$hosting_folder = $hos2['hosting_folder_'.$ds['hosting_folder'].'']; // webspell , clan,esports and so on 
		$projektdomain = '<a href="http://'.$hosting_folder.'.webspell-cms.org/'.$ds['subdomain'].'/" target="_blank" class="link1">'.htmlspecialchars($ds['ProjectName']).'</a>';
		//$projektdomain = '<a href="../hosting_files/'.$hosting_folder.'/'.$ds['subdomain'].'/" target="_blank" class="link1">'.htmlspecialchars($ds['ProjectName']).'</a>';
		$projektsubdomain = $ds['subdomain'];
	}elseif ($ds['installed'] == '0') {
		$projektdomain = '<a href="#" target="_self" class="link1">'.htmlspecialchars($ds['ProjectName']).'</a>';
		$projektsubdomain = '<hr />';
	}
	
echo'<tr>
	  <td class="'.$td.'">'.getnickname($ds['UserID']).'
      <td class="'.$td.'">'.$projektdomain.'</td>
	  <td class="'.$td.'">'.htmlspecialchars($ds2['Name']).'</td>
	  <td class="'.$td.'">'.$projektsubdomain.'</td>
	  <td class="'.$td.'">'.htmlspecialchars($templatename).'</td>
      <td class="'.$td.'" align="center">';
	  
	   if ($ds['installed'] == '1') // show edit only when installed
	   {
		echo ' <input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting&amp;action=edit&amp;projectID='.$ds['ProjectID'].'\');return document.MM_returnValue" value="'.$_language->module['edit'].'" />';	  
	  }
	 $header=safe_query("SELECT * FROM ".PREFIX."hosting_templates WHERE TemplateID=".$ds['TemplateID']."");
	$head=mysql_fetch_array($header);	
	 $head['header_editable'];
	 if (($ds['TemplateID'] !== '0') && ($ds['TemplateID'] !== '1') && ($ds['TemplateID']!== '2') && ( $head['header_editable'] == '1') ){
		echo '<br /> <input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting&amp;action=header&amp;projectID='.$ds['ProjectID'].'\');return document.MM_returnValue" value="'.$_language->module['edit_header'].'" />';	
	}
	 
      echo'<br /><input type="button" onclick="MM_confirm(\''.$_language->module['really_delete'].'\', \'admincenter.php?site=hosting&amp;delete=true&amp;projectID='.$ds['ProjectID'].'&amp;captcha_hash='.$hash.'\')" value="'.$_language->module['delete'].'" />
	  ';
	  
	  if ($ds['installed'] == '0'){
		echo '<input type="button" onclick="MM_goToURL(\'parent\',\'admincenter.php?site=hosting&amp;install=true&amp;projectID='.$ds['ProjectID'].'&amp;captcha_hash='.$hash.'\')" value="'.$_language->module['inst'].'" />';	  
	  }
    echo '</td></tr>';
      
      $i++;
	}
	echo '</table>';}
	
}
$dauer = microtime(true) - $beginn; 
echo $_language->module['duration']."$dauer";
?>