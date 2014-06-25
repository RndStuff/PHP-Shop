<?php
require_once(__DIR__.'/../common.php');

echo $twig->render('index.twig', array('waren' => $waren));

