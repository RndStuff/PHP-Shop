<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();

$bestellugen = $app->getBestellungenRepository()->getAll();


$app->render(
    'admin.php',
    array('bestellungen' => $bestellugen)
);
