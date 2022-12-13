<?php session_start();
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <title>Services</title>
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
       <li class="navbar-item"> <a href="Reviews.php">Reviews</a></li>


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
                                <li class="pointer"><a href="Logout.php" ><i class="fas fa-address-book"></i>Log Out</a></li>
                                
                     </ul>

          </div>

        <div class="main_content" >
          <div class="header">Services</div>
          <div class="container">


            <div class="maxwidth">

                        <div class="content">
						<?php

						$Select_Services = mysqli_query($Connect,"SELECT * FROM service");
						while($service = mysqli_fetch_assoc($Select_Services)){
							$ServiceName  = $service['name'];
							$servicePrice = $service['price'];
							$photo 		  = $service['photo'];
							$description  = $service['description'];
						?>
                            <div class="service">
                                <div class="box">
                                    <div><img src="./<?php echo $photo; ?>" alt="" /></div>
                                    <h2><?php echo $ServiceName; ?></h2>
                                    <h3><?php echo $servicePrice; ?></h3>
                                    <p class="content_overflow">
                                       <?php echo $description; ?>
                                    </p>
                                </div>
                            </div>
						<?php } ?>



                        </div>
                        <a href="addservice.php" class="moreb" class="button">Add</a>








         </div>
           </div>
         </div>
    </main>
    <footer>
           <div class="footer">

           <div class="social">
             <a  href="https://www.instagram.com/"> <i class="fab fa-instagram"></i></a>
             <a href="https://twitter.com/"> <i class="fab fa-twitter"></i></a>
             <a  href="https://ar-ar.facebook.com/"> <i class="fab fa-facebook"></i></a>
              <a  href="mailto:441201157@student.ksu.edu.sa"> <i class="fa-solid fa-envelope"></i></a>
               <a  href="#"> <i class="fa-solid fa-phone"></i></a>
           </div>

             <img class="navbar-logo-footer" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" >

           <div class="footer-rights">
             <p class="copyrights">All Rights Reserved – Pet Care – Kingdom of Saudi Arabia © 2022</p>
           </div>

           </div>
           </footer>
  </body>
</html>
