<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();

$waren = $app->getWarenRepository()->getAllWaren();

$zahlungsArten = array(
    'Vorkasseu' => 0.00,
    'Vorkassep' => 0.00,
    'Rechnung' => 2.50,
    'Nachnahme' => 5.00,
);

$versandArten = array(
    'Standartversand' => 1.45,
    'Versandee' => 3.00,
    'Versandae' => 3.50,
);

if (!isset($_SESSION['kasse'])) {
    $app->render('index.php');
}

$warenkorb = $app->getWarenkorb();
$versandartKosten = $versandArten[$_SESSION['kasse']['versandart']];
$zahlungsArtKosten = $zahlungsArten[$_SESSION['kasse']['zmethode']];

$gesamtPreis = $versandartKosten + $zahlungsArtKosten + $warenkorb->getPreis();

if (isset($_POST['submit'])) {
    $subject = 'Ihre Bstellung bei uns';
    $body = 'TODO'; //TODO
    $to = $_SESSION['kasse']['email'];

    if ($app->mail($subject, $body, $to)) {
        //TODO DB escape stuff
        $name = $_SESSION['kasse']['name'];
        $plz = $_SESSION['kasse']['plz'];
        $str = $_SESSION['kasse']['str'];
        $zusatz = $_SESSION['kasse']['zusatz'];
        $ort = $_SESSION['kasse']['ort'];
        $land = $_SESSION['kasse']['land'];
        $zmethode = $_SESSION['kasse']['zmethode'];
        $versandart = $_SESSION['kasse']['versandart'];
        $sql0 = 'INSERT INTO tbl_bestellung '
        .'( email, name, zusatz, str, ort, land,  plz, versandArt, zahlungsMethode) '
        .'VALUES ( \''.$to.'\', \''.$zusatz.'\', \''.$name.'\', \''.$str.'\', \''.$ort.'\', \''
            .$land.'\', \''.$plz.'\', \''.$versandart.'\', \''.$zmethode.'\')';
        $app->getPdo()->beginTransaction();
        $app->getPdo()->exec($sql0);
        foreach ($_SESSION['warenkorb'] as $id) {
            $sql1 = 'INSERT INTO tbl_artikel_bestellungen '
                .'(artikel_id, bestellung_id) '
                .'VALUES ('.$id.', '.$app->getPdo()->lastInsertId().')';
            $app->getPdo()->exec($sql1);
        }

        if ($app->getPdo()->commit()) {
            $app->addNotification('Ihre Bestellung wurde in unsere Datenbank übernommen');
            unset($_SESSION['warenkorb']);
            unset($_SESSION['kasse']);
            $app->redirect('index.php');
        } else {
            $app->addNotification('Es tart ein Fehler bitte melden sich beim support');
        }

    } else {
        $app->addNotification('Something went wrong', $app::TYPE_DANGER);
    }
}

$app->render(
    'kasse2.php',
    array(
        'waren' => $warenkorb->getWaren(),
        'preis' => $gesamtPreis
    )
);
