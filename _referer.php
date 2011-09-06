<?php

$host = mysql_escape_string($_SERVER['HTTP_HOST']);
$ref = mysql_escape_string(trim($_SERVER["HTTP_REFERER"]));
$date = date("d.m.Y"); //Zusatz damit auch das Datum angezeigt wird

if(!stristr($ref, $host))
{
    if(!empty($ref))
    {
//ORIGINAL        $sql = safe_query("SELECT * FROM ".PREFIX."referer WHERE referer='".$ref."'");
        $sql = safe_query("SELECT * FROM ".PREFIX."referer WHERE dates='".$date."' AND referer='".$ref."'");

        if(mysql_num_rows($sql))
        {
//ORIGINAL            safe_query("UPDATE ".PREFIX."referer SET clicks=clicks+1 WHERE referer='".$ref."'");
            safe_query("UPDATE ".PREFIX."referer SET clicks=clicks+1 WHERE dates='".$date."' AND referer='".$ref."'");
        }
        else
        {

//ORIGINAL            safe_query("INSERT INTO ".PREFIX."referer (referer) VALUES ('".$ref."')");
            safe_query("INSERT INTO ".PREFIX."referer (dates,referer) VALUES ('".$date."','".$ref."')");
        }
    }
}

?>