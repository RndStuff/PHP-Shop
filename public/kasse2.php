<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();

$waren = $app->getWaren();

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

$korb = array();
$gesamtPreis = $versandArten[$_SESSION['kasse']['versandart']] + $zahlungsArten[$_SESSION['kasse']['zmethode']];
foreach($_SESSION['warenkorb'] as $id) {
    $korb[] = $waren[$id];
    $gesamtPreis += $waren[$id]['preis'];
}

if (isset($_POST['submit']))
{
    if (mail('', '', '')) {
        //TODO save order in DB
    } else {
        //TODO add msg
    }

}

$app->render(
    'kasse2.twig',
    array(
        'waren' => $korb,
        'preis' => $gesamtPreis
    )
);


