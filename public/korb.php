<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();

$app->render(
    'korb.twig',
    array(
        'waren' => $app->getWarenkorb()->getWaren(),
        'preis' => $app->getWarenkorb()->getPreis()
    )
);
