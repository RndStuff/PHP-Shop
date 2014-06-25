<?php
ini_set("session.use_cookies", "0");
ini_set("url_rewriter.tags",   "");

require_once(__DIR__.'/connect.php');

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