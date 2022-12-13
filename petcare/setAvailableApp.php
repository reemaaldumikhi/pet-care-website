<?php
session_start();
require_once 'db.php';
if(isset($_GET['DELETE_APP']) && !empty($_GET['DELETE_APP'])){

	$ID = $_GET['DELETE_APP'];
	$remove_app = mysqli_query($Connect,"DELETE FROM availableappointment WHERE id='$ID'");
	if($remove_app){
		echo '<script>alert("Appointment Removed")</script>';
	}

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Appointment</title>
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
       <div class="main_content" class="container">
        <div class="maxwidth">
            <div class="header"> Manage Appointment </div>

            <table border="1" id="upcoming" >
             <thead>
              <tr>
                <th>Service</th>
                <th>Date</th>
                <th>Time</th>
                <th>manage</th>
            </tr>
            </thead>
                   <tbody>
				<?php
				// Get Services From DB
				$Select_availableappointment = mysqli_query($Connect,"SELECT * FROM availableappointment");
				while($availableappointment = mysqli_fetch_assoc($Select_availableappointment)){
					$App_Email  = $availableappointment['mEmail'];
					$App_Service = $availableappointment['service'];
					$App_date 		  = $availableappointment['date'];
					$App_Time  = $availableappointment['time'];
				?>
                   <tr>
                    <td><?php echo $App_Service; ?></td>
                    <td><?php echo $App_date; ?></td>
                    <td><?php echo $App_Time; ?></td>
                    <td id="editDelete"><a class="editDelete" href="setApp_edit.php?EDIT_APP=<?php echo $availableappointment['id']; ?>">edit</a>/
					<a class="editDelete" href="?DELETE_APP=<?php echo $availableappointment['id']; ?>">delete</a></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
                        <a href="setApp.php" class="moreb"class="button" > Set </a>
                       <a href="manageAppointment.html" class="moreb"class="button">Back</a>

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
