<?php

if(isset($_POST['update'])){
		$usersid		= $_POST['usersid'];
		$firstName 		= $_POST['firstName'];
		$lastName		= $_POST['lastName'];
		$email			= $_POST['email'];
		$username 		= $_POST['username'];
	
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
		
	updateUserInfo($mysqli, $usersid, $firstName, $lastName, $email, $username);
	header("location: ../Task2/Profile.php");
	echo "<p>Successfull Updated Profile</p>";
	exit;}

if(isset($_POST['changepass'])){
		header("location: ../Task2/ProfileChangePass.php");
	exit;}


if(isset($_POST['changeonlypass'])){	
		$usersid		= $_POST['usersid'];
		$oldpassword 	= $_POST['oldpassword'];
		$newpassword 	= $_POST['passwordnew'];
		$newpasswordrep = $_POST['passwordnewrep'];	
		
		require_once("dbaccess.inc.php");
		require_once("functions.inc.php");
	
		if(passwordMatch($newpassword, $newpasswordrep) !== false){ //Checks if newpasswords match
			header("location: ../Task2/ProfileChangePass.php?error=passwordNotMatch");
			exit;
		}else{
			updatePassChange($mysqli, $usersid, $oldpassword, $newpassword); //checks if old password matches ands update if true
		}}
	
if(isset($_POST['deleteacc'])){
	require_once("dbaccess.inc.php");
	
	$deleteid = $_POST['usersid'];
	$sql="DELETE FROM `clientInfo` WHERE usersID=$deleteid";
	$result = mysqli_query($mysqli, $sql);
	if($result){
		header("location: ../Task2/SignOut.inc.php");
		exit;
	}else{
		die("Failed to connect to SQL: ".mysqli_connect_error());
	}
	header("location: ../Task2/Profile.php");
	exit;
}