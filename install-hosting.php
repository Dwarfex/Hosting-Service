<?php


include("_mysql.php");
include("_settings.php");
include("_functions.php");

mysql_query("CREATE TABLE IF NOT EXISTS `".PREFIX."hosting_wsversion` (
`WebspellID` int(255) NOT NULL AUTO_INCREMENT,
`Name` varchar(150) NOT NULL,
`description` text NOT NULL,
PRIMARY KEY (`WebspellID`)
)");



mysql_query(" INSERT INTO `".PREFIX."hosting_wsversion` (`WebspellID`, `Name`, `description`) VALUES
(1, 'Webspell Society Edition', 'hosting_project/ws_versions/webSPELL4.2.2a.Society.Edition/'),
(2, 'Webspell Clan Edition', 'hosting_project/ws_versions/webSPELL4.2.2a/')");




mysql_query("CREATE TABLE IF NOT EXISTS `".PREFIX."hosting` (
`UserID` int(11) unsigned NOT NULL,
`WebspellID` int(11) NOT NULL,
`TemplateID` int(10) unsigned NOT NULL,
`ProjectName` varchar(255) NOT NULL,
`subdomain` int(255) NOT NULL,
`ProjectID` int(11) unsigned NOT NULL AUTO_INCREMENT,
`installed` int(1) NOT NULL,
`changed` int(1) NOT NULL,
`hosting_folder` varchar(5) NOT NULL default '1',
PRIMARY KEY (`ProjectID`)
) ");

mysql_query("CREATE TABLE IF NOT EXISTS `".PREFIX."hosting_settings` (
  `settingID` int(11) NOT NULL auto_increment,
  `maxprojects` int(11) NOT NULL default '5',
  `premium` int(11) NOT NULL default '0',
  `addon` int(11) NOT NULL default '0',
  `hosting_folder_1` varchar(50) NOT NULL default 'webspell',
  `hosting_folder_2` varchar(50) NOT NULL default 'hosting',
  `hosting_folder_3` varchar(50) NOT NULL default 'clan',
  `hosting_folder_4` varchar(50) NOT NULL default 'esport',
  `hosting_folder_5` varchar(50) NOT NULL default 'gaming',
  PRIMARY KEY  (`settingID`)
)");
mysql_query("INSERT INTO `".PREFIX."hosting_settings` VALUES (1, 1, 0, 0, 'webspell', 'hosting', 'clan', 'esport', 'gaming');");

mysql_query("INSERT INTO `".PREFIX."hosting` (`UserID`, `WebspellID`, `TemplateID`, `ProjectName`, `subdomain`, `ProjectID`, `installed`, `changed`) VALUES
(1, 1, 0, 'Test Homepage', 742541, 27, 0, 0),
(1, 2, 0, 'Listeners Clan Homepage', 742542, 28, 0, 0)");


mysql_query("CREATE TABLE IF NOT EXISTS `".PREFIX."hosting_templates` (
`TemplateID` int(1) NOT NULL auto_increment,
  `WebspellID` int(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(150) NOT NULL,
  `location` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `header_editable` int(1) NOT NULL default '0',
  `header_location` varchar(255) NOT NULL,
  `header_name` varchar(255) NOT NULL,
  `premium` int(11) NOT NULL default '0',
  `price` int(11) NOT NULL default '0',
  PRIMARY KEY  (`TemplateID`)
) ");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (1, 2, 'This is the normal layout of Webspell 4.2.2 Clan.\r\n\r\nMade by webspell.org', '58.png', '22312172', 'Basic', 0, '', '', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (2, 1, 'This is the normal layout of Webspell 4.2.2 Society Edition. \r\n\r\nMade by webspell.org', '59.png', '11312173', 'Basic', 0, '', '', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (75, 2, 'Template Designer:\r\nErrOr (xl-websolution.de)\r\n\r\nTemplate license:\r\nGNU General Public License\r\n\r\n', '75.jpg', '312189', 'Free Community Template', 1, 'images/', 'logo.PNG', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (74, 2, 'Template designer:\r\nxl-websolution.de\r\n\r\nTemplate licence: \r\nCC Attribution Share Alike Unported', '74.jpg', '312188', 'World of Warcraft #1', 0, '', '', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (90, 2, 'Template Designer:\r\nAlexander Merkel / Dosonaro\r\n\r\nTemplate license:\r\nCC Attribution Share Alike', '90.jpg', '312204', 'eQ Esports Template', 1, 'layout/design/', 'header.png', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (80, 2, 'Template Designer:\r\neGGzy Kode-Designs\r\n\r\nTemplate license:\r\nCC Attribution Share Alike', '80.jpg', '312194', 'Kode #6 Template', 1, 'design/', 'header.jpg', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (82, 2, 'Template Designer:\r\nZenavio.com | LoWSolidSnake\r\n\r\nTemplate license:\r\nCC Attribution Share Alike Unported', '82.jpg', '312196', 'BF2 Gaming Template', 1, 'styles/header/', 'header.jpg', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (83, 2, 'Template Designer:\r\nstarrave.net\r\n\r\nTemplate license:\r\nCC Attribution Share Alike', '83.jpg', '312197', 'Template Improved', 1, 'Bilder/', 'improved_02.jpg', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (84, 2, 'Template Designer:\r\neGGzy Kode-Designs\r\n\r\nTemplate license:\r\nCC Attribution Share Alike', '84.jpg', '312198', 'Template #3 Kode-Designs', 1, 'slike/', 'header.jpg', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (85, 2, 'Template Designer:\r\nSil3nce | webSPELL Addons\r\n\r\nTemplate license:\r\nCC Attribution Share Alike', '85.jpg', '312199', 'Template 5 neXor', 0, '', '', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (86, 1, 'Template Designer:\r\nt-websolutions.de | LoWSolidSnake\r\n\r\nTemplate license:\r\nGNU General Public License', '86.jpg', '312200', 'News Portfolio', 1, 'styles/header/', 'header.jpg', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (87, 1, 'Template Designer:\r\neGGzy Kode-Designs\r\n\r\nTemplate license:\r\nCC Attribution Share Alike', '87.jpg', '312201', 'Kode #1 SE Template', 0, '', '', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (88, 1, 'Template Designer:\r\nAnnpixel.de | LoWSolidSnake\r\n\r\nTemplate license:\r\nGNU General Public License', '88.jpg', '312202', 'Clean Green Template', 1, 'styles/', 'header.jpg', 0, 0);
");
mysql_query("INSERT INTO `".PREFIX."hosting_templates` VALUES (89, 1, 'Template Designer:\r\nAnnpixel.de | LoWSolidSnake\r\n\r\nTemplate license:\r\nGNU General Public License', '89.jpg', '312203', 'Red Stripe Template', 0, '', '', 0, 0);
");

mysql_query("INSERT INTO `".PREFIX."hosting_templates` (`TemplateID`, `WebspellID`, `description`, `picture`, `location`, `name`) VALUES
(55, 2, 'Keine Beschreibung vorhanden', '', '22312169', 'neXorAD 1'),
(56, 2, 'Keine Beschreibung vorhanden', '', '22312170', 'neXorAD 2'),
(57, 2, 'Keine Beschreibung vorhanden', '', '22312171', 'neXorAD 3'),
(0, 2, 'test', '40.png', '', 'Basic')");


mysql_query("CREATE TABLE IF NOT EXISTS `".PREFIX."support` (
  `supID` int(11) NOT NULL auto_increment,
  `text` text NOT NULL,
  `supmainID` varchar(255) NOT NULL default '',
  `date` varchar(255) NOT NULL default '',
  `replayer` varchar(255) NOT NULL default '',
  `saved` varchar(1) NOT NULL default '',
  PRIMARY KEY  (`supID`)
)");

mysql_query("CREATE TABLE IF NOT EXISTS `".PREFIX."support_main` (
  `supmainID` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `status` varchar(255) NOT NULL default '',
  `saved` varchar(1) NOT NULL default '',
  `stufe` varchar(255) NOT NULL default '',
  `date` varchar(255) NOT NULL default '',
  `rubric` varchar(255) NOT NULL default '',
  `poster` varchar(255) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`supmainID`)
)");
mysql_query("CREATE TABLE IF NOT EXISTS `".PREFIX."support_rubric` (
  `rubricID` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`rubricID`)
)");

mysql_query("ALTER TABLE `".PREFIX."user_groups` ADD `hosting` INT( 1 ) NOT NULL ");

mysql_query("ALTER TABLE `".PREFIX."user_groups` ADD `hostingusr` INT( 1 ) NOT NULL ");






echo 'Installation erfolgreich';
@mail('info@wemake-it.de', 'INSTALL: Hosting Addon', 'URL: '.$_SERVER["HTTP_HOST"].'');

mysql_error();


?>