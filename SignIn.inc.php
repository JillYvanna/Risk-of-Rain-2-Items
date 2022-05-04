<?php
if(isset($_POST['login'])){
	$username = $_POST['credents'];
	$logpass = $_POST['password'];
	
	require_once("dbaccess.inc.php");
	require_once("functions.inc.php");
	
	loginUser($mysqli, $username, $logpass);
	
	
	
}else{
	header("location: ../Task2/SignIn.php");
	exit();
}



?>