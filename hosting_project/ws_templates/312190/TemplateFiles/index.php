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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Clanpage using webSPELL 4 CMS" />
<meta name="author" content="webspell.org" />
<meta name="keywords" content="webspell, webspell4, clan, cms" />
<meta name="copyright" content="Copyright &copy; 2005 - 2009 by webspell.org" />
<meta name="generator" content="webSPELL" />
<title><?php echo PAGETITLE; ?></title>
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<link href="_page.css" rel="stylesheet" type="text/css" />
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<script src="js/contentslider.js" language="jscript" type="text/javascript"></script>
<script src="js/jquery-1.4.2.min.js" language="jscript" type="text/javascript"></script>
<script src="js/navi.js" language="jscript" type="text/javascript"></script>
<script src="js/stepcarousel.js" language="jscript" type="text/javascript">
/***********************************************
* © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code's
***********************************************/
</script>
</head>
<body>
<div id="page">
  <div id="stats"><span class="grey" style="float:left;">Welcome to <?php echo''.$hp_url.''; ?></span><span class="grey" style="float:right;"><?php include("counter.php"); ?></span></div>
  <div id="header">
    <div id="language"><?php include("sc_language.php"); ?></div>
    <?php include("login.php"); ?>
  </div><!--END HEADER-->
  <div id="contentpuffer">
    <div id="left">
      <h3 class="h3left"><?php echo $index_language['squads']; ?></h3>
      <?php include("sc_squads.php"); ?>
      <h3 class="h3left"><?php echo $index_language['matches']; ?></h3>
      <?php include("sc_results.php"); ?>
      <h3 class="h3left"><?php echo $index_language['advertisement']; ?></h3>
      <div id="bannerrotation"><?php include("sc_bannerrotation.php"); ?></div>
    </div><!--END LEFT-->
    <div id="right">
      <div id="partner">
        <div id="sliderbg">
          <?php include("features.php"); ?>
        </div>
        <div id="mygallery" class="stepcarousel">
          <div class="belt">
            <?php include("partners.php"); ?>
          </div>
        </div>
      </div><!--END PARTNER-->
      <div id="right_left">
       <?php
 		if(!isset($site)) $site="news";
		$invalide = array('\\','/','/\/',':','.');
 		$site = str_replace($invalide,' ',$site);
		if(!file_exists($site.".php")) $site = "news";
		include($site.".php");
		?>
	  </div>
      <div id="right_right">      
        <?php include("navigation.php"); ?>
        <h3 class="h3right">topmatch</h3>
        <?php include("sc_topmatch.php"); ?>        
      </div><!--END RIGHT_INNER-->
      <br style="clear:both;" />
    </div><!--END RIGHT-->
    <br style="clear:both;" />
  </div><!--END CONTENTPUFFER-->

<div id="footer">
<!-- Start licence -->
<!-- RESPECT THE WORK FROM THE DESIGNER -->
<!-- CC - Attribution-Share Alike 3.0 Unported - Do not remove links here! -->
<span style="float:left;"><a class="white" href="http://dude2k.deviantart.com">Design by dude2k</a> || <a class="white" href="http://templates4all.de">webSPELL templates</a> || Adaption by templates4ALL.de</span>
<!-- RESPECT THE WORK FROM THE DESIGNER -->
<!-- CC - Attribution-Share Alike 3.0 Unported - Do not remove links here! -->
<!-- End licence -->
<span style="float:right;"><a class="white" href="index.php?site=faq"><?php $_language->read_module('navigation'); echo $_language->module['faq']; ?></a> || <a class="white" href="index.php?site=contact"><?php $_language->read_module('navigation'); echo $_language->module['contact']; ?></a> || <a class="white" href="index.php?site=imprint"><?php $_language->read_module('navigation'); echo $_language->module['imprint']; ?></a></span></div>
</div><!--END PAGE-->
<script type="text/javascript">
featuredcontentslider.init({ 						   
	id: "slider1",	
	contentsource: ["inline", ""], 
	toc: "#increment",
	nextprev: ["", ""], 
	revealtype: "click", 
	enablefade: [true, 0.2], 
	autorotate: [true, 3000], 
	onChange: function(previndex, curindex){} 
})
</script>
<script type="text/javascript">
stepcarousel.setup({ 
	galleryid: 'mygallery', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	autostep: {enable:true, moveby:1, pause:3000},
	panelbehavior: {speed:500, wraparound:false, persist:true},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['styles/content/pfeillinks.png', -39, 17], rightnav: ['styles/content/pfeilrechts.png', 25, 17]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['inline'] //content setting ['inline'] or ['ajax', 'path_to_external_file']
})

</script>
</body>
</html>