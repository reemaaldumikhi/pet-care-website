<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <title>Feedback</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="homestyle.css" type="text/css">
  <script src="https://kit.fontawesome.com/8a51ecc388.js" crossorigin="anonymous"></script>

    <style>
        textarea {
            border-radius: 10%;
        }

        .button {
            width: fit-content;
        }

    </style>

</head>

<body >

<header>
    <nav class="navbar">

      <img class="navbar-logo-header" src="white_logo_transparent_background.png" alt="petCare-logo" width="80px"
        height="80px">

      <div class="left">
        <ul class="navbar-list">
          <li class="navbar-item"> <a href="PROFILE.html"> <i class="fa-solid fa-user"> </i></a></li>
          <li class="navbar-item"> <a href="home2.html">Home</a></li>
          <li class="navbar-item"> <a href="ViewServicesP.html">Services</a></li>
          <li class="navbar-item"> <a href="ReviewsP.php">Reviews</a></li>
          

        </ul>
      </div>
    </nav>
  </header>

  <main class="feedbackBody">
    <div class="wrapper">
      <div class="sidebar">

        <ul>
          <li class="pointer"><a href="PROFILE.html"><i class="fas fa-user" aria-hidden="true"></i>Profile</a>

          <li class="pointer"><a href="AddPet.html"><i class="fa-solid fa-plus"></i></i>Add Pet</a></li>
          <!-- list of pet -->
          <li class="pointer"><a href="petRequests.html"><i class="fa-solid fa-pen-to-square"></i></i>Appointment Request </a></li>
          <!-- my appointments -->
          <li class="pointer"><a href="petAppointments.html"><i class="fa-solid fa-calendar"></i>My Appointments</a>
          </li>
          <li class="pointer"><a href="MyPets.html"><i class="fa-brands fa-discourse"></i>My Pets</a></li>
          <li class="pointer"><a href="Logout.php"><i class="fas fa-address-book"></i>Log Out</a></li>
        </ul>
      </div>

      <div class="main_content" class="container">
        <div class="maxwidth">

    <div id="panel" class="panel-container">
        <strong>
            How satisfied are you with our<br />
            customer service performance?
        </strong>
        <form  method="post" action="feedback1.php" name="feedback">

            <div class="ratings-container">

                <div class="rating">
                    <input class="ratingRadio" name="rating" type="radio" value="Unhappy"/>
                    <img src="unhappy.png" alt="Unhappy" />
                    <small>Unhappy</small>
                </div>
                <div class="rating">
                    <input class="ratingRadio" name="rating" type="radio" value="Neutral"/>
                    <img src="natural.png" alt="natural" /><br>
                    <small>Neutral</small>
                </div>
                <div class="rating active">
                    <input class="ratingRadio" name="rating" type="radio" value="Happy"/>
                    <img src="happy.png" alt="Happy" />
                    <small>Happy</small>
                </div>

            </div>

            <label>Comments: <br>
                <textarea name="comments" id="" cols="50" rows="10"> </textarea>
            </label>

            <input type="submit" value="Send review" class="button" class="moreb" id="send" name="sendReview">
        </form>
    </div>
    <?php
        $conn=mysqli_connect('localhost','root','',"petcare");

        if(!$conn)
        {
            die('Could not Connect MySql Server:' .mysql_error());
        }
        include("auth.php");
    if(isset($_POST["sendReview"]))
    {
        $rating = $_POST["rating"];

        $comments = $_POST["comments"];
        if(isset($_GET['id']))
        @$id = $_GET['id'];
        else $id=2;


        $sql="INSERT INTO feedback (feedback,rating,appointmentID )
        VALUES ('$comments','$rating','$id') ";

        if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>

</div>
      </div>
    </div>
  </main>


    <script>
        const ratingsEl = document.querySelectorAll(".rating");
        const sendBtn = document.querySelector("#send");

        ratingsEl.forEach((el) => {
            el.addEventListener("click", () => {
                ratingsEl.forEach((innerEl) => {
                    innerEl.classList.remove("active");
                });

                el.classList.add("active");
            });
        });

    </script>



</body>

</html>
