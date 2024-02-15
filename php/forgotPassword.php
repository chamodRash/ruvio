<?php require_once "controllerUserData.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ruvio | Forgot Password</title>
    <link rel="title icon" href="../Ruvio_LogoPng.ico" type="img/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style>
        #forgotPassword {
            width: 100%;
            height: 100vh;
            position: relative;
            background: linear-gradient(to right,#0cebeb, #20e3b2, #29ffc6);
        }
        #forgotPassword .Container{
            width: 50%;
            height: 50%;
            text-align: center;
        }
        #forgotPassword .card {
            padding-bottom: 50px;
            height: fit-content;
        }
        #forgotPassword h2{
            font-size: 3.25rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-bottom: 20px;
        }
        #forgotPassword .input-container{
            width: 90%;
            margin: 7.5px auto;
            position: relative;
        }
        #forgotPassword .input-container:focus i{
            color: var(--primary-color);
        }
        #forgotPassword .input-container input{
            width: 100%;
            /* border-radius: 50px; */
        }
        #forgotPassword .input-container i{
            position: absolute;
            font-size: 1.75rem;
            color: #8f8f8f;
            right: 25px;
            top: 22.5px;
            cursor: pointer;
        }
        #forgotPassword .btn {
            font-weight: bold;
            /* border-radius: 50px; */
        }
        #forgotPassword .btn:hover {
            scale: 1;
            box-shadow: 2px 2px 7.5px rgba(34, 34, 34, .2);
        }

    </style>
</head>
<body>
    <div class="forgotPassword flex flex-column" id="forgotPassword">
        <section class="Container card">
            <h2>Forgot Password?</h2>
            <p>If you don't remember your password. Don't worry. Enter your Email address and we will mail you the password reset link to below gmail</p>

            <?php
                if(count($errors) > 0){
                    ?>
                    <div class="alert alert-danger text-center">
                        <?php 
                            foreach($errors as $error){
                                echo $error;
                            }
                        ?>
                    </div>
                    <?php
                }
            ?>

            <form class="form" method="POST" action="forgotPassword.php">
                <div class="input-container">
                    <input class="input-text my-1" id="resetMail" type="text" name="email" placeholder="Enter Your Registered E-mail *" required>
                    <i class="fa fa-envelope-o"></i>        
                </div>
                <input name="check-email" class="btn submit-btn my-1" id="resetPasswordBtn" type="submit" value="Send me the password reset link">
            </form>
        </section>      
    </div>
</body>
</html>