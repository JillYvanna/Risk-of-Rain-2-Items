<?php
$servername = "localhost";
$dbuser="1800168";
$dbpass="123qweasdZXC";
$dbname="db1800168";

$mysqli = mysqli_connect($servername, $dbuser, $dbpass, $dbname);

if(!$mysqli){
	die("Failed to connect to SQL: ".mysqli_connect_error());
} 