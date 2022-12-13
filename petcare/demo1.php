<?php

 include_once("db.php");
 // Connection Created Successfully

 session_start();

 $user;
 $email;
 $errors = [];

if (isset($_POST['submitbtn'])) {

 if (isset($_SESSION['identifier'])) {

    if ($_SESSION['role'] == 1)
        $user=1;

    if ($_SESSION['role'] == 2)
    $user=2;

    $email = $_POST['identifier'];
    $_SESSION['identifier'] = $email;

    if($user==1){
        $emailCheckQuery = "SELECT * FROM manager WHERE email = '$email'";
    }
    else{
        $emailCheckQuery = "SELECT * FROM petowner WHERE email = '$email'";
    }

    $emailCheckResult = mysqli_query($Connect, $emailCheckQuery);

    if($emailCheckResult){
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($_POST['password'] != $_POST['confirmPassword']) {
            $errors['password_error'] = 'Password not matched';
        }

        else{

            if($user==1){
                $updatePassword = "UPDATE manager SET password = '$password' WHERE email = '$email'";
            }
            else{
                $updatePassword = "UPDATE petowner SET password = '$password' WHERE email = '$email'";
            }

            $updatePass = mysqli_query($Connect, $updatePassword)

            if($updatePass)
            header('location: login.php');
        }
    }
    else {
        $errors['email'] = 'email is not valid';
    }
}
else {
    $errors['email'] = 'email is empty ';
}

}
?>
