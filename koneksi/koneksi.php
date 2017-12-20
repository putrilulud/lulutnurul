<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "webuas";

$connect = mysql_connect($host, $username, $password);
mysql_select_db($database, $connect) or Die("Database Connection failed !");
?>