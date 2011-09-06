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

$_language->read_module('members');

if(!ishostingadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);



if(isset($_POST['saveedit'])) {
 	$CAPCLASS = new Captcha;
	if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
		$id = $_POST['id'];
   
		$hostingadmin = isset($_POST['hostingadmin']);
		$hostingusr = isset($_POST['hostingusr']);
		
	
		if($userID != $id OR issuperadmin($userID)) {
	
			$ergebnis=safe_query("SELECT * FROM ".PREFIX."user_groups WHERE userID='".$id."'");
			if(!mysql_num_rows($ergebnis)) safe_query("INSERT INTO ".PREFIX."user_groups (userID) values ('".$id."')");
			safe_query("UPDATE ".PREFIX."user_groups SET 
	                          hosting='$hostingadmin',
							  hostingusr='$hostingusr' WHERE userID='".$id."'");
	
			//remove from mods
						
		
		}}
}

if(isset($_GET['action']) and $_GET['action'] == "edit") {

  echo'<h1>&curren; <a href="admincenter.php?site=members" class="white">'.$_language->module['members'].'</a> &raquo; '.$_language->module['edit_member'].'</h1>';

	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
	
	$_language->read_module('bbcode', true);
	
	eval ("\$addbbcode = \"".gettemplate("addbbcode", "html", "admin")."\";");
  eval ("\$addflags = \"".gettemplate("flags_admin", "html", "admin")."\";");
	
	$id = $_GET['id'];
	
  
	
	if(ishostingadmin($id)) $hosting='<input type="checkbox" name="hostingadmin" value="1" onmouseover="showWMTT(\'id15\')" onmouseout="hideWMTT()" checked="checked" />';
	else $hosting='<input type="checkbox" name="hostingadmin" value="1" onmouseover="showWMTT(\'id15\')" onmouseout="hideWMTT()" />';
	
	if(ishostingusr($id)) $hostu='<input type="checkbox" name="hostingusr" value="1" onmouseover="showWMTT(\'id16\')" onmouseout="hideWMTT()" checked="checked" />';
	else $hostu='<input type="checkbox" name="hostingusr" value="1" onmouseover="showWMTT(\'id16\')" onmouseout="hideWMTT()" />';

	

	
	
	echo '<form method="post" id="post" name="post" action="admincenter.php?site=members" onsubmit="return chkFormular();">
 
  <div class="tooltip" id="id15">'.$_language->module['tooltip_15'].'</div>
  <div class="tooltip" id="id16">'.$_language->module['tooltip_16'].'</div>
  <table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td width="15%"><b>'.$_language->module['nickname'].'</b></td>
      <td width="85%"><a href="../index.php?site=profile&amp;id='.$id.'" target="_blank">'.strip_tags(stripslashes(getnickname($id))).'</a></td>
    </tr>
    '.$squads.'
    '.$userdes.'
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td colspan="3"><b>'.$_language->module['access_rights'].'</b></td>
     </tr>
   
	  <tr>
      <td>'.$hosting.' '.$_language->module['hosting_admin'].'</td>
	  </tr>
	  <tr>
	  <td></td>
	  </tr>
	  <tr>
	  <td>'.$hostu.' '.$_language->module['hosting_usr'].'</td>
      <td></td>
    </tr>
	  <tr>
     
    </tr>';
    
	
   
  
  
	
	echo '<td></td></tr>';
  
  echo '<tr>
      <td><input type="hidden" name="id" value="'.$id.'" /><input type="hidden" name="captcha_hash" value="'.$hash.'" />
      <input type="submit" name="saveedit" value="'.$_language->module['edit_member'].'" /></td>
    </tr>
  </table>
  </form>';
  

}

else {
	
	include "users.php";
 
}
?>