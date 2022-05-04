<?php
###INVALID USERNAME###
function invalidUserId($username){
	$result;
	if(!preg_match("/[a-zA-Z0-9]/", $username)){
		$result = true;
	}else{
		$result = false;
		}
	return $result;
}

###PASSWORD MATCH CHECK###
function passwordMatch($password, $passwordrep){
	if($password !== $passwordrep){
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}

###USER EXISTANCE CHECK###//SIGNUP/SIGNIN//
function userCheck($mysqli, $username, $email){ //returns For Signup and SignIn
	$sql = "SELECT * FROM clientInfo WHERE userName = ? OR userEmail =?;";
	$stmt = mysqli_stmt_init($mysqli); // Initializes a statement and returns an object for use with mysqli_stmt_prepare
	if(!mysqli_stmt_prepare($stmt, $sql)){ //Prepares a statement for execution. The query must consist of a single SQL statement.
		header("location: ../Task2/SignUp.php?error=userstmtfailed");
		exit;
	}
	mysqli_stmt_bind_param($stmt, "ss", $username, $email); // Binds variables to a prepared statement as parameters
	mysqli_stmt_execute($stmt); // Executes a prepared statement
	
	$resultData = mysqli_stmt_get_result($stmt); //Gets a result set from a prepared statement as a mysqli_result object
	
	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}else{
		$result = false;
		return $result;	
	}
	mysqli_stmt_close($stmt);	//Closes a prepared statement
}

###USER CREATOR###
function createUser($mysqli, $firstName, $lastName, $email, $username, $password){//For signup\
	$sql = "INSERT INTO clientInfo(firstName, lastName, userEmail, username, pword) VALUES(?,?,?,?,?);";
	$stmt = mysqli_stmt_init($mysqli);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../Task2/SignUp.php?error=createstmtfailed");
		exit;
	}else{
	
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $username, $hashedPassword);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../Task2/SignUp.php?error=none");
	exit();
	}
}

### LOG USER IN###
function loginUser($mysqli, $username, $logpass){
	$userExists = userCheck($mysqli, $username, $username);
	
	if($userExists === false){		
		header("location: ../Task2/SignIn.php?error=incorrectLogin");
		exit();
	}
	$hashedpass = $userExists["pword"];
	$checkPass = password_verify($logpass, $hashedpass);
	
	if($checkPass === false){
		header("location: ../Task2/SignIn.php?error=incorrectPassword");
		exit();
	}else if($checkPass == true){
		session_start();
		$_SESSION["usersID"] = $userExists['usersID'];
		$_SESSION["username"] = $userExists['username'];
		header("location: ../Task2/rorindex.php");
		exit();
		 
	}
		
}

###	USER INFO ONLY UPDATE ###
function updateUserInfo($mysqli, $usersid, $firstName, $lastName, $email, $username){ 
	$sql = "UPDATE `clientInfo` SET firstName = '$firstName', lastName = '$lastName', userEmail = '$email', username = '$username' WHERE usersID = '$usersid'";
	$query_run = mysqli_query($mysqli, $sql);
	if($query_run){
		header("location: ../Task2/Profile.php");
		echo "<p>Successfully Updated Profile</p>";
		exit();
	}else{
		header("location: ../Task2/Profile.php");
		echo "Failed to Update User Info";
		exit();
	}
}

### USER PASSWORD ONLY UPDATE ###
function updateUserPass($mysqli, $usersid, $newpassword){
	$hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
	$sql = "UPDATE `clientInfo` SET pword = '$hashedPassword' WHERE usersID = '$usersid'";
	$query_run = mysqli_query($mysqli, $sql);
	if($query_run){
		header("location: ../Task2/Profile.php");	
		echo "<p>Successfully Updated Password</p>";

		exit();
	}else{
		header("location: ../Task2/Profile.php");
		echo "<p>Failed to Update Password</p>";
		exit();
	}
}

### CHECK PASSWORD MATCHES IN DATABASE ###
function userCheckPass($mysqli, $usersid){
	$sql = "SELECT * FROM `clientInfo` WHERE usersID = '$usersid'";
	$result = mysqli_query($mysqli, $sql);

	if($row = mysqli_fetch_assoc($result)){
		return $row;
	}else{
	$result	= false;
	return $result;
	}
}

###VERIFY OLD PASS IS CORRECT AND PASSES TO UPDATE ###
function updatePassChange($mysqli, $usersid, $oldpass,$newpass){
	$userExists = userCheckPass($mysqli, $usersid); //Returnd user info from db or false
	
	if($userExists === false){		
		header("location: ../Task2/ProfileChangePass.php?error=incorrectUserID");
		exit();
	}
	$hashedpass = $userExists["pword"];
	$checkPass = password_verify($oldpass, $hashedpass);
	
	if($checkPass === false){
		header("location: ../Task2/ProfileChangePass.php?error=incorrectOldPassword");
		exit();
	}else if($checkPass == true){ //update info
		updateUserPass($mysqli, $usersid, $newpass); 
		 
}}

	