<!DOCTYPE html>
<html  lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Upcoming Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="homestyle.css" type="text/css">
    <script src="https://kit.fontawesome.com/8a51ecc388.js" crossorigin="anonymous"></script>


</head>

<body>

    <header>
    <nav class="navbar">


    <img class="navbar-logo-header" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" >

    <div class="left">
    <ul class="navbar-list">
    <li class="navbar-item" >  <a href="PROFILE.html">   <i  class="fa-solid fa-user">    </i></a></li>
    <li class="navbar-item"> <a  href="home2.html">Home</a></li>
    <li class="navbar-item"> <a href="ViewServicesP.html">Services</a></li>
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

    <li class="pointer"><a href="AddPet.html" ><i class="fa-solid fa-plus"></i></i>Add Pet</a></li>
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

<table border="1" id="upcoming" >
    <thead>
    <tr>
    <th>Pet</th>
    <th>Service</th>
    <th>Date</th>
    <th>Time</th>
</tr>
</thead>
<?php
    $conn = mysqli_connect("localhost", "root","","petcare");
    if($conn -> connect_error) {
    die ("Connection failed :" . $conn -> connect_error);
    }
    include("auth.php");
    $petEmail= $_SESSION['email'];
    $sql =  "SELECT * from  petappointment,petowner where petowner.email=$petEmail and status='accepted' ";
    //=================


            $result = $conn -> query($sql);

            if ($result -> num_rows >0)
            {
                while ($row = $result -> fetch_assoc())
                {
                echo "<tr><td>". $row["pName"]. "</td>
                <td>". $row["service"]. "</td>
                <td>".$row["date"]. "</td>
                <td>".$row["time"]. "</td>
                </tr>";
                }
            }

        $conn -> close();
?>
</table>

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

</html>
