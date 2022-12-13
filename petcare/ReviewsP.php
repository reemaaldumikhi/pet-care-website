<!DOCTYPE html>
<html lang="en">

<!--head part -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="style.css" type="text/css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>pet care home page</title>
  </head>

  <!-- body part -->
  <body>
<header>
  <nav class="navbar">


      <img class="navbar-logo-header" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" >

<div class="left">
<ul class="navbar-list">
  <li class="navbar-item" >  <a href="PROFILE.php">   <i  class="fa-solid fa-user">    </i></a></li>
   <li class="navbar-item"> <a  href="home2.html">Home</a></li>
   <li class="navbar-item"> <a href="ViewServicesP.html">Services</a></li>
   <li class="navbar-item"> <a href="ReviewsP.php">Reviews</a></li>

</ul>
</div>
  </nav>
</header>

<main>



  <div class="wrapper">
      <div class="container">
          <div class="maxwidth">
              <h1 class="header">All reviews</h1>
              <div class="content">
                <?php
                  $conn = mysqli_connect("localhost", "root", "", "petcare");
                    if($conn -> connect_error) {
                       die ("Connection failed :" . $conn -> connect_error);


                    }

                  $sql =  "SELECT * FROM feedback as f INNER JOIN petappointment as p ON f.appointmentID = p.appointmentID";
                  $result = $conn -> query($sql);

                  if ($result -> num_rows >0)
                  {
                    while ($row = $result -> fetch_assoc()) {
                ?>
                  <div class="service">
                      <div class="box">


                          <p><?php echo $row['feedback'];?></p>
                          <p><a href="mailto:<?php echo $row['pEmail'];?>">Contact <?php echo $row['pName'];?> Owner</a></p>
                      </div>
                  </div>
  <?php } } ?>
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
