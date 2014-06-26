<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();

$msgs = array();

if (!isset($_GET['id']) || !in_array($_GET['id'], $_SESSION['warenkorb'])) {
  $msgs[] = 'Sie haben dieses Produkt noch nicht bestellt,
         oder kein Produkt ausgewaehlt.';
}
else {
  foreach ($_SESSION['warenkorb'] as $id => $produkt) {
    if ($produkt == $_GET['id']) {
      unset($_SESSION['warenkorb'][$id]);
    }
  }
    $msgs[] = 'Das Produkt wurde aus dem Warenkorb gel&ouml;scht.';
}

$app->render('loeschen.twig', array('msgs' => $msgs));


