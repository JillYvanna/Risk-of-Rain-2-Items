<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ROR2 Items</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
	<script 
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
	crossorigin="anonymous">
	</script>
	<script src="https://kit.fontawesome.com/618f54a5aa.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/js/.eslintrc.json"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>  
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
	<link rel="stylesheet" href="RORStyle.css" >
  </head>
  <body>
  
    <h1>Risk of Rain 2 Items</h1>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	
      <div class="navbar-nav">
        <a class="nav-link" href="rorindex.php">Home</a>
        <a class="nav-link" href="About.php">About</a>
        <a class="nav-link" href="AllItems.php">All Items</a>
		<?php
			if(isset($_SESSION['usersID'])){
				echo ('<a class="nav-link" href="SearchFilter.php">Filtered Search</a>');
				echo ('<a class="nav-link" href="Profile.php">Profile</a>');
				echo ('<a class="nav-link" href="SignOut.inc.php">Sign Out</a>');
				
			}else{
				echo("<a class='nav-link' href='SignUp.php'>Sign Up</a>");
				echo("<a class='nav-link' href='SignIn.php'>Sign In</a>");
			}
		?>
      
      </div>
    </div>
  </div>
</nav>
