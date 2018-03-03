<?php
session_start();
$url = parse_url(getenv("JAWSDB_URL"));
$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);


mysql_connect($host, $username, $password) or die(mysql_error());
mysql_select_db($database);

?>