<?php
require_once(__DIR__.'/../common.php');

$korb = array();
$gesamtPreis = 0;
foreach($_SESSION['warenkorb'] as $id) {
    $korb[] = $waren[$id];
    $gesamtPreis += $waren[$id]['preis'];
}
echo $twig->render(
    'korb.twig',
    array(
        'waren' => $korb,
        'preis' => $gesamtPreis
    )
);
