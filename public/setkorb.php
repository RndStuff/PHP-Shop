<?php
require_once(__DIR__.'/../common.php');
 
if(!isset($_GET['id'])){
    die("Kein Produkt wurde ausgew�hlt.");
}
if(!isset($_SESSION['warenkorb']) || !in_array($_GET['id'], $_SESSION['warenkorb'])) {
   $_SESSION['warenkorb'][]=$_GET['id'];
}
echo $twig->render('setkorb.twig');
