<?php include_once ("demo1.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="homestyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>forget password</title>
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
    <li class="navbar-item" ><a  href="login.php">Log in</a></li>
    <li class="navbar-item" ><a  href="registerform.php">(New PetOwner?)</a></li>
    </ul>
    </div>


      </nav>
    </div>


  </header>
  <main>
      <div class="container">
    <div class="container-forget-password">
  <form class="forget-password-form" action="forgetPass.php" method="post">


<h1>Trouble logging in?</h1>
<h2>Enter your email in order to get back into your account.</h2>

<?php
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert"><?php echo $displayErrors; ?></div>
            <?php
                }
              }
            ?>

<p><input type="text" name="identifier" id="identifier" required></p>

<label>new password</label>
<p><input type="text" name="password" id="newpass" required></p>

<label>confirm password</label>
<p><input type="text" name="confirmPassword" id="repeatnewpass" required></p>

<button type="submit" class="submitbtn" name="submitbtn">confirm</button>



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
