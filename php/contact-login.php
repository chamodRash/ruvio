<?php 
    if(isset($_POST['yes'])){
        header('location: loginPage.php');
        exit();
    }
    if(isset($_POST['no'])){
        header('location: ../index.html');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ruvio | Wanna Sign-Up!</title>
    <link rel="title icon" href="../Ruvio_LogoPng.ico" type="img/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style>
        #contact-login {
        width: 100%;
        height: 100vh;
        position: relative;
        background: linear-gradient(to right,#0cebeb, #20e3b2, #29ffc6);
        }
        #contact-login .Container{
            width: 50%;
            height: 50%;
            text-align: center;
        }
        #contact-login .card {
            padding-bottom: 50px;
            height: fit-content;
        }
        #contact-login h2{
            font-size: 3.25rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-bottom: 20px;
        }
        #contact-login .form .alert{
            width: 90%;
            text-align: center;
            margin: 7.5px auto;
        }
        #contact-login .btn {
            font-weight: bold;
            /* border-radius: 50px; */
        }
        #contact-login .no {
            background: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }
        #contact-login .btn:hover {
            scale: 1;
            box-shadow: 2px 2px 7.5px rgba(34, 34, 34, .2);
        }
        #contact-login p{
            font-family: 'poppins', sans-serif;
            letter-spacing: .5px;
            padding-bottom: 20px;
        }
    </style>

</head>

<body>
    <section class="flex flex-column" id="contact-login">
        <div class="Container card">
            <h2>Wanna Sign-Up!!!</h2>
            <p>Thank you for contacting with us. But, we foundout that you haven't Sign-Up with us yet. Wanna get <span>Sign-Up</span> with us</p>
            <form class="form" action="" method="POST">
                <input class="btn submit-btn yes my-1" type="submit" name="yes" value="Yes, Let's GO">
                <input class="btn submit-btn no my-1" type="submit" name="no" value="No, I don't wanna Sign-Up">
            </form>
        </div>
    </section>
</body>
</html>