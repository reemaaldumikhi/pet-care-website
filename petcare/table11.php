<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="style.css" type="text/css">
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
   <div class="main_content" class="container">
    <div class="maxwidth">
        <div class="header"> New Appointments </div>


        <table class="table">
          <tr>
            <th style="width:20%">Pet name</th>
            <th style="width:10%">Service</th>
            <th style="width:10%">Date</th>
            <th style="width:10%">Time</th>
            <th style="width:20%">Request</th>
            <th style="width:30%">Contact Owned</th>
          </tr>
          <?php
          $conn = mysqli_connect("localhost", "root", "", "petcare");
          if($conn -> connect_error) {
             die ("Connection failed :" . $conn -> connect_error);


          }

        $sql =  "SELECT * FROM petappointment WHERE status IS NULL OR status = ''";
        $result = $conn -> query($sql);

        if ($result -> num_rows >0)
        {
          while ($row = $result -> fetch_assoc()) {
        ?>

          <tr>
            <td style="width:20%"><?php echo $row["pName"]; ?></td>
            <td style="width:20%"><?php echo $row["service"]; ?></td>
            <td style="width:20%"><?php echo $row["date"]; ?></td>
            <td style="width:20%"><?php echo $row["time"]; ?></td>
            <td style="width:20%">
              <button class="button" style="padding: 0;background-color: #0ec30e;" onclick="setStatus('<?php echo $row['pEmail'];?>','accepted')">Accept</button>
              <button class="button" style="padding: 0;background-color: red;" onclick="setStatus('<?php echo $row['pEmail'];?>','rejected')">Reject</button>
            </td>
            <td style="width:20%"><?php echo $row["pEmail"]; ?></td>
          <tr>

        <?php
          }
        } else {
          echo "0 result";

        }

        $conn -> close();
           ?>

        </table>


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

<script src="set_status.js"></script>




  </body>
</html>
