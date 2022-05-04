<?php
if(isset($_POST['register'])){
		$firstName 	 = $_POST['firstName'];
		$lastName	 = $_POST['lastName'];
		$email		 = $_POST['email'];
		$username 	 = $_POST['username'];
		$password 	 = $_POST['password'];
		$passwordrep = $_POST['passwordrep'];
		
		require_once("dbaccess.inc.php");
		require_once("functions.inc.php");

		if(invalidUserId($firstName) !== false){
			header("location: ../Task2/SignUp.php?error=invalidUserID");
			exit;
		}
		if(invalidUserId($lastName) !== false){
			header("location: ../Task2/SignUp.php?error=invalidUserID");
			exit;
		}
		if(invalidUserId($username) !== false){
			header("location: ../Task2/SignUp.php?error=invalidUserID");
			exit;
		}
		if(passwordMatch($password, $passwordrep) !== false){
			header("location: ../Task2/SignUp.php?error=passwordNotMatch");
			exit;
		}
		if(userCheck($mysqli, $username, $email) !== false){
			header("location: ../Task2/SignUp.php?error=usernameTaken");
			exit;
		}
		
		createUser($mysqli, $firstName, $lastName, 	$email, $username, $password);
		
		
		
		

	
}else{	
	header("location: ../Task2/SignUp.php");
	exit;
}