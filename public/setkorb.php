<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();
 
if (!isset($_GET['id'])) {
    die("Kein Produkt wurde ausgew�hlt.");
}

$ware = $app->getWarenRepository()->getWareById($_GET['id']);
$app->getWarenkorb()->addWare($ware);
$app->addNotification('Die Ware wurde Ihrem Warenkorb hinzugefuegt');
$app->render('setkorb.php');
