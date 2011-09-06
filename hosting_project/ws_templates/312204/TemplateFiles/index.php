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
<meta name="author" content="wemake-it.de" />
<meta name="keywords" content="webspell, webspell4, clan, cms, wemake-it, " />
<meta name="copyright" content="Copyright &copy; 2005 - 2011 by wemake-it.de" />
<meta name="generator" content="webSPELL" />

<!-- Head & Title include -->
<title><?php echo PAGETITLE; ?></title>
<link href="layout/css/layout.css" rel="stylesheet" type="text/css" />
<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<!-- end Head & Title include -->


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript" src="layout/js/ddaccordion.js">

/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>


<script type="text/javascript">


ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>

</head>
<body>



    <div id="holder">
        <div id="header"><b>WELCOME TO <a href="index.php" target="_blank"><b>#<?php echo $myclanname ?></b></a> - ENJOY YOUR GAME!</b></div>
<div id="content">
            <div id="content_left">
                <!-- navigation include -->
                <?php include("navigation.php"); ?>
                <!-- end navigation include -->
                
                    <!-- poll include -->
                    <div class="module">
                    <h2><?php echo	$index_language['poll']; ?></h2>
                    <div class="module_body">
                     
                          <?php include("poll.php"); ?>
                          
                    
                      </div>
                    </div>
                    <!-- end poll include -->
                    <!-- partners include -->
                    <div class="module">
                        <h2><?php echo	$index_language['partners']; ?></h2>
                         <div class="module_body">
                        <center><?php include("partners.php"); ?><br /><a href="http://www.wemake-it.de" target="_blank" ><img src="http://www.wemake-it.de/images/linkus/2.png" border="0" alt="http://www.wemake-it.de" title="http://www.wemake-it.de" /></a><br /><br /></center>
                        </div>
                        </div>
                
                    <!-- end partners include -->
                        <!-- statistics include -->
                    <div class="module">
                    <h2><?php echo	$index_language['statistics']; ?></h2>
                     <div class="module_body">
                    <?php include("counter.php"); ?>
                    </div>
                    </div>
                
                    <!-- end statistics include -->
                    <!-- login include -->
                    <div class="module">
                    <h2><?php echo	$index_language['login']; ?></h2>
                     <div class="module_body">
                    <?php include("login.php"); ?><br>
                     </div>
                    </div>
                    <!-- end login include -->
                 
            </div>
            <div id="content_middle"><div style="background-image:url(layout/design/content_head.png);width:518px; background-position:center; background-repeat:no-repeat;height:35px;">
              </div><!-- content include -->
	    
					<!-- php site include -->
					<?php
					if(!isset($site)) $site="news";
					$invalide = array('\\','/','/\/',':','.');
					$site = str_replace($invalide,' ',$site);
					if(!file_exists($site.".php")) $site = "news";
					include($site.".php");
					?>
					<!-- content include --></div>
            <div id="content_right">
           <!-- clanwars include -->
				<div class="module">
				<h2><?php echo $index_language['matches']; ?></h2>
				<div class="module_body">
				<?php include("sc_results.php"); ?>
				</div></div>
			
				<!-- end clanwars include -->
            <!-- headlines include -->
                <div class="module">
				<h2><?php echo	$index_language['latest_news']; ?></h2>
                 <div class="module_body">
				<?php include("sc_headlines.php"); ?>
                </div>
				</div>
				<!-- end headlines include -->
              <!-- latest topics include -->
                <div class="module">
                <h2><?php echo $index_language['topics']; ?></h2>
                	<div class="module_body">
					
					<?php include("latesttopics.php"); ?>
					</div></div>
			
				<!-- end latest topics include --> 
               
               
				
                </div>
               
        </div>
        <div id="footer">Copyright by <b><?php echo $myclanname ?></b>&nbsp; | &nbsp;CMS powered by <a href="http://www.webspell.org" target="_blank"><b>webSPELL.org</b></a>&nbsp; | &nbsp;<a href="http://validator.w3.org/check?uri=referer" target="_blank">XHTML 1.0</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/refer" target="_blank">CSS 2.1</a> valid W3C standards&nbsp; | &nbsp;<a href="tmp/rss.xml" target="_blank"><img src="images/icons/rss.png" width="16" height="16" style="vertical-align:bottom;" alt="" /></a> <a href="tmp/rss.xml" target="_blank">RSS Feed</a></div>
	</div>



</body> 
</html>