<?php
require_once(__DIR__.'/../oben.php');
?>
<h2>Warenkorb</h2>
<hr>
<?php
if (isset($_SESSION['warenkorb']) &&
!empty($_SESSION['warenkorb'])) {
print "<p>Folgende Waren liegen im Warenkorb vor:</p>";
print "<table border=0>";
?>
<tr>
<td WIDTH="80">
<b><p class="ueber">Art.-Nr.</p></b>
</td>
<td WIDTH="420">
<b><p class="ueber">Bezeichnung</p></b>
</td>
<td WIDTH="70">
<b><p class="ueber">Preis</p></b>
</td>
<td WIDTH="40">
<center><b><p class="ueber">&nbsp</p></b></center>
</td>
</tr>
<?php
$preis = 0;
foreach ($_SESSION['warenkorb'] as $id) {
printf('
<tr>
<td WIDTH="70">
<b><p>%s</p></b>
</td>
<td WIDTH="420">
<b><p>%s</p></b>
</td>
<td WIDTH="70">
<b><p>Euro %01.2f </p></b>
</td>
<td WIDTH="40">
<center><b><p><a href="loesch.php?id=%d&%s" class="del">L&ouml;schen</a></p></b></center>
</td>
</tr>
',
htmlentities($waren[$id]['nr']),
htmlentities($waren[$id]['name']),
htmlentities($waren[$id]['preis']),
$id,
SID
);
$preis+=$waren[$id]['preis'];
}
?>
<tr> 
<td WIDTH="70"> 
<b><p class="ueber">&nbsp</p></b>
</td> 
<td WIDTH="420">
<b><p>&nbsp</p></b>
</td>
 <td WIDTH="70"> 
 <b><p class="ueber">&nbsp</p></b>
 </td> 
<td WIDTH="40">
<center><b><p>&nbsp</p></b></center>
</td>
</tr>

<tr>
<td WIDTH="70">
<b><p>&nbsp</p></b>
</td>
<td WIDTH="420">
<b><p>Gesamtpreis (ohne Versandgeb&uuml;hren):</p></b>
</td>
<td WIDTH="100">
<b><p>Euro <?php printf("%.2f", $preis); ?></p></b>
</td>
<td WIDTH="40">
<center><b><p class="ueber">&nbsp</p></b></center>
</td>
</tr>
</table>
<p><a href="kasse1.php?<?php print SID; ?>">&raquo;Zur Kasse</a></p><br>
<?php
}
if(empty($_SESSION['warenkorb'])){
echo "<p>Sie haben keine Produkte im Warenkorb.</p><br><br>";
}
?>
</div>
</body>
</html>