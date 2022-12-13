<!DOCTYPE html>
<html  lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Edit Request</title>
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
    <li class="navbar-item" >  <a href="PROFILE.html">   <i  class="fa-solid fa-user">    </i></a></li>
    <li class="navbar-item"> <a  href="home2.html">Home</a></li>
    <li class="navbar-item"> <a href="ViewServicesP.html">Services</a></li>

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
    <?php include("auth.php"); ?>
        <div class="header">  Edit Request </div>
        <?php
    $conn = mysqli_connect("localhost", "root","","petcare");
    if($conn -> connect_error) {
        die ("Connection failed :" . $conn -> connect_error);
    }
    @$id = $_GET['id'];
    $sql =  "SELECT * from  petappointment where appointmentID =$id ";       
    $result = $conn -> query($sql);
    if ($result -> num_rows >0)
                {
                    while ($row = $result -> fetch_assoc()) 
                    {
?>
<form name="form" method="post" action=""> 
<input type="hidden" name="pEmail" value="<?php echo $row['pEmail'];?>" />
<input name="id" type="hidden" value="<?php echo $row['appointmentID'];?>" />
<input name="status" type="hidden" value="<?php echo $row['status'];?>" />
<input name="mEmail" type="hidden" value="<?php echo $row['mEmail'];?>" />
<p> <input name="pName" type="hidden" style="width: 130px;" value="<?php echo $row['pName'];?>" /></p>
<p> <input type="hidden" name="date" style="width: 130px;"  value="<?php echo $row['date'];?>" /></p>
<p> <input type="hidden"name="time" style="width: 130px;" value="<?php echo $row['time'];?>" /></p>
<p><input type="text" name="notes" value="<?php echo $row['notes'];?>" /></p>
<p><input name="update" type="submit" value="Update" class="button" class="moreb" style="width: 200px;" /></p>
</form>
<?php
                    }
                }
?>
 <?php
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $pEmail=$_POST['pEmail'];
        $mEmail=$_POST['mEmail'];
        $status=$_POST['status'];
        $pName=$_POST['pName'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $notes=$_POST['notes'];
        
        $sql="UPDATE petappointment
        SET  notes='$notes' 
        WHERE appointmentID ='$id' ";
    
        if (!mysqli_query($conn, $sql)) {
        echo "Error: ". mysqli_error($conn);
        }
    }
?>
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