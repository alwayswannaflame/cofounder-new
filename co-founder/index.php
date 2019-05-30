<?php include("php/session-start.php");  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Co-founder</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>
<body>
	<?php include 'templates/nav.php';?>
	<div class="jumbotron hero">
        <div class="container">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is my brand new website which does a few things for now but i hope i'll improve it soon</p>
          <p>You can register, login, update your profile, and soon to come upload stuff on your profile like quotes and photos with descriptions, working on it ;)</p>
          <p><a class="btn btn-primary btn-lg" href="login-register.php" role="button">Register »</a></p>
        </div>
      </div>
	<?php
		if(isset($_SESSION['username'])){
			require('php/db.php');
			$query= "SELECT * FROM photos";
    		$result= mysqli_query($connection,$query);
    		if (!$result){
        		die ('Query FAILED'.mysqli_error());}
       		
       		foreach($result as $row){
   				$title="php/uploads/".$row['title'];?>
   				<div class="gallery">
  					<a target="_blank" href="<?php echo $title ?>">
    				<img src="<?php echo $title ?>" alt="Cinque Terre" width="600" height="400">
  					</a>
  				<div class="desc">Add a description of the image here</div>
				</div> 
			<?php	
   			}
      }

	?>
	<?php include 'templates/footer.php';?>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>