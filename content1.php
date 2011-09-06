<?php
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
		 	?>