<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();

$waren = $app->getWaren();
$korb = array();
$gesamtPreis = 0;
foreach($_SESSION['warenkorb'] as $id) {
    $korb[] = $waren[$id];
    $gesamtPreis += $waren[$id]['preis'];
}
$app->render(
    'korb.twig',
    array(
        'waren' => $korb,
        'preis' => $gesamtPreis
    )
);
