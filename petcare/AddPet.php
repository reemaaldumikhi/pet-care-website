

<?php
include("auth.php");
$Connect= mysqli_connect('localhost','root','','pet');
if(!$Connect){

    die(mysqli_error($Connect));
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>manage</title>
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
            <li class="navbar-item" >  <a href="PROFILE.html">   <i  class="fa-solid fa-user">    </i></a></li>
             <li class="navbar-item"> <a  href="home2.html">Home</a></li>
             <li class="navbar-item"> <a href="ViewServicesP.html">Services</a></li>
             <li class="navbar-item"> <a href="ReviewsP.php">Reviews</a></li>
             

          </div>
            </nav>
          </header>
          <main>
      <div class="wrapper">
       <div class="sidebar">


         <ul>


             <li class="pointer"><a href="PROFILE.php" ><i class="fas fa-user" aria-hidden="true"></i>Profile</a>

             <li class="pointer"><a href="AddPet.php" ><i class="fa-solid fa-plus"></i>Add Pet</a></li>
             <li class="pointer"><a href="petRequests.html" ><i class="fa-solid fa-pen-to-square"></i>Appointment Request </a></li>
       <li class="pointer"><a href="petAppointments.php" ><i class="fa-solid fa-calendar"></i>My Appointments</a></li>
             <li class="pointer"><a href="Request.php" ><i class="fa-solid fa-pen-to-square"></i>Request An Appointment</a></li>
             <li class="pointer"><a href="MyPets.php" ><i class="fa-brands fa-discourse"></i>My Pets</a></li>
             <li class="pointer"><a href="Logout.php" ><i class="fas fa-address-book"></i>Log Out</a></li>
</ul>
       </div>
       <div class="main_content" class="container">
        <div class="maxwidth">


            <div class="header"> My Pet Profile </div>

<div class="manageform">



              <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container">
              <form action ="AddPet" method="post">


              <div class="row">

                                  <div class="row">
                              <div class="col">
                              <div class="mb-3">

                              <label  class="form-label">Photo:</label>

                                          <input type="file" id="file" required name="image" >


                                </div>
                                </div>

                                                            </div>

                                  <div class="col-12">
                                      <div class="row">
                                        <div class="col">
                       <div class="mb-3">
                         <label for="firstname" class="form-label">Pet name:</label>
                                              <input type="text" name="name" required class="form-control" required id="firstname" >
                                          </div>
                                        </div>
                                        <div class="col">

                                              <label for="date" class="form-label">Pet Birthday:</label>
                                              <input type="date" required id="date" name="date" class="form-control"  >
                                          </div>
          </div>
          </div>
            </div>


          <div class="mb-3">
        <label for="type1" class="form-label">Breed: </label>
      <input type="text" required name="breed" class="form-control" id="type1">
      </div>

                                      <div class="mb-3">
                                          <label for="type" class="form-label">My Gender:</label>
                                          <select id="type" required name="gender"class="form-select" aria-label="Default select example">
                                              <option  disabled selected >pet gender..</option>
                                              <option value="1">Male</option>
                                              <option   value="2">Female</option>
                                          </select>
                                      </div>

                                      <div class="mb-3">
                                          <label for="type" class="form-label">status:</label>
                                          <select   class="form-select" required aria-label="Default select example" name="status">
                                              <option  disabled selected>Pet's Status..</option>
                                              <option value="1">Spayed</option>
                                              <option  value="2">neutered</option>
                                          </select>
                                      </div>

                                      <lable for="file1">medical history / vaccination </lable>
                                      <input type="file" id="file1" name="file1">

                                   <button type="submit" name="Add" class="moreb">Add</button>

                                  </div>
                              </div>
                                </div>
</form>
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
       <p class="copyrights">All Rights Reserved – Pet Care – Kingdom of Saudi Arabia © 2022</p>
           </div>

    </div>



                                       </footer>





  </body>
</html>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //  pre_r($_FILES);


    if ( !( $Connect = mysqli_connect( "localhost", "root", "", "pet") ) )
       die( "<p>error connecting to database</p>" );

    if ( !mysqli_select_db( $Connect, "pet") )
       die( "<p>error  opening URL database</p>" );

       $Name=$_POST['name'];
       $gender=$_POST['gender'];
       $status=$_POST['status'];
       $breed=$_POST['breed'];
       $date=$_POST['date'];
       $file1=$_POST['file1'];

       //file upload
$files=$_FILES['file1']['name'];
$type=$_FILES['file1']['type'];
$size=$_FILES['file1']['size'];
$f_tem_loc=$_FILES['file1']['tmp_name'];

//photo upload
$image=$_FILES['photo']['name'];
$i_tem_loc=$_FILES['photo']['tmp_name'];
$store='uploads/';
$mpve=move_uploaded_file($f_tem_loc, $store.$files);
$move2=move_uploaded_file($i_tem_loc, $store.$image);


$po=$_SESSION['email'];
    $query="INSERT INTO pet( ID, name, gender,Bdate,breed ,status, photo , medicalH ,vaccination) VALUES ('".$Name."','".$gender."','". date."','". breed."','".$status."','".$image."','".$files."','".$file1."')";
    $result=mysqli_query($Connect, $query);

    mysqli_close($Connect);
    if($result){
   header("location: MyPets.php");

ob_end_flush();
    }

    else{
        echo "An error occured .";}
}






?>
