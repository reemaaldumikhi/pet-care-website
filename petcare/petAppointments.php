<!DOCTYPE html>
<html  lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="homestyle.css" type="text/css">
    <script src="https://kit.fontawesome.com/8a51ecc388.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php ?>
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
    <div class="wrapper">
        <div class="sidebar">

        <ul>
            <li class="pointer"><a href="PROFILE.html" ><i class="fas fa-user" aria-hidden="true"></i>Profile</a>
            <li class="pointer"><a href="AddPet.php" ><i class="fa-solid fa-plus"></i></i>Add Pet</a></li>
        <!-- list of pet -->
            <li class="pointer"><a href="petRequests.html" ><i class="fa-solid fa-pen-to-square"></i></i>Appointment Request </a></li>
        <!-- my appointments -->
            <li class="pointer"><a href="petAppointments.html" ><i class="fa-solid fa-calendar"></i>My Appointments</a></li>
            <li class="pointer"><a href="MyPets.html" ><i class="fa-brands fa-discourse"></i>My Pets</a></li>
            <li class="pointer"><a href="Logout.php" ><i class="fas fa-address-book"></i>Log Out</a></li>
        </ul>
    </div>
    <div class="main_content" class="container">
    <div class="maxwidth">
        <div class="header">  Appointments </div>
    <!--box-->
        <div class="grid">

            <div class="service">
            <div class="box">
                <?php include("auth.php"); ?>

            <h3> <a href="petUpcomingApp.php"> Upcoming appointments</a></h3>

        </div>
        </div>
    <div class="service">
        <div class="box">
            <h3> <a href='petPreviousApp.php'> Previous appointments</a></h3>
        </div>
        </div>
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
        <p class="copyrights">All Rights Reserved ??? Pet Care ??? Kingdom of Saudi Arabia ?? 2022</p>
    </div>

    </div>


</footer>

</body>
