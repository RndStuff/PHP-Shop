<?php
ini_set("session.use_cookies", "0");
ini_set("url_rewriter.tags",   "");

require_once(__DIR__.'/connect.php');

    $query = "SELECT * FROM t_artikel";
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
<style type="text/css">
      h2 {
        font-family:Arial;
        color:red;
      }
      h3 {
        font-family:Arial;
        color:orange;
      }
      ul li {
         font-family:Serif;
         color:grey;
      }
      ul li ul li {
         font-family:Serif;
         color:grey;
      }
      td {
         font-family:Serif;
         color:black;
      }
</style>
</head>
<body>
<div id="index">