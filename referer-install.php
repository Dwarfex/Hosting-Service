<?php
include("_mysql.php");
include("_settings.php");
include("_functions.php");

mysql_query("DROP TABLE IF EXISTS ".PREFIX."referer");
mysql_query("CREATE TABLE ".PREFIX."referer (
  refererID INT(255) NOT NULL PRIMARY KEY auto_increment,
  referer tinytext NOT NULL,
  clicks INT(255) default '1',
  dates text NOT NULL
)");

echo "DE: Installation komplett, bitte löschen Sie die referrer-install.php von Ihrem Webspace
		<br />
	  ENG: Installation complete, please delete the referer-istall.php from your webspace";
?>