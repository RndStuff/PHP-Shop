<?php
//TODO all ...
require_once(__DIR__.'/../common.php');
$korb = array();
$gesamtPreis = 0;
foreach($_SESSION['warenkorb'] as $id) {
    $korb[] = $waren[$id];
    $gesamtPreis += $waren[$id]['preis'];
}

print_R($_POST);
//TODO valide form and redirect to kasse2
if (isset($_POST['submit'])) {
    $valid = true;
    //TODO
    $email = strip_tags($_POST['email']);
    $name = strip_tags($_POST['name']);
    $zusatz = strip_tags($_POST['zusatz']);
    $str = strip_tags($_POST['str']);
    $plz = strip_tags($_POST['plz']);
    $ort = strip_tags($_POST['ort']);
        //Hier wird ueberprueft, ob die eMail exisiert.
        if (!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$", $email)) {
            $error_msg = '<p>Bitte geben Sie eine g&uuml;ltige E-Mail Adresse an.</p>';
        } //Mit strlen kann man die Laenge der eingegeben Strings ueberpruefen
        if (strlen($name) < 4 OR strlen($str) < 4 OR strlen($plz) < 2 OR strlen($ort) < 3) {
            $error_msg .= '<p>Bitte f&uuml;llen Sie <u>alle</u> Felder korrekt aus.</p>';
        }
        //Alle Fehler werden auf der Variable error_msg mit dem Punkt ($error_msg.="") gespeichert. So kann man diese Variable erweitern. Wenn die Variable leer ist, wurden keine Fehler gespeichert. Also sind alle Eingaben korrekt.
        if (strlen($error_msg) > 0) {
            //Eines der Felder wurde nicht korrekt ausgef�llt

        } //Alle Eingaben korrekt, in die Datenbank eintragen.
        else {

            $nagut = SID;
            $eintragen = "INSERT INTO tbl_data(sid,email,name,zusatz,str,plz,ort) VALUES ('$nagut','$email','$name','$zusatz','$str','$plz','$ort')";
            $query = mysql_query($eintragen);

            $ubern = $name;

            if ($query == 1) //Und weiterleiten
                ?><meta http-equiv="refresh" content="0; URL=http://lukas-scheible.de/shop/kassa.php?v=2&<?php print SID; ?>"><?php
            if ($query <> 1)
                echo "<SCRIPT>alert('Etwas ist schiefgelaufen, sorry!')</SCRIPT>";

        }

    }

echo $twig->render(
    'kasse1.twig',
    array(
        'waren' => $korb,
        'preis' => $gesamtPreis
    )
);

