<?php
$_language->read_module('videos');
echo'<h2>'.$_language->module['head'].'</h2>';
if(!ispageadmin($userID) OR substr(basename($_SERVER[REQUEST_URI]),0,15) != "admincenter.php") die('<div style="margin: 5px; padding: 5px; background-color: #ac453d; color: #FFFFFF; font-family: Arial; font-size: 12px;">'.$_language->module['no_perm'].'</div>');


if(!$_GET['type']){


if($_POST['save']) {

	if(!$_POST['hd']){ $_POST['hd'] = 0; }

	safe_query("UPDATE ".PREFIX."videos_settings SET max='".$_POST['max']."', sort='".$_POST['sort']."', hd='".$_POST['hd']."'");
}


echo'<input type="button" class="button" onClick="MM_goToURL(\'parent\',\'admincenter.php?site=videos&type=portal\');return document.MM_returnValue" value="'.$_language->module['goto_portal'].'">';
echo'<input type="button" class="button" onClick="MM_goToURL(\'parent\',\'admincenter.php?site=videos&type=rubric\');return document.MM_returnValue" value="'.$_language->module['goto_rubric'].'"><br><br>';

echo ''.$_language->module['vid_set'].'<br><br><br>';

  $ergebnis=safe_query("SELECT * FROM ".PREFIX."videos_settings");
	$ds=mysql_fetch_array($ergebnis);

if($ds['hd']) $hdbox='<input type="checkbox" name="hd" value="1" checked="checked">';
else $hdbox='<input type="checkbox" name="hd" value="1">';

if($ds[sort]=="vidID"){
	$sort .= '<option value="'.$ds[sort].'" selected>'.$ds[sort].'</option>';
	$sort .= '<option value="hits">hits</option>';
}else{
	$sort .= '<option value="hits" selected>hits</option>';
	$sort .= '<option value="vidID">vidID</option>';
}

$page_set = $_language->module['page_set'];
$sort_set = $_language->module['sort_set'];
$hd_set = $_language->module['hd_set'];



echo '
<form method="post" action="admincenter.php?site=videos" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
	<tr>
		<td>'.$page_set.'</td>
		<td><input type="text" size="3" name="max" value="'.$ds[max].'" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td>
	</tr>
	<tr>
		<td>'.$sort_set.'</td>
		<td><select name="sort">'.$sort.'</select></td>
	</tr>
	<tr>
		<td>'.$hd_set.'</td>
		<td>'.$hdbox.'</td>
	</tr>
	<tr>
		<td>&nbsp;</td><td><input type="submit" value="save" name="save"></td>
	</tr>
</table>
</form>';





}
elseif($_GET['type'] == "portal"){

if($_POST['save']) {
	safe_query("INSERT INTO ".PREFIX."videos_portals ( name, embed, preview ) values( '".$_POST['name']."','".$_POST['embed']."','".$_POST['preview']."' ) ");
    $id=mysql_insert_id();
	
}
elseif($_POST['saveedit']) {
	safe_query("UPDATE ".PREFIX."videos_portals SET name='".$_POST['name']."', embed='".$_POST['embed']."', preview='".$_POST['preview']."' WHERE id='".$_POST['portalID']."'");

}
elseif($_GET['delete']) {
  $portalID = $_GET['portalID'];
	safe_query("DELETE FROM ".PREFIX."videos_portals WHERE id='$portalID'");
}


if($_GET['action']=="add") {
    echo'<form method="post" action="admincenter.php?site=videos&type=portal" enctype="multipart/form-data">
	     <table cellpadding="4" cellspacing="0">
			 <tr><td>Name:</td><td><input type="text" name="name" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td></tr>
			 <tr><td>Embed-Code:</td><td><input type="text" name="embed" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td></tr>
			 <tr><td>Preview-Code:</td><td><input type="text" name="preview" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td></tr>
			 <tr><td>&nbsp;</td><td><input type="submit" name="save" value="'.$_language->module['add'].'"></td></tr>
		 </table>
		 </form>';
}
elseif($_GET['action']=="edit") {
  $portalID = $_GET['portalID'];
  $ergebnis=safe_query("SELECT * FROM ".PREFIX."videos_portals WHERE id='$portalID'");
	$ds=mysql_fetch_array($ergebnis);
	
$embcode = htmlspecialchars($ds[embed]);

echo'<form method="post" action="admincenter.php?site=videos&type=portal" enctype="multipart/form-data">
		<table cellpadding="4" cellspacing="0">
			<tr><td>Name:</td><td><input type="text" name="name" value="'.$ds[name].'" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td></tr>
			<tr><td>Embed:</td><td><input type="text" name="embed" value="'.$embcode.'" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td></tr>
			<tr><td>Preview:</td><td><input type="text" name="preview" value="'.$ds[preview].'" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td></tr>
			<tr><td><input type="hidden" name="portalID" value="'.$ds[id].'"></td><td><input type="submit" name="saveedit" value="'.$_language->module['edit'].'"></td></tr>
		</table>
		</form>';
}
else{

	echo'<input type="button" class="button" onClick="MM_goToURL(\'parent\',\'admincenter.php?site=videos&type=portal&action=add\');return document.MM_returnValue" value="'.$_language->module['new_port'].'"><br /><br />';

	$ergebnis=safe_query("SELECT * FROM ".PREFIX."videos_portals ORDER BY id");
	echo'<table width="100%" cellpadding="4" cellspacing="1" bgcolor="#999999">
   		<tr bgcolor="#CCCCCC"><td class="title" align="center">Name:</td><td class="title" align="center" colspan="2">Admin:</td></tr>
		<tr bgcolor="#FFFFFF"><td colspan="4"></td></tr>';
		
	while($ds=mysql_fetch_array($ergebnis)) {
    	echo'<tr bgcolor="#FFFFFF"><td align="center"><b>'.$ds[name].'</b></td><td align="center"><input type="button" class="button" onClick="MM_goToURL(\'parent\',\'admincenter.php?site=videos&type=portal&action=edit&portalID='.$ds[id].'\');return document.MM_returnValue" value="'.$_language->module['edit'].'"></td>
		   		<td align="center"><input type="button" class="button" onClick="MM_confirm(\''.$_language->module['del_check'].'\', \'admincenter.php?site=videos&type=portal&delete=true&portalID='.$ds[id].'\')" value="'.$_language->module['del'].'"></td>
		 	</tr>';
	}
	echo'</table>';

}


}
elseif($_GET['type'] == "rubric"){
if($_POST['save']) {
	safe_query("INSERT INTO ".PREFIX."videos_rubrics ( rubric ) values( '".$_POST['name']."' ) ");
    $id=mysql_insert_id();
	
}
elseif($_POST['saveedit']) {
	safe_query("UPDATE ".PREFIX."videos_rubrics SET rubric='".$_POST['name']."' WHERE rubricID='".$_POST['rubricID']."'");

}
elseif($_GET['delete']) {
  $rubricID = $_GET['rubricID'];
	safe_query("DELETE FROM ".PREFIX."videos_rubrics WHERE rubricID='$rubricID'");
}


if($_GET['action']=="add") {
    echo'<form method="post" action="admincenter.php?site=videos&type=rubric" enctype="multipart/form-data">
	     <table cellpadding="4" cellspacing="0">
			 <tr><td>Name:</td><td><input type="text" name="name" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td></tr>
			 <tr><td>&nbsp;</td><td><input type="submit" name="save" value="'.$_language->module['add'].'"></td></tr>
		 </table>
		 </form>';
}
elseif($_GET['action']=="edit") {
  $rubricID = $_GET['rubricID'];
  $ergebnis=safe_query("SELECT * FROM ".PREFIX."videos_rubrics WHERE rubricID='$rubricID'");
	$ds=mysql_fetch_array($ergebnis);
	
echo'<form method="post" action="admincenter.php?site=videos&type=rubric" enctype="multipart/form-data">
		<table cellpadding="4" cellspacing="0">
			<tr><td>Name:</td><td><input type="text" name="name" value="'.$ds[rubric].'" class="form_off" onFocus="this.className=\'form_on\'" onBlur="this.className=\'form_off\'"></td></tr>
			<tr><td><input type="hidden" name="rubricID" value="'.$ds[rubricID].'"></td><td><input type="submit" name="saveedit" value="'.$_language->module['edit'].'"></td></tr>
		</table>
		</form>';
}
else {
	echo'<input type="button" class="button" onClick="MM_goToURL(\'parent\',\'admincenter.php?site=videos&type=rubric&action=add\');return document.MM_returnValue" value="'.$_language->module['new_cat'].'"><br /><br />';

	$ergebnis=safe_query("SELECT * FROM ".PREFIX."videos_rubrics ORDER BY rubric");
	echo'<table width="100%" cellpadding="4" cellspacing="1" bgcolor="#999999">
   		<tr bgcolor="#CCCCCC"><td class="title" align="center">Name:</td><td class="title" align="center" colspan="2">Admin:</td></tr>
		<tr bgcolor="#FFFFFF"><td colspan="4"></td></tr>';
		
	while($ds=mysql_fetch_array($ergebnis)) {
    	echo'<tr bgcolor="#FFFFFF"><td align="center"><b>'.$ds[rubric].'</b></td><td align="center"><input type="button" class="button" onClick="MM_goToURL(\'parent\',\'admincenter.php?site=videos&type=rubric&action=edit&rubricID='.$ds[rubricID].'\');return document.MM_returnValue" value="'.$_language->module['edit'].'"></td>
		   		<td align="center"><input type="button" class="button" onClick="MM_confirm(\''.$_language->module['del_check'].'\', \'admincenter.php?site=videos&type=rubric&delete=true&rubricID='.$ds[rubricID].'\')" value="'.$_language->module['del'].'"></td>
		 	</tr>';
	}
	echo'</table>';
}

}
?>	
