<?php
    include_once("connection.php");
    // Connection Created Successfully

    session_start();

    $user;

    if (isset($_SESSION['identifier'])) {
            if ($_SESSION['role'] == 1)
                $user='manager';
        //pet owner
            if ($_SESSION['role'] == 2)
            $user='petowner';}

    // Store All Errors
    $errors = [];
    
// if forget btn is pressed
    if (isset($_POST['forgot_password'])) {
        $email = $_POST['identifier'];
        $_SESSION['identifier'] = $email;

        if($user=='manager'){
            $emailCheckQuery = "SELECT * FROM manager WHERE email = '$email'";
        }
        else{
            $emailCheckQuery = "SELECT * FROM petowner WHERE email = '$email'";
        }
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

                // if query run
                if ($emailCheckResult) {
                    // if email matched
                    if (mysqli_num_rows($emailCheckResult) > 0) {
                        $code = rand(999999, 111111);

                        if($user=='manager'){
                            $updateQuery = "UPDATE manager SET code = $code WHERE email = '$email'";
                        }
                        else{
                            $updateQuery = "UPDATE petowner SET code = $code WHERE email = '$email'";
                        }

                        $updateResult = mysqli_query($conn,$updateQuery);

                        if($updateResult){
                            $mail = new PHPMailer();
                            $mail-> isSMTP();
                            $mail-> SMTPAuth=true;
                            $mail-> SMTPSecure = 'ssl';
                            $mail-> Host= 'smtp@gmail.com';
                            $mail-> Port= ='465';
                            $mail-> isHTML();
                            $mail-> Username = 'petcare381@gmail.com';
                            $mail-> password = 'lAmA2001';
                            $mail->SetFrom('no-reply@petcare.com');
                            $mail->Subject ="did you ask for resting your password?";
                            $mail-> Body = "you verification code is $code";
                            $mail-> AddAdress($email);
                            
                            
                            if($mail->Send()){
                                $message = "we have sent a verification code to your email <br>";
                                $_SESSION['message']=$message;
                                header('Location:emailverification.php');
                            }else{
                                $errors['otp_errors']='failed sending code';
                            }
                        }

else {
                            $errors['db_errors'] = "Failed while inserting data into database!";
                        }
                    }
                        else{
                            $errors['invalidEmail'] = "Invalid Email Address";
                        }
                    else {
                        $errors['db_error'] = "Failed while checking email from database!";
                    }
              }

            }

//if verify button is pressed 
if (isset($_POST['verify'])) {
    $_SESSION['message'] = "";
    $otp = mysqli_real_escape_string($conn, $_POST['otp']);

    if($user=='manager'){
        $otp_query = "SELECT * FROM manager WHERE code = $otp";
    }
    else{
        $otp_query = "SELECT * FROM petowner WHERE code = $otp";
    }
   
    $otp_result = mysqli_query($conn, $otp_query);

    if (mysqli_num_rows($otp_result) > 0) {
        $fetch_data = mysqli_fetch_assoc($otp_result);
        $fetch_code = $fetch_data['code'];

        $update_code = 0;

        if($user=='manager'){
            $update_query = "UPDATE manager SET code = $update_code WHERE code = $fetch_code";
        }
        else{
            $update_query = "UPDATE petowner SET code = $update_code WHERE code = $fetch_code";
        }
       
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            header('location: newpass.php');
        } else {
            $errors['db_error'] = "Failed To Insering Data In Database!";
        }
    } else {
        $errors['otp_error'] = "You enter invalid verification code!";
    }
}

//if confirm is pressed 
if(isset($_POST['confirm'])){
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    
   
        // if password not matched so
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $errors['password_error'] = 'Password not matched';
        } else {
            $email = $_SESSION['email'];

            if($user=='manager'){
                $updatePassword = "UPDATE manager SET password = '$password' WHERE email = '$email'";
            }
            else{
                $updatePassword = "UPDATE petowner SET password = '$password' WHERE email = '$email'";
            }

            $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
            session_unset($email);
            session_destroy();
            header('location: login.php');
        }
    
}

    ?>