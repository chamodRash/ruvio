<?php require_once "controllerUserData.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign-Up | Register for start you own business with us</title>
    <link rel="title icon" href="../Ruvio_LogoPng.ico" type="img/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
        
    <section class="loginPage">    
        <div class="loginContainer" id="loginContainer">
            <div class="signPanel sign-up-panel card">
                <h2>  sign-up</h2>
                <div class="social-links">
                    <li class="social-link facebook"><a href="#"><i class="fa-facebook"></i></a></li>
                    <li class="social-link google"><a href="#"><i class="fa-google"></i></a></li>
                    <li class="social-link linkedin"><a href="#"><i class="fa-linkedin"></i></a></li>
                </div>
                <p>- or use your Email for Register -</p>
                <form class="form" action="loginPage.php" method="POST" autocomplete="">

                    <?php
                        if(count($signupErrors) == 1){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach($signupErrors as $showerror){
                                    echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                        }elseif(count($signupErrors) > 1){
                            ?>
                            <div class="alert alert-danger">
                                <?php
                                foreach($signupErrors as $showerror){
                                ?>
                                    <li><?php echo $showerror; ?></li>
                                    <?php
                                }
                                    ?>
                            </div>
                            <?php
                        }
                            ?>

                    <input class="input-text my-1" type="text" name="name" value="<?php echo $name ?>" placeholder="Enter Your Name *" required>
                    <input class="input-text my-1" type="text" name="email" value="<?php echo $email ?>" placeholder="Enter Your E-mail *" required>
                    <input class="input-text my-1" type="password" name="password" placeholder="Enter a strong password *" required>
                    <input class="input-text my-1" type="password" name="confirmPassword" placeholder="Enter password again for confirm *" required>
                    <input class="btn submit-btn my-1" type="submit" name="registerSubmitBtn" value="sign-up">
                </form>
            </div>

            <div class="signPanel sign-in-panel card">
                <h2>sign-in</h2>
                <div class="social-links">
                    <li class="social-link facebook"><a href="#"><i class="fa-facebook"></i></a></li>
                    <li class="social-link google"><a href="#"><i class="fa-google"></i></a></li>
                    <li class="social-link linkedin"><a href="#"><i class="fa-linkedin"></i></a></li>
                </div>
                <p>- or use your Email for Sign-In -</p>
                <form class="form" action="" method="POST" autocomplete="">
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
                    <div class="input-container">
                        <input class="input-text my-1" id="loginMail" type="text" name="email" value="<?php echo $email ?>" placeholder="Your E-mail *" required>
                        <i class="fa fa-envelope-o"></i>        
                    </div>
                    <div class="input-container">
                        <input class="input-text my-1" id="loginPassword" type="password" name="password" placeholder="Your password *" required>
                        <i class="fa fa-eye" id="passwordIcon"></i>
                    </div>
                    <p><a href="forgotPassword.php">Forgot your password?</a></p>
                    <input class="btn submit-btn my-1" type="submit" name="loginSubmitBtn" value="sign-in">
                </form>
            </div>

            <div class="overlay-container">
                <div class="overlay flex">            
                    <div class="overlay-panel overlay-left">
                        <p>Don't have an account? Then,</p>
                        <h2>Welcome to RUVIO!</h2>
                        <p>To register with us Enter your personal details and Let's start your business</p>
                        <button class="ghost" id="sign-up">sign-up</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <p>Already a member? Then,</p>
                        <h2>Welcome Back!</h2>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="sign-in">sign-in</button>
                    </div>
    
                </div>
            </div>
        </div>
    </section>

    <script>
        // getting Variables
        const signupBtn = document.getElementById('sign-up');
        const signinBtn = document.getElementById('sign-in');
        const loginContainer = document.getElementById('loginContainer');
        const loginPassword = document.getElementById('loginPassword');
        const passwordIcon = document.getElementById('passwordIcon');

        //Switch between sign-in and sign-up panels
        signinBtn.addEventListener("click", () => {
            loginContainer.classList.add('active')
        });
        signupBtn.addEventListener("click", () => {
            loginContainer.classList.remove('active')
        });

        //make password visible when click the eye icon
        passwordIcon.addEventListener("click", () => {
            if (loginPassword.type === "password") {
                loginPassword.type = "text";
                passwordIcon.style.color = "var(--primary-color)";
            } else {
                loginPassword.type = "password";
                passwordIcon.style.color = "#8f8f8f";
            }
        })
    </script>

</body>
</html>