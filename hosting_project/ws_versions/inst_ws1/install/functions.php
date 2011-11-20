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
 global $adminname;

 global $adminpassword;

 global $adminmail;

 global $url;

 global $homepagename; 
 
function fullinstall() {

	
	mysql_query("DROP TABLE IF EXISTS `".INST."about`");
	mysql_query("CREATE TABLE `".INST."about` (
  `about` longtext NOT NULL
)");

	mysql_query("DROP TABLE IF EXISTS `".INST."articles`");
	mysql_query("CREATE TABLE `".INST."articles` (
  `articlesID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `screens` text NOT NULL,
  `poster` int(11) NOT NULL default '0',
  `link1` varchar(255) NOT NULL default '',
  `url1` varchar(255) NOT NULL default '',
  `window1` int(1) NOT NULL default '0',
  `link2` varchar(255) NOT NULL default '',
  `url2` varchar(255) NOT NULL default '',
  `window2` int(1) NOT NULL default '0',
  `link3` varchar(255) NOT NULL default '',
  `url3` varchar(255) NOT NULL default '',
  `window3` int(1) NOT NULL default '0',
  `link4` varchar(255) NOT NULL default '',
  `url4` varchar(255) NOT NULL default '',
  `window4` int(1) NOT NULL default '0',
  `votes` int(11) NOT NULL default '0',
  `points` int(11) NOT NULL default '0',
  `rating` int(11) NOT NULL default '0',
  `saved` int(1) NOT NULL default '0',
  `viewed` int(11) NOT NULL default '0',
  `comments` int(1) NOT NULL default '0',
  PRIMARY KEY  (`articlesID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."awards`");
	mysql_query("CREATE TABLE `".INST."awards` (
  `awardID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `squadID` int(11) NOT NULL default '0',
  `award` varchar(255) NOT NULL default '',
  `homepage` varchar(255) NOT NULL default '',
  `rang` int(11) NOT NULL default '0',
  `info` text NOT NULL,
  PRIMARY KEY  (`awardID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."banner`");
	mysql_query("CREATE TABLE `".INST."banner` (
  `bannerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `banner` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`bannerID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."buddys`");
	mysql_query("CREATE TABLE `".INST."buddys` (
  `buddyID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL default '0',
  `buddy` int(11) NOT NULL default '0',
  `banned` int(1) NOT NULL default '0',
  PRIMARY KEY  (`buddyID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."cash_box`");
	mysql_query("CREATE TABLE `".INST."cash_box` (
  `cashID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `paydate` int(14) NOT NULL default '0',
  `usedfor` text NOT NULL,
  `info` text NOT NULL,
  `totalcosts` double(8,2) NOT NULL default '0.00',
  `usercosts` double(8,2) NOT NULL default '0.00',
  `squad` int(11) NOT NULL default '0',
  `konto` text NOT NULL,
  PRIMARY KEY  (`cashID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."cash_box_payed`");
	mysql_query("CREATE TABLE `".INST."cash_box_payed` (
  `payedID` int(11) NOT NULL AUTO_INCREMENT,
  `cashID` int(11) NOT NULL default '0',
  `userID` int(11) NOT NULL default '0',
  `costs` double(8,2) NOT NULL default '0.00',
  `date` int(14) NOT NULL default '0',
  `payed` int(1) NOT NULL default '0',
  PRIMARY KEY  (`payedID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."challenge`");
	mysql_query("CREATE TABLE `".INST."challenge` (
  `chID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `cwdate` int(14) NOT NULL default '0',
  `squadID` varchar(255) NOT NULL default '',
  `opponent` varchar(255) NOT NULL default '',
  `opphp` varchar(255) NOT NULL default '',
  `oppcountry` char(2) NOT NULL default '',
  `league` varchar(255) NOT NULL default '',
  `map` varchar(255) NOT NULL default '',
  `server` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `info` text NOT NULL,
  PRIMARY KEY  (`chID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."clanwars`");
	mysql_query("CREATE TABLE `".INST."clanwars` (
  `cwID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `squad` int(11) NOT NULL default '0',
  `game` varchar(5) NOT NULL default '',
  `league` varchar(255) NOT NULL default '',
  `leaguehp` varchar(255) NOT NULL default '',
  `opponent` varchar(255) NOT NULL default '',
  `opptag` varchar(255) NOT NULL default '',
  `oppcountry` char(2) NOT NULL default '',
  `opphp` varchar(255) NOT NULL default '',
  `maps` varchar(255) NOT NULL default '',
  `hometeam` varchar(255) NOT NULL default '',
  `oppteam` varchar(255) NOT NULL default '',
  `server` varchar(255) NOT NULL default '',
  `homescr1` int(11) NOT NULL default '0',
  `oppscr1` int(11) NOT NULL default '0',
  `homescr2` int(11) NOT NULL default '0',
  `oppscr2` int(11) NOT NULL default '0',
  `screens` text NOT NULL,
  `report` text NOT NULL,
  `comments` int(1) NOT NULL default '0',
  `linkpage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`cwID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."comments`");
	mysql_query("CREATE TABLE `".INST."comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `parentID` int(11) NOT NULL default '0',
  `type` char(2) NOT NULL default '',
  `userID` int(11) NOT NULL default '0',
  `nickname` varchar(255) NOT NULL default '',
  `date` int(14) NOT NULL default '0',
  `comment` text NOT NULL,
  `url` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `ip` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`commentID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."counter`");
	mysql_query("CREATE TABLE `".INST."counter` (
  `hits` int(20) NOT NULL default '0',
  `online` int(14) NOT NULL default '0'
) TYPE=MyISAM");

	mysql_query("INSERT IGNORE INTO `".INST."counter` (`hits`, `online`) VALUES (1, '".time()."')");

	mysql_query("DROP TABLE IF EXISTS `".INST."counter_iplist`");
	mysql_query("CREATE TABLE `".INST."counter_iplist` (
  `dates` varchar(255) NOT NULL default '',
  `del` int(20) NOT NULL default '0',
  `ip` varchar(255) NOT NULL default ''
) TYPE=MyISAM");

	mysql_query("DROP TABLE IF EXISTS `".INST."counter_stats`");
	mysql_query("CREATE TABLE `".INST."counter_stats` (
  `dates` varchar(255) NOT NULL default '',
  `count` int(20) NOT NULL default '0'
) TYPE=MyISAM");

	mysql_query("DROP TABLE IF EXISTS `".INST."demos`");
	mysql_query("CREATE TABLE `".INST."demos` (
  `demoID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `game` varchar(255) NOT NULL default '',
  `clan1` varchar(255) NOT NULL default '',
  `clan2` varchar(255) NOT NULL default '',
  `clantag1` varchar(255) NOT NULL default '',
  `clantag2` varchar(255) NOT NULL default '',
  `url1` varchar(255) NOT NULL default '',
  `url2` varchar(255) NOT NULL default '',
  `country1` char(2) NOT NULL default '',
  `country2` char(2) NOT NULL default '',
  `league` varchar(255) NOT NULL default '',
  `leaguehp` varchar(255) NOT NULL default '',
  `maps` varchar(255) NOT NULL default '',
  `player` varchar(255) NOT NULL default '',
  `file` varchar(255) NOT NULL default '',
  `downloads` int(11) NOT NULL default '0',
  `votes` int(11) NOT NULL default '0',
  `points` int(11) NOT NULL default '0',
  `rating` int(11) NOT NULL default '0',
  `comments` int(1) NOT NULL default '0',
  `accesslevel` int(1) NOT NULL default '0',
  PRIMARY KEY  (`demoID`)
) AUTO_INCREMENT=1 ");


	mysql_query("DROP TABLE IF EXISTS `".INST."files`");
	mysql_query("CREATE TABLE `".INST."files` (
  `fileID` int(11) NOT NULL AUTO_INCREMENT,
  `filecatID` int(11) NOT NULL default '0',
  `date` int(14) NOT NULL default '0',
  `filename` varchar(255) NOT NULL default '',
  `filesize` varchar(255) NOT NULL default '',
  `info` varchar(255) NOT NULL default '',
  `file` varchar(255) NOT NULL default '',
  `downloads` int(11) NOT NULL default '0',
  `accesslevel` int(1) NOT NULL default '0',
  PRIMARY KEY  (`fileID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."files_categorys`");
	mysql_query("CREATE TABLE `".INST."files_categorys` (
  `filecatID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`filecatID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."forum_announcements`");
	mysql_query("CREATE TABLE `".INST."forum_announcements` (
  `announceID` int(11) NOT NULL AUTO_INCREMENT,
  `boardID` int(11) NOT NULL default '0',
  `intern` int(1) NOT NULL default '0',
  `userID` int(11) NOT NULL default '0',
  `date` int(14) NOT NULL default '0',
  `topic` varchar(255) NOT NULL default '',
  `announcement` text NOT NULL,
  PRIMARY KEY  (`announceID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."forum_boards`");
	mysql_query("CREATE TABLE `".INST."forum_boards` (
  `boardID` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `info` varchar(255) NOT NULL default '',
  `intern` int(1) NOT NULL default '0',
  `sort` int(2) NOT NULL default '0',
  PRIMARY KEY  (`boardID`)
) AUTO_INCREMENT=3 ");

	mysql_query("INSERT IGNORE INTO `".INST."forum_boards` (`boardID`, `category`, `name`, `info`, `intern`, `sort`) VALUES (1, 1, 'Main Board', 'The general public board', 0, 1)");
	mysql_query("INSERT IGNORE INTO `".INST."forum_boards` (`boardID`, `category`, `name`, `info`, `intern`, `sort`) VALUES (2, 2, 'Main Board', 'The general intern board', 1, 1)");

	mysql_query("DROP TABLE IF EXISTS `".INST."forum_categories`");
	mysql_query("CREATE TABLE `".INST."forum_categories` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `intern` int(1) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `info` varchar(255) NOT NULL default '',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`catID`)
) AUTO_INCREMENT=3 ");

	mysql_query("INSERT IGNORE INTO `".INST."forum_categories` (`catID`, `intern`, `name`, `info`, `sort`) VALUES (1, 0, 'Public Boards', '', 2)");
	mysql_query("INSERT IGNORE INTO `".INST."forum_categories` (`catID`, `intern`, `name`, `info`, `sort`) VALUES (2, 1, 'Intern Boards', '', 3)");

	mysql_query("DROP TABLE IF EXISTS `".INST."forum_moderators`");
	mysql_query("CREATE TABLE `".INST."forum_moderators` (
  `modID` int(11) NOT NULL AUTO_INCREMENT,
  `boardID` int(11) NOT NULL default '0',
  `userID` int(11) NOT NULL default '0',
  PRIMARY KEY  (`modID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."forum_notify`");
	mysql_query("CREATE TABLE `".INST."forum_notify` (
  `notifyID` int(11) NOT NULL AUTO_INCREMENT,
  `topicID` int(11) NOT NULL default '0',
  `userID` int(11) NOT NULL default '0',
  PRIMARY KEY  (`notifyID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."forum_posts`");
	mysql_query("CREATE TABLE `".INST."forum_posts` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `boardID` int(11) NOT NULL default '0',
  `topicID` int(11) NOT NULL default '0',
  `date` int(14) NOT NULL default '0',
  `poster` int(11) NOT NULL default '0',
  `message` text NOT NULL,
  PRIMARY KEY  (`postID`)
) AUTO_INCREMENT=1 ");


	mysql_query("DROP TABLE IF EXISTS `".INST."forum_ranks`");
	mysql_query("CREATE TABLE `".INST."forum_ranks` (
  `rankID` int(11) NOT NULL AUTO_INCREMENT,
  `rank` varchar(255) NOT NULL default '',
  `pic` varchar(255) NOT NULL default '',
  `postmin` int(11) NOT NULL default '0',
  `postmax` int(11) NOT NULL default '0',
  PRIMARY KEY  (`rankID`)
) AUTO_INCREMENT=9 ");

	mysql_query("INSERT IGNORE INTO `".INST."forum_ranks` (`rankID`, `rank`, `pic`, `postmin`, `postmax`) VALUES (1, 'Rank 1', 'rank1.gif', 0, 9)");
	mysql_query("INSERT IGNORE INTO `".INST."forum_ranks` (`rankID`, `rank`, `pic`, `postmin`, `postmax`) VALUES (2, 'Rank 2', 'rank2.gif', 10, 24)");
	mysql_query("INSERT IGNORE INTO `".INST."forum_ranks` (`rankID`, `rank`, `pic`, `postmin`, `postmax`) VALUES (3, 'Rank 3', 'rank3.gif', 25, 49)");
	mysql_query("INSERT IGNORE INTO `".INST."forum_ranks` (`rankID`, `rank`, `pic`, `postmin`, `postmax`) VALUES (4, 'Rank 4', 'rank4.gif', 50, 199)");
	mysql_query("INSERT IGNORE INTO `".INST."forum_ranks` (`rankID`, `rank`, `pic`, `postmin`, `postmax`) VALUES (5, 'Rank 5', 'rank5.gif', 200, 399)");
	mysql_query("INSERT IGNORE INTO `".INST."forum_ranks` (`rankID`, `rank`, `pic`, `postmin`, `postmax`) VALUES (6, 'Rank 6', 'rank6.gif', 400, 2147483647)");
	mysql_query("INSERT IGNORE INTO `".INST."forum_ranks` (`rankID`, `rank`, `pic`, `postmin`, `postmax`) VALUES (7, 'Administrator', 'admin.gif', 0, 0)");
	mysql_query("INSERT IGNORE INTO `".INST."forum_ranks` (`rankID`, `rank`, `pic`, `postmin`, `postmax`) VALUES (8, 'Moderator', 'moderator.gif', 0, 0)");

	mysql_query("DROP TABLE IF EXISTS `".INST."forum_topics`");
	mysql_query("CREATE TABLE `".INST."forum_topics` (
  `topicID` int(11) NOT NULL AUTO_INCREMENT,
  `boardID` int(11) NOT NULL default '0',
  `icon` varchar(255) NOT NULL default '',
  `intern` int(1) NOT NULL default '0',
  `userID` int(11) NOT NULL default '0',
  `date` int(14) NOT NULL default '0',
  `topic` varchar(255) NOT NULL default '',
  `lastdate` int(14) NOT NULL default '0',
  `lastposter` int(11) NOT NULL default '0',
  `replys` int(11) NOT NULL default '0',
  `views` int(11) NOT NULL default '0',
  `closed` int(1) NOT NULL default '0',
  `moveID` int(11) NOT NULL default '0',
  PRIMARY KEY  (`topicID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."games`");
	mysql_query("CREATE TABLE `".INST."games` (
  `gameID` int(3) NOT NULL AUTO_INCREMENT,
  `tag` varchar(5) NOT NULL default '',
  `name` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`gameID`)
) PACK_KEYS=0 AUTO_INCREMENT=8 ");

	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (1, 'cs', 'Counter-Strike')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (2, 'ut', 'Unreal Tournament')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (3, 'to', 'Tactical Ops')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (4, 'hl2', 'Halflife 2')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (5, 'wc3', 'Warcraft 3')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (6, 'hl', 'Halflife')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (7, 'bf', 'Battlefield')");

	mysql_query("DROP TABLE IF EXISTS `".INST."guestbook`");
	mysql_query("CREATE TABLE `".INST."guestbook` (
  `gbID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `hp` varchar(255) NOT NULL default '',
  `icq` varchar(255) NOT NULL default '',
  `ip` varchar(255) NOT NULL default '',
  `comment` text NOT NULL,
  PRIMARY KEY  (`gbID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."history`");
	mysql_query("CREATE TABLE `".INST."history` (
  `history` text NOT NULL
) TYPE=MyISAM");

	mysql_query("DROP TABLE IF EXISTS `".INST."links`");
	mysql_query("CREATE TABLE `".INST."links` (
  `linkID` int(11) NOT NULL AUTO_INCREMENT,
  `linkcatID` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `info` varchar(255) NOT NULL default '',
  `banner` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`linkID`)
) AUTO_INCREMENT=2 ");

	mysql_query("INSERT IGNORE INTO `".INST."links` (`linkID`, `linkcatID`, `name`, `url`, `info`, `banner`) VALUES (1, 1, 'webSPELL.org', 'http://www.webspell.org', 'webspell.org: Webdesign und Webdevelopment', '1.gif')");

	mysql_query("DROP TABLE IF EXISTS `".INST."links_categorys`");
	mysql_query("CREATE TABLE `".INST."links_categorys` (
  `linkcatID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`linkcatID`)
) AUTO_INCREMENT=2 ");

	mysql_query("INSERT IGNORE INTO `".INST."links_categorys` (`linkcatID`, `name`) VALUES (1, 'Webdesign')");

	mysql_query("DROP TABLE IF EXISTS `".INST."linkus`");
	mysql_query("CREATE TABLE `".INST."linkus` (
  `bannerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL default '',
  `file` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`bannerID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."messenger`");
	mysql_query("CREATE TABLE `".INST."messenger` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL default '0',
  `date` int(14) NOT NULL default '0',
  `fromuser` int(11) NOT NULL default '0',
  `touser` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `message` text NOT NULL,
  `viewed` int(11) NOT NULL default '0',
  PRIMARY KEY  (`messageID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."news`");
	mysql_query("CREATE TABLE `".INST."news` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `rubric` int(11) NOT NULL default '0',
  `lang1` char(2) NOT NULL default '',
  `headline1` varchar(255) NOT NULL default '',
  `content1` text NOT NULL,
  `lang2` char(2) NOT NULL default '',
  `headline2` varchar(255) NOT NULL default '',
  `content2` text NOT NULL,
  `screens` text NOT NULL,
  `poster` int(11) NOT NULL default '0',
  `link1` varchar(255) NOT NULL default '',
  `url1` varchar(255) NOT NULL default '',
  `window1` int(11) NOT NULL default '0',
  `link2` varchar(255) NOT NULL default '',
  `url2` varchar(255) NOT NULL default '',
  `window2` int(11) NOT NULL default '0',
  `link3` varchar(255) NOT NULL default '',
  `url3` varchar(255) NOT NULL default '',
  `window3` int(11) NOT NULL default '0',
  `link4` varchar(255) NOT NULL default '',
  `url4` varchar(255) NOT NULL default '',
  `window4` int(11) NOT NULL default '0',
  `saved` int(1) NOT NULL default '1',
  `published` int(11) NOT NULL default '0',
  `comments` int(1) NOT NULL default '0',
  `cwID` int(11) NOT NULL default '0',
  PRIMARY KEY  (`newsID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."news_languages`");
	mysql_query("CREATE TABLE `".INST."news_languages` (
  `langID` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL default '',
  `lang` char(2) NOT NULL default '',
  `alt` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`langID`)
) AUTO_INCREMENT=12 ");

	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (1, 'danish', 'dk', 'danish')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (2, 'dutch', 'nl', 'dutch')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (3, 'english', 'uk', 'english')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (4, 'finnish', 'fi', 'finnish')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (5, 'french', 'fr', 'french')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (6, 'german', 'de', 'german')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (7, 'hungarian', 'hu', 'hungarian')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (8, 'italian', 'it', 'italian')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (9, 'norwegian', 'no', 'norwegian')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (10, 'spanish', 'es', 'spanish')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (11, 'swedish', 'se', 'swedish')");

	mysql_query("DROP TABLE IF EXISTS `".INST."news_rubrics`");
	mysql_query("CREATE TABLE `".INST."news_rubrics` (
  `rubricID` int(11) NOT NULL AUTO_INCREMENT,
  `rubric` varchar(255) NOT NULL default '',
  `pic` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`rubricID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."newsletter`");
	mysql_query("CREATE TABLE `".INST."newsletter` (
  `email` varchar(255) NOT NULL default '',
  `pass` varchar(255) NOT NULL default ''
) TYPE=MyISAM");

	mysql_query("DROP TABLE IF EXISTS `".INST."partners`");
	mysql_query("CREATE TABLE `".INST."partners` (
  `partnerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `banner` varchar(255) NOT NULL default '',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`partnerID`)
) PACK_KEYS=0 AUTO_INCREMENT=2 ");

	mysql_query("INSERT IGNORE INTO `".INST."partners` (`partnerID`, `name`, `url`, `banner`, `sort`) VALUES (1, 'webSPELL 4', 'http://www.webspell.org', '1.gif', 1)");

	mysql_query("DROP TABLE IF EXISTS `".INST."poll`");
	mysql_query("CREATE TABLE `".INST."poll` (
  `pollID` int(10) NOT NULL AUTO_INCREMENT,
  `aktiv` int(1) NOT NULL default '0',
  `laufzeit` bigint(20) NOT NULL default '0',
  `titel` varchar(255) NOT NULL default '',
  `o1` varchar(255) NOT NULL default '',
  `o2` varchar(255) NOT NULL default '',
  `o3` varchar(255) NOT NULL default '',
  `o4` varchar(255) NOT NULL default '',
  `o5` varchar(255) NOT NULL default '',
  `o6` varchar(255) NOT NULL default '',
  `o7` varchar(255) NOT NULL default '',
  `o8` varchar(255) NOT NULL default '',
  `o9` varchar(255) NOT NULL default '',
  `o10` varchar(255) NOT NULL default '',
  `comments` int(1) NOT NULL default '0',
  PRIMARY KEY  (`pollID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."poll_votes`");
	mysql_query("CREATE TABLE `".INST."poll_votes` (
  `pollID` int(10) NOT NULL default '0',
  `o1` int(11) NOT NULL default '0',
  `o2` int(11) NOT NULL default '0',
  `o3` int(11) NOT NULL default '0',
  `o4` int(11) NOT NULL default '0',
  `o5` int(11) NOT NULL default '0',
  `o6` int(11) NOT NULL default '0',
  `o7` int(11) NOT NULL default '0',
  `o8` int(11) NOT NULL default '0',
  `o9` int(11) NOT NULL default '0',
  `o10` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pollID`)
) TYPE=MyISAM");

	mysql_query("DROP TABLE IF EXISTS `".INST."servers`");
	mysql_query("CREATE TABLE `".INST."servers` (
  `serverID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL default '',
  `ip` varchar(255) NOT NULL default '',
  `game` char(3) NOT NULL default '',
  `info` text NOT NULL,
  PRIMARY KEY  (`serverID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."settings`");
	mysql_query("CREATE TABLE `".INST."settings` (
  `settingID` int(11) NOT NULL AUTO_INCREMENT,
  `hpurl` varchar(255) NOT NULL default '',
  `clanname` varchar(255) NOT NULL default '',
  `clantag` varchar(255) NOT NULL default '',
  `adminname` varchar(255) NOT NULL default '',
  `adminemail` varchar(255) NOT NULL default '',
  `news` int(11) NOT NULL default '0',
  `newsarchiv` int(11) NOT NULL default '0',
  `headlines` int(11) NOT NULL default '0',
  `headlineschars` int(11) NOT NULL default '0',
  `articles` int(11) NOT NULL default '0',
  `latestarticles` int(11) NOT NULL default '0',
  `articleschars` int(11) NOT NULL default '0',
  `clanwars` int(11) NOT NULL default '0',
  `results` int(11) NOT NULL default '0',
  `upcoming` int(11) NOT NULL default '0',
  `shoutbox` int(11) NOT NULL default '0',
  `sball` int(11) NOT NULL default '0',
  `sbrefresh` int(11) NOT NULL default '0',
  `topics` int(11) NOT NULL default '0',
  `posts` int(11) NOT NULL default '0',
  `latesttopics` int(11) NOT NULL default '0',
  `hideboards` int(1) NOT NULL default '0',
  `awards` int(11) NOT NULL default '0',
  `demos` int(11) NOT NULL default '0',
  `guestbook` int(11) NOT NULL default '0',
  `feedback` int(11) NOT NULL default '0',
  `messages` int(11) NOT NULL default '0',
  `users` int(11) NOT NULL default '0',
  `profilelast` int(11) NOT NULL default '0',
  `topnewsID` int(11) NOT NULL default '0',
  `sessionduration` int(3) NOT NULL default '0',
  PRIMARY KEY  (`settingID`)
) AUTO_INCREMENT=2 ");

	mysql_query("INSERT IGNORE INTO `".INST."settings` (`settingID`, `hpurl`, `clanname`, `clantag`, `adminname`, `adminemail`, `news`, `newsarchiv`, `headlines`, `headlineschars`, `articles`, `latestarticles`, `articleschars`, `clanwars`, `results`, `upcoming`, `shoutbox`, `sball`, `sbrefresh`, `topics`, `posts`, `latesttopics`, `hideboards`, `awards`, `demos`, `guestbook`, `feedback`, `messages`, `users`, `profilelast`, `topnewsID`) VALUES (1, '".$url."', '".$homepagename."', 'MyClan', 'Admin-Name', '".$adminmail."', 10, 20, 10, 22, 20, 5, 20, 20, 5, 5, 5, 30, 60, 20, 10, 10, 1, 20, 20, 20, 20, 20, 60, 10, 27)");

	mysql_query("DROP TABLE IF EXISTS `".INST."shoutbox`");
	mysql_query("CREATE TABLE `".INST."shoutbox` (
  `shoutID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `message` varchar(255) NOT NULL default '',
  `ip` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`shoutID`)
) AUTO_INCREMENT=1 ");


	mysql_query("DROP TABLE IF EXISTS `".INST."sponsors`");
	mysql_query("CREATE TABLE `".INST."sponsors` (
  `sponsorID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `info` text NOT NULL,
  `banner` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`sponsorID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."squads`");
	mysql_query("CREATE TABLE `".INST."squads` (
  `squadID` int(11) NOT NULL AUTO_INCREMENT,
  `gamesquad` int(11) NOT NULL default '1',
  `name` varchar(255) NOT NULL default '',
  `icon` varchar(255) NOT NULL default '',
  `info` varchar(255) NOT NULL default '',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`squadID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."squads_members`");
	mysql_query("CREATE TABLE `".INST."squads_members` (
  `sqmID` int(11) NOT NULL AUTO_INCREMENT,
  `squadID` int(11) NOT NULL default '0',
  `userID` int(11) NOT NULL default '0',
  `position` varchar(255) NOT NULL default '',
  `activity` int(1) NOT NULL default '0',
  `sort` int(11) NOT NULL default '0',
  `joinmember` int(1) NOT NULL default '0',
  `warmember` int(1) NOT NULL default '0',
  PRIMARY KEY  (`sqmID`)
) AUTO_INCREMENT=1 ");


	mysql_query("DROP TABLE IF EXISTS `".INST."styles`");
	mysql_query("CREATE TABLE `".INST."styles` (
  `styleID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL default '',
  `bgpage` varchar(255) NOT NULL default '',
  `border` varchar(255) NOT NULL default '',
  `bghead` varchar(255) NOT NULL default '',
  `bgcat` varchar(255) NOT NULL default '',
  `bg1` varchar(255) NOT NULL default '',
  `bg2` varchar(255) NOT NULL default '',
  `bg3` varchar(255) NOT NULL default '',
  `bg4` varchar(255) NOT NULL default '',
  `win` varchar(255) NOT NULL default '',
  `loose` varchar(255) NOT NULL default '',
  `draw` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`styleID`)
) AUTO_INCREMENT=2 ");

	mysql_query("INSERT IGNORE INTO `".INST."styles` (`styleID`, `title`, `bgpage`, `border`, `bghead`, `bgcat`, `bg1`, `bg2`, `bg3`, `bg4`, `win`, `loose`, `draw`) VALUES (1, 'webSPELL v4', '#E6E6E6', '#666666', '#333333', '#FFFFFF', '#FFFFFF', '#F2F2F2', '#F2F2F2', '#D9D9D9', '#00CC00', '#DD0000', '#FF6600')");

	mysql_query("DROP TABLE IF EXISTS `".INST."upcoming`");
	mysql_query("CREATE TABLE `".INST."upcoming` (
  `upID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `type` char(1) NOT NULL default '',
  `squad` int(11) NOT NULL default '0',
  `opponent` varchar(255) NOT NULL default '',
  `opptag` varchar(255) NOT NULL default '',
  `opphp` varchar(255) NOT NULL default '',
  `oppcountry` char(2) NOT NULL default '',
  `maps` varchar(255) NOT NULL default '',
  `server` varchar(255) NOT NULL default '',
  `league` varchar(255) NOT NULL default '',
  `leaguehp` varchar(255) NOT NULL default '',
  `warinfo` text NOT NULL,
  `short` varchar(255) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `enddate` int(14) NOT NULL default '0',
  `country` char(2) NOT NULL default '',
  `location` varchar(255) NOT NULL default '',
  `locationhp` varchar(255) NOT NULL default '',
  `dateinfo` text NOT NULL,
  PRIMARY KEY  (`upID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."upcoming_announce`");
	mysql_query("CREATE TABLE `".INST."upcoming_announce` (
  `annID` int(11) NOT NULL AUTO_INCREMENT,
  `upID` int(11) NOT NULL default '0',
  `userID` int(11) NOT NULL default '0',
  `status` char(1) NOT NULL default '',
  PRIMARY KEY  (`annID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."user`");
	mysql_query("CREATE TABLE `".INST."user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `registerdate` int(14) NOT NULL default '0',
  `lastlogin` int(14) NOT NULL default '0',
  `username` varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `nickname` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `firstname` varchar(255) NOT NULL default '',
  `lastname` varchar(255) NOT NULL default '',
  `sex` char(1) NOT NULL default '',
  `country` varchar(255) NOT NULL default '',
  `town` varchar(255) NOT NULL default '',
  `birthday` int(14) NOT NULL default '0',
  `icq` varchar(255) NOT NULL default '',
  `avatar` varchar(255) NOT NULL default '',
  `usertext` varchar(255) NOT NULL default '',
  `userpic` varchar(255) NOT NULL default '',
  `clantag` varchar(255) NOT NULL default '',
  `clanname` varchar(255) NOT NULL default '',
  `clanhp` varchar(255) NOT NULL default '',
  `clanirc` varchar(255) NOT NULL default '',
  `clanhistory` varchar(255) NOT NULL default '',
  `cpu` varchar(255) NOT NULL default '',
  `mainboard` varchar(255) NOT NULL default '',
  `ram` varchar(255) NOT NULL default '',
  `monitor` varchar(255) NOT NULL default '',
  `graphiccard` varchar(255) NOT NULL default '',
  `soundcard` varchar(255) NOT NULL default '',
  `connection` varchar(255) NOT NULL default '',
  `keyboard` varchar(255) NOT NULL default '',
  `mouse` varchar(255) NOT NULL default '',
  `mousepad` varchar(255) NOT NULL default '',
  `newsletter` int(1) NOT NULL default '1',
  `about` text NOT NULL,
  `pmgot` int(11) NOT NULL default '0',
  `pmsent` int(11) NOT NULL default '0',
  `visits` int(11) NOT NULL default '0',
  `banned` int(1) NOT NULL default '0',
  `ip` varchar(255) NOT NULL default '',
  `topics` text NOT NULL,
  `articles` text NOT NULL,
  `demos` text NOT NULL,
  PRIMARY KEY  (`userID`)
) AUTO_INCREMENT=2 ");


	mysql_query("INSERT IGNORE INTO `".INST."user` (`userID`, `registerdate`, `lastlogin`, `username`, `password`, `nickname`, `email`, `firstname`, `lastname`, `sex`, `country`, `town`, `birthday`, `icq`, `avatar`, `usertext`, `userpic`, `clantag`, `clanname`, `clanhp`, `clanirc`, `clanhistory`, `cpu`, `mainboard`, `ram`, `monitor`, `graphiccard`, `soundcard`, `connection`, `keyboard`, `mouse`, `mousepad`, `newsletter`, `about`, `pmgot`, `pmsent`, `visits`, `banned`, `ip`, `topics`, `articles`, `demos`) VALUES (1, '".time()."', '".time()."', '".$adminname."', '".$adminpassword."', '".$adminname."', '".$adminmail."', '', '', 'u', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', 0, 0, 0, '', '', '', '', '')");

	mysql_query("DROP TABLE IF EXISTS `".INST."user_gbook`");
	mysql_query("CREATE TABLE `".INST."user_gbook` (
  `userID` int(11) NOT NULL default '0',
  `gbID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `hp` varchar(255) NOT NULL default '',
  `icq` varchar(255) NOT NULL default '',
  `ip` varchar(255) NOT NULL default '',
  `comment` text NOT NULL,
  PRIMARY KEY  (`gbID`)
) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."user_groups`");
	mysql_query("CREATE TABLE `".INST."user_groups` (
  `usgID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL default '0',
  `news` int(1) NOT NULL default '0',
  `newsletter` int(1) NOT NULL default '0',
  `polls` int(1) NOT NULL default '0',
  `forum` int(1) NOT NULL default '0',
  `moderator` int(1) NOT NULL default '0',
  `internboards` int(1) NOT NULL default '0',
  `clanwars` int(1) NOT NULL default '0',
  `feedback` int(1) NOT NULL default '0',
  `user` int(1) NOT NULL default '0',
  `page` int(1) NOT NULL default '0',
  `files` int(1) NOT NULL default '0',
  `cash` int(1) NOT NULL default '0',
  PRIMARY KEY  (`usgID`)
) AUTO_INCREMENT=2 ");

	mysql_query("INSERT INTO ".INST."user_groups (usgID, userID, news, newsletter, polls, forum, moderator, internboards, clanwars, feedback, user, page, files)
VALUES (1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1)");

	mysql_query("DROP TABLE IF EXISTS `".INST."user_visitors`");
	mysql_query("CREATE TABLE `".INST."user_visitors` (
  `visitID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL default '0',
  `visitor` int(11) NOT NULL default '0',
  `date` int(14) NOT NULL default '0',
  PRIMARY KEY  (`visitID`)
) AUTO_INCREMENT=1 ");


	mysql_query("DROP TABLE IF EXISTS `".INST."whoisonline`");
	mysql_query("CREATE TABLE `".INST."whoisonline` (
  `time` int(14) NOT NULL default '0',
  `ip` varchar(20) NOT NULL default '',
  `userID` int(11) NOT NULL default '0',
  `nickname` varchar(255) NOT NULL default '',
  `site` varchar(255) NOT NULL default ''
) TYPE=MyISAM");


	mysql_query("DROP TABLE IF EXISTS `".INST."whowasonline`");
	mysql_query("CREATE TABLE `".INST."whowasonline` (
  `time` int(14) NOT NULL default '0',
  `ip` varchar(20) NOT NULL default '',
  `userID` int(11) NOT NULL default '0',
  `nickname` varchar(255) NOT NULL default '',
  `site` varchar(255) NOT NULL default ''
) TYPE=MyISAM");

	sleep(1);

}

function update31_4beta4() {

	mysql_query("DROP TABLE IF EXISTS `".INST."about`");
	mysql_query("CREATE TABLE `".INST."about` (
  `about` longtext NOT NULL
 ) TYPE=MyISAM");

	mysql_query("ALTER TABLE `".INST."awards` ADD `homepage` VARCHAR( 255 ) NOT NULL ,
 ADD `rang` INT DEFAULT '0' NOT NULL ,
 ADD `info` TEXT NOT NULL");

	mysql_query("ALTER TABLE `".INST."cash_box` ADD `squad` INT NOT NULL ,
 ADD `konto` TEXT NOT NULL");

	mysql_query("ALTER TABLE `".INST."clanwars` ADD `linkpage` VARCHAR( 255 ) NOT NULL");
	mysql_query("ALTER TABLE `".INST."clanwars` CHANGE `game` `game` VARCHAR( 5 ) NOT NULL");

	mysql_query("DROP TABLE IF EXISTS `".INST."counter_stats`");
	mysql_query("CREATE TABLE `".INST."counter_stats` (
  `dates` varchar(255) NOT NULL default '',
  `count` int(20) NOT NULL default '0'
 ) TYPE=MyISAM");

	mysql_query("ALTER TABLE `".INST."demos` ADD `accesslevel` INT( 1 ) DEFAULT '0' NOT NULL");
	mysql_query("ALTER TABLE `".INST."files` ADD `accesslevel` INT( 1 ) DEFAULT '0' NOT NULL");

	mysql_query("DROP TABLE IF EXISTS `".INST."games`");
	mysql_query("CREATE TABLE `".INST."games` (
  `gameID` int(3) NOT NULL AUTO_INCREMENT,
  `tag` varchar(5) NOT NULL default '',
  `name` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`gameID`)
 ) PACK_KEYS=0 AUTO_INCREMENT=8 ");

	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (1, 'cs', 'Counter-Strike')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (2, 'ut', 'Unreal Tournament')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (3, 'to', 'Tactical Ops')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (4, 'hl2', 'Halflife 2')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (7, 'bf', 'Battlefield')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (5, 'wc3', 'Warcraft 3')");
	mysql_query("INSERT IGNORE INTO `".INST."games` (`gameID`, `tag`, `name`) VALUES (6, 'hl', 'Halflife')");

	mysql_query("DROP TABLE IF EXISTS `".INST."linkus`");
	mysql_query("CREATE TABLE `".INST."linkus` (
  `bannerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL default '',
  `file` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`bannerID`)
 ) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."newsletter`");
	mysql_query("CREATE TABLE `".INST."newsletter` (
  `email` varchar(255) NOT NULL default '',
  `pass` varchar(255) NOT NULL default ''
 ) TYPE=MyISAM");

	mysql_query("ALTER TABLE `".INST."poll` ADD `laufzeit` BIGINT(20) NOT NULL after `aktiv`");

	mysql_query("ALTER TABLE `".INST."servers` DROP `showed`");

	mysql_query("ALTER TABLE `".INST."settings` CHANGE `bannerrot` `profilelast` INT( 11 ) DEFAULT '0' NOT NULL");

	mysql_query("ALTER TABLE `".INST."settings` ADD `topnewsID` INT NOT NULL");

	mysql_query("ALTER TABLE `".INST."squads_members` ADD `joinmember` INT(1) DEFAULT '0' NOT NULL ,
 ADD `warmember` INT(1) DEFAULT '0' NOT NULL");

	mysql_query("DROP TABLE IF EXISTS `".INST."user_gbook`");
	mysql_query("CREATE TABLE `".INST."user_gbook` (
  `userID` int(11) NOT NULL default '0',
  `gbID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `hp` varchar(255) NOT NULL default '',
  `icq` varchar(255) NOT NULL default '',
  `ip` varchar(255) NOT NULL default '',
  `comment` text NOT NULL,
  PRIMARY KEY  (`gbID`)
 ) AUTO_INCREMENT=1 ");

	mysql_query("ALTER TABLE `".INST."servers` CHANGE `game` `game` CHAR( 3 ) NOT NULL");

}

function update4beta4_4beta5() {

	mysql_query("ALTER TABLE `".INST."settings` ADD `sessionduration` INT( 3 ) NOT NULL");
	mysql_query("ALTER TABLE `".INST."settings` ADD `closed` INT( 1 ) DEFAULT '0' NOT NULL");

	mysql_query("DROP TABLE IF EXISTS `".INST."lock`");
	mysql_query("CREATE TABLE `".INST."lock` (
  `time` INT NOT NULL ,
  `reason` TEXT NOT NULL
 )");

	mysql_query("ALTER TABLE `".INST."news` ADD `intern` INT( 1 ) DEFAULT '0' NOT NULL");
	mysql_query("ALTER TABLE `".INST."guestbook` ADD `admincomment` TEXT NOT NULL");
	mysql_query("ALTER TABLE `".INST."settings` ADD `gb_info` INT( 1 ) DEFAULT '1' NOT NULL");

	mysql_query("DROP TABLE IF EXISTS `".INST."static`");
	mysql_query("CREATE TABLE `".INST."static` (
  `staticID` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR( 255 ) NOT NULL ,
  `accesslevel` INT( 1 ) NOT NULL ,
  PRIMARY KEY ( `staticID` )
  );");

}

function update4beta5_4beta6() {

	mysql_query("ALTER TABLE `".INST."user` ADD `mailonpm` INT( 1 ) DEFAULT '0' NOT NULL");

	mysql_query("DROP TABLE IF EXISTS `".INST."imprint`");
	mysql_query("CREATE TABLE `".INST."imprint` (
`imprintID` INT NOT NULL AUTO_INCREMENT ,
`imprint` TEXT NOT NULL ,
PRIMARY KEY ( `imprintID` )
)");

	mysql_query("ALTER TABLE `".INST."settings` ADD `imprint` INT( 1 ) DEFAULT '0' NOT NULL");
	mysql_query("ALTER TABLE `".INST."poll` ADD `hosts` TEXT NOT NULL");
	mysql_query("ALTER TABLE `".INST."files` CHANGE `info` `info` TEXT NOT NULL");
	mysql_query("ALTER TABLE `".INST."user` ADD `homepage` VARCHAR( 255 ) NOT NULL AFTER `newsletter`");

}

function update4beta6_4final() {


	//files
	mysql_query("ALTER TABLE `".INST."files` ADD `votes` INT NOT NULL ,
ADD `points` INT NOT NULL ,
ADD `rating` INT NOT NULL");
	mysql_query("ALTER TABLE `".INST."files` ADD `mirrors` TEXT NOT NULL AFTER `file`");

	mysql_query("ALTER TABLE `".INST."user` ADD `files` TEXT NOT NULL AFTER `demos`");
	mysql_query("ALTER TABLE `".INST."settings` ADD `picsize_l` INT DEFAULT '450' NOT NULL");
	mysql_query("ALTER TABLE `".INST."settings` ADD `picsize_h` INT DEFAULT '500' NOT NULL");
	mysql_query("ALTER TABLE `".INST."files` ADD `poster` INT NOT NULL");

	//gallery
	mysql_query("DROP TABLE IF EXISTS `".INST."gallery`");
	mysql_query("CREATE TABLE `".INST."gallery` (
`galleryID` INT NOT NULL AUTO_INCREMENT ,
`userID` INT NOT NULL ,
`name` VARCHAR( 255 ) NOT NULL ,
`date` INT( 14 ) NOT NULL ,
`groupID` INT NOT NULL ,
PRIMARY KEY ( `galleryID` )
)");

	mysql_query("DROP TABLE IF EXISTS `".INST."gallery_groups`");
	mysql_query("CREATE TABLE `".INST."gallery_groups` (
`groupID` INT NOT NULL AUTO_INCREMENT ,
`name` VARCHAR( 255 ) NOT NULL ,
`sort` INT NOT NULL ,
PRIMARY KEY ( `groupID` )
)");

	mysql_query("DROP TABLE IF EXISTS `".INST."gallery_pictures`");
	mysql_query("CREATE TABLE `".INST."gallery_pictures` (
`picID` INT NOT NULL AUTO_INCREMENT ,
`galleryID` INT NOT NULL ,
`name` VARCHAR( 255 ) NOT NULL ,
`comment` TEXT NOT NULL ,
`views` INT DEFAULT '0' NOT NULL ,
`comments` INT( 1 ) DEFAULT '1' NOT NULL ,
PRIMARY KEY ( `picID` )
)");

	mysql_query("ALTER TABLE `".INST."settings` ADD `pictures` INT DEFAULT '12' NOT NULL");
	mysql_query("ALTER TABLE `".INST."settings` ADD `publicadmin` INT( 1 ) DEFAULT '1' NOT NULL");
	mysql_query("ALTER TABLE `".INST."user_groups` ADD `gallery` INT( 1 ) NOT NULL");
	mysql_query("ALTER TABLE `".INST."settings` ADD `thumbwidth` INT DEFAULT '130' NOT NULL");
	mysql_query("ALTER TABLE `".INST."settings` ADD `usergalleries` INT( 1 ) DEFAULT '1' NOT NULL");

	mysql_query("ALTER TABLE `".INST."user` ADD `gallery_pictures` TEXT NOT NULL AFTER `files`");

	mysql_query("ALTER TABLE `".INST."gallery_pictures` ADD `votes` INT NOT NULL ,
ADD `points` INT NOT NULL ,
ADD `rating` INT NOT NULL");

	mysql_query("ALTER TABLE `".INST."settings` ADD `maxusergalleries` INT DEFAULT '1048576' NOT NULL");


	//country-list
	mysql_query("DROP TABLE IF EXISTS `".INST."countries`");
	mysql_query("CREATE TABLE `".INST."countries` (
`countryID` INT NOT NULL AUTO_INCREMENT ,
`country` VARCHAR( 255 ) NOT NULL ,
`short` VARCHAR( 3 ) NOT NULL ,
PRIMARY KEY ( `countryID` )
)");

	mysql_query("INSERT INTO `".INST."countries` ( `countryID` , `country` , `short` )
VALUES
('', 'Argentina', 'ar'),
('', 'Australia', 'au'),
('', 'Austria', 'at'),
('', 'Belgium', 'be'),
('', 'Bosnia Herzegowina', 'ba'),
('', 'Brazil', 'br'),
('', 'Bulgaria', 'bg'),
('', 'Canada', 'ca'),
('', 'Chile', 'cl'),
('', 'China', 'cn'),
('', 'Colombia', 'co'),
('', 'Czech Republic', 'cz'),
('', 'Croatia', 'hr'),
('', 'Cyprus', 'cy'),
('', 'Denmark', 'dk'),
('', 'Estonia', 'ee'),
('', 'Finland', 'fi'),
('', 'Faroe Islands', 'fo'),
('', 'France', 'fr'),
('', 'Germany', 'de'),
('', 'Greece', 'gr'),
('', 'Hungary', 'hu'),
('', 'Iceland', 'is'),
('', 'Ireland', 'ie'),
('', 'Israel', 'il'),
('', 'Italy', 'it'),
('', 'Japan', 'jp'),
('', 'Korea', 'kr'),
('', 'Latvia', 'lv'),
('', 'Lithuania', 'lt'),
('', 'Luxemburg', 'lu'),
('', 'Malaysia', 'my'),
('', 'Malta', 'mt'),
('', 'Netherlands', 'nl'),
('', 'Mexico', 'mx'),
('', 'Mongolia', 'mn'),
('', 'New Zealand', 'nz'),
('', 'Norway', 'no'),
('', 'Poland', 'pl'),
('', 'Portugal', 'pt'),
('', 'Romania', 'ro'),
('', 'Russian Federation', 'ru'),
('', 'Singapore', 'sg'),
('', 'Slovak Republic', 'sk'),
('', 'Slovenia', 'si'),
('', 'Taiwan', 'tw'),
('', 'South Africa', 'za'),
('', 'Spain', 'es'),
('', 'Sweden', 'se'),
('', 'Syria', 'sy'),
('', 'Switzerland', 'ch'),
('', 'Tibet', 'ti'),
('', 'Tunisia', 'tn'),
('', 'Turkey', 'tr'),
('', 'Ukraine', 'ua'),
('', 'United Kingdom', 'uk'),
('', 'USA', 'us'),
('', 'Venezuela', 've'),
('', 'Yugoslavia', 'yu'),
('', 'European Union', 'eu')");

	//smileys
	mysql_query("DROP TABLE IF EXISTS `".INST."smileys`");
	mysql_query("CREATE TABLE `".INST."smileys` (
  `smileyID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL default '',
  `alt` varchar(255) NOT NULL default '',
  `pattern` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`smileyID`),
  UNIQUE KEY `name` (`name`)
) AUTO_INCREMENT=16");

	mysql_query("INSERT INTO `".INST."smileys` VALUES (1, 'biggrin.gif', 'amüsiert', ':D')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (2, 'confused.gif', 'verwirrt', '?(')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (3, 'crying.gif', 'traurig', ';(')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (4, 'pleased.gif', 'erfreut', ':]')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (5, 'happy.gif', 'fröhlich', ':))')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (6, 'smile.gif', 'lächeln', ':)')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (7, 'wink.gif', 'zwinkern', ';)')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (8, 'frown.gif', 'unglücklich', ':(')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (9, 'tongue.gif', 'zunge raus', ':P')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (10, 'tongue2.gif', 'zunge raus', ';P')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (11, 'redface.gif', 'müde', ':O')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (12, 'cool.gif', 'cool', '8)')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (13, 'eek.gif', 'geschockt', '8o')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (14, 'evil.gif', 'teuflisch', ':evil:')");
	mysql_query("INSERT INTO `".INST."smileys` VALUES (15, 'mad.gif', 'sauer', 'X(')");

	//clanwars
	mysql_query("ALTER TABLE `".INST."clanwars` ADD `hltv` VARCHAR( 255 ) NOT NULL AFTER `server`");

	//polls
	mysql_query("ALTER TABLE `".INST."poll` ADD `intern` INT( 1 ) DEFAULT '0' NOT NULL");

	//games
	mysql_query("ALTER TABLE `".INST."games` CHANGE `name` `name` VARCHAR( 255 ) NOT NULL");

	//servers
	mysql_query("ALTER TABLE `".INST."servers` ADD `sort` INT DEFAULT '1' NOT NULL");

	//scrolltext
	mysql_query("DROP TABLE IF EXISTS `".INST."scrolltext`");
	mysql_query("CREATE TABLE `".INST."scrolltext` (
  `text` longtext NOT NULL,
  `delay` int(11) NOT NULL default '100',
  `direction` varchar(255) NOT NULL default ''
) TYPE=MyISAM");

	//superuser
	mysql_query("ALTER TABLE `".INST."user_groups` ADD `super` INT( 1 ) DEFAULT '0' NOT NULL");
	mysql_query("UPDATE `".INST."user_groups` SET super='1' WHERE userID='1' ");

	//bannerrotation
	mysql_query("CREATE TABLE `".INST."bannerrotation` (
  `bannerID` int(11) NOT NULL AUTO_INCREMENT,
  `banner` varchar(255) NOT NULL default '',
  `bannername` varchar(255) NOT NULL default '',
  `bannerurl` varchar(255) NOT NULL default '',
  `displayed` varchar(255) NOT NULL default '',
  `hits` int(11) default '0',
  `date` int(11) NOT NULL default '0',
  PRIMARY KEY  (`bannerID`),
  UNIQUE KEY `banner` (`banner`))");

	mysql_query("ALTER TABLE `".INST."user` CHANGE `connection` `verbindung` VARCHAR( 255 ) NOT NULL DEFAULT ''");

	//converting clanwars-TABLE
	$clanwarQry = mysql_query("SELECT * FROM ".INST."clanwars");
	$total = mysql_num_rows($clanwarQry);
	if($total) {
		while($olddata = mysql_fetch_array($clanwarQry)) {
			$id = $olddata['cwID'];
			$maps = $olddata['maps'];
			$scoreHome1 = $olddata['homescr1'];
			$scoreHome2 = $olddata['homescr2'];
			$scoreOpp1 = $olddata['oppscr1'];
			$scoreOpp2 = $olddata['oppscr2'];

			// do the convertation
			if(!empty($scoreHome2))	$scoreHome = $scoreHome1.'||'.$scoreHome2;
			else $scoreHome = $scoreHome1;

			if(!empty($scoreOpp2)) $scoreOpp = $scoreOpp1.'||'.$scoreOpp2;
			else $scoreOpp = $scoreOpp1;

			// update database, set new structure
			if(mysql_query("ALTER TABLE `".INST."clanwars` CHANGE `homescr1` `homescore` TEXT NOT NULL")) {
				mysql_query("ALTER TABLE `".INST."clanwars` CHANGE `oppscr1` `oppscore` TEXT NOT NULL");
				if(mysql_query("ALTER TABLE `".INST."clanwars` DROP `homescr2`")) {
					mysql_query("ALTER TABLE `".INST."clanwars` DROP `oppscr2`");
					// save converted data into the database
					mysql_query("UPDATE ".INST."clanwars SET homescore='".$scoreHome."', oppscore='".$scoreOpp."', maps='".$maps."' WHERE cwID='".$id."'");

				}
			}
			$run++;
		}
	} else {
		mysql_query("ALTER TABLE `".INST."clanwars` CHANGE `homescr1` `homescore` TEXT");
		mysql_query("ALTER TABLE `".INST."clanwars` CHANGE `oppscr1` `oppscore` TEXT");
		mysql_query("ALTER TABLE `".INST."clanwars` DROP `homescr2`");
		mysql_query("ALTER TABLE `".INST."clanwars` DROP `oppscr2`");
	}
}

function update40000_40100() {

	// FAQ
	mysql_query("DROP TABLE IF EXISTS `".INST."faq`");
	mysql_query("CREATE TABLE `".INST."faq` (
  `faqID` int(11) NOT NULL AUTO_INCREMENT,
  `faqcatID` int(11) NOT NULL default '0',
  `question` varchar(255) NOT NULL default '',
  `answer` varchar(255) NOT NULL default '',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`faqID`)
	) AUTO_INCREMENT=1 ");

	mysql_query("DROP TABLE IF EXISTS `".INST."faq_categories`");
	mysql_query("CREATE TABLE `".INST."faq_categories` (
  `faqcatID` int(11) NOT NULL AUTO_INCREMENT,
  `faqcatname` varchar(255) NOT NULL default '',
  `description` TEXT NOT NULL,
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`faqcatID`)
	) AUTO_INCREMENT=1 ");

	// Admin Member Beschreibung
	mysql_query("ALTER TABLE `".INST."user` ADD `userdescription` TEXT NOT NULL");

	// Forum Sticky Function
	mysql_query("ALTER TABLE `".INST."forum_topics` ADD `sticky` INT(1) NOT NULL DEFAULT '0'");

	// birthday converter
	mysql_query("ALTER TABLE `".INST."user` ADD `birthday2` DATETIME NOT NULL AFTER `birthday`");
	$q=mysql_query("SELECT userID, birthday FROM `".INST."user`");
	while($ds=mysql_fetch_array($q)) {
		mysql_query("UPDATE `".INST."user` SET birthday2='".date("Y",$ds['birthday'])."-".date("m",$ds['birthday'])."-".date("d",$ds['birthday'])."' WHERE userID='".$ds['userID']."'");
	}
	mysql_query("ALTER TABLE `".INST."user` DROP `birthday`");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `birthday2` `birthday` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL");

}
function update40100_40101() {

	//forum speedfix
	mysql_query("ALTER TABLE `".INST."forum_boards` ADD `topics` INT DEFAULT '0' NOT NULL");
	mysql_query("ALTER TABLE `".INST."forum_boards` ADD `posts` INT DEFAULT '0' NOT NULL");

	$q=mysql_query("SELECT boardID FROM `".INST."forum_boards`");
	while($ds=mysql_fetch_array($q)) {
		$topics=mysql_num_rows(mysql_query("SELECT topicID FROM `".INST."forum_topics` WHERE boardID='".$ds['boardID']."' AND moveID='0'"));
		$posts=mysql_num_rows(mysql_query("SELECT postID FROM `".INST."forum_posts` WHERE boardID='".$ds['boardID']."'"));
		if(($posts-$topics) < 0) $posts=0;
		else $posts=$posts-$topics;
		mysql_query("UPDATE `".INST."forum_boards` SET topics='".$topics."' , posts='".$posts."' WHERE boardID='".$ds['boardID']."'");
	}

	//add captcha
	mysql_query("CREATE TABLE `".INST."captcha` (
  `hash` varchar(255) NOT NULL default '',
  `captcha` int(11) NOT NULL default '0',
  `deltime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`hash`)
	) TYPE=MyISAM;");

	//useractivation
	mysql_query("ALTER TABLE `".INST."user` ADD `activated` varchar(255) NOT NULL default '1'");

	//counter: max. online
	mysql_query("ALTER TABLE `".INST."counter` ADD `maxonline` INT NOT NULL");

	//faq
	mysql_query("ALTER TABLE `".INST."faq` CHANGE `answer` `answer` TEXT NOT NULL");

}
function update40101_40200() {

	//set default language
	mysql_query("ALTER TABLE `".INST."settings` ADD `default_language` VARCHAR( 2 ) DEFAULT 'uk' NOT NULL");
	
	//user groups
	mysql_query("DROP TABLE IF EXISTS `".INST."user_forum_groups`");
	mysql_query("CREATE TABLE `".INST."user_forum_groups` (
	  `usfgID` int(11) NOT NULL auto_increment,
	  `userID` int(11) NOT NULL default '0',
	  PRIMARY KEY  (`usfgID`)
	) TYPE=MyISAM AUTO_INCREMENT=0");

	mysql_query("DROP TABLE IF EXISTS `".INST."forum_groups`");
	mysql_query("CREATE TABLE `".INST."forum_groups` (
	  `fgrID` int(11) NOT NULL auto_increment,
	  `name` varchar(32) NOT NULL default '0',
	  PRIMARY KEY  (`fgrID`)
	) TYPE=MyISAM AUTO_INCREMENT=0");

	mysql_query("ALTER TABLE `".INST."static` ADD `content` TEXT NOT NULL ");
	$get = mysql_query("SELECT * FROM ".INST."static");
	while($ds = mysql_fetch_assoc($get)){
	 	$file = "../html/".$ds['name'];
	 	if(file_exists($file)){
			$content = file_get_contents($file);
			if(get_magic_quotes_gpc()) {
				$content = stripslashes($content);
			}
			if(function_exists("mysql_real_escape_string")) {
				$content = mysql_real_escape_string($content);
			}
			else {
				$content = addslashes($content);
			}
			mysql_query("UPDATE ".INST."static SET content='".$content."' WHERE staticID='".$ds['staticID']."'");
			@unlink($file);
		}	
	}
	mysql_query("ALTER TABLE `".INST."squads` CHANGE `info` `info` TEXT  NOT NULL ");
	mysql_query("ALTER TABLE `".INST."forum_boards` ADD `writegrps` text NOT NULL AFTER `intern`");
	mysql_query("ALTER TABLE `".INST."forum_topics` ADD `writegrps` text NOT NULL AFTER `intern`");

	mysql_query("ALTER TABLE `".INST."forum_announcements` ADD `readgrps` text NOT NULL AFTER `intern`");
	mysql_query("ALTER TABLE `".INST."forum_categories` ADD `readgrps` text NOT NULL AFTER `intern`");
	mysql_query("ALTER TABLE `".INST."forum_boards` ADD `readgrps` text NOT NULL AFTER `intern`");
	mysql_query("ALTER TABLE `".INST."forum_topics` ADD `readgrps` text NOT NULL AFTER `intern`");

	//add group 1 and convert intern to group 1
	mysql_query("ALTER TABLE `".INST."user_forum_groups` ADD `1` INT( 1 ) NOT NULL ;");
	mysql_query("INSERT INTO `".INST."forum_groups` ( `fgrID` , `name` ) VALUES ('1', 'Old intern board users');");

	mysql_query("UPDATE `".INST."forum_announcements` SET `readgrps` = '1' WHERE `intern` = 1");
	mysql_query("UPDATE `".INST."forum_categories` SET `readgrps` = '1' WHERE `intern` = 1");
	mysql_query("UPDATE `".INST."forum_boards` SET `readgrps` = '1', `writegrps` = '1' WHERE `intern` = 1");
	mysql_query("UPDATE `".INST."forum_topics` SET `readgrps` = '1', `writegrps` = '1' WHERE `intern` = 1");

	mysql_query("ALTER TABLE `".INST."forum_announcements` DROP `intern`");
	mysql_query("ALTER TABLE `".INST."forum_categories` DROP `intern`");
	mysql_query("ALTER TABLE `".INST."forum_boards` DROP `intern`");
	mysql_query("ALTER TABLE `".INST."forum_topics` DROP `intern`");

	$sql = mysql_query("SELECT `boardID` FROM `".INST."forum_boards`");
	while($ds = mysql_fetch_array($sql)) {
		$anz_topics = mysql_num_rows(mysql_query("SELECT boardID FROM `".INST."forum_topics` WHERE `boardID` = ".$ds['boardID']));
		$anz_posts = mysql_num_rows(mysql_query("SELECT boardID FROM `".INST."forum_posts` WHERE `boardID` = ".$ds['boardID']));
		$anz_announcements = mysql_num_rows(mysql_query("SELECT boardID FROM `".INST."forum_announcements` WHERE `boardID` = ".$ds['boardID']));
		$anz_topics = $anz_topics + $anz_announcements;
		mysql_query("UPDATE `".INST."forum_boards` SET `topics` = '".$anz_topics."', `posts` = '".$anz_posts."' WHERE `boardID` = ".$ds['boardID']);
	}

	//add all internboards user to "Intern board user"
	$sql = mysql_query("SELECT `userID` FROM `".INST."user_groups` WHERE `internboards` = '1'");
	while($ds = mysql_fetch_array($sql)) {
		if(mysql_num_rows(mysql_query("SELECT userID FROM `".INST."user_forum_groups` WHERE `userID`=".$ds['userID']))) mysql_query("UPDATE `".INST."user_forum_groups` SET `1`='1' WHERE `userID`='".$ds['userID']."'");
		else mysql_query("INSERT INTO `".INST."user_forum_groups` (`userID`, `1`) VALUES (".$ds['userID'].", 1)");
	}
	mysql_query("ALTER TABLE `".INST."user_groups` DROP `internboards`");

	//add games cell to squads
	mysql_query("ALTER TABLE `".INST."squads` ADD `games` TEXT NOT NULL AFTER `gamesquad`");

	//add email_hide cell to user
	mysql_query("ALTER TABLE `".INST."user` ADD `email_hide` INT( 1 ) NOT NULL DEFAULT '1' AFTER `email`");
	mysql_query("UPDATE `".INST."user` SET `email_hide` = '1' WHERE `email_hide` = '0'");

	//add userIDs cell to poll
	mysql_query("ALTER TABLE `".INST."poll` ADD `userIDs` TEXT NOT NULL");
	
	//add table for banned ips
	mysql_query("CREATE TABLE `".INST."banned_ips` (                                                   
                   `banID` int(11) NOT NULL auto_increment,                                         
                   `ip` varchar(255) NOT NULL,                        
                   `deltime` int(15) NOT NULL,                                                      
                   `reason` varchar(255) NULL,                    
                   PRIMARY KEY  (`banID`)                                                           
                 )");
	
	//add table for wrong logins
	mysql_query("CREATE TABLE `".INST."failed_login_attempts` (                         
                              `ip` varchar(255) NOT NULL default '',  
                              `wrong` int(2) default '0',                                       
                              PRIMARY KEY  (`ip`)                                               
                            )");
	
	//news multilanguage
	mysql_query("CREATE TABLE `".INST."news_contents` (
	`newsID` INT NOT NULL ,
	`language` VARCHAR( 2 ) NOT NULL ,
	`headline` VARCHAR( 255 ) NOT NULL ,
	`content` TEXT NOT NULL
	)");

	//news converter
	$q = mysql_query("SELECT newsID, lang1, lang2, headline1, headline2, content1, content2 FROM `".INST."news`");
	while($ds = mysql_fetch_array($q)) {
		if($ds['headline1']!="" or $ds['content1']!="") {
			if(get_magic_quotes_gpc()) $content1 = str_replace('\r\n', "\n", $ds['content1']);
			else $content1 = str_replace('\r\n', "\n", mysql_real_escape_string($ds['content1']));
			mysql_query("INSERT INTO ".INST."news_contents (newsID, language, headline, content) VALUES ('".$ds['newsID']."', '".mysql_real_escape_string($ds['lang1'])."', '".mysql_real_escape_string($ds['headline1'])."', '".$content1."')");
		}
		if($ds['headline2']!="" or $ds['content2']!="") {
			if(get_magic_quotes_gpc()) $content2 = str_replace('\r\n', "\n", $ds['content2']);
			else $content2 = str_replace('\r\n', "\n", mysql_real_escape_string($ds['content2']));
			mysql_query("INSERT INTO ".INST."news_contents (newsID, language, headline, content) VALUES ('".$ds['newsID']."', '".mysql_real_escape_string($ds['lang2'])."', '".mysql_real_escape_string($ds['headline2'])."', '".$content2."')");
		}
	}

	mysql_query("ALTER TABLE `".INST."news` DROP `lang1`");
	mysql_query("ALTER TABLE `".INST."news` DROP `headline1`");
	mysql_query("ALTER TABLE `".INST."news` DROP `content1`");
	mysql_query("ALTER TABLE `".INST."news` DROP `lang2`");
	mysql_query("ALTER TABLE `".INST."news` DROP `headline2`");
	mysql_query("ALTER TABLE `".INST."news` DROP `content2`");

	//article multipage
	mysql_query("CREATE TABLE `".INST."articles_contents` (
	  `articlesID` INT( 11 ) NOT NULL ,
	  `content` TEXT NOT NULL ,
	  `page` INT( 2 ) NOT NULL
	)");

	//article converter
	$sql = mysql_query("SELECT articlesID, content FROM ".INST."articles");
	while($ds = mysql_fetch_array($sql)) {
		if(get_magic_quotes_gpc()){
			$content = str_replace('\r\n', "\n", $ds['content']);
		}
		else {
			$content = str_replace('\r\n', "\n", mysql_real_escape_string($ds['content']));
		}
		mysql_query("INSERT INTO ".INST."articles_contents (articlesID, content, page) VALUES ('".$ds['articlesID']."', '".$content."', '0')");
	}
	
	mysql_query("ALTER TABLE `".INST."user` ADD `language` VARCHAR( 2 ) NOT NULL");
	
	//add news writer right column
	mysql_query("ALTER TABLE `".INST."user_groups` ADD `news_writer` INT( 1 ) NOT NULL AFTER `news`");
	
	//add sub cat column
	mysql_query("ALTER TABLE `".INST."files_categorys` ADD `subcatID` INT( 11 ) NOT NULL DEFAULT '0'");
	
	//announcement converter
	$sql = mysql_query("SELECT * FROM ".INST."forum_announcements");
	while($ds = mysql_fetch_assoc($sql)){
		$ds['topic'] = mysql_real_escape_string($ds['topic']);
		$ds['announcement'] = mysql_real_escape_string($ds['announcement']);
		$sql_board = mysql_query("SELECT readgrps, writegrps 
								FROM ".INST."forum_boards 
								WHERE boardID = '".$ds['boardID']."'");
		$rules = mysql_fetch_assoc($sql_board);	
		mysql_query("INSERT INTO ".INST."forum_topics 
				( boardID, readgrps, writegrps, userID, date, lastdate, topic, lastposter, sticky)
				VALUES
				('".$ds['boardID']."', '".$rules['readgrps']."', '".$rules['writegrps']."', '".$ds['userID']."', '".$ds['date']."', '".$ds['date']."', '".$ds['topic']."', '".$ds['userID']."', '1')");
		$annID = mysql_insert_id();
		mysql_query("INSERT INTO ".INST."forum_posts
				( boardID, topicID, date, poster, message)
				VALUES
				( '".$ds['boardID']."', '".$annID."', '".$ds['date']."', '".$ds['userID']."', '".$ds['announcement']."')");
		mysql_query("UPDATE ".INST."forum_boards 
					SET topics=topics+1 
					WHERE boardID = '".$ds['boardID']."' ");
		mysql_query("DELETE FROM ".INST."forum_announcements 
					WHERE announceID='".$ds['announceID']."' ");						
	}
	
	// clanwar converter
	$get = mysql_query("SELECT cwID, maps, hometeam, homescore, oppscore FROM ".INST."clanwars");
	while($ds = mysql_fetch_assoc($get)){
		$maps = explode("||",$ds['maps']);
		if(function_exists("mysql_real_escape_string")) {
			$theMaps = mysql_real_escape_string(serialize($maps));
		}
		else{
			$theMaps = addslashes(serialize($maps));
		}
		$hometeam = serialize(explode("|",$ds['hometeam']));
		$homescore = serialize(explode("||",$ds['homescore']));
		$oppscore = serialize(explode("||",$ds['oppscore']));
		$cwID = $ds['cwID'];
		mysql_query("UPDATE ".INST."clanwars SET maps='".$theMaps."', hometeam='".$hometeam."', homescore='".$homescore."', oppscore='".$oppscore."' WHERE cwID='".$cwID."'");
	}
	
	// converter board-speedup :)
	mysql_query("UPDATE ".INST."user SET topics='|'");	
	mysql_query("ALTER TABLE `".INST."user` CHANGE `topics` `topics` TEXT NOT NULL");
	
	// update for email-change-activation
	mysql_query("ALTER TABLE `".INST."user` ADD `email_change` VARCHAR(255) NOT NULL AFTER `email_hide`, 
				ADD `email_activate` VARCHAR(255) NOT NULL AFTER `email_change`");
				
	//add insertlinks cell to settings
	mysql_query("ALTER TABLE `".INST."settings` ADD `insertlinks` INT( 1 ) NOT NULL DEFAULT '1' AFTER `default_language`");
	
	//add search string min len and max wrong password cell to settings
	mysql_query("ALTER TABLE `".INST."settings` ADD `search_min_len` INT( 3 ) NOT NULL DEFAULT '3' AFTER `insertlinks`");
	mysql_query("ALTER TABLE `".INST."settings` ADD `max_wrong_pw` INT( 2 ) NOT NULL DEFAULT '10' AFTER `search_min_len`");
	
	//set default sex to u(nknown)
	mysql_query("ALTER TABLE `".INST."user` CHANGE `sex` `sex` CHAR( 1 ) NOT NULL DEFAULT 'u' ");
	
	// convert banned to varchar
	mysql_query("ALTER TABLE `".INST."user` CHANGE `banned` `banned` VARCHAR(255) NULL DEFAULT NULL ");
	mysql_query("UPDATE `".INST."user` SET banned='perm' WHERE banned='1'");
	mysql_query("UPDATE `".INST."user` SET banned=(NULL) WHERE banned='0'");
	mysql_query("ALTER TABLE `".INST."user` ADD `ban_reason` VARCHAR(255) NOT NULL AFTER `banned`");
	
	mysql_query("ALTER TABLE `".INST."settings` DROP `hideboards`");
	
	//add lastpostID to topics for latesttopics
	mysql_query("ALTER TABLE `".INST."forum_topics` ADD `lastpostID` INT NOT NULL DEFAULT '0' AFTER `lastposter`");
	
	//add color parameter for scrolltext
	mysql_query("ALTER TABLE `".INST."scrolltext` ADD `color` VARCHAR(7) NOT NULL DEFAULT '#000000'");
	
	//add new games
	mysql_query("UPDATE `".INST."games` SET `name` = 'Battlefield 1942' WHERE `name` = 'Battlefield'");
	mysql_query("INSERT INTO `".INST."games` ( `gameID` , `tag` , `name` )
		VALUES
			('', 'aa', 'Americas Army'),
			('', 'aoe', 'Age of Empires 3'),
			('', 'b21', 'Battlefield 2142'),
			('', 'bf2', 'Battlefield 2'),
			('', 'bfv', 'Battlefield Vietnam'),
			('', 'c3d', 'Carom 3D'),
			('', 'cc3', 'Command &amp; Conquer'),
			('', 'cd2', 'Call of Duty 2'),
			('', 'cd4', 'Call of Duty 4'),
			('', 'cod', 'Call of Duty'),
			('', 'coh', 'Company of Heroes'),
			('', 'crw', 'Crysis Wars'),
			('', 'cry', 'Crysis'),
			('', 'css', 'Counter-Strike: Source'),
			('', 'cz', 'Counter-Strike: Condition Zero'),
			('', 'dds', 'Day of Defeat: Source'),
			('', 'dod', 'Day of Defeat'),
			('', 'dow', 'Dawn of War'),
			('', 'dta', 'DotA'),
			('', 'et', 'Enemy Territory'),
			('', 'fc', 'FarCry'),
			('', 'fer', 'F.E.A.R.'),
			('', 'fif', 'FIFA'),
			('', 'fl', 'Frontlines: Fuel of War'),
			('', 'hal', 'HALO'),
			('', 'jk2', 'Jedi Knight 2'),
			('', 'jk3', 'Jedi Knight 3'),
			('', 'lfs', 'Live for Speed'),
			('', 'lr2', 'LotR: Battle for Middle Earth 2'),
			('', 'lr', 'LotR: Battle for Middle Earth'),
			('', 'moh', 'Medal of Hornor'),
			('', 'nfs', 'Need for Speed'),
			('', 'pes', 'Pro Evolution Soccer'),
			('', 'q3', 'Quake 3'),
			('', 'q4', 'Quake 4'),
			('', 'ql', 'Quakelive'),
			('', 'rdg', 'Race Driver Grid'),
			('', 'sc2', 'Starcraft 2'),
			('', 'sc', 'Starcraft'),
			('', 'sof', 'Soldier of Fortune 2'),
			('', 'sw2', 'Star Wars: Battlefront 2'),
			('', 'sw', 'Star Wars: Battlefront'),
			('', 'swa', 'SWAT 4'),
			('', 'tf2', 'Team Fortress 2'),
			('', 'tf', 'Team Fortress'),
			('', 'tm', 'TrackMania'),
			('', 'ut3', 'Unreal Tournament 3'),
			('', 'ut4', 'Unreal Tournament 2004'),
			('', 'war', 'War Rock'),
			('', 'wic', 'World in Conflict'),
			('', 'wow', 'World of Warcraft'),
			('', 'wrs', 'Warsow')");
	
	//add new countries
	mysql_query("INSERT INTO `".INST."countries` ( `countryID` , `country` , `short` )
		VALUES
			('', 'Albania', 'al'),
			('', 'Algeria', 'dz'),
			('', 'American Samoa', 'as'),
			('', 'Andorra', 'ad'),
			('', 'Angola', 'ao'),
			('', 'Anguilla', 'ai'),
			('', 'Antarctica', 'aq'),
			('', 'Antigua and Barbuda', 'ag'),
			('', 'Armenia', 'am'),
			('', 'Aruba', 'aw'),
			('', 'Azerbaijan', 'az'),
			('', 'Bahamas', 'bz'),
			('', 'Bahrain', 'bh'),
			('', 'Bangladesh', 'bd'),
			('', 'Barbados', 'bb'),
			('', 'Belarus', 'by'),
			('', 'Benelux', 'bx'),
			('', 'Benin', 'bj'),
			('', 'Bermuda', 'bm'),
			('', 'Bhutan', 'bt'),
			('', 'Bolivia', 'bo'),
			('', 'Botswana', 'bw'),
			('', 'Bouvet Island', 'bv'),
			('', 'British Indian Ocean Territory', 'io'),
			('', 'Brunei Darussalam', 'bn'),
			('', 'Burkina Faso', 'bf'),
			('', 'Burundi', 'bi'),
			('', 'Cambodia', 'kh'),
			('', 'Cameroon', 'cm'),
			('', 'Cape Verde', 'cv'),
			('', 'Cayman Islands', 'ky'),
			('', 'Central African Republic', 'cf'),
			('', 'Christmas Island', 'cx'),
			('', 'Cocos Islands', 'cc'),
			('', 'Comoros', 'km'),
			('', 'Congo', 'cg'),
			('', 'Cook Islands', 'ck'),
			('', 'Costa Rica', 'cr'),
			('', 'Cote d\'Ivoire', 'ci'),
			('', 'Cuba', 'cu'),
			('', 'Democratic Congo', 'cd'),
			('', 'Democratic Korea', 'kp'),
			('', 'Djibouti', 'dj'),
			('', 'Dominica', 'dm'),
			('', 'Dominican Republic', 'do'),
			('', 'East Timor', 'tp'),
			('', 'Ecuador', 'ec'),
			('', 'Egypt', 'eg'),
			('', 'El Salvador', 'sv'),
			('', 'England', 'en'),
			('', 'Eritrea', 'er'),
			('', 'Ethiopia', 'et'),
			('', 'Falkland Islands', 'fk'),
			('', 'Fiji', 'fj'),
			('', 'French Polynesia', 'pf'),
			('', 'French Southern Territories', 'tf'),
			('', 'Gabon', 'ga'),
			('', 'Gambia', 'gm'),
			('', 'Georgia', 'ge'),
			('', 'Ghana', 'gh'),
			('', 'Gibraltar', 'gi'),
			('', 'Greenland', 'gl'),
			('', 'Grenada', 'gd'),
			('', 'Guadeloupe', 'gp'),
			('', 'Guam', 'gu'),
			('', 'Guatemala', 'gt'),
			('', 'Guinea', 'gn'),
			('', 'Guinea-Bissau', 'gw'),
			('', 'Guyana', 'gy'),
			('', 'Haiti', 'ht'),
			('', 'Heard Islands', 'hm'),
			('', 'Holy See', 'va'),
			('', 'Honduras', 'hn'),
			('', 'Hong Kong', 'hk'),
			('', 'India', 'in'),
			('', 'Indonesia', 'id'),
			('', 'Iran', 'ir'),
			('', 'Iraq', 'iq'),
			('', 'Jamaica', 'jm'),
			('', 'Jordan', 'jo'),
			('', 'Kazakhstan', 'kz'),
			('', 'Kenia', 'ke'),
			('', 'Kiribati', 'ki'),
			('', 'Kuwait', 'kw'),
			('', 'Kyrgyzstan', 'kg'),
			('', 'Lao People\'s', 'la'),
			('', 'Lebanon', 'lb'),
			('', 'Lesotho', 'ls'),
			('', 'Liberia', 'lr'),
			('', 'Libyan Arab Jamahiriya', 'ly'),
			('', 'Liechtenstein', 'li'),
			('', 'Macau', 'mo'),
			('', 'Macedonia', 'mk'),
			('', 'Madagascar', 'mg'),
			('', 'Malawi', 'mw'),
			('', 'Maldives', 'mv'),
			('', 'Mali', 'ml'),
			('', 'Marshall Islands', 'mh'),
			('', 'Mauritania', 'mr'),
			('', 'Mauritius', 'mu'),
			('', 'Micronesia', 'fm'),
			('', 'Moldova', 'md'),
			('', 'Monaco', 'mc'),
			('', 'Montserrat', 'ms'),
			('', 'Morocco', 'ma'),
			('', 'Mozambique', 'mz'),
			('', 'Myanmar', 'mm'),
			('', 'Namibia', 'nb'),
			('', 'Nauru', 'nr'),
			('', 'Nepal', 'np'),
			('', 'Netherlands Antilles', 'an'),
			('', 'New Caledonia', 'nc'),
			('', 'Nicaragua', 'ni'),
			('', 'Nigeria', 'ng'),
			('', 'Niue', 'nu'),
			('', 'Norfolk Island', 'nf'),
			('', 'Northern Ireland', 'nx'),
			('', 'Northern Mariana Islands', 'mp'),
			('', 'Oman', 'om'),
			('', 'Pakistan', 'pk'),
			('', 'Palau', 'pw'),
			('', 'Palestinian', 'ps'),
			('', 'Panama', 'pa'),
			('', 'Papua New Guinea', 'pg'),
			('', 'Paraguay', 'py'),
			('', 'Peru', 'pe'),
			('', 'Philippines', 'ph'),
			('', 'Pitcairn', 'pn'),
			('', 'Puerto Rico', 'pr'),
			('', 'Qatar', 'qa'),
			('', 'Reunion', 're'),
			('', 'Rwanda', 'rw'),
			('', 'Saint Helena', 'sh'),
			('', 'Saint Kitts and Nevis', 'kn'),
			('', 'Saint Lucia', 'lc'),
			('', 'Saint Pierre and Miquelon', 'pm'),
			('', 'Saint Vincent', 'vc'),
			('', 'Samoa', 'ws'),
			('', 'San Marino', 'sm'),
			('', 'Sao Tome and Principe', 'st'),
			('', 'Saudi Arabia', 'sa'),
			('', 'Scotland', 'sc'),
			('', 'Senegal', 'sn'),
			('', 'Sierra Leone', 'sl'),
			('', 'Solomon Islands', 'sb'),
			('', 'Somalia', 'so'),
			('', 'South Georgia', 'gs'),
			('', 'Sri Lanka', 'lk'),
			('', 'Sudan', 'sd'),
			('', 'Suriname', 'sr'),
			('', 'Svalbard and Jan Mayen', 'sj'),
			('', 'Swaziland', 'sz'),
			('', 'Tajikistan', 'tj'),
			('', 'Tanzania', 'tz'),
			('', 'Thailand', 'th'),
			('', 'Togo', 'tg'),
			('', 'Tokelau', 'tk'),
			('', 'Tonga', 'to'),
			('', 'Trinidad and Tobago', 'tt'),
			('', 'Turkmenistan', 'tm'),
			('', 'Turks_and Caicos Islands', 'tc'),
			('', 'Tuvalu', 'tv'),
			('', 'Uganda', 'ug'),
			('', 'United Arab Emirates', 'ae'),
			('', 'Uruguay', 'uy'),
			('', 'Uzbekistan', 'uz'),
			('', 'Vanuatu', 'vu'),
			('', 'Vietnam', 'vn'),
			('', 'Virgin Islands (British)', 'vg'),
			('', 'Virgin Islands (USA)', 'vi'),
			('', 'Wales', 'wa'),
			('', 'Wallis and Futuna', 'wf'),
			('', 'Western Sahara', 'eh'),
			('', 'Yemen', 'ye'),
			('', 'Zambia', 'zm'),
			('', 'Zimbabwe', 'zw')");

	//add standard news languages for the existing language system
	mysql_query("INSERT INTO `".INST."news_languages` ( `langID` , `language`, `lang` , `alt` )
		VALUES
			('', 'czech', 'cz', 'czech'),
			('', 'croatian', 'hr', 'croatian'),
			('', 'lithuanian', 'lt', 'lithuanian'),
			('', 'polish', 'pl', 'polish'),
			('', 'portugese', 'pt', 'portugese'),
			('', 'slovak', 'sk', 'slovak')");

	//add sponsors click counter, small banner, mainsponsor option, sort and display choice
	mysql_query("ALTER TABLE `".INST."sponsors` ADD `banner_small` varchar(255) NOT NULL default '', ADD `displayed` varchar(255) NOT NULL default '1', ADD `mainsponsor` varchar(255) NOT NULL default '0', ADD `hits` int(11) default '0', ADD `date` int(14) NOT NULL default '0', ADD `sort` int(11) NOT NULL default '1' AFTER `banner`");
	mysql_query("ALTER TABLE `".INST."sponsors` ADD `displayed` varchar(255) NOT NULL default '1', ADD `hits` int(11) default '0', ADD `date` int(14) NOT NULL default '0', ADD `sort` int(11) NOT NULL default '1' AFTER `banner`");
	mysql_query("UPDATE `".INST."sponsors` SET `date` = '".time()."' WHERE `date` = '0'");
	
	//add parnters click counter and display choice
	mysql_query("ALTER TABLE `".INST."partners` ADD `displayed` varchar(255) NOT NULL default '1', ADD `hits` int(11) default '0', ADD `date` int(14) NOT NULL default '0' AFTER `banner`");
	mysql_query("UPDATE `".INST."partners` SET `date` = '".time()."' WHERE `date` = '0'");
	
	//add latesttopicchars to settings
	mysql_query("ALTER TABLE `".INST."settings` ADD `latesttopicchars` int(11) NOT NULL default '0' AFTER `latesttopics`");
	mysql_query("UPDATE `".INST."settings` SET `latesttopicchars` = '18' WHERE `latesttopicchars` = '0'");
	
	//add maxtopnewschars to settings
	mysql_query("ALTER TABLE `".INST."settings` ADD `topnewschars` int(11) NOT NULL default '0' AFTER `headlineschars`");
	mysql_query("UPDATE `".INST."settings` SET `topnewschars` = '200' WHERE `topnewschars` = '0'");
	
	//add captcha and bancheck to settings
	mysql_query("ALTER TABLE `".INST."settings` ADD `captcha_math` int(1) NOT NULL default '2' AFTER `max_wrong_pw`");
	mysql_query("ALTER TABLE `".INST."settings` ADD `captcha_bgcol` varchar(7) NOT NULL default '#FFFFFF' AFTER `captcha_math`");
	mysql_query("ALTER TABLE `".INST."settings` ADD `captcha_fontcol` varchar(7) NOT NULL default '#000000' AFTER `captcha_bgcol`");
	mysql_query("ALTER TABLE `".INST."settings` ADD `captcha_type` int(1) NOT NULL default '2' AFTER `captcha_fontcol`");
	mysql_query("ALTER TABLE `".INST."settings` ADD `captcha_noise` int(3) NOT NULL default '100' AFTER `captcha_type`");
	mysql_query("ALTER TABLE `".INST."settings` ADD `captcha_linenoise` int(2) NOT NULL default '10' AFTER `captcha_noise`");
	mysql_query("ALTER TABLE `".INST."settings` ADD `bancheck` INT( 13 ) NOT NULL");
	
	//add small icon to squads
	mysql_query("ALTER TABLE `".INST."squads` ADD `icon_small` varchar(255) NOT NULL default '' AFTER `icon`");
	 
	// add autoresize to settings
	mysql_query("ALTER TABLE `".INST."settings` ADD `autoresize` int(1) NOT NULL default '2' AFTER `captcha_linenoise`");
	 
	// add contacts for mail formular
	$getadminmail=mysql_fetch_array(mysql_query("SELECT adminemail FROM `".INST."settings`"));
	$adminmail=$getadminmail['adminemail'];
	
	mysql_query("CREATE TABLE IF NOT EXISTS `".INST."contact` (
	  `contactID` int(11) NOT NULL auto_increment,
	  `name` varchar(100) NOT NULL,
	  `email` varchar(200) NOT NULL,
	  `sort` int(11) NOT NULL default '0',
	  	PRIMARY KEY ( `contactID` )
	  ) TYPE=MyISAM  AUTO_INCREMENT=2 ;");
	
	mysql_query("INSERT INTO `".INST."contact` (`contactID`, `name`, `email`, `sort`) VALUES
	  (1, 'Administrator', '".$adminmail."', 1);");
	
	// add date to faqs
	mysql_query("ALTER TABLE `".INST."faq` ADD `date` int(14) NOT NULL default '0' AFTER `faqcatID`");
	mysql_query("UPDATE `".INST."faq` SET `date` = '".time()."' WHERE `date` = '0'");
	 
	// remove nickname from who is/was online
	mysql_query("ALTER TABLE `".INST."whoisonline` DROP `nickname`");
	mysql_query("ALTER TABLE `".INST."whowasonline` DROP `nickname`");
   
	// set default to none in user table
	mysql_query("ALTER TABLE `".INST."user` CHANGE `clantag` `clantag` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `clanname` `clanname` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `clanirc` `clanirc` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `clanhistory` `clanhistory` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `cpu` `cpu` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `mainboard` `mainboard` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `ram` `ram` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `monitor` `monitor` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `graphiccard` `graphiccard` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `soundcard` `soundcard` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `connection` `connection` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `keyboard` `keyboard` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `mouse` `mouse` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `mousepad` `mousepad` varchar(255) NOT NULL default ''");
	mysql_query("ALTER TABLE `".INST."user` CHANGE `verbindung` `verbindung` VARCHAR( 255 ) NOT NULL default ''");
	
	mysql_query("UPDATE `".INST."user` SET `clantag` = '' WHERE `clantag` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `clanname` = '' WHERE `clanname` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `clanirc` = '' WHERE `clanirc` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `clanhistory` = '' WHERE `clanhistory` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `cpu` = '' WHERE `cpu` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `mainboard` = '' WHERE `mainboard` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `ram` = '' WHERE `ram` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `monitor` = '' WHERE `monitor` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `graphiccard` = '' WHERE `graphiccard` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `soundcard` = '' WHERE `soundcard` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `connection` = '' WHERE `connection` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `keyboard` = '' WHERE `keyboard` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `mouse` = '' WHERE `mouse` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `mousepad` = '' WHERE `mousepad` = 'n/a'");
	mysql_query("UPDATE `".INST."user` SET `verbindung` = '' WHERE `verbindung` = 'n/a'");
	
	// Smilie update
	mysql_query("UPDATE `".INST."smileys` SET `pattern` = '=)' WHERE `pattern` = ':))'");
	mysql_query("UPDATE `".INST."smileys` SET `pattern` = ':p' WHERE `pattern` = ':P'");
	mysql_query("UPDATE `".INST."smileys` SET `pattern` = ';p' WHERE `pattern` = ';P'");
	
	mysql_query("INSERT INTO `".INST."smileys` VALUES ('', 'crazy.gif', 'crazy', '^^')");
	
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'amused' WHERE `pattern` = ':D'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'confused' WHERE `pattern` = '?('");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'sad' WHERE `pattern` = ';('");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'pleased' WHERE `pattern` = ':]'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'happy' WHERE `pattern` = '=)'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'smiling' WHERE `pattern` = ':)'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'wink' WHERE `pattern` = ';)'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'unhappy' WHERE `pattern` = ':('");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'tongue' WHERE `pattern` = ':p'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'funny' WHERE `pattern` = ';p'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'tired' WHERE `pattern` = ':O'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'cool' WHERE `pattern` = '8)'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'shocked' WHERE `pattern` = '8o'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'devilish' WHERE `pattern` = ':evil:'");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'angry' WHERE `pattern` = 'X('");
	mysql_query("UPDATE `".INST."smileys` SET `alt` = 'crazy' WHERE `pattern` = '^^'");
	
	//Reverter of wrong escapes
	if(get_magic_quotes_gpc()){
		
		@ini_set("max_execution_time", "300");
		@set_time_limit(300);
		
		// Fix About Us
		$get = mysql_query("SELECT about FROM ".INST."about");
		if(mysql_num_rows($get)){
			$ds = mysql_fetch_assoc($get);
			mysql_query("UPDATE ".INST."about SET about='".$ds['about']."'");
		}
		
		// Fix History
		$get = mysql_query("SELECT history FROM ".INST."history");
		if(mysql_num_rows($get)){
			$ds = mysql_fetch_assoc($get);
			mysql_query("UPDATE ".INST."history SET history='".$ds['history']."'");		
		}
		
		// Fix Comments
		$get = mysql_query("SELECT commentID, nickname, comment, url, email FROM ".INST."comments");
		while ($ds = mysql_fetch_assoc($get)) {
			mysql_query("UPDATE ".INST."comments SET 	nickname='".$ds['nickname']."', 
															comment='".$ds['comment']."', 
															url='".$ds['url']."', 
															email='".$ds['email']."' 
															WHERE commentID='".$ds['commentID']."'");
		}
		
		// Fix Articles
		$get = mysql_query("SELECT articlesID, title, url1, url2, url3, url4 FROM ".INST."articles");
		while($ds = mysql_fetch_assoc($get)){
			$title	 = $ds['title'];
			$url1 	 = $ds['url1'];
			$url2 	 = $ds['url2'];
			$url3	 = $ds['url3'];
			$url4	 = $ds['url4'];
			mysql_query("UPDATE ".INST."articles SET title='".$title."', url1='".$url1."', url2='".$url2."', url3='".$url3."', url4='".$url4."' WHERE articlesID='".$ds['articlesID']."'");
		}
		
		// Fix Profiles
		$get = mysql_query("SELECT  userID, nickname, email, firstname, lastname, sex, country, town,
									birthday, icq, usertext, clantag, clanname, clanhp,
									clanirc, clanhistory, cpu, mainboard, ram, monitor,
									graphiccard, soundcard, verbindung, keyboard, mouse,
									mousepad, mailonpm, newsletter, homepage, about FROM ".INST."user");
		while ($ds = mysql_fetch_assoc($get)) {
			$id = $ds['userID'];
			unset($ds['userID']);
			$string = '';
			foreach($ds as $key => $value){
				$string .= $key."='".$value."', ";
			}
			$set = substr($string,0,-2);
			mysql_query("UPDATE ".INST."user SET ".$set." WHERE userID='".$id."'");
		}
		
		// Fix Userguestbook
		$get = mysql_query("SELECT gbID, name, email, hp, comment FROM ".INST."user_gbook");
		while ($ds = mysql_fetch_assoc($get)) {
			mysql_query("UPDATE ".INST."user_gbook SET name='".$ds['name']."', 
															comment='".$ds['comment']."', 
															hp='".$ds['hp']."', 
															email='".$ds['email']."' 
															WHERE gbID='".$ds['gbID']."'");
		}
		
		// Fix Messenges		
		$get = mysql_query("SELECT messageID, message FROM ".INST."messenger");
		while ($ds = mysql_fetch_assoc($get)) {
			mysql_query("UPDATE ".INST."messenger SET message='".$ds['message']."' WHERE messageID='".$ds['messageID']."'");
		}
		
		// Fix Forum
		$get = mysql_query("SELECT topicID, topic FROM ".INST."forum_topics");
		while($ds = mysql_fetch_assoc($get)){
			mysql_query("UPDATE ".INST."forum_topics SET topic='".$ds['topic']."' WHERE topicID='".$ds['topicID']."'");
		}
		
		$get = mysql_query("SELECT postID, message FROM ".INST."forum_posts");
		while($ds = mysql_fetch_assoc($get)){
			mysql_query("UPDATE ".INST."forum_posts SET message='".$ds['message']."' WHERE postID='".$ds['postID']."'");
		}
	}
}

function update40200_society() {

	//add modules table
	mysql_query("DROP TABLE IF EXISTS `".INST."modules`");
	mysql_query("CREATE TABLE `".INST."modules` (
	  `moduleID` int(11) NOT NULL auto_increment,
	  `filename` varchar(255) NOT NULL default '',
	  `activated` int(1) NOT NULL default '0',
	  `access` TEXT NOT NULL,
	  PRIMARY KEY  (`moduleID`)
	  ) TYPE = MyISAM");
	
	mysql_query("INSERT INTO `".INST."modules` (`moduleID`, `filename`, `activated`, `access`) VALUES (1, 'news.php', 1, '0'),
							 (2, 'articles.php', 1, '0'),
							 (3, 'calendar.php', 1, '0'),
							 (4, 'search.php', 1, '0'),
							 (5, 'about.php', 1, '0'),
							 (6, 'history.php', 1, '0'),
							 (7, 'squads.php', 1, '0'),
							 (8, 'members.php', 1, '0'),
							 (9, 'joinus.php', 1, '0'),
							 (10, 'forum.php', 1, '0'),
							 (11, 'guestbook.php', 1, '0'),
							 (12, 'registered_users.php', 1, '0'),
							 (13, 'whoisonline.php', 1, '0'),
							 (14, 'server.php', 1, '0'),
							 (15, 'gallery.php', 1, '0'),
							 (16, 'files.php', 1, '0'),
							 (17, 'links.php', 1, '0'),
							 (18, 'linkus.php', 1, '0'),
							 (19, 'sponsors.php', 1, '0'),
							 (20, 'faq.php', 1, '0'),
							 (21, 'polls.php', 1, '0'),
							 (22, 'newsletter.php', 1, '0'),
							 (23, 'contact.php', 1, '0'),
							 (24, 'imprint.php', 1, '0'),
							 (25, 'profile.php', 1, '0'),
							 (26, 'myprofile.php', 1, '0'),
							 (27, 'loginoverview.php', 1, '0'),
							 (28, 'messenger.php', 1, '0'),
							 (29, 'usergallery.php', 1, '0'),
							 (30, 'buddys.php', 1, '0'),
							 (31, 'cash_box.php', 1, '0'),
							 (32, 'shoutbox_content.php', 1, '0'),
							 (33, 'news_comments.php', 1, '0'),
							 (34, 'counter_stats.php', 1, '0'),
							 (35, 'forum_topic.php', 1, '0'),
							 (36, 'login.php', 1, '0'),
							 (37, 'comments.php', 1, '0'),
							 (38, 'register.php', 1, '0'),
							 (39, 'data.php', 1, '0'),
							 (40, 'report.php', 1, '0'),
							 (41, 'lostpassword.php', 1, '0')");

	//add boxed modules table
	mysql_query("DROP TABLE IF EXISTS `".INST."modules_boxed`");
	mysql_query("CREATE TABLE `".INST."modules_boxed` (
		`modules_boxedID` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`filename` VARCHAR( 255 ) NOT NULL ,
		`placeholder` INT( 11 ) NOT NULL DEFAULT '0',
		`activated` INT( 1 ) NOT NULL DEFAULT '0',
		`access` TEXT NOT NULL
		) TYPE = MYISAM");
	
	mysql_query("INSERT INTO `".INST."modules_boxed` (`modules_boxedID`, `filename`, `placeholder`, `activated`, `access`) VALUES (1, 'quicksearch.php', 8, 1, '0'),
						 (2, 'poll.php', 1, 1, '0'),
						 (3, 'sc_potm.php', 18, 1, '0'),
						 (4, 'sc_lastregistered.php', 16, 1, '0'),
						 (5, 'sc_language.php', 7, 1, '0'),
						 (6, 'sc_randompic.php', 15, 1, '0'),
						 (7, 'sc_articles.php', 14, 1, '0'),
						 (8, 'sc_files.php', 13, 1, '0'),
						 (9, 'latesttopics.php', 12, 1, '0'),
						 (10, 'sc_servers.php', 17, 1, '0'),
						 (11, 'sc_sponsors.php', 20, 1, '0'),
						 (12, 'partners.php', 21, 1, '0'),
						 (13, 'login.php', 6, 1, '0'),
						 (14, 'sc_topnews.php', 9, 1, '0'),
						 (15, 'sc_headlines.php', 10, 1, '0'),
						 (18, 'sc_squads.php', 19, 1, '0'),
						 (19, 'sc_upcoming.php', 11, 1, '0'),
						 (20, 'shoutbox.php', 22, 1, '0'),
						 (21, 'sc_newsletter.php', 2, 1, '0'),
						 (22, 'counter.php', 3, 1, '0')");
	
	//dropping unnecessary profile fields
	mysql_query("ALTER TABLE `".INST."user`
	  DROP `clantag`,
	  DROP `clanname`,
	  DROP `clanhp`,
	  DROP `clanirc`,
	  DROP `clanhistory`,
	  DROP `cpu`,
		DROP `mainboard`,
		DROP `ram`,
		DROP `monitor`,
		DROP `graphiccard`,
		DROP `soundcard`,
		DROP `verbindung`,
		DROP `keyboard`,
		DROP `mouse`,
		DROP `mousepad`");
		
	
	//dropping gamesquad, games columns in squads table
	mysql_query("ALTER TABLE `".INST."squads`
    DROP `gamesquad`,
    DROP `games`"
  );
  
  //dropping clanwars table
  mysql_query("DROP TABLE `".INST."clanwars`");
  
  //dropping games table
  mysql_query("DROP TABLE `".INST."games`");
  
  //dropping unnecessary setting columns
  mysql_query("ALTER TABLE `".INST."settings`
	  DROP `clanwars`,
	  DROP `results`,
	  DROP `upcoming`,
	  DROP `demos`,
	  DROP `awards`"
	);
	
	//adding additional setting columns
	mysql_query("ALTER TABLE `".INST."settings` ADD `maxboxmodules` INT( 11 ) NOT NULL DEFAULT '32'");
	
	//resetting news languages table
	mysql_query("DROP TABLE IF EXISTS `".INST."news_languages`");
  mysql_query("CREATE TABLE `".INST."news_languages` (
	  `langID` int(11) NOT NULL AUTO_INCREMENT,
	  `language` varchar(255) NOT NULL default '',
	  `lang` char(2) NOT NULL default '',
	  `alt` varchar(255) NOT NULL default '',
	  PRIMARY KEY  (`langID`)
	) AUTO_INCREMENT=1 ");

	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (1, 'english', 'uk', 'english')");
	mysql_query("INSERT IGNORE INTO `".INST."news_languages` (`langID`, `language`, `lang`, `alt`) VALUES (2, 'german', 'de', 'german')");
	
	//add translations table
	mysql_query("CREATE TABLE `".INST."translations` (
		`translationID` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`type` VARCHAR( 255 ) NOT NULL ,
		`lang` VARCHAR( 255 ) NOT NULL ,
		`foreign_identifier` INT( 11 ) NOT NULL ,
		`text` VARCHAR( 255 ) NOT NULL
	) TYPE = MYISAM");
	
	mysql_query("INSERT INTO `".INST."translations` (`translationID`, `type`, `lang`, `foreign_identifier`, `text`) VALUES (1, 'menucat', 'uk', 1, 'Main'),
							 (2, 'menucat', 'de', 1, 'Haupt'),
							 (3, 'menucat', 'uk', 2, 'Society'),
							 (4, 'menucat', 'de', 2, 'Organisation'),
							 (5, 'menucat', 'uk', 3, 'Community'),
							 (6, 'menucat', 'de', 3, 'Gemeinschaft'),
							 (7, 'menucat', 'uk', 4, 'Media'),
							 (8, 'menucat', 'de', 4, 'Medien'),
							 (9, 'menucat', 'uk', 5, 'Miscellaneous'),
							 (10, 'menucat', 'de', 5, 'Sonstiges'),
							 (11, 'menuentry', 'uk', 1, 'News'),
							 (12, 'menuentry', 'de', 1, 'Neuigkeiten'),
							 (13, 'menuentry', 'uk', 2, 'Archive'),
							 (14, 'menuentry', 'de', 2, 'Archiv'),
							 (15, 'menuentry', 'uk', 3, 'Articles'),
							 (16, 'menuentry', 'de', 3, 'Artikel'),
							 (17, 'menuentry', 'uk', 4, 'Calendar'),
							 (18, 'menuentry', 'de', 4, 'Kalender'),
							 (19, 'menuentry', 'uk', 5, 'Search'),
							 (20, 'menuentry', 'de', 5, 'Suche'),
							 (21, 'menuentry', 'uk', 6, 'About us'),
							 (22, 'menuentry', 'de', 6, 'Über uns'),
							 (23, 'menuentry', 'uk', 7, 'History'),
							 (24, 'menuentry', 'de', 7, 'Geschichte'),
							 (25, 'menuentry', 'uk', 8, 'Institutions'),
							 (26, 'menuentry', 'de', 8, 'Organe'),
							 (27, 'menuentry', 'uk', 9, 'Members'),
							 (28, 'menuentry', 'de', 9, 'Mitglieder'),
							 (29, 'menuentry', 'uk', 10, 'Join us'),
							 (30, 'menuentry', 'de', 10, 'Mitglied werden'),
							 (31, 'menuentry', 'uk', 11, 'Forum'),
							 (32, 'menuentry', 'de', 11, 'Forum'),
							 (33, 'menuentry', 'uk', 12, 'Guestbook'),
							 (34, 'menuentry', 'de', 12, 'Gästebuch'),
							 (35, 'menuentry', 'uk', 13, 'Registered users'),
							 (36, 'menuentry', 'de', 13, 'Registrierte Nutzer'),
							 (37, 'menuentry', 'uk', 14, 'Who is online?'),
							 (38, 'menuentry', 'de', 14, 'Wer ist online?'),
							 (39, 'menuentry', 'uk', 15, 'Voiceserver'),
							 (40, 'menuentry', 'de', 15, 'Sprachserver'),
							 (41, 'menuentry', 'uk', 16, 'Gallery'),
							 (42, 'menuentry', 'de', 16, 'Galerie'),
							 (43, 'menuentry', 'uk', 17, 'Downloads'),
							 (44, 'menuentry', 'de', 17, 'Downloads'),
							 (45, 'menuentry', 'uk', 18, 'Links'),
							 (46, 'menuentry', 'de', 18, 'Links'),
							 (47, 'menuentry', 'uk', 19, 'Link us'),
							 (48, 'menuentry', 'de', 19, 'Verlinke uns'),
							 (49, 'menuentry', 'uk', 20, 'Sponsors'),
							 (50, 'menuentry', 'de', 20, 'Sponsoren'),
							 (51, 'menuentry', 'uk', 21, 'Frequently asked questions'),
							 (52, 'menuentry', 'de', 21, 'Häufig gestellte Fragen'),
							 (53, 'menuentry', 'uk', 22, 'Polls'),
							 (54, 'menuentry', 'de', 22, 'Umfragen'),
							 (55, 'menuentry', 'uk', 23, 'Newsletter'),
							 (56, 'menuentry', 'de', 23, 'Newsletter'),
							 (57, 'menuentry', 'uk', 24, 'Contact'),
							 (58, 'menuentry', 'de', 24, 'Kontakt'),
							 (59, 'menuentry', 'uk', 25, 'Imprint'),
							 (60, 'menuentry', 'de', 25, 'Impressum'),
							 (61, 'module', 'uk', 1, 'News'),
							 (62, 'module', 'de', 1, 'Neuigkeiten'),
							 (63, 'module', 'uk', 2, 'Articles'),
							 (64, 'module', 'de', 2, 'Artikel'),
							 (65, 'module', 'uk', 3, 'Calendar'),
							 (66, 'module', 'de', 3, 'Kalender'),
							 (67, 'module', 'uk', 4, 'Search'),
							 (68, 'module', 'de', 4, 'Suche'),
							 (69, 'module', 'uk', 5, 'About us'),
							 (70, 'module', 'de', 5, 'Über uns'),
							 (71, 'module', 'uk', 6, 'History'),
							 (72, 'module', 'de', 6, 'Geschichte'),
							 (73, 'module', 'uk', 7, 'Institutions'),
							 (74, 'module', 'de', 7, 'Organe'),
							 (75, 'module', 'uk', 8, 'Members'),
							 (76, 'module', 'de', 8, 'Mitglieder'),
							 (77, 'module', 'uk', 9, 'Join us'),
							 (78, 'module', 'de', 9, 'Mitglied werden'),
							 (79, 'module', 'uk', 10, 'Forum'),
							 (80, 'module', 'de', 10, 'Forum'),
							 (81, 'module', 'uk', 11, 'Guestbook'),
							 (82, 'module', 'de', 11, 'Gästebuch'),
							 (83, 'module', 'uk', 12, 'Registered users'),
							 (84, 'module', 'de', 12, 'Registrierte Nutzer'),
							 (85, 'module', 'uk', 13, 'Who is online?'),
							 (86, 'module', 'de', 13, 'Wer ist online?'),
							 (87, 'module', 'uk', 14, 'Server'),
							 (88, 'module', 'de', 14, 'Server'),
							 (89, 'module', 'uk', 15, 'Gallery'),
							 (90, 'module', 'de', 15, 'Galerie'),
							 (91, 'module', 'uk', 16, 'Downloads'),
							 (92, 'module', 'de', 16, 'Downloads'),
							 (93, 'module', 'uk', 17, 'Links'),
							 (94, 'module', 'de', 17, 'Links'),
							 (95, 'module', 'uk', 18, 'Link us'),
							 (96, 'module', 'de', 18, 'Verlinke uns'),
							 (97, 'module', 'uk', 19, 'Sponsors'),
							 (98, 'module', 'de', 19, 'Sponsoren'),
							 (99, 'module', 'uk', 20, 'Frequently asked questions'),
							 (100, 'module', 'de', 20, 'Häufig gestellte Fragen'),
							 (101, 'module', 'uk', 21, 'Polls'),
							 (102, 'module', 'de', 21, 'Umfragen'),
							 (103, 'module', 'uk', 22, 'Newsletter'),
							 (104, 'module', 'de', 22, 'Newsletter'),
							 (105, 'module', 'uk', 23, 'Contact'),
							 (106, 'module', 'de', 23, 'Kontakt'),
							 (107, 'module', 'uk', 24, 'Imprint'),
							 (108, 'module', 'de', 24, 'Impressum'),
							 (109, 'module', 'uk', 25, 'Profile'),
							 (110, 'module', 'de', 25, 'Profil'),
							 (111, 'module', 'uk', 26, 'Edit profile'),
							 (112, 'module', 'de', 26, 'Profil editieren'),
							 (113, 'module', 'uk', 27, 'Overview'),
							 (114, 'module', 'de', 27, 'Übersicht'),
							 (115, 'module', 'uk', 28, 'Messenger'),
							 (116, 'module', 'de', 28, 'Nachrichtensystem'),
							 (117, 'module', 'uk', 29, 'Usergallery'),
							 (118, 'module', 'de', 29, 'Persönliche Galerie'),
							 (119, 'module', 'uk', 30, 'Friendslist'),
							 (120, 'module', 'de', 30, 'Freundesliste'),
							 (121, 'module', 'uk', 31, 'Cash box'),
							 (122, 'module', 'de', 31, 'Kasse'),
							 (123, 'module', 'uk', 32, 'Shoutbox'),
							 (124, 'module', 'de', 32, 'Shoutbox'),
							 (125, 'module', 'uk', 33, 'News comments'),
							 (126, 'module', 'de', 33, 'Nachrichtenkommentare'),
							 (127, 'module', 'uk', 34, 'Statistics'),
							 (128, 'module', 'de', 34, 'Statistiken'),
							 (129, 'module', 'uk', 35, 'Forum topic'),
							 (130, 'module', 'de', 35, 'Forum Thema'),
							 (131, 'module', 'uk', 36, 'Login'),
							 (132, 'module', 'de', 36, 'Login'),
							 (133, 'boxmodule', 'uk', 1, 'Search'),
							 (134, 'boxmodule', 'de', 1, 'Suche'),
							 (135, 'boxmodule', 'uk', 2, 'Poll'),
							 (136, 'boxmodule', 'de', 2, 'Umfrage'),
							 (137, 'boxmodule', 'uk', 3, 'Random picture'),
							 (138, 'boxmodule', 'de', 3, 'Zufallsbild'),
							 (139, 'boxmodule', 'uk', 4, 'New users'),
							 (140, 'boxmodule', 'de', 4, 'Neuste Nutzer'),
							 (141, 'boxmodule', 'uk', 5, 'Language selection'),
							 (142, 'boxmodule', 'de', 5, 'Sprachwahl'),
							 (143, 'boxmodule', 'uk', 6, 'Random user'),
							 (144, 'boxmodule', 'de', 6, 'Zufälliger Nutzer'),
							 (145, 'boxmodule', 'uk', 7, 'Articles'),
							 (146, 'boxmodule', 'de', 7, 'Artikel'),
							 (147, 'boxmodule', 'uk', 8, 'Top Downloads'),
							 (148, 'boxmodule', 'de', 8, 'Top Downloads'),
							 (149, 'boxmodule', 'uk', 9, 'Last forum activity'),
							 (150, 'boxmodule', 'de', 9, 'Letzte Forenaktivitäten'),
							 (151, 'boxmodule', 'uk', 10, 'Servers'),
							 (152, 'boxmodule', 'de', 10, 'Server'),
							 (153, 'boxmodule', 'uk', 11, 'Sponsors'),
							 (154, 'boxmodule', 'de', 11, 'Sponsoren'),
							 (155, 'boxmodule', 'uk', 12, 'Partners'),
							 (156, 'boxmodule', 'de', 12, 'Partner'),
							 (157, 'boxmodule', 'uk', 13, 'Login'),
							 (158, 'boxmodule', 'de', 13, 'Login'),
							 (159, 'boxmodule', 'uk', 14, 'Hottest news'),
							 (160, 'boxmodule', 'de', 14, 'Top Neuigkeit'),
							 (161, 'boxmodule', 'uk', 15, 'Latest news'),
							 (162, 'boxmodule', 'de', 15, 'Letzte Neuigkeiten'),
							 (167, 'boxmodule', 'uk', 18, 'Institutions'),
							 (168, 'boxmodule', 'de', 18, 'Organe'),
							 (169, 'boxmodule', 'uk', 19, 'Events'),
							 (170, 'boxmodule', 'de', 19, 'Veranstaltungen'),
							 (171, 'boxmodule', 'uk', 20, 'Shoutbox'),
							 (172, 'boxmodule', 'de', 20, 'Shoutbox'),
							 (173, 'boxmodule', 'uk', 21, 'Newsletter'),
							 (174, 'boxmodule', 'de', 21, 'Newsletter'),
							 (175, 'boxmodule', 'uk', 22, 'Statistics'),
							 (176, 'boxmodule', 'de', 22, 'Statistik'),
							 (177, 'module', 'uk', 37, 'Comments'),
							 (178, 'module', 'de', 37, 'Kommentare'),
							 (179, 'module', 'uk', 38, 'Register'),
							 (180, 'module', 'de', 38, 'Registrieren'),
							 (181, 'registerfield', 'uk', 1, 'Name'),
							 (182, 'registerfield', 'de', 1, 'Name'),
							 (183, 'registerfield', 'uk', 2, 'Forename'),
							 (184, 'registerfield', 'de', 2, 'Vorname'),
							 (185, 'registerfield', 'uk', 3, 'Company'),
							 (186, 'registerfield', 'de', 3, 'Firma'),
							 (187, 'registerfield', 'uk', 4, 'Department'),
							 (188, 'registerfield', 'de', 4, 'Abteilung'),
							 (189, 'registerfield', 'uk', 5, 'Street'),
							 (190, 'registerfield', 'de', 5, 'Straße'),
							 (191, 'registerfield', 'uk', 6, 'Postcode, City'),
							 (192, 'registerfield', 'de', 6, 'Postleitzahl, Ort'),
							 (193, 'registerfield', 'uk', 7, 'Phonenumber'),
							 (194, 'registerfield', 'de', 7, 'Telefonnummer'),
							 (195, 'registerfield', 'uk', 8, 'E-Mail'),
							 (196, 'registerfield', 'de', 8, 'E-Mail'),
							 (201, 'menuentry', 'uk', 27, 'Database'),
							 (202, 'menuentry', 'de', 27, 'Datenbank'),
							 (203, 'module', 'uk', 39, 'Database'),
							 (204, 'module', 'de', 39, 'Datenbank'),
							 (205, 'module', 'uk', 40, 'Report'),
							 (206, 'module', 'de', 40, 'Report'),
							 (207, 'module', 'uk', 41, 'Lost password'),
							 (208, 'module', 'de', 41, 'Passwort vergessen')
							 ");
	
	//add installed languages table
	mysql_query("CREATE TABLE `".INST."installed_languages` (
		`langID` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`language` VARCHAR( 255 ) NOT NULL ,
		`lang` VARCHAR( 2 ) NOT NULL
	) TYPE = MYISAM");
	
	mysql_query("INSERT INTO `".INST."installed_languages` (`langID`, `language`, `lang`) VALUES (1, 'english', 'uk'),
							 (2, 'german', 'de');");
	
	mysql_query("INSERT IGNORE INTO `".INST."installed_languages` (`langID`, `language`, `lang`) VALUES (1, 'english', 'uk')");
	mysql_query("INSERT IGNORE INTO `".INST."installed_languages` (`langID`, `language`, `lang`) VALUES (2, 'german', 'de')");
	
	//add menu categories table
	mysql_query("CREATE TABLE `".INST."menu_categories` (
		`menucatID` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`position` int(11) NOT NULL default '1'
	) TYPE = MYISAM");
	
	mysql_query("INSERT INTO `".INST."menu_categories` (`menucatID`, `position`) VALUES (1, 1),
 						   (2, 2),
	 				 		 (3, 3),
		 		 			 (4, 4),
			  			 (5, 5)");
	
	//add menu entries table
	mysql_query("CREATE TABLE `".INST."menu_entries` (
		`menuentryID` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`menucatID` INT( 11 ) NOT NULL ,
		`link` TEXT NOT NULL,
		`position` INT( 11 ) NOT NULL,
		`newwindow` INT(1) NOT NULL default '0'
	) TYPE = MYISAM");
	
	mysql_query("INSERT INTO `".INST."menu_entries` (`menuentryID`, `menucatID`, `link`, `position`) VALUES (1, 1, 'index.php?site=news', 1),
							 (2, 1, 'index.php?site=news&amp;action=archive', 2),
							 (3, 1, 'index.php?site=articles', 3),
							 (4, 1, 'index.php?site=calendar', 4),
							 (5, 1, 'index.php?site=search', 5),
							 (6, 2, 'index.php?site=about', 1),
							 (7, 2, 'index.php?site=history', 2),
							 (8, 2, 'index.php?site=squads', 3),
							 (9, 2, 'index.php?site=members', 4),
							 (10, 2, 'index.php?site=joinus', 5),
							 (11, 3, 'index.php?site=forum', 1),
							 (12, 3, 'index.php?site=guestbook', 2),
							 (13, 3, 'index.php?site=registered_users', 3),
							 (14, 3, 'index.php?site=whoisonline', 4),
							 (15, 3, 'index.php?site=server', 5),
							 (16, 4, 'index.php?site=gallery', 1),
							 (17, 4, 'index.php?site=files', 2),
							 (18, 4, 'index.php?site=links', 3),
							 (19, 4, 'index.php?site=linkus', 4),
							 (20, 5, 'index.php?site=sponsors', 1),
							 (21, 5, 'index.php?site=faq', 2),
							 (22, 5, 'index.php?site=polls', 3),
							 (23, 5, 'index.php?site=newsletter', 4),
							 (24, 5, 'index.php?site=contact', 5),
							 (25, 5, 'index.php?site=imprint', 6),
							 (27, 4, 'index.php?site=data', 6)");
	
	//altering squads_member table
	mysql_query("ALTER TABLE `".INST."squads_members`
  						 DROP `warmember`;");
	
	//altering servers table
	mysql_query("ALTER TABLE `".INST."servers` CHANGE `game` `game` VARCHAR( 255 ) NOT NULL ");
	
	//changing upcoming table
	mysql_query("ALTER TABLE `".INST."upcoming`
						   DROP `opponent`,
						   DROP `opptag`,
						   DROP `opphp`,
						   DROP `oppcountry`,
						   DROP `maps`,
						   DROP `server`,
						   DROP `league`,
						   DROP `leaguehp`,
						   DROP `warinfo`");
	
	mysql_query("ALTER TABLE `".INST."upcoming` ADD `registering` INT( 11 ) NOT NULL DEFAULT '0',
							 ADD `register_text` TEXT NOT NULL,
							 ADD `registerfieldIDs` TEXT NOT NULL");
	
	//creating registerfields table
	mysql_query("CREATE TABLE `".INST."upcoming_registerfields` (
							 `registerfieldID` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
							 `type` VARCHAR( 255 ) NOT NULL
							 ) TYPE = MYISAM");
	
	mysql_query("INSERT INTO `".INST."upcoming_registerfields` (`registerfieldID`, `type`) VALUES (1, 'text'),
							 (2, 'text'),
							 (3, 'text'),
							 (4, 'text'),
							 (5, 'text'),
							 (6, 'text'),
							 (7, 'text'),
							 (8, 'text')");
	
	//changing upcoming announce table
	mysql_query("ALTER TABLE `".INST."upcoming_announce`
  						 DROP `status`");
	
	//create upcoming data table
	mysql_query("CREATE TABLE `".INST."upcoming_data` (
							 `upcomingdataID` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
							 `upID` INT( 11 ) NOT NULL ,
							 `annID` INT( 11 ) NOT NULL ,
							 `registerfieldID` INT( 11 ) NOT NULL ,
							 `data` TEXT NOT NULL
							 ) TYPE = MYISAM");
	
	//create databases table
	mysql_query("CREATE TABLE `".INST."database` (
						   `databaseID` int(13) NOT NULL auto_increment,
						   `name` varchar(255) NOT NULL default '',
						   `template` TEXT NOT NULL,
						   `alpha_index` INT( 1 ) NOT NULL DEFAULT '0',
							 `sort_by` INT( 13 ) NOT NULL DEFAULT '0',
						   PRIMARY KEY  (`databaseID`)
						   ) TYPE=MyISAM");
	
	mysql_query("CREATE TABLE `".INST."database_fields` (
							 `database_fieldID` INT( 13 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
							 `databaseID` INT( 13 ) NOT NULL ,
							 `name` VARCHAR( 255 ) NOT NULL ,
							 `identifier` VARCHAR( 255 ) NOT NULL
							 ) TYPE = MYISAM");
	
	mysql_query("CREATE TABLE `".INST."database_data` (
							 `database_dataID` INT( 13 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
							 `databaseID` INT( 13 ) NOT NULL ,
							 `database_fieldID` INT( 13 ) NOT NULL ,
							 `data_entryID` INT( 13 ) NOT NULL ,
							 `data` TEXT NOT NULL
							 ) TYPE = MYISAM");
	
	mysql_query("CREATE TABLE `".INST."database_entry` (
							 `database_entryID` INT( 13 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
							 `databaseID` INT( 13 ) NOT NULL
							 ) TYPE = MYISAM");
	
	//adding db author rights column
	mysql_query("ALTER TABLE `".INST."user_groups` ADD `db_author` INT( 1 ) NOT NULL DEFAULT '0'");
	
	//adding access groups table
	mysql_query("CREATE TABLE `".INST."accessgroups` (
							 `accessgroupID` INT( 13 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
							 `name` VARCHAR( 255 ) NOT NULL
							 ) TYPE = MYISAM");
	
	mysql_query("CREATE TABLE `".INST."accessgroup_members` (
							 `accessgroup_memberID` INT( 13 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
							 `accessgroupID` INT( 13 ) NOT NULL ,
							 `userID` INT( 13 ) NOT NULL ,
							 INDEX ( `accessgroupID` , `userID` )
							 ) TYPE = MYISAM ;");
	
	//modifying tables for new access rights
	mysql_query("ALTER TABLE `".INST."news` CHANGE `comments` `comments` TEXT NOT NULL");
	
	mysql_query("ALTER TABLE `".INST."static` CHANGE `accesslevel` `accesslevel` TEXT NOT NULL");
	
	mysql_query("ALTER TABLE `".INST."articles` CHANGE `comments` `comments` TEXT NOT NULL");
	
	mysql_query("ALTER TABLE `".INST."files` CHANGE `accesslevel` `accesslevel` TEXT NOT NULL");
	
	mysql_query("ALTER TABLE `".INST."gallery_pictures` CHANGE `comments` `comments` TEXT NOT NULL ");
	
	mysql_query("ALTER TABLE `".INST."poll` CHANGE `comments` `comments` TEXT NOT NULL ");
	
	//alter user table
	mysql_query("ALTER TABLE `".INST."user` ADD `postcode` VARCHAR( 255 ) NOT NULL AFTER `town` ,
							 ADD `street` VARCHAR( 255 ) NOT NULL AFTER `postcode` ,
							 ADD `streetnr` VARCHAR( 255 ) NOT NULL AFTER `street` ,
							 ADD `tel` VARCHAR( 255 ) NOT NULL AFTER `streetnr` ,
							 ADD `fax` VARCHAR( 255 ) NOT NULL AFTER `tel` ,
							 ADD `mobile` VARCHAR( 255 ) NOT NULL AFTER `fax`");
	
	//set scrolltext color
	mysql_query("UPDATE `".INST."scrolltext` SET `color`='#F2F2F2'");
	
	//add viewed column for faq entries
	mysql_query("ALTER TABLE `".INST."faq` ADD `viewed` INT( 13 ) NOT NULL DEFAULT '0'");
	
	//add max amount of registering
	mysql_query("ALTER TABLE `".INST."upcoming` ADD `registering_max` INT( 13 ) NOT NULL DEFAULT '0' AFTER `registering`");
	
	//add private data hide flag
	mysql_query("ALTER TABLE `".INST."user` ADD `publishprivatedata` INT( 1 ) NOT NULL DEFAULT '0' AFTER `language`");
	
	//drop squad joinus admin flag
	mysql_query("ALTER TABLE `".INST."squads_members` DROP `joinmember`");
	
	//fix clannname on new installations
	$get = mysql_fetch_assoc(mysql_query("SELECT `clanname` FROM `".INST."settings`"));
	if($get['clanname']=='Clanname'){
	  mysql_query("UPDATE `".INST."settings` SET `clanname`='Name'");	
	}
	$get = mysql_fetch_assoc(mysql_query("SELECT `clantag` FROM `".INST."settings`"));
	if($get['clantag']=='MyClan'){
	  mysql_query("UPDATE `".INST."settings` SET `clantag`='Name'");	
	}
	mysql_query("UPDATE `".INST."settings` SET `clanname`=".$homepagename."");	
	
}	
?>