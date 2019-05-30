<?php
	//include auth.php file on all secure pages
	include("php/session-start.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Co-founder - login-register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
	<?php include 'templates/nav.php';?>
	
	<div class="container">
		<div class="row">
			<?php if(!isset($_SESSION["username"])){?>
			<div class="col-sm-6">
				<h2 class="text-center">Login</h2>
				<?php
				require('php/db.php');
				// If form submitted, insert values into the database.
				if (isset($_POST['log-username'])){
				    // removes backslashes
					$username = stripslashes($_REQUEST['log-username']);
				    //escapes special characters in a string
					$username = mysqli_real_escape_string($connection,$username);
					$password = stripslashes($_REQUEST['log-password']);
					$password = mysqli_real_escape_string($connection,$password);
					//Checking is user existing in the database or not
				    $query = "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";
					$result = mysqli_query($connection,$query) or die(mysql_error());
					$rows = mysqli_num_rows($result);
			        if($rows==1){
					    $_SESSION['username'] = $username;
				?>        
				<a href="my-account.php">Go to your account to give us more information</a>
				<?php
				         }else{
						echo "<div class='form'>
						<h3>Username/password is incorrect.</h3>
						<br/>Click here to <a href='login-register.php'>Login</a></div>";
					}
			    }else{
				?>
				<form method="post" action="">
					<div class="form-group">
						<label for="log-username">Username</label>
						<input type="text" class="form-control" name="log-username" id="log-username" placeholder="Enter username">
					</div>
					<div class="form-group">
						<label for="log-password">Password</label>
						<input type="password" name="log-password" class="form-control" id="log-password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
				<?php } ?>
			</div>
			<div class="col-sm-6">
				<h2 class="text-center">Register</h2>
				<?php
					// require('db.php');
					// If form submitted, insert values into the database.
					if (isset($_REQUEST['username'])){
					    // removes backslashes
						$username = stripslashes($_REQUEST['username']);
					    //escapes special characters in a string
						$username = mysqli_real_escape_string($con,$username);
						$password = stripslashes($_REQUEST['password']);
						$password = mysqli_real_escape_string($con,$password);
						$trn_date = date("Y-m-d H:i:s");
					    $con2="SELECT * FROM users WHERE username='$username'";
					    $result= mysqli_query($con, $con2);
					    $rows = mysqli_num_rows($result);
					    if ($rows<1) {
						   	$query = "INSERT INTO users (username, password, trn_date)
							VALUES ('$username', '".md5($password)."', '$trn_date')";
					        $result = mysqli_query($con,$query);
					        if($result){
					            echo "<div class='form'>
								<h3>You are registered successfully.</h3>
								<br/><- You can login now on the left </div>";
					        }
					    } else { ?> 
					    	<form name="registration" method="post" action="">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" class="form-control is-invalid" id="username" placeholder="Enter username">
									<div class="invalid-feedback" style="display: block;">
										Username <?php echo $username?> is already taken.
									</div>
								</div>
								<div class="form-group">
									<label for="password1">Password</label>
									<input type="password" name="password" class="form-control" id="password" placeholder="Password">
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Register</button>
							</form>
					    <?php } 
					}else{ 
				?>
				
				<form name="registration" method="post" action="">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
					</div>
					<div class="form-group">
						<label for="password1">Password</label>
						<input type="password" name="password" class="form-control" id="password" placeholder="Password">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Register</button>
				</form>
				<?php } ?>
			</div>
			<?php }else{?>
				<div class="col-sm-12 text-center">
					<p>You are allready loged in as <?php echo $_SESSION['username']?>.</p>
					<a href="php/logout.php" class="btn btn-primary">Log out</a>
				</div>
			<?php }?>
		</div>
	</div>
	<?php include 'templates/footer.php';?>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>