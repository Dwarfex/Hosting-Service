<?php


mysql_query("DROP TABLE IF EXISTS ".INST."features");
mysql_query("CREATE TABLE ".INST."features (
  featureID int(11) NOT NULL auto_increment,
  url varchar(255) NOT NULL default '',
  banner varchar(255) NOT NULL default '',
  sort int(11) NOT NULL default '0',
  PRIMARY KEY  (featureID)
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=2 ");




?>