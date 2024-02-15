<?php 
session_start();
include "config.php";
$errors = array();

if(isset($_POST['send-msg'])){
    
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $content = mysqli_real_escape_string($con, $_POST['msg']);
    $subject = "Business message from website";
    $toEmail = "ruvio.eservices@gmail.com";
    $mailHeaders = "From: " . $name . "<". $email .">\r\n";

    if(mail($toEmail, $subject, $content, $mailHeaders)) {
        $info = "Thank you for contacting with us. Your message is received successfully. - Mr/Mrs. $name";
        $_SESSION['info'] = $info;
    }

    $sql = "INSERT INTO contact (name, email, content) VALUES ('" . $name. "', '" . $email. "','" . $content. "')";
    $res = mysqli_query($con, $sql);

    $_SESSION['email'] = $email;
}

if(isset($_POST['ok'])){
    $email = $_SESSION['email'];
    $email_check = "SELECT * FROM login WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        header('location: ../index.html');
        exit();
    } else {  
        header('location: contact-login.php');
        exit();
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ruvio | Message Sent!</title>
    <link rel="title icon" href="../Ruvio_LogoPng.ico" type="img/x-icon">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style>
        #contact {
        width: 100%;
        height: 100vh;
        position: relative;
        background: linear-gradient(to right,#0cebeb, #20e3b2, #29ffc6);
        }
        #contact .Container{
            width: 50%;
            height: 50%;
            text-align: center;
        }
        #contact .card {
            padding-bottom: 50px;
            height: fit-content;
        }
        #contact h2{
            font-size: 3.25rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-bottom: 20px;
        }
        #contact .form .alert{
            width: 90%;
            text-align: center;
            margin: 7.5px auto;
        }
        #contact .btn {
            font-weight: bold;
            /* border-radius: 50px; */
        }
        #contact .btn:hover {
            scale: 1;
            box-shadow: 2px 2px 7.5px rgba(34, 34, 34, .2);
        }
    </style>

</head>

<body>
    <section class="flex flex-column" id="contact">
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
            <form class="form" action="contact.php" method="POST">
                <input class="btn submit-btn my-1" type="submit" name="ok" value="OK">
            </form>
        </div>
    </section>
</body>
</html>