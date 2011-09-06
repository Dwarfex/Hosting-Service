<?php 
include("functions.php");
	fullinstall();
	echo 'Installing.';
	update4beta4_4beta5();
	echo '..';
	update4beta5_4beta6();
	echo '..';
	update4beta6_4final();
	echo '..';
	update40000_40100();
	echo '..';
	update40100_40101();
	echo '..';
	update40101_40200();
	echo '..<br>';
	
?>
