<?php


//include("_mysql.php");
//include("_settings.php");
//include("_functions.php");

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
  PRIMARY KEY (`ProjectID`)
) ");


mysql_query("INSERT INTO `".PREFIX."hosting` (`UserID`, `WebspellID`, `TemplateID`, `ProjectName`, `subdomain`, `ProjectID`, `installed`, `changed`) VALUES
(1, 1, 0, 'Test Homepage', 742541, 27, 0, 0),
(1, 2, 0, 'Listeners Clan Homepage', 742542, 28, 0, 0)");


mysql_query("CREATE TABLE IF NOT EXISTS `".PREFIX."hosting_templates` (
  `TemplateID` int(1) NOT NULL AUTO_INCREMENT,
  `WebspellID` int(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(150) NOT NULL,
  `location` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`TemplateID`)
) ");


mysql_query("INSERT INTO `".PREFIX."hosting_templates` (`TemplateID`, `WebspellID`, `description`, `picture`, `location`, `name`) VALUES
(55, 2, 'Keine Beschreibung vorhanden', '', '22312169', 'neXorAD 1'),
(56, 2, 'Keine Beschreibung vorhanden', '', '22312170', 'neXorAD 2'),
(57, 2, 'Keine Beschreibung vorhanden', '', '22312171', 'neXorAD 3'),
(0, 2, 'test', '40.png', '', 'Basic')");

mysql_query("ALTER TABLE `".PREFIX."user_groups` ADD `hosting` INT( 1 ) NOT NULL ");

mysql_query("ALTER TABLE `".PREFIX."user_groups` ADD `hostingusr` INT( 1 ) NOT NULL ");



	
	
	
	echo 'Installation erfolgreich';
	@mail('info@wemake-it.de', 'INSTALL: Hosting Addon', 'URL: '.$_SERVER["HTTP_HOST"].'');
	
	mysql_error();


?>