<?php
require_once(__DIR__.'/../vendor/autoload.php');
$app = new \App\Application();
$app->render('index.twig', array('waren' => $app->getWaren()));
