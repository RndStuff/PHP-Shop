<?php

require_once(__DIR__.'/connect.php');
session_start();
    $query = "SELECT * FROM tbl_artikel";
    $result = mysql_query ( $query );

$waren = array();
while($row = mysql_fetch_assoc($result))
{
    $waren[] = $row;
}

?>
<html>
<head>
<title>Titel</title>
<link rel="stylesheet" href="assets/css/phpShop.css" />
</head>
<body>
<div id="index">