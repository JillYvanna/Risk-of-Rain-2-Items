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
<h3 class="card-header">Update Password</h3>
	<form class="form-control card-body" action="profile.inc.php" method="post">
		<div class="container">
			
			<input type="hidden" name="usersid" value="<?php echo $useractive;?>">

			<br>
			<label><b>Old Password</b></label><br>
			<input type="password" name="oldpassword" autocomplete="off" required >
			
			<br>
			<label><b>New Password</b></label><br>
			<input type="password" name="passwordnew" autocomplete="off" required>
			
			<br>
			<label><b>Repeat New Password</b></label><br>
			<input type="password" name="passwordnewrep" autocomplete="off" required>
			
			<br>	
			<br>
			<input type="submit" class="btn btn-primary" name="changeonlypass" value="Update Password"><br>
			<br>
		</div>
	</form>
	</div>
	</div>
	<div class="col-md-3"></div>
	</div>
	</div>
<?php
include_once("footer.php");
?>