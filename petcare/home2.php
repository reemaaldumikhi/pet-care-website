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
   <li class="navbar-item"> <a  href="home2.php">Home</a></li>
   <li class="navbar-item"> <a href="ViewServicesP.php">Services</a></li>
   <li class="navbar-item"> <a href="ReviewsP.php">Reviews</a></li>


</ul>
</div>
  </nav>
</header>



<main>










      <div class="main-section">
        <div class="main-text">

          <h1 class="heading">Welcome To Pet Care!</h1>
        </div>
        </div>

        <div class="aboutUs">
           <h1 class="heading">GET TO KNOW US!</h1>
         </div>

         <?php
         require_once 'db.php';


         $SELECT_info = mysqli_query($Connect,"SELECT * FROM `manager` ");
         $Info = mysqli_fetch_assoc($SELECT_info);
         $AbouTusText_v = $Info['aboutus'];
         $OurVision_text = $Info['ourvision'];
         $Location = $Info['location'];
         $Location_URL = $Info['Location_url'];
         $Img_AboutUS = $Info['aboutus_img'];
         $Img_OurVisiion = $Info['ourvision_img'];

         ?>
         <h2 style="text-align:center"> </h2>
         <div class="row">
           <div class="content" >
             <div class="column">
               <div class="card">


                      <div class="container">
                        <img src="./<?php echo $Img_AboutUS ?>" alt="dog and a cat"  class="img">
                       <h2 class="inner-title">About us</h2>
                       <p class="title"></p>
                       <p class="paragraph"><?php echo $AbouTusText_v; ?>
                       </p>
                     </div>


               </div>
             </div>

      <div class="column">
      <div class="card">


        <div class="container">
          <img src="./<?php echo $Img_OurVisiion ?>" alt="doctors with dog " class="img">

          <h2 class="inner-title">Our vision</h2>
          <p class="title"></p>
          <p class="paragraph"><?php echo $OurVision_text; ?>
             <br><br><br>
          </p>
        </div>

      </div>
      </div>
      <div class="column">
      <div class="card">

        <div class="container">
            <iframe src="<?php echo $Location_URL; ?>"
          width="600" height="450" style="border:0;"
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <h2 class="inner-title">Location:</h2>
          <p class="title"></p>
        <p class="paragraph"><?php echo $Location; ?></p>
        </div>

      </div>
      </div>



           </div>

         </div>


       </div>
       </div>
       </main>


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
