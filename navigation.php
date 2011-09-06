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

$_language->read_module('navigation');

$_language_cat = new Language;
$_language_cat->set_language($_language->language);
$_language_cat->db_read_module('menucat');

$_language_entry = new Language;
$_language_entry->set_language($_language->language);
$_language_entry->db_read_module('menuentry');

$categories=safe_query("SELECT * FROM `".PREFIX."menu_categories` ORDER by `position`");
$any_categories=mysql_num_rows($categories);

if($any_categories){
	echo '<div class="menu">';
	echo '<ul>';
	while($row_category=mysql_fetch_array($categories)){
  	# echo '<h2>'.$_language_cat->module[$row_category['menucatID']].'</h2>';
  	$entries=safe_query("SELECT * FROM `".PREFIX."menu_entries` WHERE `menucatID`=".$row_category['menucatID']." ORDER by `position`");
  	$any_entries=mysql_num_fields($entries);
  	if($any_entries){
  		
  		while($row_entry=mysql_fetch_array($entries)){
  			if($row_entry['newwindow']==1){
  			  $target=' target="_blank"';
  			}
			else{
			  $target='';
			}
  			
			
			
			
			
			
			
		$rest = substr($row_entry['link'], 15);
				
  		###########
	
			 
			$checkmodul2=safe_query("SELECT `activated`, `access` FROM ".PREFIX."modules WHERE `filename`='".$rest.".php'");
			$modulfound2=mysql_num_rows($checkmodul2);
			if($modulfound2){
				$modulrow=mysql_fetch_array($checkmodul2);
			  if($modulrow['activated']==1){
			  	if(hasaccess($modulrow['access'], $useraccessgroups)){
				echo '<li><a  href="'.$row_entry['link'].'"'.$target.'>'.$_language_entry->module[$row_entry['menuentryID']].'</a></li>';		
			  	}
			  	else{
			  		/*echo '<br />'.$index_language['access_denied'];*/
			  	}
			  }
			  else{
			  	/*echo '<br />'.$index_language['mod_deactivated'];*/
			  }
			}
			else{
				/*echo '<br />'.$index_language['mod_not_available'];*/
		  }	
		
	##################	
	/*	echo '<li><a  href="'.$row_entry['link'].'"'.$target.'>'.$_language_entry->module[$row_entry['menuentryID']].'</a></li>';*/
		##########
			
		}
  		
  	}
  }
  echo '</ul>';
  echo '</div>';
}

else{
	echo $_language->module['no_menu_defined'];
}
?>
