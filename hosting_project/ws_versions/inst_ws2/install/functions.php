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
*/

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
?>