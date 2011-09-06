



<?php

mysql_query("DROP TABLE IF EXISTS `".INST."videos`");
mysql_query("CREATE TABLE IF NOT EXISTS `".INST."videos` (
  `vidID` int(11) NOT NULL AUTO_INCREMENT,
  `rubric` int(11) NOT NULL DEFAULT '0',
  `vidheadline` varchar(255) DEFAULT NULL,
  `vidlength` varchar(255) NOT NULL,
  `vidsource` varchar(255) NOT NULL,
  `viddescription` varchar(255) DEFAULT NULL,
  `vidclip` varchar(255) DEFAULT '0',
  `vidpreview` varchar(255) NOT NULL,
  `hits` int(11) DEFAULT '0',
  `comments` int(1) DEFAULT '0',
  `portal` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`vidID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ");




mysql_query("DROP TABLE IF EXISTS `".INST."videos_portals`");
mysql_query("CREATE TABLE IF NOT EXISTS `".INST."videos_portals` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `embed` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ");


mysql_query("DROP TABLE IF EXISTS `".INST."videos_rubrics`");
mysql_query("CREATE TABLE IF NOT EXISTS `".INST."videos_rubrics` (
  `rubricID` int(11) NOT NULL AUTO_INCREMENT,
  `rubric` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rubricID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ");




mysql_query("DROP TABLE IF EXISTS `".INST."videos_settings`");
mysql_query("CREATE TABLE IF NOT EXISTS `".INST."videos_settings` (
  `max` int(11) NOT NULL,
  `sort` varchar(255) NOT NULL,
  `hd` int(1)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");


mysql_query("INSERT INTO `".INST."videos_settings` (`max`, `sort`, `hd`) VALUES
(20, 'vidID', 0)");
mysql_query("ALTER TABLE `INST_videos` CHANGE `comments` `comments` INT( 1 ) NOT NULL DEFAULT '2'");


$embed1 = "echo ''<embed src=\"http://www.youtube.com/v/''.\$ar[vidclip].''\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" width=\"100%\" height=\"400\"></embed>'';";
$embed2 = "echo ''<iframe src=\"http://www.wipido.com/main/video/external/''.\$ar[vidclip].''\" style=\"border:none; width:480px;height:320px;overflow:hidden;\" scrolling=\"no\" border=\"0\" frameborder=\"0\"></iframe>'';";
$embed3 = "echo ''<script src=\"http://flash.revver.com/player/1.0/player.js?mediaId:''.\$ar[vidclip].'';width:480;height:392;\" type=\"text/javascript\"></script>'';";

$rev1 = "echo ''http://img.youtube.com/vi/''.\$ar[vidclip].''/default.jpg'';";
$rev2 = "echo ''http://www.wipido.com/uploads/videos/''.\$ar[vidclip].''_thumb-2.jpg'';";
$rev3 = "echo ''http://frame.revver.com/frame/120x90/''.\$ar[vidclip].''.jpg'';";


mysql_query("INSERT INTO `".INST."videos_portals` (`id`, `name`, `embed`, `preview`) VALUES (1, 'Youtube', '$embed1', '$rev1')");
mysql_query("INSERT INTO `".INST."videos_portals` (`id`, `name`, `embed`, `preview`) VALUES (2, 'Wipido', '$embed2', '$rev2')");
mysql_query("INSERT INTO `".INST."videos_portals` (`id`, `name`, `embed`, `preview`) VALUES (3, 'Revver', '$embed3', '$rev3')");



	




?>