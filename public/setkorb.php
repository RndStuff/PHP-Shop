<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();
 
if (!isset($_GET['id'])) {
    die("Kein Produkt wurde ausgew�hlt.");
}

$waren = $app->getWaren();
$app->getWarenkorb()->addWare($waren[$_GET['id']]);
$app->addNotification('Die Ware wurde Ihrem Warenkorb hinzugefuegt');
$app->render('setkorb.twig');
