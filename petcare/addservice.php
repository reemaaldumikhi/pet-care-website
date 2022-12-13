<?php


require_once 'db.php';


if(isset($_POST['Add_Service'])){

	$serviceName  = $_POST['Service_name'];
	$ServicePrice = $_POST['service_Price'];
	$brief_description = $_POST['brief_description'];


	$Query_Add = mysqli_query($Connect,"INSERT INTO `service`(`name`, `price`, `photo`, `mEmail` ,`description`) VALUES ('$serviceName','$ServicePrice','','reema@gmail.com','$brief_description')");
	if($Query_Add){
		echo "<script>alert('Service Has Been Added successfully');</script>";
	}else {
		echo "<script>alert('Failed To Add Service')</script>";
	}


	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$Last_ID = mysqli_insert_id($Connect);
		mysqli_query($Connect,"UPDATE service set photo = '$target_file' WHERE id='$Last_ID '");
	  } else {
		echo "Sorry, there was an error uploading your file.";
	  }


}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Service</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="homestyle.css">

    <script src="https://kit.fontawesome.com/8a51ecc388.js" crossorigin="anonymous"></script>
  </head>

 <body>
	<header>
		<nav class="navbar">
			<img class="navbar-logo-header" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" />
			<div class="left">
				<ul class="navbar-list">
					<li class="navbar-item">
						<a href="vaterinaryprofile.html"><i class="fa-solid fa-user"></i></a>
					</li>
					<li class="navbar-item"><a href="home1.php">Home</a></li>
					<li class="navbar-item"><a href="ViewServices.php">Services</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<main>
		<div class="wrapper">
			<div class="sidebar">
				<ul>
					<li class="pointer">
						<a href="vaterinaryprofile.html"><i class="fas fa-user" aria-hidden="true"></i>Profile</a>
					</li>
					<li class="pointer">
						<a href="services.php"><i class="fa-solid fa-plus"></i> Add service</a>
					</li>
					<li class="pointer">
						<a href="manageAppointment.html"><i class="fa-solid fa-pen-to-square"></i> manage appointment</a>
					</li>
					<li class="pointer">
						<a href="editaboutUs.php"><i class="fa-brands fa-discourse"></i> Edit About us</a>
					</li>
				</ul>
			</div>
			<div class="main_content" class="container">
				<div class="maxwidth">
					<div class="header">services</div>
					<div class="manageform">
						<form name="addservice" action="" method="POST" enctype="multipart/form-data">
							<label for=""> Service name: <input type="text" class="form-control" placeholder="Service name" name="Service_name" aria-label="Servicenamee" aria-describedby="basic-addon1" required /></label><br />
							<label for=""> Price: <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="service_Price" placeholder="service Price" required /></label><br />
							<label for="">brief description: <textarea class="form-control" aria-label="With textarea" name="brief_description" placeholder="brief description about service " required></textarea></label><br />
							<label for="">Service Image : <input type="file" name="fileToUpload" id="fileToUpload" required></label>
							<button type="submit" name="Add_Service" class="moreb" class="button">Add</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</main>

	<footer>
		<div class="footer">
			<div class="social">
				<div class="gg">
					<i class="fa-solid fa-phone"> 966599103124</i>
				</div>
				<a href="https://www.instagram.com/"> <i class="fab fa-instagram"></i></a>
				<a href="https://twitter.com/"> <i class="fab fa-twitter"></i></a>
				<a href="https://ar-ar.facebook.com/"> <i class="fab fa-facebook"></i></a>
				<a href="mailto:441201157@student.ksu.edu.sa"> <i class="fa-solid fa-envelope"></i></a>
			</div>
			<img class="navbar-logo-footer" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" />
			<div class="footer-rights">
				<p class="copyrights">All Rights Reserved – Pet Care – Kingdom of Saudi Arabia © 2022</p>
			</div>
		</div>
	</footer>

  </body>
</html>
