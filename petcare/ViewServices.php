<?php session_start(); require_once 'db.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" href="homestyle.css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script src="https://kit.fontawesome.com/8a51ecc388.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <nav class="navbar">
                <img class="navbar-logo-header" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" />

                <div class="left">
                    <ul class="navbar-list">
                        <li class="navbar-item">
                            <a href="vaterinaryprofile.html"> <i class="fa-solid fa-user"> </i></a>
                        </li>
                        <li class="navbar-item"><a href="home1.php">Home</a></li>
                        <li class="navbar-item"><a href="ViewServices.php">Services</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="wrapper">
                <div class="container">
                    <div class="maxwidth">
                        <h1 class="header">our services</h1>
                        <div class="content">
						<?php

						$Select_Services = mysqli_query($Connect,"SELECT * FROM service");
						while($service = mysqli_fetch_assoc($Select_Services)){
							$ServiceName  = $service['name'];
							$servicePrice = $service['price'];
							$photo 		  = $service['photo'];
							$description  = $service['description'];
						?>
                            <div class="service">
                                <div class="box">
                                    <div><img src="./<?php echo $photo; ?>" alt="" /></div>
                                    <h2><?php echo $ServiceName; ?></h2>
                                    <h3><?php echo $servicePrice; ?></h3>
                                    <p class="content_overflow">
                                       <?php echo $description; ?>
                                    </p>
                                </div>
                            </div>
						<?php } ?>
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
                    <a href="https://www.instagram.com/"> <i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/"> <i class="fab fa-twitter"></i></a>
                    <a href="https://ar-ar.facebook.com/"> <i class="fab fa-facebook"></i></a>
                    <a href="mailto:441201157@student.ksu.edu.sa"> <i class="fa-solid fa-envelope"></i></a>
                </div>

                <img class="navbar-logo-footer" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px" height="80px" />

                <div class="footer-rights">
                    <p class="copyrights">All Rights Reserved – Pet Care – Kingdom of Saudi Arabia © 2022</p>
                </div>
            </div>
        </footer>
    </body>
</html>
