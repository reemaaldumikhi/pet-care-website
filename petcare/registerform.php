<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="homestyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="petownervalidation.js"></script>

  <title>Register form</title>
</head>

<body>

<?php
            if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "pet"))
                die("<p>Could not open URL database</p>");



            if (isset($_POST['create'])) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $password = $_POST['Psw'];
                $gender = $_POST['gender'];
                $phone = $_POST['phoneNumber'];
                $img=$_POST['photo'];
                $query = "INSERT INTO petowner (email, password, role , gender, phone, Fname, Lname, photo, code) VALUES('$email', '$password','2', '$gender', '$phone', '$firstName', '$lastName','$img','0')";
                $result = mysqli_query($database, $query);
                if ($result) {
                    header('Location: home2.php');
                }
            }
            ?>


  <header>
    <div class="header">


      <nav class="navbar">

        <div class="navbar-logo-header">
          <img src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" >
        </div>
    <div class="left">
    <ul class="navbar-list">
    <li class="navbar-item"> <a  href="UNhome1.php">Home</a></li>
    <li class="navbar-item"> <a href="UNViewServices.php">Services</a></li>
    <li class="navbar-item"> <a href="UNReviews.php">Reviews</a></li>
    
    <li class="navbar-item" ><a  href="login.php">Log in</a></li>
    <li class="navbar-item" ><a  href="registerform.php">(New PetOwner?)</a></li>
    </ul>
    </div>


      </nav>
    </div>
  </header>


  <main>
    <form class="register-form" action="registerform.php" method="post" id="form">
      <div class="container-register">

  <h1 >Register form</h1>
  <h2 >please fill in the form to create an account</h2>


  <label for="upload">upload profile picture</label>
  <p><input class="uplodphoto" type="file" name="photo" onchange="readURL(this)" accept="image/*"></p>

  <label for="firstName">First name</label>
  <p><input type="text" name="firstName" id="firstName" required ></p>

  <small id="firstName_error">first Name name can not be empty</small>
  <br>

  <label for="lastName">Last name</label>
  <p><input type="text" name="lastName" id="lastName" required ></p>

  <small id="lastName_error">last Name can not be empty</small>
  <br>

  <label for="email">Email</label>
  <p><input type="text" name="email" id="email" pattern="/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/" required></p>

  <small id="email_error">you either enter an empty email
    or your email not written</small>
  <br>


  <label for="phoneNumber">phone number</label>
  <p><input type="text" name="phoneNumber" id="phoneNumber" pattern="[0]{1}[5]{1}[0-9]{8}" required></p>

  <small id="phone_error">you either enter an empty phone number
    or the phone number is not 10 digit!
  </small>
  <br>


  <label for="Psw">Password</label>
  <p><input type="Password" name="Psw" id="Psw" required></p>

  <small id="password_error">error msg</small>
  <br>


  <label for="Psw-repeat">re-enter Password</label>
  <p><input type="Password" name="Psw-repeat" id="Psw-repeat" required></p>

  <small id="re_password_error">repeat your password again</small>
  <br>


  <label for="gender" >Gender </label>
  <p><label for="gender">female <input type="radio" name="gender" value= "female" id="female" checked></label>
    <label for="gender">male <input type="radio" name="gender" value= "male" id="male"></label></p>
    <small id="gender_error">select a gender!</small>
  <br>


   <button type="submit" class="registerbtn" name="create" id="create">Register</button>

        </div>
    </form>
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

<?php
    if (isset($_POST['create'])) {
        if ($_POST['Psw'] != $_POST['Psw-repeat']) {
            echo ("Oops! Password did not match! Try again. ");
        }
    }
    ?>
</body>

</html>
