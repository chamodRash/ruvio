<?php 
session_start();
include "config.php";
$email = "";
$name = "";
$errors = array();
$signupErrors = array();

//if user Sign-Up button
if(isset($_POST['registerSubmitBtn'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);
    // Check the name validation
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $signupErrors['name'] = "Only letters and white space allowed";
    }
    // Check the E-mail validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $signupErrors['email'] = "Invalid email format";
    }
    // Check the Password validation
    if (strlen($_POST["password"]) <= '8') {
        $signupErrors['password'] = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#", $password)) {
        $signupErrors['password'] = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#", $password)) {
        $signupErrors['password'] = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#", $password)) {
        $signupErrors['password'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    elseif(!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $password)) {
        $signupErrors['password'] = "Your Password Must Contain At Least 1 Special Character !";
    }
    // Check password and confirm password are the same
    if($password !== $cpassword){
        $signupErrors['password'] = "Confirm password not matched!";
    }
    // Find the email is already exist or not...
    $email_check = "SELECT * FROM login WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $signupErrors['email'] = "Email that you have entered is already exist!";
    }
    // Enter the user data into the database
    if(count($signupErrors) === 0){
        $encpass = password_hash($password, PASSWORD_DEFAULT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO login (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        // Mail the OTP code
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: cnilwakka@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $signupErrors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $signupErrors['db-error'] = "Failed while inserting data into database!";
        }
    }
}

//if user click verification code submit button
if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    if (is_numeric($otp_code)) {
        $check_code = "SELECT * FROM login WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE login SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    } else {
        $errors['otp-error'] = "Please, Enter the given number code!";
    }
}

//if user click login button
if(isset($_POST['loginSubmitBtn'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM login WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            //echo '$status';
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if($status == 'verified'){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: home.php');
            }else{
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    }else{
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}

//if user click continue button in forgot password form
if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM login WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE login SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query){
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: shahiprem7890@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }else{
        $errors['email'] = "This email address does not exist!";
    }
}

//if user click check reset otp button
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    if (is_numeric($otp_code)) {
        $check_code = "SELECT * FROM login WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    
    } else {
        $errors['otp-error'] = "Please, Enter the given number code!";
    }   
}

//if user click change password button
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    // Check the Password validation
    if (strlen($_POST["password"]) <= '8') {
        $errors['password'] = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#", $password)) {
        $errors['password'] = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#", $password)) {
        $errors['password'] = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#", $password)) {
        $errors['password'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    elseif(!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $password)) {
        $errors['password'] = "Your Password Must Contain At Least 1 Special Character !";
    }
    // Check the password and confirm password are same
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE login SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if($run_query){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

//if login now button click
if(isset($_POST['login-now'])){
    header('Location: loginPage.php');
}


?>
