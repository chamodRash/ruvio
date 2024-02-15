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
    <title>Ruvio | Code Verification</title>
    <link rel="title icon" href="../Ruvio_LogoPng.ico" type="img/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style>
        #reset-otp {
        width: 100%;
        height: 100vh;
        position: relative;
        background: linear-gradient(to right,#0cebeb, #20e3b2, #29ffc6);
        }
        #reset-otp .Container{
            width: 50%;
            height: 50%;
            text-align: center;
        }
        #reset-otp .card {
            padding-bottom: 50px;
            height: fit-content;
        }
        #reset-otp h2{
            font-size: 3.25rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-bottom: 20px;
        }
        #reset-otp .input-container{
            width: 90%;
            margin: 7.5px auto;
            position: relative;
        }
        #reset-otp .form .alert{
            width: 90%;
            margin: 7.5px auto;
        }
        #reset-otp .input-container input{
            width: 100%;
            /* border-radius: 50px; */
        }
        #reset-otp .btn {
            font-weight: bold;
            /* border-radius: 50px; */
        }
        #reset-otp .btn:hover {
            scale: 1;
            box-shadow: 2px 2px 7.5px rgba(34, 34, 34, .2);
        }
    </style>
</head>
<body>
    <section class="reset-otp flex flex-column" id="reset-otp">
        <div class="Container card">
            <h2>Code Verification</h2>
            <form class="form" action="reset-code.php" method="POST" autocomplete="off">
                <?php 
                if(isset($_SESSION['info'])){
                    ?>
                    <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
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
                    <input class="input-text my-1" type="text" name="otp" placeholder="Enter code" required>
                </div>
                <div class="input-container">
                    <input class="btn submit-btn my-1" type="submit" name="check-reset-otp" value="Submit">
                </div>
            </form>
        </div>

    </section>
    
</body>
</html>