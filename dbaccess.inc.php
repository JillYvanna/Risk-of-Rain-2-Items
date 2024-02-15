<?php
$servername = "localhost";
$dbuser="#######";
$dbpass="############";
$dbname="db#######";

$mysqli = mysqli_connect($servername, $dbuser, $dbpass, $dbname);

if(!$mysqli){
	die("Failed to connect to SQL: ".mysqli_connect_error());
} 
