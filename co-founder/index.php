<?php
	//include session-start.php
	include("php/session-start.php");  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Co-founder</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
	<?php include 'templates/nav.php';?>
	<div class="jumbotron hero">
        <div class="container">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is my brand website which does a few things for now but i hope i'll improve it soon</p>
          <p>You can register, login, update your profile, and soon to come upload stuff on your profile like quotes and photos with descriptions, working on it ;)</p>
          <p><a class="btn btn-primary btn-lg" href="login-register.php" role="button">Login/Register »</a></p>
        </div>
      </div>
	<?php include 'templates/footer.php';?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>