<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();
 
if(!isset($_GET['id'])){
    die("Kein Produkt wurde ausgew�hlt.");
}
if(!isset($_SESSION['warenkorb']) || !in_array($_GET['id'], $_SESSION['warenkorb'])) {
   $_SESSION['warenkorb'][]=$_GET['id'];
}
$app->render('setkorb.twig');
