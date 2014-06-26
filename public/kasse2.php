<?php
require_once(__DIR__.'/../common.php');

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

if ($_SESSION['kasse']) {
    header('location: index.php');
    exit(1);
}

$korb = array();
print_r($_SESSION);
$gesamtPreis = $versandArten[$_SESSION['kasse']['versandart']] + $zahlungsArten[$_SESSION['kasse']['zmethode']];
foreach($_SESSION['warenkorb'] as $id) {
    $korb[] = $waren[$id];
    $gesamtPreis += $waren[$id]['preis'];
}

if (isset($_POST['submit']))
{
    print_r($_SESSION['kasse']);
    if (mail('doomsta2k7@gmx.de', 'hallo', 'test')) {
        //TODO save order in DB
    } else {
        //TODO add msg
    }

}

echo $twig->render(
    'kasse2.twig',
    array(
        'waren' => $korb,
        'preis' => $gesamtPreis
    )
);


