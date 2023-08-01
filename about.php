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

    <!--About-->

    <div class="about">

        <div class="about_image">
            <h1>About Us</h1>
            <img src="image/about.png">
            <div class="about_tag">
            </div>
        <div class="about_tag">
            
                <p> Welcome to Unlock IT Digital Library, your premier destination for all things Information Technology! Our digital library is dedicated to empowering tech enthusiasts, professionals, and curious minds with a vast collection of cutting-edge resources, providing you with the tools to stay ahead in the ever-evolving world of technology. We are passionate about fostering knowledge and growth, offering an unparalleled platform where knowledge meets innovation. </p>

                <p>A Comprehensive Collection: At Unlock IT, we curate an extensive and diverse collection of resources, ranging from eBooks and research papers to webinars and interactive discussions. No matter your area of interest within IT, whether it's cloud computing, cybersecurity, software development, artificial intelligence, or databases, we have carefully selected materials that cater to your thirst for knowledge. </p>

                <p>Empowering Learning Opportunities: Our digital library website offers free access, unlocking a treasure trove of inspiration and learning opportunities for all. We believe that knowledge should be accessible to everyone, and our commitment to providing free access ensures that the world of IT is open to all who seek to explore and grow in this dynamic field. </p>

                <p>Virtual Library Explorer:
                Embark on a thrilling journey of literary exploration like never before with our Virtual Library Explorer. Step into the digital realm, where the possibilities are limitless, and discovery knows no bounds. Immerse yourself in a world of imagination and information, as our Virtual Library Explorer becomes your gateway to a universe of boundless ideas.</p>

                <p>Stay Connected with Your Favorites:
                We understand the joy of discovering books and resources that resonate with you. To ensure you never lose sight of your literary loves, our digital library website empowers you to effortlessly keep track of your favorite books. Whether it's a captivating eBook on AI or a groundbreaking research paper on cybersecurity, your reading adventures are securely stored and easily accessible.</p>

                <p>Knowledge at Your Fingertips:
                Life is busy, and we recognize that learning should be flexible and convenient. That's why Unlock IT Digital Library offers 24/7 services, delivering knowledge directly to your fingertips, whenever and wherever you choose to explore. Embrace the freedom to learn at your own pace, day or night, as our digital library becomes your reliable source of information.</p>

                <p>Join Our Community:
                Unlock IT Digital Library is not just a repository of resources; it's a thriving community of like-minded individuals passionate about technology and its advancements. Engage in thought-provoking discussions, connect with experts, and share your insights with fellow members as we collectively elevate our understanding of IT.</p>

                <p>Unleash Your IT Potential:
                We invite you to unlock your IT potential and embark on a journey of knowledge and growth with Unlock IT Digital Library. Whether you're a tech enthusiast, an aspiring professional, or simply curious about the world of technology, our digital library is here to guide you on your path to excellence.</p>

                <p>At Unlock IT, we believe in the power of knowledge to shape a brighter future. Join us in this exciting venture, and together, let's explore the vast horizons of Information Technology, where every idea has the potential to change the world. Start your journey today and unleash your IT potential with Unlock IT Digital Library!</p>

        </div>
</div>
    </div>

    <!--Services-->

    <div class="services">

        <div class="services_box">

            <div class="services_card">
                <i class="fa fa-unlock"></i>
                <h3>Free Access</h3>
                <p>
                    Unlock the world of knowledge with our digital library website, where free access opens the door to endless inspiration and learning opportunities.
                </p>
            </div>

            <div class="services_card">
                <i class="fa fa-star"></i>
                <h3>Try the Virtual Library Explorer</h3>
                <p>
                    Embark on a thrilling journey of literary exploration like never before with our Virtual Library Explorer, where the digital realm becomes your gateway to unlimited imagination and discovery.
                </p>
            </div>

            <div class="services_card">
                <i class="fa fa-book"></i>
                <h3>Keep Track your Favorite Books</h3>
                <p>
                    Stay connected with your literary loves and never lose sight of your favorite books, as our digital library website empowers you to effortlessly keep track of your reading adventures.
                </p>
            </div>

            <div class="services_card">
                <i class="fa-solid fa-headset"></i>
                <h3>24 / 7 Services</h3>
                <p>
                    Embrace the freedom to explore, day or night, with our digital library website's 24/7 service, delivering knowledge at your fingertips around the clock. 
                </p>
            </div>

        </div>

    </div>

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