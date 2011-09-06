<style type="text/css">
body {
	background-color: #FFF;
}
</style>
<ul>
  <li>Wichtig das Video Addon ist im WinRar Ordner! Beim Design dabei da dailyinput.de z.z. down ist das Addon gehört ganz allein <a href="http://dailyinput.de/" target="_blank">dailyinput.de</a></li>
</ul>
<ul>
  <li>Alle Dateien im /Upload/ Ordner in das  Hauptverzeichnis hochladen! (Für Personen mit geändertem Admincenter =&gt;  Schritt 4 zuerst) (Und für Personen die mehrere Addons installiert haben =&gt;  Schritt </li>
</ul>
<ul>
  <li>Im Webbrowser folgenden Link ausführen:  www.DEINESEITE.DE/DEINWEBSPELLORDNER/index.php?site=install</li>
</ul>
<ul>
  <li>Wer die letzten 5 Videos in der Index einfügen  möchte kann dies via INCLUDE Funktion tun. Code: &lt;?  include(&quot;sc_videos.php&quot;); ?&gt;</li>
</ul>
<ul>
  <li>Für Personen mit geändertem Admincenter diesen  Link unter Zeile 119 hinzufügen: &lt;li&gt;&lt;a  href=&quot;admincenter.php?site=videos&quot;&gt;&lt;?php echo 'Videos  Administration'; ?&gt;&lt;/a&gt;&lt;/li&gt; und beim ersten Schritt nicht die  Upload/admin/admincenter.php Datei hochladen!</li>
</ul>
<ul>
  <li>Für Personen die mehrere Addons installiert  haben folgendes in der comments.php (im Hauptverzeichnis) unter Zeile 36  folgendes einfügen: $moduls['mo'] =  array(&quot;videos&quot;,&quot;vidID&quot;,&quot;comments&quot;); und beim  ersten Schritt nicht die Upload/comments.php Datei hochladen!</li>
</ul>
