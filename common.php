<?php

require_once(__DIR__.'/connect.php');
require_once(__DIR__.'/vendor/autoload.php');
session_start();
    $query = "SELECT * FROM tbl_artikel";
    $result = mysql_query ( $query );

$waren = array();
while($row = mysql_fetch_assoc($result))
{
    $waren[$row['id']] = $row;
}

$loader = new Twig_Loader_Filesystem(__DIR__.'/src/App/Views');
$twig = new Twig_Environment($loader, array(
  #  'cache' => __DIR__.'/tmp/twig/',
));

