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
	$username='<a href="index.php?site=profile&amp;id='.$userID.'"><b>'.strip_tags(getnickname($userID)).'</b></a>';
	if(isanyadmin($userID)) $admin='<a href="admin/admincenter.php" target="_blank">'.$_language->module['admin'].'</a><br />';
	else $admin='';
	
	$anz=getnewmessages($userID);
	if($anz) {
		$newmessages=' <span style="color:#84a6ad; font-weight:bold;">('.$anz.')</span>';
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