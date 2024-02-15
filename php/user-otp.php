<?php require_once "controllerUserData.php"; ?>
<?php 
    $email = $_SESSION['email'];
    if($email == false){
    header('Location: loginPage.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP Verification</title>
    <link rel="title icon" href="../Ruvio_LogoPng.ico" type="img/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style>
        #signupOTP {
            width: 100%;
            height: 100vh;
            position: relative;
            background: linear-gradient(to right,#0cebeb, #20e3b2, #29ffc6);
        }
        #signupOTP .Container{
            width: 50%;
            height: 50%;
            text-align: center;
        }
        #signupOTP .card{
            height: fit-content;
        }
        #signupOTP .btn {
            font-weight: bold;
            /* border-radius: 50px; */
        }
        #signupOTP .btn:hover {
            scale: 1;
            box-shadow: 2px 2px 7.5px rgba(34, 34, 34, .2);
        }


    </style>
</head>
<body>
    <div class="signupOTP flex flex-column" id="signupOTP">
        <div class="Container card">
            <form class="form" action="user-otp.php" method="POST" autocomplete="off">
                <h2>Code Verification</h2>
                <?php 
                if(isset($_SESSION['info'])){
                    ?>
                    <div class="alert alert-success text-center">
                        <?php echo $_SESSION['info']; ?>
                    </div>
                    <?php
                }
                ?>
                <?php
                if(count($errors) > 0){
                    ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        foreach($errors as $showerror){
                            echo $showerror;
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
                <input class="input-text my-1" type="text" name="otp" placeholder="Enter verification code" required>
                <input class="btn submit-btn my-1" type="submit" name="check" value="Submit">
            </form>
        </div>
    </div>
    
</body>
</html>