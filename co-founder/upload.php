<?php
	//include auth.php file on all secure pages
	include("php/session-start.php");
	if(!isset($_SESSION["username"])){
		header("Location: login-register.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Co-founder</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<form action="/co-founder/php/upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<body>
	<?php include 'templates/nav.php';?>
	<div class="container">