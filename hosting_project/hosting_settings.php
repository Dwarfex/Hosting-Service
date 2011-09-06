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

$_language->read_module('hosting_settings');

if(!ishostingadmin($userID) OR mb_substr(basename($_SERVER['REQUEST_URI']),0,15) != "admincenter.php") die($_language->module['access_denied']);

echo'<h1>&curren; '.$_language->module['settings'].'</h1>';

if(isset($_POST['submit'])) {
 	$CAPCLASS = new Captcha;
	if($CAPCLASS->check_captcha(0, $_POST['captcha_hash'])) {
		safe_query("UPDATE ".PREFIX."hosting_settings SET 	
									maxprojects='".$_POST['maxprojects']."'");
									
									 
									 /*
									hosting_folder_1='".$_POST['hosting_folder_1']."',
									hosting_folder_2='".$_POST['hosting_folder_2']."',
									hosting_folder_3='".$_POST['hosting_folder_3']."',
									hosting_folder_4='".$_POST['hosting_folder_4']."',
									hosting_folder_5='".$_POST['hosting_folder_5']."',
									premium='".$_POST['premium']."',
									addon='".$_POST['addon']."',
									*/
									 
		
	  	redirect("admincenter.php?site=hosting_settings","",0);
	} else redirect("admincenter.php?site=hosting_settings",$_language->module['transaction_invalid'],3);
}

else {

	$settings=safe_query("SELECT * FROM ".PREFIX."hosting_settings");
	$ds=mysql_fetch_array($settings);



	

	if($ds['premium']) $premium = " checked=\"checked\"";
	else $premium = "";
	if($ds['addon']) $addon = " checked=\"checked\"";
	else $addon = "";

  
  	
	
	$CAPCLASS = new Captcha;
	$CAPCLASS->create_transaction();
	$hash = $CAPCLASS->get_hash();
?>

<form method="post" action="admincenter.php?site=hosting_settings">



<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="2"><b><?php echo $_language->module['settings']?>:</b></td>
  </tr>
  
</table>
<br />

<div style="width: 45%;float: left;">
	<table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
	    <td width="50%" align="right"><input name="maxprojects" type="text" value="<?php echo $ds['maxprojects']; ?>" size="3" /></td>
	    <td><?php echo $_language->module['maxprojects']?></td>
        <tr> 
        <td></td>
         <td><?php echo $_language->module['maxprojects_rem']?>
        
        </td>
        </tr>
        
	  </tr>
      <!-- <tr>
	    <td width="50%" align="right">Comming in V2:</td>
	    <td></td>
	  </tr>
    <tr>
      <td align="right"><input type="checkbox" name="premium" value="1" <?php echo $premium; ?>  /></td>
      <td><?php echo $_language->module['premium_act']?></td>
    </tr>
    <tr>
      <td align="right"><input type="checkbox" name="addon" value="1" <?php echo $addon; ?> /></td>
      <td><?php echo $_language->module['mods_act']?></td>
    </tr>-->
    </table>
</div>




<!--
<div style="width: 45%;float: left;">
	<table width="100%" border="0" cellspacing="1" cellpadding="3">
	  <tr>	 Changeable Hostingfolder in V2 planned 
	    <td width="50%" align="right"><input type="text" name="hosting_folder_1" value="<?php echo $ds['hosting_folder_1']; ?>" size="3"  /></td>
	    <td>Hosting Folder 1</td>
	  </tr>
       <tr>
	    <td width="50%" align="right"><input type="text" name="hosting_folder_2" value="<?php echo $ds['hosting_folder_2']; ?>" size="3"  /></td>
	    <td>Hosting Folder 2</td>
	  </tr>
       <tr>
	    <td width="50%" align="right"><input type="text" name="hosting_folder_3" value="<?php echo $ds['hosting_folder_3']; ?>" size="3"  /></td>
	    <td>Hosting Folder 3</td>
	  </tr>
       <tr>
	    <td width="50%" align="right"><input type="text" name="hosting_folder_4" value="<?php echo $ds['hosting_folder_4']; ?>" size="3"  /></td>
	    <td>Hosting Folder 4</td>
	  </tr>
       <tr>
	    <td width="50%" align="right"><input type="text" name="hosting_folder_5" value="<?php echo $ds['hosting_folder_5']; ?>" size="3"  /></td>
	    <td>Hosting Folder 5</td>
	  </tr>
	</table>
</div>

-->






<div style="clear: both; text-align: right; padding-top: 20px;">
  <input type="hidden" name="captcha_hash" value="<?php echo $hash; ?>" />
  <input type="submit" name="submit" value="<?php echo $_language->module['update']; ?>" />
</div>
</form>
<?php
}
?>