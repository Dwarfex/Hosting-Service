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

include("_mysql.php");
include("_settings.php");
include("_functions.php");

function download($file, $extern = 0) {

	if(!$extern) {
		$filename = basename($file);

		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Description: File Transfer");

		header("Content-Disposition: attachment; filename=".str_replace(' ', '_', $filename).";");
		header("Content-Length: ".filesize($file));
		header("Content-Transfer-Encoding: binary");

		@readfile($file);
		exit;
	}
	else header("Location: ".$file);
}

if(isset($_GET['fileID'])) $fileID = $_GET['fileID'];

if(isset($fileID)) {
	$ergebnis = safe_query("SELECT * FROM ".PREFIX."files WHERE fileID='$fileID' ");
	$dd=mysql_fetch_array($ergebnis);

	/*switch($dd['accesslevel']) {
		case 0: $allowed = 1; break;
		case 1: if($userID) $allowed = 1; break;
		case 2: if(isclanmember($userID)) $allowed = 1; break;
		default: $allowed=0;
	}*/

	$allowed=hasaccess($dd['accesslevel'], $useraccessgroups);
	
	if($allowed) {

		safe_query("UPDATE ".PREFIX."files SET downloads=downloads+1 WHERE fileID='$fileID' ");

		if(stristr($dd['file'],'http://') OR stristr($dd['file'],'ftp://')) download($dd['file'], 1);
		else download('downloads/'.$dd['file']);
	}
}

?>
