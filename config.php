<?php
session_start();
$url = parse_url(getenv("JAWSDB_URL"));
$host = 'g8r9w9tmspbwmsyo.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'ra9crw5ngtoqh5it';
$password = 'rqn336n6a781keyx';
$database = 'vyo6kqeav67znjtr';


mysqli_connect($host, $username, $password) or die(mysqli_error());
mysqli_select_db($database);

?>