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
#   Copyright 2005-2006 by webspell.org                                  #
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
#   modded by gamer-designs.de                                           #
 ########################################################################
*/

eval ("\$partners_head = \"".gettemplate("partners_head")."\";");
echo $partners_head;
$only="";
$count=0;
if($partnerID) $only="WHERE partnerID='".$partnerID."'";
$ergebnis=safe_query("SELECT * FROM ".PREFIX."partners ".$only." ORDER BY sort");
if(mysql_num_rows($ergebnis)) {
    while($db=mysql_fetch_array($ergebnis)) 
    {
	eval ("\$partners_content = \"".gettemplate("partners_content")."\";");
        echo $partners_content;
        $count++;
        if ($count % 4 == 0) 
        {
		eval ("\$partners_seperate = \"".gettemplate("partners_seperate")."\";");
		echo $partners_seperate;
	}
    }
}
eval ("\$partners_foot = \"".gettemplate("partners_foot")."\";");
echo $partners_foot;
?>