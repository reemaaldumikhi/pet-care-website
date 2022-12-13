<?php
session_start();
if (isset($_SESSION['email'])) {
//manager
    if ($_SESSION['role'] == 1)
        header("Location:home1.php");
//pet owner
    if ($_SESSION['role'] == 2)
        header("Location:home2.php");
}
?>

<!DOCTYPE html>
<html>

<?php
if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "pet"))
    die("<p>Could not open URL database</p>");

if (isset($_POST['login'])) {
    $tybe = $_POST['tybeuser'];
    $email = $_POST['email'];
    $password = $_POST['Psw'];
    if (empty($_POST['email']) || empty($_POST['Psw'])) {
        header("Location: login.php?error=email and password are required");
        exit();
    }

    $query;
    if ($tybe == 2)
        $query = "select * from  petowner WHERE email='$email'AND password='$password'";
    else if ($tybe == 1)
        $query = "select * from manager WHERE email='$email'AND password='$password'";

    $run = mysqli_query($database, $query);

    $numm = mysqli_num_rows($run);
    if ($numm > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['value'] = $tybe;

        if ($tybe == 1) {
            $_SESSION['role'] = 1;
            header("Location:home1.php");
        }
        if ($tybe == 2) {
            $_SESSION['role'] = 2;
            header("Location: home2.php");
        }
    } else {
        header("Location: login.php?error=Wrong Username/Password");
        exit();
    }
}
?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="homestyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>log in</title>
</head>

<body>
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
    <div class="container">



    <form  class="manageform" action="login.php" method="post">
    <?php
   if (isset($_GET['error']))
   echo "<div class='alert' role='alert'>" . $_GET['error'] . "</div>";
?>
      <div class="container-login">

  <h1 >Log in</h1>

  <p><label for="">who are you?</label>
  <select name="tybeuser" id="role">
    <option selected value="2" >Pet owner</option>
    <option value="1" >manager</option>
  </select></p>
<br>
  <label for="email">Email</label>
  <p><input type="text" name="email" id="email" required></p>
<br>
  <label for="Psw">Password</label>
  <p><input type="Password" name="Psw" id="Psw" required></p>

  <br>

  <a href="forgetPass.php">forget password?</a>
  <br> <br>

  <button type="submit" class="loginbtn" name="login">log in</button>
  </div>

  </form>
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
