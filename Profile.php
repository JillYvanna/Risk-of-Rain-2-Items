<?php

include_once("header.php");

require_once("dbaccess.inc.php");
require_once("functions.inc.php");

$useractive=$_SESSION['usersID'];

$query = "Select firstName, lastName, userEmail, username, pword from clientInfo where usersID= $useractive";
$result = mysqli_query($mysqli, $query);

$row = mysqli_fetch_assoc($result);
$firstName 	= $row['firstName'];
$lastName 	= $row['lastName'];
$email		=$row['userEmail'];
$username	=$row['username'];
$pword 		= $row['pword'];


?>
<br>
<br>
<div class="container box cardforms profileinfo">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<div class='card'>
	<h3 class="card-header">Profile Page</h3>
	<form class="form-control card-body" action="profile.inc.php" method="post">
		
			<input type="hidden" name="usersid" value="<?php echo $useractive;?>">
		
			<label><b>First Name</b></label><br>
			<input type="text" name="firstName" autocomplete="off" value="<?php echo $firstName;?>">
			
			<br>
			<label><b>Last Name</b></label><br>
			<input type="text" name="lastName" autocomplete="off" value="<?php echo $lastName;?>">
			
			<br>
			<label><b>Email Address</b></label><br>
			<input type="email" name="email" autocomplete="off" value="<?php echo $email;?>">
			
			<br>
			<label><b>Username</b></label><br>
			<input type="text" name="username" autocomplete="off" value="<?php echo $username;?>">
			<br>
			<br>
			<input type="submit" class="btn btn-primary" name="update" value="Update Profile"><br>
			
			<br>
			<label><b>Old Password</b></label><br>
			<input type="text" name="oldpassword" autocomplete="off" value="Password" readonly>
			
			<br>
			<label ><b>New Password</b></label><br>
			<input type="text" name="passwordnew" autocomplete="off" value="Password" readonly>
			
			<br>
			<label><b>Repeat New Password</b></label><br>
			<input type="text" name="passwordnewrep" autocomplete="off" value="Password" readonly>
			<br>
			<br>
			<input type="submit" class="btn btn-secondary" name="changepass" value="Change Password"> 
			<br>	
			<br>
			<input type="submit" class="btn btn-danger" name="deleteacc" value="Delete Account">
	
	</form>
	</div>
	</div>	
	<div class="col-md-3"></div>
	</div>
	</div>

<?php
include_once("footer.php");
?>