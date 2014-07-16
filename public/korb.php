<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();

$app->render(
    'korb.php',
    array(
        'waren' => $app->getWarenkorb()->getWaren(),
        'preis' => $app->getWarenkorb()->getPreis()
    )
);
