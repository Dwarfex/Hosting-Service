<?
echo'<table width="100%" cellspacing="0" cellpadding="0">';

$query=safe_query("SELECT vidID FROM ".PREFIX."videos");
$vids = mysql_num_rows($query);

//Random video generating

if($vids) {
$vidID = rand(1,($vids));
$vidqry = safe_query("SELECT * FROM ".PREFIX."videos WHERE vidID=".$vidID."");
$vidi = mysql_num_rows($vidqry);
$ar=mysql_fetch_array($vidqry);
$portalid = $ar['portal'];


while($vidi != 1){
$vidID = rand(1,($vids-1));
$vidqry = safe_query("SELECT * FROM ".PREFIX."videos WHERE vidID=".$vidID."");
$vidi = mysql_num_rows($vidqry);
$ar=mysql_fetch_array($vidqry);
$portalid = $ar['portal'];
}

$port=safe_query("SELECT * FROM ".PREFIX."videos_portals WHERE id=".$ar['portal']."");
$pr=mysql_fetch_array($port);

$prevcode = $pr['preview'];

$vidlink = 'index.php?site=videos&action=detail&id='.$vidID.'&portal='.$ar['portal'].'';
$name=$ar[vidheadline];
if(strlen($name)>26) {
$name=substr($name, 0, 26);
$name.='..';
}

echo '<tr><td>'.$name.'</td></tr><tr><td align="center"><a href="'.$vidlink.'"><img style="border: 1px solid #cccccc; padding: 1px; max-width: 120px; margin: 5px;" src="';
eval ($prevcode);
echo '" alt="Preview" border="0" /></a></td></tr>';

}

$ergebnis=safe_query("SELECT * FROM ".PREFIX."videos ORDER BY vidID DESC LIMIT 0,5");
while($ds=mysql_fetch_array($ergebnis)) {

$name=$ds[vidheadline];
if(strlen($name)>26) {
$name=substr($name, 0, 26);
$name.='..';
}

echo('<tr><td>&#8226; <a href="index.php?site=videos&action=detail&id='.$ds[vidID].'&portal='.$ds['portal'].'">'.clearfromtags($name).'</a></td></tr>');

}

echo'</table>';
?>