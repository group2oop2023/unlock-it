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

<!-- review -->

    <section class="review" id="review">
        <section class="review_input" id="review_input">

        <h4 class="review_heading">Leave us a review!</h4>

<?php
    if (isset($_POST["user_name"]) && isset($_POST["rating"]) && isset($_POST["review"])) {
        $servername = "localhost"; // Replace with your servername
        $username = "root";   // Replace with your database username
        $password = "";   // Replace with your database password
        $dbname = "unlockitdb_1";        // Replace with your database name

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $user_name = $_POST['user_name'];
            $rating = $_POST['rating'];
            $review = $_POST['review'];
            $review_date = date('Y-m-d H:i:s');

            $stmt = $conn->prepare("INSERT INTO review (user_name, rating, review, review_date) VALUES (:user_name, :rating, :review, :review_date)");
            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':review', $review);
            $stmt->bindParam(':review_date', $review_date);
            $stmt->execute();

            echo '<p>Your review has been submitted.</p>';
        } catch (PDOException $e) {
            echo '<p>Error: ' . $e->getMessage() . '</p>';
        }
        $conn = null;
    }
    ?>

        <form action="">

            <div class="inputBox">
                <input type="text" id="user_name" placeholder="name"><br>

                <p> Rate us from 5-4-3-2-1 stars!</p>
                <label class="rating-label">
				  <input class="rating rating" max="4" step="1"  type="range" value="0">
				</label>

            </div>

            <textarea name="review" id="review" cols="30" rows="10" placeholder="review"></textarea>

            <div class="center-container">
                <a href="#" class="btn">Talk to us</a>
            </div>
 
        </form>

    </section>

	    <div class="box-container">
	
	    <div class="box">
	    <div class="stars">
		    <i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
		</div>
		    <p> "I absolutely love this ebook website! The collection is vast, and the user-friendly interface makes browsing a breeze."</p>
		<div class="user">
		    <img src="image/sarah.jpg" alt="">
		    <div class="user-info">
			<h3>Sarah Mendoza</h3>
		    <span>Model</span>
			</div>
		</div>
		    <span class="fas fa-quote-right"></span>
	    </div>
	
	    <div class="box">
	    <div class="stars">
		    <i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
		</div>
		    <p> "As an aspiring author, this ebook website has been a game-changer for me. The platform provides a fantastic opportunity to showcase my work to a wide audience, and the support team is incredibly responsive and helpful."</p>
		<div class="user">
		    <img src="image/mark.jpg" alt="">
		<div class="user-info">
			<h3>Mark Fernandez</h3>
			<span>Influencer</span>
		</div>
		</div>
		<span class="fas fa-quote-right"></span>
	    </div>
	
	    <div class="box">
	    <div class="stars">
		    <i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
		</div>
		    <p> "I've been using this ebook website for months now, and I'm hooked! The recommendations are spot-on, and the seamless syncing across devices ensures I can pick up where I left off no matter where I am. Highly recommended!"</p>
		<div class="user">
		    <img src="image/ali.jpg" alt="">
		<div class="user-info">
			<h3>Ali Aguilar</h3>
		    <span>Choreographer</span>
		</div>
		</div>
		    <span class="fas fa-quote-right"></span>
	    </div>
	
	    <div class="box">
	    <div class="stars">
		    <i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
		</div>
		    <p> "Finding quality free ebooks can be a challenge, but this website offers an impressive collection of free titles. The website's intuitive search function and well-curated categories make it easy to discover new reads without breaking the bank." </p>
		<div class="user">
		    <img src="image/john.jpg" alt="">
		<div class="user-info">
			<h3>John Clyde</h3>
			<span>Singer</span>
		</div>
		</div>
		    <span class="fas fa-quote-right"></span>
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