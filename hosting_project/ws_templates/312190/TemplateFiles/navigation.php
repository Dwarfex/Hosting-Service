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
*/

$_language->read_module('navigation');

switch($_GET['site']){			  
case news: case articles: case calendar: case faq: case search:;
$navihead1='style="display:block; float:right;"';
$navihead2='style="display:none; float:right;"';
$navihead3='style="display:none; float:right;"';
$navihead4='style="display:none; float:right;"';
$navihead5='style="display:none; float:right;"';
$navisub1='style="display:block;"';
$navisub2='style="display:none;"';
$navisub3='style="display:none;"';
$navisub4='style="display:none;"';
$navisub5='style="display:none;"';
break;
		  
case about: case squads: case members: case clanwars: case clanwars_details: case history: case awards:;
$navihead1='style="display:none; float:right;"';
$navihead2='style="display:block; float:right;"';
$navihead3='style="display:none; float:right;"';
$navihead4='style="display:none; float:right;"';
$navihead5='style="display:none; float:right;"';
$navisub1='style="display:none;"';
$navisub2='style="display:block;"';
$navisub3='style="display:none;"';
$navisub4='style="display:none;"';
$navisub5='style="display:none;"';
break;
		  
case forum: case guestbook: case registered_users: case whoisonline: case polls: case server:;
$navihead1='style="display:none; float:right;"';
$navihead2='style="display:none; float:right;"';
$navihead3='style="display:block; float:right;"';
$navihead4='style="display:none; float:right;"';
$navihead5='style="display:none; float:right;"';
$navisub1='style="display:none;"';
$navisub2='style="display:none;"';
$navisub3='style="display:block;"';
$navisub4='style="display:none;"';
$navisub5='style="display:none;"';
break;
		  
case files: case demos: case links: case gallery: case linkus:;
$navihead1='style="display:none; float:right;"';
$navihead2='style="display:none; float:right;"';
$navihead3='style="display:none; float:right;"';
$navihead4='style="display:block; float:right;"';
$navihead5='style="display:none; float:right;"';
$navisub1='style="display:none;"';
$navisub2='style="display:none;"';
$navisub3='style="display:none;"';
$navisub4='style="display:block;"';
$navisub5='style="display:none;"';
break;
		  
case sponsors: case newsletter: case contact: case challenge: case joinus: case imprint:;
$navihead1='style="display:none; float:right;"';
$navihead2='style="display:none; float:right;"';
$navihead3='style="display:none; float:right;"';
$navihead4='style="display:none; float:right;"';
$navihead5='style="display:block; float:right;"';
$navisub1='style="display:none;"';
$navisub2='style="display:none;"';
$navisub3='style="display:none;"';
$navisub4='style="display:none;"';
$navisub5='style="display:block;"';
break;
		  
default:
$navihead1='style="display:block; float:right;"';
$navihead2='style="display:none; float:right;"';
$navihead3='style="display:none; float:right;"';
$navihead4='style="display:none; float:right;"';
$navihead5='style="display:none; float:right;"';
$navisub1='style="display:block;"';
$navisub2='style="display:none;"';
$navisub3='style="display:none;"';
$navisub4='style="display:none;"';
$navisub5='style="display:none;"';
break;
}

eval ("\$navigation = \"".gettemplate("navigation")."\";");
echo $navigation;
?>
