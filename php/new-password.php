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
    <title>Ruvio | New Password</title>
    <link rel="title icon" href="../Ruvio_LogoPng.ico" type="img/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style>
        #new-password {
        width: 100%;
        height: 100vh;
        position: relative;
        background: linear-gradient(to right,#0cebeb, #20e3b2, #29ffc6);
        }
        #new-password .Container{
            width: 50%;
            height: 50%;
            text-align: center;
        }
        #new-password .card {
            padding-bottom: 50px;
            height: fit-content;
        }
        #new-password h2{
            font-size: 3.25rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-bottom: 20px;
        }
        #new-password .input-container{
            width: 90%;
            margin: 7.5px auto;
            position: relative;
        }
        #new-password .form .alert{
            width: 90%;
            text-align: center;
            margin: 7.5px auto;
        }
        #new-password .input-container input{
            width: 100%;
            margin: 7.5px auto;
            position: relative;
        }
        #new-password .btn {
            font-weight: bold;
            /* border-radius: 50px; */
        }
        #new-password .btn:hover {
            scale: 1;
            box-shadow: 2px 2px 7.5px rgba(34, 34, 34, .2);
        }
        .input-container:focus i{
            color: var(--primary-color);
        }
        .input-container i{
            position: absolute;
            font-size: 1.75rem;
            color: #8f8f8f;
            right: 25px;
            top: 22.5px;
            cursor: pointer;
        }
    </style>

</head>
<body>
    <section class="new-password flex flex-column" id="new-password">
        <div class="Container card">
            <form class="form" action="new-password.php" method="POST" autocomplete="off">
                <h2>New Password</h2>
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
                <div class="input-container">
                    <input class="input-text my-1" id="reset-password-1" type="password" name="password" placeholder="Create new password" required>
                    <i class="fa fa-eye" id="passwordIcon1"></i>
                </div>
                <div class="input-container">
                    <input class="input-text my-1" id="reset-password-2" type="password" name="cpassword" placeholder="Confirm your password" required>
                    <i class="fa fa-eye" id="passwordIcon2"></i>
                </div>
                <input class="btn submit-btn my-1" type="submit" name="change-password" value="Change Password">
            </form>
        </div>
    </section>

    <script>
        // getting Variables
        const loginPassword1 = document.getElementById('reset-password-1');
        const loginPassword2 = document.getElementById('reset-password-2');
        const passwordIcon1 = document.getElementById('passwordIcon1');
        const passwordIcon2 = document.getElementById('passwordIcon2');

        //make password visible when click the eye icon
        passwordIcon1.addEventListener("click", () => {
            if (loginPassword1.type === "password") {
                loginPassword1.type = "text";
                passwordIcon1.style.color = "var(--primary-color)";
            } else {
                loginPassword1.type = "password";
                passwordIcon1.style.color = "#8f8f8f";
            }
        })
        passwordIcon2.addEventListener("click", () => {
            if (loginPassword2.type === "password") {
                loginPassword2.type = "text";
                passwordIcon2.style.color = "var(--primary-color)";
            } else {
                loginPassword2.type = "password";
                passwordIcon2.style.color = "#8f8f8f";
            }
        })
    </script>

</body>
</html>