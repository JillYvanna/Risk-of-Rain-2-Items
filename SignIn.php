<?php
	include_once("header.php");

if(isset($_GET['error'])){
	if($_GET["error"]== "incorrectLogin"){
		echo "<p class='notice'> Username / Email unrecognised</p>";
	}else if($_GET["error"]== "incorrectPassword"){
		echo "<p class='notice'> Incorrect Password</p>";
	}
}
?>

<br>
<br>
<div class="container box cardforms profileinfo">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<div class='card'><h3 class="card-header">Sign In Page</h3>
	<form class="form-control" action="SignIn.inc.php" method="post">
		<div class="container">
			
			<br>
			<label><b>Username or Email</b></label><br>
			<input type="text" name="credents" autocomplete="off" required>
			
			<br>
			<label><b>Password</b></label><br>
			<input type="password" name="password" autocomplete="off" required>
	
			<br>	
			<br>
			<input type="submit"  class="btn btn-primary" name="login" value="Sign In"><br>
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