<?php

mysql_query("DROP TABLE IF EXISTS ".INST."features");
mysql_query("CREATE TABLE ".INST."features (
  featureID int(11) NOT NULL auto_increment,
  url varchar(255) NOT NULL default '',
  banner varchar(255) NOT NULL default '',
  sort int(11) NOT NULL default '0',
  PRIMARY KEY  (featureID)
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=2 ");

mysql_query("DROP TABLE IF EXISTS `".INST."topmatch`");
mysql_query("CREATE TABLE `".INST."topmatch` (
  topmID int(11) NOT NULL auto_increment PRIMARY KEY,
  date int(11) NOT NULL,
		matchlink varchar(255) NOT NULL,
		league varchar(255) NOT NULL,
        maps varchar(255) NOT NULL,
        server varchar(255) NOT NULL,
                headline varchar(255) NOT NULL,
		statement varchar(255) NOT NULL,
		heim varchar(255) NOT NULL,
		gegner varchar(255) NOT NULL,
		teamclan varchar(255) NOT NULL,
		logo1 varchar(255) NOT NULL,
		country1 varchar(255) NOT NULL,
		team1 varchar(255) NOT NULL,
		homepage1 varchar(255) NOT NULL,
  logo2 varchar(255) NOT NULL,
		country2 varchar(255) NOT NULL,
		team2 varchar(255) NOT NULL,
		homepage2 varchar(255) NOT NULL,
  displayed int(11) NOT NULL default '0'
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=1 ");

mysql_query("DROP TABLE IF EXISTS `".INST."topmatch_settings`");
mysql_query("CREATE TABLE `".INST."topmatch_settings` (
`topmatch_setting_id` int(11) NOT NULL auto_increment,
`logowidth` INT( 11 ) NOT NULL  default '0',
`logoheight` INT( 11 ) NOT NULL  default '0',
`logo` VARCHAR( 255 ) NOT NULL  default '',
`country` VARCHAR( 255 ) NOT NULL  default '',
`team` VARCHAR( 255 ) NOT NULL  default '',
`homepage` VARCHAR( 255 ) NOT NULL default '',
	PRIMARY KEY  (`topmatch_setting_id`)
)  AUTO_INCREMENT=2 ");

mysql_query("INSERT IGNORE INTO `".INST."topmatch_settings` (`topmatch_setting_id`,`logowidth`,`logoheight`,`logo`,`country`,`team`,`homepage`) VALUES (1, 0, 0, '', '', '', '')");


?>