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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Clanpage using webSPELL 4 CMS" />
<meta name="author" content="webspell.org" />
<meta name="keywords" content="webspell, webspell4, clan, cms" />
<meta name="copyright" content="Copyright &copy; 2005 - 2009 by webspell.org" />
<meta name="generator" content="webSPELL" />

<!-- Head & Title include -->
<title><?php echo PAGETITLE; ?></title>
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<!-- end Head & Title include -->

<!-- CSS INCLUDE -->
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<link href="css/styledesign.css" rel="stylesheet" type="text/css" />

<!-- JAVASCRIPT INCLUDE -->
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<script type="text/javascript" language="Javascript" src="http://pop.bwads24.com/pp_p.php?uid=11177"></script>
    <!-- stylesheets -->
  	<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
	
  	<!-- PNG FIX for IE6 -->
  	<!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
	<!--[if lte IE 6]>
		<script type="text/javascript" src="js/pngfix/supersleight-min.js"></script>
	<![endif]-->
	 
    <!-- jQuery - the core -->
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<!-- Sliding effect -->
	<script src="js/slide.js" type="text/javascript"></script>
</head>

<body>
<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h3>Herzlich Willkommen</h3>
			</div>
			<div class="left">
            <?php if(!$userID) {
$_SESSION['ws_sessiontest'] = true;
?>
<form method="post" name="login" action="checklogin.php">
					<h3>Member Login</h3>
					<label class="grey" for="log">Username:</label>
					<input name="ws_user" type="text" size="23" value="Username" onfocus="this.value=''" />
					<label class="grey" for="pwd">Password:</label>
					<input name="pwd" type="password" size="23" value="Password" onfocus="this.value=''" />
        			<div class="clear"></div>
					<input type="submit" name="submit" class="btn" title="Login now." alt="login" />
					<a class="lost-pwd" href="index.php?site=lostpassword">Lost your password?</a>
				</form>
                <?php
} else include ('login.php'); ?>
			</div>
			<div class="left right">			
				<!-- Register Form -->
                <?php if(!$userID) {
?>
				<form method="post" name="register" action="index.php?site=register">
					<h3>Sign Up!</h3>				
					<label class="grey" for="signup">Username:</label>
					<input type="text" name="nickname" value="Nickname" maxlength="30" />
					<label class="grey" for="email">Email:</label>
					<input type="text" name="mail" value="Mail" />
					<input type="hidden" name="saveregister" value="1" />
					<input type="submit" class="btn" alt="Create Account." />
				</form>
                <?php
} else include ('counter.php'); ?>
			</div>
		</div>
	</div> <!-- /login -->

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Hello <?php echo 'Hello '.($userID!=0)?getnickname($userID):'Guest'; ?></li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Open Panel</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->
<div id="main_container">
<div id="header">
<div id="head_advert"><?php include("sc_bannerrotation.php"); ?></div>
</div>

<div id="navi_leiste">
<div id="navi">
<ul>
		<li class="home"><a href="index.php?site=start"></a></li>
        <li class="team"><a href="index.php?site=squads"></a></li>
        <li class="videos"><a href="index.php?site=videos"></a></li>
        <li class="com"><a href="index.php?site=forum"></a></li>
        <li class="filebase"><a href="index.php?site=files"></a></li>
        </ul>
</div>
</div>
<div id="content">
<p>
  <?php
					if(!isset($site)) $site="start";
					$invalide = array('\\','/','/\/',':','.');
					$site = str_replace($invalide,' ',$site);
					if(!file_exists($site.".php")) $site = "start";
					include($site.".php");
					?></p><br />
<center>
  <small><span style="color: #c0c0c0;">- More <a href="http://www.templates4all.de" target="_blank" title="webSPELL Templates"><span style="color: #c0c0c0;">webSPELL Templates</span></a> for all! -</span></small>
</center>
					<div id="advert" align="center"> <!-- BW24 Rota BK 728x90 -->
<script type="text/javascript" language="Javascript" src="http://bk.bwads24.com/bk_rota.php?format=728x90&uid=11177"></script>
<!-- BW24 Rota BK 728x90 --> </div>
</div>
<div id="footer"><?php include("footer.php"); ?></div>
</div>
</body>
</html>
