
<?php
$Connect= mysqli_connect('localhost','root','','petcare');
if(!$Connect){

    die(mysqli_error($Connect));
}
session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Request An Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
      <link rel="stylesheet" href="homestyle.css">
    <script src="https://kit.fontawesome.com/8a51ecc388.js" crossorigin="anonymous"></script>
  </head>
  <header>
    <nav class="navbar">


        <img class="navbar-logo-header" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" >

  <div class="left">
  <ul class="navbar-list">
    <li class="pointer"><a href="PROFILE.html" ><i class="fas fa-user" aria-hidden="true"></i>Profile</a>
    <li class="pointer"><a href="AddPet.php" ><i class="fa-solid fa-plus"></i></i>Add Pet</a></li>
<!-- list of pet -->
    <li class="pointer"><a href="petRequests.html" ><i class="fa-solid fa-pen-to-square"></i></i>Appointment Request </a></li>
<!-- my appointments -->
    <li class="pointer"><a href="petAppointments.html" ><i class="fa-solid fa-calendar"></i>My Appointments</a></li>
    <li class="pointer"><a href="MyPets.html" ><i class="fa-brands fa-discourse"></i>My Pets</a></li>
    <li class="pointer"><a href="Logout.php" ><i class="fas fa-address-book"></i>Log Out</a></li>


  </div>
    </nav>
  </header>
<main>
  <body>
      <div class="wrapper">
       <div class="sidebar">

         <ul>


             <li class="pointer"><a href="PROFILE.html" ><i class="fas fa-user" aria-hidden="true"></i>Profile</a>

             <li class="pointer"><a href="PetProfile.html" ><i class="fa-solid fa-plus"></i>Add Pet</a></li>
             <li class="pointer"><a href="petRequests.html" ><i class="fa-solid fa-pen-to-square"></i>Appointment Request </a></li>
       <li class="pointer"><a href="petAppointments.html" ><i class="fa-solid fa-calendar"></i>My Appointments</a></li>

             <li class="pointer"><a href="Request.html" ><i class="fa-solid fa-pen-to-square"></i> Request An Appointment</a></li>
             <li class="pointer"><a href="MyPets.html" ><i class="fa-brands fa-discourse"></i>My Pets</a></li>
             <li class="pointer"><a href="#" ><i class="fas fa-address-book"></i>Log Out</a></li>
      </ul>
       </div>
       <div class="main_content" class="container">
        <div class="maxwidth">
            <div class="header"> Request An Appointment  </div>
     <div class="manageform">


<form class="" action="AddRequestScript.php" method="post">


            <div class="form-group col-md-4">
              <label for="inputState">Service:</label>
              <select required id="inputState" class="form-control" name="service">
                <option selected >Choose...</option>
                <?php

                $sql2="select service from availableappointment";
                $result2= mysqli_query($Connect, $sql2);
                while( $row2=mysqli_fetch_array($result2)){
                  ?>     <option><?php echo $row2['service'];?></option>

                    <?php
                }
                ?>

              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">Pet:</label>
              <select id="inputState" class="form-control" name="pet">
                <option selected>Choose...</option>

                <?php
                $sql="SELECT * FROM pet , petowner WHERE pet.pEmail=petowner.email  ";
                $result= mysqli_query($Connect, $sql);
                while( $row=mysqli_fetch_array($result)){
              ?>     <option><?php echo $row['name'];?></option>


              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="date">Date</label>
              <select id="date" class="form-control" name="date">
                <option selected>Choose...</option>

                <?php
                $sql3="SELECT time FROM availableappointment ";
                $result3= mysqli_query($Connect, $sql3);
                while( $row3=mysqli_fetch_array($result3)){
              ?>     <option><?php echo $row3['date'];?></option>



              </select>
            </div>
             <div class="form-group col-md-4">
            <label for="time">Time: </label><br>
            <input type="hour" required id="time" name="time" value=""><br>

             </div>
             <div class="form-group col-md-4">
          <label for="note">Notes: </label><br>
          <textarea  name="note" id="note"rows="4" cols="36">Enter notes here </textarea>
            <br>
           </div>

          <button type="button"  name="Add" id="Add"class="moreb"class="button">Save</button>
           <a href="petRequests.html" class="moreb"class="button">Back</a>

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
