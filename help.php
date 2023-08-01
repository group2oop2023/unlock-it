<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($conn);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Unlock IT</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Archivo+Black&display=swap" rel="stylesheet">
    <script src="script.js"></script>
    
</head>

<body>
    <section>

    <!-- Navigation Bar -->

        <nav>
            <div class="logo">
                <img src="image/logowhite2.png">
            </div>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="library.php">Library</a></li>
                <li><a href="review.php">Review</a></li>
                <li><a href="help.php">Help</a></li>
            </ul>

            <div class="social_icon">
                <div class="dropdown">
                    <button class="dropbtn">
                    <img src="image/user-icon.png" alt="User Icon"/>
                    </button>

                    <div class="dropdown-content">
                        <a> Hello, <?php echo $user_data['user_name']; ?> </a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>

<!-- contact -->

    <section class="contact" id="contact">

        <div class="form">
        <div class="fcf">
            <h3>Contact us</h3>

            <form id="fcf-form-id" class="fcf-form-class" method="post" action="">
        
        <div class="fcf-form-group">
            <label for="Name" class="fcf-label">Your name</label>
        <div class="fcf-input-group">
            <input type="text" id="Name" name="Name" class="fcf-form-control" required>
        </div>
        </div>

        <div class="fcf-form-group">
            <label for="Email" class="fcf-label">Your email address</label>
        <div class="fcf-input-group">
            <input type="email" id="Email" name="Email" class="fcf-form-control" required>
        </div>
        </div>

        <div class="fcf-form-group">
            <label for="Message" class="fcf-label">Your message</label>
        <div class="fcf-input-group">
            <textarea id="Message" name="Message" class="fcf-form-control" rows="10" required></textarea>
        </div>
        </div>

        <div class="fcf-form-group">
            <button type="submit" id="fcf-button" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Send Message</button>
        </div>

        </form>
        </div>

    </section>

    <!--Footer-->

    <footer>
        <div class="content">
            <div class="link-boxes">
                <ul class="box">
                    <p>Unleash your IT potential with our digital library. Access a wide range of resources,  from eBooks to research papers. Stay updated with webinars and discussions. Start your journey of knowledge and growth today!</p>
                </ul>

                <ul class="box">
                    <li class="link_name">Quick Links</li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="library.php">Library</a></li>
                        <li><a href="review.php">Review</a></li>
                        <li><a href="help.php">Help</a></li>
                </ul>

                <ul class="box">
                    <li class="link_name">Contact Info</li>
                    <li><a href="#"><i class="fa-solid fa-phone"> </i>+639 12 345 6789</a></li>
                    <li><a href="#"><i class="fa-solid fa-envelope"> </i>unlockitweb@gmail.com</a></li>
                </ul>

                <ul class="box">
                    <div class="media-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </ul>
            </div>
        </div>

        <div class="bottom-details">
            <div class="bottom_text">
                <span class="copyright_text">Copyright © <a href="#">GROUP TWO.</a>All rights reserved</span>
                <span class="policy_terms">
                    <a href="#">Privacy policy</a>
                    <a href="#">Terms & condition</a>
                </span>
            </div>
        </div>
    </footer>
</body>
</html>