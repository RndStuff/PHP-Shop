<?php
require_once(__DIR__.'/../oben.php');
?>
<h2>Kasse</h2>
<hr>
<?php
//Diese Auswertung ist vom Formular unten. Also das letzte. 
if (isset($_POST['lol'])) 
{
	$methode2 = $_POST['methode'];
	$pp = $_POST['preis'];
	$vv = $_POST['versand'];
	$ss = SID;
			if ($vv=="Standartversand") {
				$nv="Standardversand";
			}
			else if ($vv=="Versandee") {
				$nv="Versand via Einwurf-Einschreiben";
			}
			else if ($vv=="Versandae") {
				$nv="Versand via Abgabe-Einschreiben";
			}
	$r_o="SELECT * FROM tbl_data WHERE sid='$ss'";
	$query3=mysql_query($r_o);
	while ($hh=mysql_fetch_array($query3)){
	
	$empfanger = $hh['email'];
	$nde = $hh['name'];
	$ifu = $hh['data_ID'];
	
	}
//Es wird nun eine eMail an die angegebene Adresse versendet, wie ich es im letzten Teil der Online-Shop Videos erklaerte.	
	$betreff = "Ihr Einkauf im Online-Shop";
			if ($methode2=="Vorkasseu") {
					$nachricht="
eMail, wenn die Bezahlung Vorkasse per Ueberweisung war.
					";
			}
			else if ($methode2=="Vorkassep") {
					$nachricht="
eMail, wenn die Bezahlung Vorkasse per PayPal war.
					";
			}
			else if ($methode2=="Rechnung") {
					$nachricht="
eMail, wenn die Bezahlung Rechnung war.
";
			}
			else if ($methode2=="Nachnahme") {
					$nachricht="
Nachricht, wenn die Bezahlung Nachnahme war.
";
			}


			mail($empfanger, $betreff, $nachricht);
			?>
			<!------WEITERLEITUNG, WENN DER KAUF BEENDET IST!------>
			<meta http-equiv="refresh" content="0; URL=http://b.de"> 
			<?php
	
}
if (isset($_SESSION['warenkorb']) && !empty($_SESSION['warenkorb'])) 
		{
		  //Wenn das Formular aus kasse1.php abgeschickt wurde, wird es nun ausgewertet. Die Eingaben werden erstmal nur auf Variablen gespeichert.
		
			$methode = $_POST['zmethode'];
			$versand = $_POST['versandart'];
			
			if ($methode=="Vorkasseu" OR $methode=="Vorkassep") {
				$zusatz = 0;
			}
			else if ($methode=="Rechnung") {
				$zusatz = 2.50;
			}
			else if ($methode=="Nachnahme") {
				$zusatz = 5.00;
			}
			
			if ($versand=="Standartversand") {
				$zusatz += 1.45;
			}
			else if ($versand=="Versandee") {
				$zusatz += 3.00;
			}
			else if ($versand=="Versandae") {
				$zusatz += 3.50;
			}
				
			
		
		?>
<table border=0>
         <tr>

<td WIDTH="70">

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
    //Dies hier ist die Ausgabe der Waren, die man oben in der Uebersicht sieht.
	$preis = 0;
	$pd = "";
    foreach ($_SESSION['warenkorb'] as $id) {
		$pd.=htmlentities($waren[$id]['name']);
	   printf('
        <tr>
        <td WIDTH="70">

<b><p class="ok">%s</p></b>

</td>

<td WIDTH="420">

<b><p class="ok">%s</p></b>

</td>

<td WIDTH="70">

<b><p class="ok">Euro %01.2f </p></b>

</td>
</tr>
                ',
                htmlentities($waren[$id]['nr']),
               htmlentities($waren[$id]['name']),
			   htmlentities($waren[$id]['preis']),
			   $id,
               SID
              );
              //Noch schnell den Preis mit den oben und hier festgelegten Zusaetzen veraendern.
			  $preis+=$waren[$id]['preis']; 
    }
	$preis+=$zusatz;
	?>
	<tr> <td WIDTH="70"> <b><p>&nbsp</p></b></td> <td WIDTH="420"> <b><p>&nbsp</p></b></td> <td WIDTH="70"> <b><p>&nbsp</p></b></td> <td WIDTH="40"><center><b><p>&nbsp</p></b></center></td></tr>
	 <tr>

<td WIDTH="70">

<b><p>&nbsp</p></b>

</td>

<td WIDTH="420">

<b><p>Gesamtpreis (inkl. aller Zusatzgeb&uuml;hren):</p></b>

</td>

<td WIDTH="75">

<b><p>Euro <?php printf("%.2f", $preis); ?></p></b>

</td>

<td WIDTH="40">

<center><b><p>&nbsp</p></b></center>

</td>

</tr>
	
	</table>
	<?php
		 //Hier wird dann alles in die Datenbank eingetragen.
		$datum=date("Y-m-d H:i:s");
		$nagut=SID;
		$eintragen = "INSERT INTO tbl_vm(sid,vart,zm,preis,produkte,datetime) VALUES('$nagut','$versand','$methode','$preis','$pd','$datum')";
		$query = mysql_query($eintragen);
		
	?>
	<hr>
	<?php
	//Es werden verschiedene Texte ausgegeben. Je nachdem, welche Zahlungsmethode man angab.
		if ($methode=="Vorkasseu") {
				?>
				<p>Die Konto-Daten f&uuml;r die &Uuml;berweisung, sowie weitere Informationen, werden, sobald Sie "Abschlie&szlig;en" klicken, an Ihre angegebene E-Mail Adresse versendet.<br>Ihren Gesamtpreis sehen Sie jetzt oben.</p>
				<?php
			}
			else if ($methode=="Vorkassep") {
			?>
				<p>Die PayPal-Daten f&uuml;r die &Uuml;berweisung, sowie weitere Informationen, werden, sobald Sie "Abschlie&szlig;en" klicken, an Ihre angegebene E-Mail Adresse versendet.<br>Ihren Gesamtpreis sehen Sie jetzt oben.</p>
			<?php
			}
			else if ($methode=="Rechnung") {
			?>
				<p>Sobald Sie "Abschlie&szlig;en" klicken, wird Ihre Bestellung inkl. Rechnung binnen 3 Werktagen abgeschickt.</p>
			<?php
			}
			else if ($methode=="Nachnahme") {
			?>
				<p>Sobald Sie "Abschlie&szlig;en" klicken, wird Ihre Bestellung inkl. Rechnung binnen 3 Werktagen abgeschickt und Sie k&ouml;nnen beim Zustellungstr&auml;ger bezahlen.<br>Ihren Gesamtpreis sehen Sie jetzt oben.<br>Zudem bekommen Sie noch eine E-Mail mit allen weiteren Informationen.</p>
			<?php
			}
		?>	
		<!-----------Wenn man dieses letztes Formular abschickt, wird es ganz oben in der Datei ausgewertet.---->
			<FORM action="kasse2.php?<?php echo SID; ?>" method="POST">
			<input type="hidden" name="lol" value="">
			<input type="hidden" name="preis" value="<? echo $preis ?>">
			<input type="hidden" name="versand" value="<? echo $versand ?>">
			<input type="hidden" name="methode" value="<? echo $methode ?>">
			<input type="submit" class="formsubmit" name="submit" value="Abschlie&szlig;en">
				</FORM>
		<?php
		}
	?>