<?php
	include_once("header.php");
?><br>
<br>
<div  class="container box card-forms profileinfo">
<div class="row">
<?php
if(isset($_GET['error'])){
	if($_GET["error"]== "invalidUserID"){
		echo "<p class='notice'> Invalid characters. Valid characters: a-z, A-Z, 0-9 </p>";
	}else if($_GET["error"]== "passwordNotMatch"){
		echo "<p class='notice'> Password does not match </p>";
	}else if($_GET["error"]== "usernameTaken"){
		echo "<p class='notice'>Username already taken</p>";
	}else if($_GET["error"]== "userstmtfailed"){
		echo "<p class='notice'>Something went wrong, try again!</p>";
	}else if($_GET["error"]== "createstmtfailed"){
		echo "<p class='notice'>Something went wrong, try again!</p>";
	}else if($_GET["error"]== "none"){
		echo "<h2 class='notice'> You are signed up!</h2>";
		header("location: ../Task2/SignIn.php");
	}
}
?><div class="col-md-3"></div>
<div class="col-md-6">
<div class='card'>


	<h3 class="card-header">Sign Up Page</h3>
	<form class="form-control card-body" action="SignUp.inc.php" method="post">
			<br>
			<label><b>First Name</b></label><br>
			<input type="text" name="firstName" autocomplete="off" required>
			
			<br>
			<label><b>Last Name</b></label><br>
			<input type="text" name="lastName" autocomplete="off" required>
			
			<br>
			<label><b>Email Address</b></label><br>
			<input type="email" name="email" autocomplete="off" required>
			 
			<br>
			<label><b>Username</b></label><br>
			<input type="text" name="username" autocomplete="off" required>
			
			<br>
			<label><b>Password</b></label><br>
			<input type="password" name="password" autocomplete="off" required>
			
			<br>
			<label><b>Repeat Password</b></label><br>
			<input type="password" name="passwordrep" autocomplete="off" required>
			
			<br>	
			<br>
			<input type="submit"  class="btn btn-primary" name="register" value="Sign Up"><br>
			<br>
	</form>
	
</div>
</div>
<div class="col-md-3"></div>
</div>
</div>




<?php
	include_once("footer.php");
?>

