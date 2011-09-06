<table width="590" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="33" style="background-image:url(design/content/content_31.png); background-repeat:no-repeat;"><?php 
$_language->read_module($site);

	
$titelderseite = title.$site;
$templatederseite = title_.$site;
$templatederseite = "/title/".$templatederseite;


eval ("\$titelderseite = \"".gettemplate($templatederseite)."\";");
	echo $titelderseite;



	
	
	?></td>
  </tr>
  <tr>
    <td width="570" align="center" style="background-image:url(design/content/content_33.png); background-repeat:repeat-y;"><table width="542" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><?php
			if((!isset($site)) || $site=='') $site="news";
			$checkmodul=safe_query("SELECT `activated`, `access` FROM ".PREFIX."modules WHERE `filename`='".$site.".php'");
			$modulfound=mysql_num_rows($checkmodul);
			if($modulfound){
				$modulrow=mysql_fetch_array($checkmodul);
			  if($modulrow['activated']==1){
			  	if(hasaccess($modulrow['access'], $useraccessgroups)){
						$invalide = array('\\','/','/\/',':','.');
						$site = str_replace($invalide,' ',$site);
						if(!file_exists($site.".php")) $site = "news";
						include($site.".php");
			  	}
			  	else{
			  		echo '<br />'.$index_language['access_denied'];
			  	}
			  }
			  else{
			  	echo '<br />'.$index_language['mod_deactivated'];
			  }
			}
			else{
				echo '<br />'.$index_language['mod_not_available'];
		  }
		 	?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td  height="20" style="background-image:url(design/content/content_35.png); background-repeat:no-repeat;"></td>
  </tr>
</table>