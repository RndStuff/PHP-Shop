<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();

if ($app->getWarenkorb()->rmWareById($_GET['id'])) {
    $app->addNotification('Das Produkt wurde aus dem Warenkorb gelöscht.');
} else {
    $app->addNotification('Es ist ein Fehler aufgetreten');
}
$app->render('loeschen.twig');
