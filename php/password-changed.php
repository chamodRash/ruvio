<?php require_once "controllerUserData.php"; ?>
<?php
    if($_SESSION['info'] == false){
        header('Location: loginPage.php');  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ruvio | Password Changed</title>
    <link rel="title icon" href="../Ruvio_LogoPng.ico" type="img/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style>
        #password-changed {
        width: 100%;
        height: 100vh;
        position: relative;
        background: linear-gradient(to right,#0cebeb, #20e3b2, #29ffc6);
        }
        #password-changed .Container{
            width: 50%;
            height: 50%;
            text-align: center;
        }
        #password-changed .card {
            padding-bottom: 50px;
            height: fit-content;
        }
        #password-changed h2{
            font-size: 3.25rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-bottom: 20px;
        }
        #password-changed .form .alert{
            width: 90%;
            text-align: center;
            margin: 7.5px auto;
        }
        #password-changed .btn {
            font-weight: bold;
            /* border-radius: 50px; */
        }
        #password-changed .btn:hover {
            scale: 1;
            box-shadow: 2px 2px 7.5px rgba(34, 34, 34, .2);
        }
    </style>

</head>

<body>
    <section class="password-changed flex flex-column" id="password-changed">
        <div class="Container card">
            <h2>Your password is changed</h2>
            <?php 
                if(isset($_SESSION['info'])){
                    ?>
                    <div class="alert alert-success text-center">
                    <?php echo $_SESSION['info']; ?>
                    </div>
                    <?php
                }
            ?>
            <form class="form" action="password-changed.php" method="POST">
                <input class="btn submit-btn my-1" type="submit" name="login-now" value="Login Now">
            </form>
        </div>
    </section>
</body>
</html>