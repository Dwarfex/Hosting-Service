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
#   Copyright 2005-2006 by webspell.org / webspell.info                  #
#                                                                        #
#   visit webSPELL.org, webspell.info to get webSPELL for free           #
#   - Script runs under the GNU GENERAL PUBLIC LICENCE                   #
#   - It's NOT allowed to remove this copyright-tag                      #
#   -- http://www.fsf.org/licensing/licenses/gpl.html                    #
#                                                                        #
#   Code based on WebSPELL Clanpackage (Michael Gruber - webspell.at),   #
#   Far Development by Development Team - webspell.org / webspell.info   #
#                                                                        #
#   visit webspell.org / webspell.info                                   #
#                                                                        #
 ########################################################################
*/

if(!ispageadmin($userID) OR substr(basename($_SERVER[REQUEST_URI]),0,15) != "admincenter.php") die('Access denied.');

if($_GET['delete']) {
  $featureID = $_GET['featureID'];
	
  safe_query(" DELETE FROM ".PREFIX."features WHERE featureID='$featureID' ");
	$filepath = "../images/features/";
	if(file_exists($filepath.$featureID.'.jpg')) @unlink($filepath.$featureID.'.jpg');
	if(file_exists($filepath.$featureID.'.gif')) @unlink($filepath.$featureID.'.gif');
}
elseif($_POST['sortieren']) {
  $sort = $_POST['sort'];
	foreach($sort as $sortstring) {
	    $sorter=explode("-", $sortstring);
		safe_query("UPDATE ".PREFIX."features SET sort='$sorter[1]' WHERE featureID='$sorter[0]' ");
	}
}
elseif($_POST['save']) {
  $url = $_POST['url'];
  $banner = $_FILES[banner];
  
    safe_query("INSERT INTO ".PREFIX."features ( url, sort )
	             values( '$url', '1' )");
	$id=mysql_insert_id();			 
				 
	$filepath = "../images/features/";
	if ($banner[name] != "") {
        move_uploaded_file($banner[tmp_name], $filepath.$banner[name]);
		@chmod($filepath.$banner[name], 0755);
		$file_ext=strtolower(substr($banner[name], strrpos($banner[name], ".")));
		$file=$id.$file_ext;
		if(file_exists($filepath.$file)) @unlink($filepath.$file);
		rename($filepath.$banner[name], $filepath.$file);
		safe_query("UPDATE ".PREFIX."features SET banner='$file' WHERE featureID='$id' ");
	}
}
elseif($_POST['saveedit']) {
  $url = $_POST['url'];
  $banner = $_FILES[banner];

	$featureID = $_POST['featureID'];
	$id=$featureID;
	$filepath = "../images/features/";
	if ($banner[name] != "") {
        move_uploaded_file($banner[tmp_name], $filepath.$banner[name]);
		@chmod($filepath.$banner[name], 0755);
		$file_ext=strtolower(substr($banner[name], strrpos($banner[name], ".")));
		$file=$id.$file_ext;
    if(file_exists($filepath.$file)) @unlink($filepath.$file);
		rename($filepath.$banner[name], $filepath.$file);
		safe_query("UPDATE ".PREFIX."features SET banner='$file' WHERE featureID='$id' ");
	}
	safe_query("UPDATE ".PREFIX."features SET url='$url' WHERE featureID='$featureID' ");
}


echo'<h2>features</h2>';
if($_GET['action']=="add") {
	echo'<form method="post" action="admincenter.php?site=features" enctype="multipart/form-data">
	     <table cellpadding="4" cellspacing="0">
		 <tr>
		   <td>Banner:</td>
		   <td><input name="banner" type="file"></td>
		 </tr>
		 <tr>
		   <td>URL:</td>
		   <td><input type="text" name="url" size="30" value="index.php?site=" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td>
		 </tr>
		 <tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="save" value="add feature"></td>
		 </tr>
		 </table>
		 </form>';
}
elseif($_GET['action']=="edit") {

  $featureID = $_GET['featureID'];
  $ergebnis=safe_query("SELECT * FROM ".PREFIX."features WHERE featureID='$featureID'");
	$ds=mysql_fetch_array($ergebnis);
	
    echo'<form method="post" action="admincenter.php?site=features" enctype="multipart/form-data">
	     <table cellpadding="4" cellspacing="0">
		 <tr>
		   <td>Banner:</td>
		   <td><input name="banner" type="file"></td>
		 </tr>
		 <tr>
		   <td>Homepage:</td>
		   <td><input type="text" name="url" size="30" value="'.$ds[url].'" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td>
		 </tr>
		 <tr>
		   <td><input type="hidden" name="featureID" value="'.$featureID.'"></td>
		   <td><input type="submit" name="saveedit" value="update"></td>
		 </tr>
		 </table>
		 </form>';
}
else {
	echo'<input type="button" class="button" onClick="MM_goToURL(\'parent\',\'admincenter.php?site=features&action=add\');return document.MM_returnValue" value="new feature">';	
	echo'<form method="post" action="admincenter.php?site=features">
		     <table width="100%" cellpadding="4" cellspacing="1" bgcolor="#999999">
		     <tr bgcolor="#CCCCCC">
			   <td class="title" width="30">Banner:</td>
			   <td class="title">URL:</td>
			   <td class="title" colspan="2">Actions:</td>
			   <td class="title">Sort:</td>
			 </tr>
			 <tr bgcolor="#FFFFFF"><td colspan="6"></td></tr>';
			 
	$features=safe_query("SELECT * FROM ".PREFIX."features ORDER BY sort");
	$anzfeatures=safe_query("SELECT count(featureID) FROM ".PREFIX."features");
	$anzfeatures=mysql_result($anzfeatures, 0);
	
	while($db=mysql_fetch_array($features)) {
		echo'<tr bgcolor="#FFFFFF">
		       <td><img src="../images/features/'.$db[banner].'"></td>
			   <td>'.$db[url].'</td>
			   <td><input type="button" class="button" onClick="MM_goToURL(\'parent\',\'admincenter.php?site=features&action=edit&featureID='.$db[featureID].'\');return document.MM_returnValue" value="edit"></td>
			   <td><input type="button" class="button" onClick="MM_confirm(\'really delete this feature?\', \'admincenter.php?site=features&delete=true&featureID='.$db[featureID].'\')" value="delete"></td>
			   <td>
			   <select name="sort[]">';
		for($j=1; $j<=$anzfeatures; $j++) {
		    if($db[sort] == $j) echo'<option value="'.$db[featureID].'-'.$j.'" selected>'.$j.'</option>';
			else echo'<option value="'.$db[featureID].'-'.$j.'">'.$j.'</option>';
        }		
	    echo'  </select>
		       </td>
		     </tr>';
	}
	echo'<tr bgcolor="#FFFFFF"><td colspan="6"></td></tr>
	     <tr bgcolor="#CCCCCC">
         <td colspan="6" align="right"><input type="submit" name="sortieren" value="sort features"></td>
		 </tr>
		 </table></form>';
}
?>	
