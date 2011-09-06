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
#   Copyright 2005-2009 by webspell.org                                  #
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

// important data include
include("_mysql.php");
include("_settings.php");
include("_functions.php");

$_language->read_module('index');
$index_language = $_language->module;
// end important data include
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo PAGETITLE; ?></title>
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/inc.js"></script>
<script type="text/javascript">
	$(function(){ $('#right').equalHeights(); });
</script>
</head>
<body>
<div id="wrapper">

	<div id="nav">
    	<div>
            <ul id="navigation">
                <li><a class="news" href="index.php?site=news"></a></li>
                <li><a class="matches" href="index.php?site=clanwars"></a></li>
                <li><a class="forum" href="index.php?site=forum"></a></li>
                <li><a class="about" href="index.php?site=about"></a></li>
                <li><a class="downloads" href="index.php?site=files"></a></li>
                <li><a class="squads" href="index.php?site=squads"></a></li>
                <li><a class="sponsors" href="index.php?site=sponsors"></a></li>
                <li><a class="contact" href="#"></a></li>
            </ul>
        </div>
    </div>
    
    <div id="header">
    	<div id="login">
        <div class="wrap">
        	<h3>User area</h3>
        	<?php include("login.php"); ?>
        </div>
        </div>
    </div>
    
    <div id="content">
    
    	<div id="main">
        
        	<div id="advert"><div><?php include("sc_bannerrotation.php"); ?></div></div>
            <br />
            <div id="main_content">
					<?php
					if(!isset($site)) $site="news";
					$invalide = array('\\','/','/\/',':','.');
					$site = str_replace($invalide,' ',$site);
					if(!file_exists($site.".php")) $site = "news";
					include($site.".php");
					?>
            </div>
            
        </div>
        
        <div id="includes">
        
        	<div class="box">
            	<div class="top">
                	<h3><?php echo $index_language['latest_news']; ?></h3>
                </div>
                <div class="box_ctn">
                	<?php include("sc_headlines.php"); ?>
                </div>
            </div>
            <br />
            <div class="box">
            	<div class="top">
                	<h3><?php echo $index_language['matches']; ?></h3>
                </div>
                <div class="box_ctn">
                	<?php include("sc_results.php"); ?>
                </div>
            </div>
            <br />
            <div class="box">
            	<div class="top">
                	<h3><?php echo $index_language['topics']; ?></h3>
                </div>
                <div class="box_ctn">
                	<?php include("latesttopics.php"); ?>
                </div>
            </div>
            
        </div>
        
        <div id="right">
            <div class="sponsors_cnt"><?php include("sc_sponsors.php"); ?></div>
            <div class="sponsors_top"><h3><?php echo $index_language['partners']; ?></h3></div>
            <?php echo base64_decode('PGRpdiBjbGFzcz0ic3BvbnNvcnNfY250Ij48YSBocmVmPSJodHRwOi8vd3d3LmtvZGUtZGVzaWdu
cy5jb20vIiB0YXJnZXQ9Il9ibGFuayI+PGltZyBib3JkZXI9IjAiIHNyYz0iaHR0cDovL3d3dy5r
b2RlLWRlc2lnbnMuY29tL2FkZG9uaW5zdGFsbC9saW5rdXMuanBnIiAvPjwvYT48YnIgLz48YSBo
cmVmPSJodHRwOi8vd3d3Lnh0cmVhbWhvc3RpbmcubmV0LyIgdGFyZ2V0PSJfYmxhbmsiPjxpbWcg
Ym9yZGVyPSIwIiBzcmM9Imh0dHA6Ly93d3cua29kZS1kZXNpZ25zLmNvbS9hZGRvbmluc3RhbGwv
bGlua3VzeHRoLmpwZyIgLz48L2E+'); ?><br /><?php include("partners.php"); ?></div>
        </div>
        
        <div class="clear_left"></div>
        
        <div id="footer">
       	  <?php echo base64_decode('PGRpdiBjbGFzcz0ibGVmdF9zaWRlIj5EZXNpZ24gYnkgPGEgaHJlZj0iaHR0cDovL3d3dy5rb2Rl
LWRlc2lnbnMuY29tLyI+S29kZS1EZXNpZ25zLmNvbTwvYT48YnIgLz4='); ?>
       	  Copyright &copy; <?php echo $myclanname ?> - All rights reserved - More <a href="http://www.templates4all.de/" target="_blank" title="webSPELL Templates">webSPELL Templates<a> <br />
       	  <a href="http://validator.w3.org/check?uri=referer">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo $hp_url ?>&amp;profile=css3">CSS3</a> W3C Standards Valid</div>
            <div class="right_side"><a href="index.php?site=contact">Contact</a> | <a href="index.php?site=imprint">Imprint</a></div>
        </div>
        
    </div>
    
</div>
</body>
</html>
