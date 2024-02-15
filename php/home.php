<?php require_once "controllerUserData.php"; ?>
<?php 
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if($email != false && $password != false){
        $sql = "SELECT * FROM login WHERE email = '$email'";
        $run_Sql = mysqli_query($con, $sql);
        if($run_Sql){
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $status = $fetch_info['status'];
            $code = $fetch_info['code'];
            if($status == "verified"){
                if($code != 0){
                    header('Location: reset-code.php');
                }
            }else{
                header('Location: user-otp.php');
            }
        }
    }else{
        header('Location: loginPage.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ruvio | Hello <?php echo $fetch_info['name'] ?></title>
    <link rel="title icon" href="../Ruvio_LogoPng.ico" type="img/x-icon">

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="home" id="home">
    <nav class="navBar" id="navBar">
        <div class="Container flex">
            <div class="logo wow animated fadeInLeft">
                <a class="flex" href="home.php">
                    <img src="../img/Logo pictures/Ruvio_LogoPng.png" alt="">
                    <h1 class="logoName">RUVIO</h1>
                </a>
            </div>

            <ul class="navLinks flex">
                <li class="wow animated fadeInRight"><a href="home.php">Home</a></li>
                <li class="wow animated fadeInRight" style="animation-delay: 0.2s;"><a href="#homeServices">Services</a></li>
                <li class="wow animated fadeInRight" style="animation-delay: 0.4s;"><a href="#packages">Packages</a></li>
                <li class="wow animated fadeInRight" style="animation-delay: 0.6s;"><a href="#contact">Contact</a></li>
                <li class="wow animated fadeInRight" style="animation-delay: 0.8s;"><a href="#"><i class="fa fa-user"></i></a></li>
            </ul>
        </div>
    </nav>

    <!-------------------------------------- Welcome Area ----------------------------------->
    <section class="welcomeArea">
        <div class="Container flex">
            <img src="../img/undraw_hey.svg" alt="Hey text picture">
            <div class="welcomeTxt">
                <h1 class="topic"><span>Welcome, </span><br><?php echo $fetch_info['name'] ?></h1>
            </div>
        </div>
    </section>

    <!------------------------------------ Services Section --------------------------------->
    <section class="services" id="homeServices">
        <div class="topic wow">
            <h2>Services</h2>
            <p>We offer exceptional service with complimentary hugs</p>        
        </div>

        <div class="Container flex">
            <div class="card text-center flex flex-column">
                <h4>Responsive Website</h4>
                <i class="fas fa-code"></i>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit?</p>
            </div>
            <div class="card text-center flex flex-column">
                <h4>E-commerce Website</h4>
                <i class="fas fa-balance-scale"></i>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit?</p>
            </div>
            <div class="card text-center flex flex-column">
                <h4>UX/UI Design</h4>
                <i class="fas fa-drafting-compass"></i>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit?</p>
            </div>
            <div class="card text-center flex flex-column">
                <h4>Brand Identity</h4>
                <i class="fab fa-bandcamp"></i>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit?</p>
            </div>
            <div class="card text-center flex flex-column">
                <h4>Logo Design</h4>
                <i class="fas fa-paint-brush"></i>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit?</p>
            </div>
            <div class="card text-center flex flex-column">
                <h4>Photo/ Video</h4>
                <i class="fas fa-photo-video"></i>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit?</p>
            </div>
            <div class="card text-center flex flex-column">
                <h4>Inbound Marketing</h4>
                <i class="fas fa-bullhorn"></i>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit?</p>
            </div>
            <div class="card text-center flex flex-column">
                <h4>Advertising (PPC)</h4>
                <i class="fas fa-audio-description"></i>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit?</p>
            </div>
            <div class="card text-center flex flex-column">
                <h4>SEO</h4>
                <i class="fas fa-search-dollar"></i>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit?</p>
            </div>
        </div>
    </section>

    <!------------------------------------ Packages Section --------------------------------->
    <section class="packages" id="packages">
        <div class="topic wow">
            <h2>Packages</h2>
            <p>We have perfectly grouped packages for all your digital needs</p>
        </div>
        <div class="Container flex py-5">
            <div class="card text-center wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h4 class="my-1">Graphic Package</h4>
                <img src="../img/undraw_design.svg" alt="image">
                <ul class="features">
                    <li>Logo & Brand design</li>
                    <li>Business Card Design</li>
                    <li>Poster/ Leaflet Design</li>
                    <li>Ads Design</li>
                    <li>Other Graphical Design</li>
                </ul>
                <a class="btn" href="./php/loginPage.php">Select</a>
            </div>
            <div class="card text-center wow flipInY" data-wow-duration="1000ms" data-wow-delay="500ms">
                <h4 class="my-1">Web Package</h4>
                <img src="../img/undraw_heatmap.svg" alt="image">
                <ul class="features">
                    <li>Logo & Brand design</li>
                    <li>Business Card Design</li>
                    <li>Poster/ Leaflet Design</li>
                    <li>Ads Design</li>
                    <li>Other Graphical Design</li>
                </ul>
                <a class="btn" href="./php/loginPage.php">Select</a>
            </div>
            <div class="card text-center wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
                <h4 class="my-1">Marketing Package</h4>
                <img src="../img/undraw_marketing.svg" alt="image">
                <ul class="features">
                    <li>Logo & Brand design</li>
                    <li>Business Card Design</li>
                    <li>Poster/ Leaflet Design</li>
                    <li>Ads Design</li>
                    <li>Other Graphical Design</li>
                </ul>
                <a class="btn" href="./php/loginPage.php">Select</a>
            </div>
            <div class="card text-center wow flipInY premium" data-wow-duration="1000ms" data-wow-delay="11thhhhtt00ms">
                <h4 class="my-1">All-in-one Package</h4>
                <img src="../img/undraw_all_the_data.svg" alt="image">
                <ul class="features">
                    <li>Logo & Brand design</li>
                    <li>Business Card Design</li>
                    <li>Poster/ Leaflet Design</li>
                    <li>Ads Design</li>
                    <li>Other Graphical Design</li>
                </ul>
                <a class="btn" href="./php/loginPage.php">Select</a>
            </div>
        </div>
    </section>

    <!------------------------------------ Cotact Us Section --------------------------------->
    <section class="contact" id="contact">
        <div class="topic wow">
            <h2>Let's talk Business</h2>
        </div>
        <div class="Container grid py-4">
            <div class="contactDetails">
                <div class="contact-info-box address grid py-1 wow fadeInRight" data-wow-delay="300ms">
                	<h4><i class=" icon-map-marker"></i>Address:</h4>
                	<span>No 56/4, Matale Road,<br>Wattegama, Kandy, Sri Lanka, 20810.</span>
                </div>
                <div class="contact-info-box phone grid py-1 wow fadeInRight" data-wow-delay="500ms">
                	<h4><i class=" fa-phone"></i>Phone:</h4>
                	<span>+94 77 2684 933</span>
                </div>
                <div class="contact-info-box email grid py-1 wow fadeInRight" data-wow-delay="800ms">
                	<h4><i class="fa-envelope"></i>E-mail:</h4>
                	<span>info@ruvio.lk</span>
                </div>
                <ul class="social-links flex py-1 wow fadeInRight" data-wow-delay="1100ms">
                	<li class="social-link twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="social-link facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="social-link pinterest"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="social-link gplus"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    <li class="social-link dribbble"><a href="#"><i class="fab fa-dribbble"></i></a></li>
                </ul>
            </div>
            <form action="./php/contact.php" method="POST" id="form" class="contactForm flex flex-column wow animated fadeInLeft" data-wow-duration="1200ms">
                <input class="input-text my-1" id="name" type="text" name="name" placeholder="Your Name *" required>
                <input class="input-text my-1" id="email" type="text" name="email" placeholder="Your E-mail *" required>
                <textarea class="input-text text-area my-1" id="content" name="msg" cols="0" rows="0" placeholder="Tell us what you want *" required></textarea>
                <input class="input-btn my-1" onClick="return validateForm()" id="contact-send-btn" type="submit" name="send-msg" value="send message">
            </form>
        </div>
    </section>

    <!-------------------------- Footer ------------------------------->
    <footer class="footer" id="footer">
        <div class="Container">
            <div class="services flex">
                <div class="card webDesign wow animated fadeInUp">
                    <h4 class="py-1">web Design</h4>
                    <ul class="links ">
                        <li><a href="* ">Responsive Website</a></li>
                        <li><a href="* ">E - commerce Website</a></li>
                        <li><a href="* ">UX/UI Design</a></li>
                        <li><a href="* ">Website Support</a></li>
                        <li><a href="* ">Cost</a></li>
                    </ul>
                </div>
                <div class="card graphicDesign wow animated fadeInUp" data-wow-delay="300ms">
                    <h4 class="py-1">Graphic Design</h4>
                    <ul class="links ">
                        <li><a href="* ">Brand Identity</a></li>
                        <li><a href="* ">Logo Design</a></li>
                        <li><a href="* ">Photo/ Video</a></li>
                        <li><a href="* ">Cost</a></li>
                    </ul>
                </div>
                <div class="card digitalMarketing wow animated fadeInUp" data-wow-delay="600ms">
                    <h4 class="py-1">Digital Marketing</h4>
                    <ul class="links ">
                        <li><a href="* ">Inbound Marketing</a></li>
                        <li><a href="* ">Advertising (PPC)</a></li>
                        <li><a href="* ">SEO</a></li>
                        <li><a href="* ">Cost</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p class="copyRight wow animated zoomIn">&copy; 2021 <img src="../Ruvio_LogoPng.ico" type="img/x-icon" style="height: 15px; width: 15px;"> Ruvio. All rights reserved</p>
    </footer>


    <a href="logout.php">Logout</a>



    <script src="./js/jquery.js"></script>
    <script src="./js/app.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="./js/mousescroll.js"></script>
    <script src="./js/smoothscroll.js"></script>

</body>
</html>
