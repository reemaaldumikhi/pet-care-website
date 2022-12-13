<?php



require_once 'db.php';

if(isset($_POST['update'])){

	$AboutUsText  = mysqli_real_escape_string($Connect,$_POST['aboutus']);
	$ourvisionText = mysqli_real_escape_string($Connect,$_POST['ourvision']);
  $Location = mysqli_real_escape_string($Connect,$_POST['Location']);
  $Location_url = mysqli_real_escape_string($Connect,$_POST['Location_url']);

	// Adding To Db
	$Query_Add = mysqli_query($Connect,"UPDATE manager set aboutus='$AboutUsText',ourvision='$ourvisionText',location='$Location',Location_url='$Location_url' ");
	if($Query_Add){
		echo "<script>alert('Home Page Has Been Updated');</script>";
	}else {
		echo "<script>alert('Failed To Update')</script>";
	}

	$target_dir = "images/";


	$target_file = $target_dir . basename($_FILES["fileToUploadAboutus"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(!empty($_FILES["fileToUploadAboutus"]["name"])){
    	  if (move_uploaded_file($_FILES["fileToUploadAboutus"]["tmp_name"], $target_file)) {
    		mysqli_query($Connect,"UPDATE manager set aboutus_img = '$target_file'");
    	  } else {
    		echo "Sorry, there was an error uploading your file.";
      }
    }

  if(!empty($_FILES["fileToUploadourvision"]["name"])){
    $target_file = $target_dir . basename($_FILES["fileToUploadourvision"]["name"]);
  	$uploadOk = 1;
  	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  	  if (move_uploaded_file($_FILES["fileToUploadourvision"]["tmp_name"], $target_file)) {
    		mysqli_query($Connect,"UPDATE manager set ourvision_img = '$target_file'");
    	  } else {
    		echo "Sorry, there was an error uploading your file.";
  	  }
  }

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="homestyle.css">

  <script src="https://kit.fontawesome.com/8a51ecc388.js" crossorigin="anonymous"></script>

  </head>
  <body>

    <header>
      <nav class="navbar">


          <img class="navbar-logo-header" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" >

    <div class="left">
    <ul class="navbar-list">
      <li class="navbar-item" >  <a href="vaterinaryprofile.html">   <i  class="fa-solid fa-user">    </i></a></li>
       <li class="navbar-item"> <a  href="home1.php">Home</a></li>
       <li class="navbar-item"> <a href="ViewServices.php">Services</a></li>

    </ul>
    </div>
      </nav>
    </header>


<main>
  <div class="wrapper">

 <div class="sidebar">

                     <ul>

                       <li class="pointer"><a href="vaterinaryprofile.html" ><i class="fas fa-user" aria-hidden="true"></i>Profile</a>

                       <li class="pointer"><a href="services.php" ><i class="fa-solid fa-plus"></i></i> Add service</a></li>
                       <li class="pointer"><a href="manageAppointment.html" ><i class="fa-solid fa-pen-to-square"></i></i> manage appointment</a></li>
                       <li class="pointer"><a href="editaboutUs.php" ><i class="fa-brands fa-discourse"></i> Edit About us</a></li>
            </ul>
 </div>
  <div class="main_content" class="container">
   <div class="maxwidth">
     <?php
    // Get Data
    $SELECT_info = mysqli_query($Connect,"SELECT * FROM `manager` ");
    $Info = mysqli_fetch_assoc($SELECT_info);
    $AbouTusText_v = $Info['aboutus'];
    $OurVision = $Info['ourvision'];
    $Location = $Info['location'];
    $Location_URL = $Info['Location_url'];

     ?>
     <div class="header" >
     About us
     </div>
     <form class="manageform" name="addservice" action="" method="POST" enctype="multipart/form-data">
       <div>
         <label for="">About us  : <input type="file" name="fileToUploadAboutus" id="fileToUploadAboutus" required></label>
        <textarea class="form-control" aria-label="With textarea" name="aboutus" placeholder="enter about us information"><?php echo $AbouTusText_v; ?></textarea>
       </div>
       <div>
         <label for="">Our Vision: <input type="file" name="fileToUploadourvision" id="fileToUploadourvision" required></label>
        <textarea class="form-control" aria-label="With textarea" name="ourvision" placeholder="Our Vision information"><?php echo $OurVision; ?></textarea>
       </div>
       <div>
         <br>
         <label for="">Location : <br> <input type="text" value="<?php echo $Location; ?>" name="Location" required/> </label>
       </div>
       <div>
         <label for="">Map url : <input type="url" value="<?php echo $Location_URL; ?>" name="Location_url" required></label>
       </div>

       <button type="submit" name="update" class="moreb" >Save</a>

   </form>
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
    <a  href="https://www.instagram.com/"> <i class="fab fa-instagram"></i></a>
    <a href="https://twitter.com/"> <i class="fab fa-twitter"></i></a>
    <a  href="https://ar-ar.facebook.com/"> <i class="fab fa-facebook"></i></a>
     <a  href="mailto:441201157@student.ksu.edu.sa"> <i class="fa-solid fa-envelope"></i></a>

  </div>

    <img class="navbar-logo-footer" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" >

  <div class="footer-rights">
    <p class="copyrights">All Rights Reserved – Pet Care – Kingdom of Saudi Arabia © 2022</p>
  </div>

  </div>


</footer>
  </body>
</html>
