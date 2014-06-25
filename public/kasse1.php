<?php
require_once(__DIR__.'/../oben.php');
?>
<h2>Kasse</h2>
<hr>
<!-------Tabelle wird erstellt und Zeilen und Spalten festgelegt.--------->
<table border=0>
         <tr>

<td WIDTH="80">

<b><p>Art.-Nr.</p></b>

</td>

<td WIDTH="420">

<b><p>Bezeichnung</p></b>

</td>

<td WIDTH="70">

<b><p>Preis</p></b>

</td>

<td WIDTH="40">

<center><b><p>&nbsp</p></b></center>

</td>

</tr>
<!------In PHP wird der Warenkorb ausgelesen und in der Tabelle ausgegeben.--------->
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
</tr>
                ',
                htmlentities($waren[$id]['nr']),
               htmlentities($waren[$id]['name']),
			   htmlentities($waren[$id]['preis']),
			   $id,
               SID
              );
              //Hier wird der bisherige Preis addiert.
             $preis+=$waren[$id]['preis']; 
    }
	?>
	<tr> <td WIDTH="70"> <b><p>&nbsp</p></b></td> <td WIDTH="420"> <b><p>&nbsp</p></b></td> <td WIDTH="70"> <b><p>&nbsp</p></b></td> <td WIDTH="40"><center><b><p>&nbsp</p></b></center></td></tr>
	 <tr>

<td WIDTH="70">

<b><p>&nbsp</p></b>

</td>

<td WIDTH="420">

<b><p>Gesamtpreis (ohne Versandgeb&uuml;hren):</p></b>

</td>

<td WIDTH="75">
  <!-------Preis mit Hilfe von PHP ausgeben.--------->
<b><p>Euro <?php printf("%.2f", $preis); ?></p></b>

</td>

<td WIDTH="40">

<center><b><p>&nbsp</p></b></center>

</td>

</tr>
	
	</table>
	<hr>
	<!-------Das PHP Feld unter mir tritt erst ein, sobald man das Formular ganz unten abgeschickt hat.--------->
