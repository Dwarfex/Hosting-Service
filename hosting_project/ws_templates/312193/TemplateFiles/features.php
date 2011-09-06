<div id="slider1" class="sliderwrapper">
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

if($featureID) $only="WHERE featureID='".$featureID."'";

$ergebnis=safe_query("SELECT * FROM ".PREFIX."features ".$only." ORDER BY sort");
if(mysql_num_rows($ergebnis)) {
    while($db=mysql_fetch_array($ergebnis)) {
echo'<div class="contentdiv"><a href="'.$db[url].'" target="_self"><img src="images/features/'.$db[banner].'" alt="" border="0" /></a></div>';
	}
}
?>	
</div>
<div id="paginate-slider1" class="pagination">
</div>