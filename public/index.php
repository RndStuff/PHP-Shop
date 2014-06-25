<?php
require_once(__DIR__.'/../oben.php');
?>
<h2>Produkte</h2><hr>
<?php

  foreach ($waren as $id => $produkt) {
  
	printf('
	<fieldset><legend><h3>%s</h3></legend>
	<table>
	<tr>
	<td>
	%s
	</td>
	<td>
	<ul type="square">
		<li>Preis:</li>
		<ul>
		<li>Euro %01.2f</li>
		</ul>
		<li>Genaue Beschreibung:</li>
		<ul>
		<li>%s</li>
		</ul>
		</ul>
		</td>
		</tr>
		</table>
		<a href="../setkorb.php?id=%d">In den Warenkorb</a>
		<br>
		</fieldset>
		<br>
		<br>
	',
	$produkt['name'],
	$produkt['titel'],
	$produkt['preis'],
	$produkt['text'],
	$id
	);
	
  
  }

?>
</body>
</html>