<?php
if (isset($_SESSION['warenkorb']) &&
   !empty($_SESSION['warenkorb']) && $_GET['v']=="") {
    ?>
	
	<p>1. Bitte geben Sie Ihre <u>Lieferadresse</u> an</p>
	  <?php
	//Wenn man weiter geklickt hat, Eingaben ueberpruefen
		
		if (isset($_POST['sinnlos'])){
		          //Mit strip_tags gegen Angriffe sch�tzen.
			$email = strip_tags($_POST['email']);
			$name = strip_tags($_POST['name']);
			$zusatz = strip_tags($_POST['zusatz']);
			$str = strip_tags($_POST['str']);
			$plz = strip_tags($_POST['plz']);
			$ort = strip_tags($_POST['ort']);
				  //Hier wird ueberprueft, ob die eMail exisiert.
				if(!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$",$email)){
					$error_msg='<p>Bitte geben Sie eine g&uuml;ltige E-Mail Adresse an.</p>';
				} //Mit strlen kann man die Laenge der eingegeben Strings ueberpruefen
				if(strlen($name)<4 OR strlen($str)<4 OR strlen($plz)<2 OR strlen($ort)<3){
					$error_msg.='<p>Bitte f&uuml;llen Sie <u>alle</u> Felder korrekt aus.</p>';
				}
				//Alle Fehler werden auf der Variable error_msg mit dem Punkt ($error_msg.="") gespeichert. So kann man diese Variable erweitern. Wenn die Variable leer ist, wurden keine Fehler gespeichert. Also sind alle Eingaben korrekt.
			if(strlen($error_msg)>0)
			{
       		//Eines der Felder wurde nicht korrekt ausgef�llt 
			echo "<fieldset><FORM>";
       		echo $error_msg;
			echo "<p class=\"del\" style=\"text-align:center;\"><a href=\"javascript:history.back()\" class=\"del\">Erneut versuchen</a></p>";
			echo "</FORM></fieldset><br><br>";			
			}
			   //Alle Eingaben korrekt, in die Datenbank eintragen.
			else {
				
				$nagut=SID;
				$eintragen = "INSERT INTO tbl_data(sid,email,name,zusatz,str,plz,ort) VALUES ('$nagut','$email','$name','$zusatz','$str','$plz','$ort')";
				$query = mysql_query($eintragen);
				
				$ubern = $name;
				
				if($query==1) //Und weiterleiten
					?><meta http-equiv="refresh" content="0; URL=http://lukas-scheible.de/shop/kassa.php?v=2&<?php print SID; ?>"><?php
				if($query<>1)	
					echo "<SCRIPT>alert('Etwas ist schiefgelaufen, sorry!')</SCRIPT>";
					
			}
	  
	  }
	  else {  //Falls das Formular noch nicht abgeschickt wurde, wird es fuer die Benutzung angezeigt.
	  ?>
	  <!-------1ste Formular.--------->
	    <form action="kasse1.php?<?php echo SID; ?>" method="POST">
<fieldset>
<label class="formleft" for="email">E-Mail</label>
<input type="text" name="email"><br>
<label class="formleft" for="name">Name</label>
<input type="text" name="name"><br>
<label class="formleft" for="zusatz">Zusatz (optional)</label>
<input type="text" name="zusatz"><br>
<label class="formleft" for="str">Strasse & Nr.</label>
<input type="text" name="str"><br>
<label class="formleft" for="plz">PLZ</label>
<input type="text" name="plz"><br>
<label class="formleft" for="ort">Ort</label>
<input type="text" name="ort"><br>
<label class="formleft" for="land">Land</label>
<input type="text" name="land" value="Deutschland"><br>
<input type="hidden" name="sesid" value="<?php echo SID; ?>">
</fieldset>
<br>
<input type="submit" class="formsubmit" value="Weiter">
<input type="hidden" name="sinnlos" value="LOL">
<br><br>
</form>
	  <?php
	  }
	  }
	  
		else if (isset($_SESSION['warenkorb']) && !empty($_SESSION['warenkorb']) && $_GET['v']==2) 
		{
		?>
		<!-------Das erste Formular wurde erfolgreich ausgewertet? Dann geht's hierhin. Dieses Formular wird dann zur Datei kasse2.php geschickt.--------->
				<p>2. Bitte w&auml;hlen Sie die Versandart aus</p>
				
				<form action="kasse2.php?<?php echo SID; ?>" method="POST">
				<p><select name="versandart">
				<option value="Standartversand">Standard (+ Euro 1.45)</option>
				<option value="Versandee">Einwurf-Einschreiben (+ Euro 3.00)</option>
				<option value="Versandae">Abgabe-Einschreiben (+ Euro 3.50)</option></select></p>
				<input type="hidden" name="sesid" value="<?php echo SID; ?>">
				<input type="hidden" name="name" value="<? echo $ubern ?>">
				
				<p class="kasse">3. Bitte w&auml;hlen Sie die Zahlungsmethode aus</p>
				
				<p><select name="zmethode">
				<option value="Vorkasseu">Vorkasse &Uuml;berweisung (keine Zusatzkosten)</option>
				<option value="Vorkassep">Vorkasse PayPal (keine Zusatzkosten)</option>
				<option value="Rechnung">Rechnung (+ Euro 2.50)</option>
				<option value="Nachnahme">Nachnahme per Post (+ Euro 5.00)</option></select></p>
				<input type="submit" class="formsubmit" name="submit" value="Weiter">
				</FORM>
		<?php
		}
		
	  else {
	     echo "<p><b>Sie haben keine Waren im Warenkorb!</b></p>";
	     echo '
       <SCRIPT type="JavaScript">
       var one=1;
             while (one==1) {
                window.close();
             }
       </SCRIPT>
       ';
	  }
	  ?>
</div>
</body>
</html>

     