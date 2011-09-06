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

$_language->read_module('login');

if($loggedin) {
	$username='<a href="index.php?site=profile&amp;id='.$userID.'">'.strip_tags(getnickname($userID)).'</a>';
	
	if(isanyadmin($userID)) $admin='<a href="admin/admincenter.php" target="_blank">'.$_language->module['admin'].'</a><br />';
	else $admin='';
	//hosting addon
	if(isanyhosting($userID)) $hosting='<a href="hosting_project/admincenter.php" target="_blank">'.$_language->module['hosting'].'</a><br />';
	else $hosting='<a href="http://www.webspell-cms.org/index.php?site=loginoverview&action=unlockhosting">Unlock Hosting</a><br />';
	///////////////////////////////////////////////////////////////////////////////////////
	// support addon start
	if(ishostingadmin($userID)) {
	$abfrage = ''; }
	else { $abfrage = 'AND poster = '.$userID;
	}
	$result=safe_query("SELECT * FROM ".PREFIX."support_main WHERE saved = '1' ".$abfrage." AND status= 'open'");	
	if(mysql_num_rows($result)) {
	$i=0;
		while($ds=mysql_fetch_array($result)) {		
			$i++;
			}
			$_language->read_module('support');		
			$support = $_language->module['login_support'];
			$support .= $i;
			$support .= $_language->module['login_support2'];
			$_language->read_module('login');	
			} else { $support =''; }
	//support addon end
	//hosting addon end
	
	$anz=getnewmessages($userID);
	if($anz) {
		$newmessages=' (<b>'.$anz.'</b>)';
	}
	else $newmessages='';
	if($getavatar = getavatar($userID)) $l_avatar='<img src="images/avatars/'.$getavatar.'" alt="Avatar" />';
	else $l_avatar=$_language->module['n_a'];

	eval ("\$logged = \"".gettemplate("logged")."\";");
	echo $logged;
	
	
	
}
else {
	//set sessiontest variable (checks if session works correctly)
	$_SESSION['ws_sessiontest'] = true;
	eval ("\$loginform = \"".gettemplate("login")."\";");
	echo $loginform;
}

?>