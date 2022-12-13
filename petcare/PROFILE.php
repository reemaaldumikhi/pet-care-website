<?php
ob_start();

include("auth.php");
$Connect= mysqli_connect('localhost','root','','petcare');
if(!$Connect){

    die(mysqli_error($con));
}
session_start();



$Email=$_SESSION['email'];

$qry = "select * from petowner where email = $Email ";
$run=$Connect->query($qry);
if(!empty($run->num_rows)&&($run->num_rows > 0)){

  while ($row = $run -> fetch_assoc()){

  $email =$row['email'];
  $password =$row['password'];
  $gender =$row['gender'];
  $phone =$row['phone'];
  $firstname =$row['Fname'];
  $lastname =$row['Lname'];
  $photo=$row['photo'];


  }



 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>profile</title>
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

    </div>
      </nav>
    </header>
<main>
      <div class="wrapper">
       <div class="sidebar">

                  <ul>


                      <li class="pointer"><a href="PROFILE.html" ><i class="fas fa-user" aria-hidden="true"></i>Profile</a>

                      <li class="pointer"><a href="AddPet.html" ><i class="fa-solid fa-plus"></i>Add Pet</a></li>
                      <li class="pointer"><a href="petRequests.html" ><i class="fa-solid fa-pen-to-square"></i>Appointment Request </a></li>
                <li class="pointer"><a href="petAppointments.html" ><i class="fa-solid fa-calendar"></i>My Appointments</a></li>
                      <li class="pointer"><a href="Request.html" ><i class="fa-solid fa-pen-to-square"></i>Request An Appointment</a></li>
                      <li class="pointer"><a href="MyPets.html" ><i class="fa-brands fa-discourse"></i>My Pets</a></li>
                      <li class="pointer"><a href="#" ><i class="fas fa-address-book"></i>Log Out</a></li>
         </ul>
       </div>
       <div class="main_content" class="container">
        <div class="maxwidth">
            <div class="header"> My Profile </div>




            <div class="manageform">

                       <div class="p-5 mb-4 bg-light rounded-3">
                       <div class="container">
                       <div class="row">
                       <div class="col-12">

                     <p class="fs-4"><strong> Manage My Profile.</strong></p>
                  </div>
 <!-- View profile & edit form -->

 <?php
                if(isset($_GET['erreur'])){

                        echo "<p style='color:red'>This email is already in use, please try a different one.</p>";

				}
				 if(isset($_GET['sucess'])){

                        echo "<p style='color:green'>Your account has been successfully updated</p>";
                }
                ?>
 <form action ="PROFILE.php" method="POST" enctype="multipart/form-data">
<div class ="service">
   <div class="box">
   <img scr="uploads/<?php echo $photo;?>" class="image">
   <div class="row">
     <input type="file" name="photo" onchange="display(this)" id="photo" style="display:none; position: absolute;left:-40%;">
</div></div>



          <div class="row">
          <div class="col">
          <div class="mb-3">
          <label for="firstname" class="form-label">First name:</label>

          <input type="text" class="form-control" name="firstName" id="FirstName"  value="<?php echo $firstname; ?>">

          </div>
          </div>
          <div class="col">
         <div class="mb-3">
         <label for="lastname" class="form-label">Last name:</label>
          <input type="text" class="form-control" required name="lastname" id="LastName" value="<?php echo $lastname; ?>">
          </div>
          </div>
        </div>
          <div class="row">
            <div class="col">
         <div class="mb-3">
         <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" required name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="must be valid email" id="email" value="<?php echo $email; ?>" >
      </div></div>
      <div class="col">
       <div class="mb-3">
       <label for="Phone" class="form-label">Phone:</label>
      <input type="text" class="form-control" required name="phone" id="Phone"pattern="[0-9]{10}" maxlength="12" title="Ten digits only" value="<?php echo $phone;?>" >
    </div></div></div>
                     <div class="row">
                 <div class="col">
  <div class="mb-3">
 <label for="password" class="form-label">Password:</label>
 <input type="password" required class="form-control" name="password" id="password"value="<?php echo $password; ?>"  />
  </div>
  </div>
  <div class="col">
  <div class="mb-3">
  <label for="password_confirm" class="form-label">Confirm Password:</label>
  <input type="password" class="form-control" required name="ConfirmPassword"id="confirm_password" onkeyup='check();' />
  <span id='message'></span>
  </div>
  </div>
  </div>

  <div class="row">
<div class="col">
<div class="mb-3">
  <label for="type" class="form-label"> Gender:</label>
  <select required name="gender" id="type" class="form-select" aria-label="Default select example" >
  <option selected disabled><?php echo $gender; ?>
</option>
  <option value="1">Male</option>
  <option  value="2">Female</option>

  </select>
</div>
</div>
</div>

<div class ="sub,it-btn">
<button type="submit" class="moreb" id="edit" name="edit">Edit</button>
<button type="submit" class="moreb" id="delete" name="delete" onclick="return Confirm('Are you sure </3 ?')" >Delete</button>
              </div>
</form>




  </div>
  </div>
  </div>


 </div>

  </div>
  </div>
</div>
<script src="validate.js"></script>


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

<script src="validate.js"></script>
</body>

<?php

$Email=$_SESSION['email'];
if(isset($_POST['edit'])){


  $email =$POST['email'];
  $password =$POST['password'];
  $gender =$POST['gender'];
  $phone =$POST['phone'];
  $firstname =$POST['firstname'];
  $lastname =$POST['lastname'];
  $photo=$POST['photo'];


   if($email!=$Email){
     $sql = "select count(*) as total from petowner WHERE email='$email'";
         $Connect->query($sql);
        $result = $Connect->query($sql);

           $row = $result->fetch_assoc();
             $emailerror =$row['total'];



      if($emailerror!=1 ){

    /*   $query = "update petowner set email='$email' , password='$password', gender='$gender', phone='$phone', Fname='$firstname', Lname='$lastname' WHERE email='$Email' ";
       $result=mysqli_query($Connect , $query);
           $Connect->query($result);*/
         $_SESSION['email'] = $email;


         if (!file_exists($_FILES['photo']['tmp_name'])|| !is_uploaded_file($_FILES['photo']['tmp_name'])){
             echo 'no uploads';
             $image=$photo;

         $qry="update petowner set email='$email' , password='$password', gender='$gender', phone='$phone', Fname='$firstname', Lname='$lastname' WHERE email='$Email' ";


            $result=mysqli_query($Connect , $qry);
            if ($result)
            {
              echo '<script>alert("Successfully updated");</script>';
            }
         else{echo mysqli_query($Connect);

         }

         }
         else {
         echo 'upload';
         $image=$_FILES["image"]["name"];
         $image_tmp=$_FILES["image"]["tmp_name"];
         $dir='uploads/';
         $move=move_uploaded_file($image_tm, $dir.$image);

         $qry="update petowner set email='$email' , password='$password', gender='$gender', phone='$phone', Fname='$firstname', Lname='$lastname',photo='$image' WHERE email='$Email' ";

         $result=mysqli_query($Connect,$qry);
         if(!$result){

         echo mysqli_error($Connect);
       }else{
      header('Location: newww.php?sucess');
    } } }
    else{

      header('Location: PROFILE.php?erreur');
      }


 } }


?>
<script>
function display() {
  document.getElementById("photo").style.visibility = "visible";
}

 function check (){
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
</html>
