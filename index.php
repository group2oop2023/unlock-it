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
                <li><a href="home.php">Home</a></li>
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

    <!-- Main Homepage -->

        <div class="main">
            <div class="main_tag">
                <h1>UNLOCK IT<br><span>A digital library for Information Technology</span></h1>
                <p> Unleash your IT potential with our digital library. Access a wide range of resources, from eBooks to research papers. Stay updated with webinars and discussions. Start your journey of knowledge and growth today!</p>
                <a href="about.php" class="main_btn">Learn More</a>
            </div>

            <div class="carousel-container">
                <div class="carousel">
                    <div class="book"><img src="image/book_7.png" alt=""></div>
                    <div class="book"><img src="image/book_8.png" alt=""></div>
                    <div class="book"><img src="image/book_10.png" alt=""></div>
                    <div class="book"><img src="image/book_12.png" alt=""></div>
                    <div class="book"><img src="image/book_13.png" alt=""></div>
                </div>
            </div>
        </div>
    </section>

 <!--Featured Books-->

    <div class="featured_books">
        <h1>Featured Books</h1>
        <div class="featured_book_box">

<?php

    function getFeaturedBooksFromDatabase($conn) {
        // Perform the query to get book data
        $query = "SELECT book_id, book_title, book_cover FROM books WHERE (book_id - 1) % 7 IN (0, 3, 6)";
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if (!$result) {
            die("Database query failed.");
        }

        // Fetch the data and store it in an array
        $books_array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $books_array[] = $row;
        }

        // Free the result set
        mysqli_free_result($result);

        return $books_array;
    }

    $books_array = getFeaturedBooksFromDatabase($conn);

    // Check if $books_array is not empty and is an array before proceeding with the loop
    if (!empty($books_array) && is_array($books_array)) {
        foreach ($books_array as $book) {
            $book_id = $book['book_id'];
            $book_title = $book['book_title'];
            $book_cover = $book['book_cover'];
?>

        <div class="featured_book_card">
            <div class="featured_book_img">
                <img src="book_cover/<?php echo $book_cover; ?>">
            </div>

            <div class="featured_book_tag">
                <h2><?php echo $book_title; ?></h2>
                <a href="book-preview1.php?book_id=<?php echo $book_id; ?>" class="f_btn">See Details</a>
            </div>
        </div>

<?php
        }
    } 

    else {
        echo "No books found.";
    }

    $conn->close();
?>


        </div>
    </div>

    <!--About-->

    <div class="about">
        <div class="about_image">
            <img src="image/about.png">
        </div>

        <div class="about_tag">
            <h1>About Us</h1>
            <p>Welcome to our digital library website dedicated to all things Information Technology! We are passionate about equipping tech enthusiasts, professionals, and curious minds with a vast collection of cutting-edge resources, empowering you to stay ahead in the ever-evolving world of technology. From cloud computing to cybersecurity, software development to artificial intelligence, database, we curate a comprehensive selection of books, journals, and resources, providing a platform where knowledge meets innovation. </p>
            <a href="about.php" class="about_btn">Learn More</a>
        </div>
    </div>

    <!--Services-->

    <div class="services">
        <div class="services_box">
            <div class="services_card">
                <i class="fa fa-unlock"></i>
                <h3>Free Access</h3>
                <p> Unlock the world of knowledge with our digital library website, where free access opens the door to endless inspiration and learning opportunities. </p>
            </div>

            <div class="services_card">
                <i class="fa fa-star"></i>
                <h3>Try the Virtual Library Explorer</h3>
                <p> Embark on a thrilling journey of literary exploration like never before with our Virtual Library Explorer, where the digital realm becomes your gateway to unlimited imagination and discovery. </p>
            </div>

            <div class="services_card">
                <i class="fa fa-book"></i>
                <h3>Keep Track your Favorite Books</h3>
                <p> Stay connected with your literary loves and never lose sight of your favorite books, as our digital library website empowers you to effortlessly keep track of your reading adventures. </p>
            </div>

            <div class="services_card">
                <i class="fa-solid fa-headset"></i>
                <h3>24 / 7 Services</h3>
                <p> Embrace the freedom to explore, day or night, with our digital library website's 24/7 service, delivering knowledge at your fingertips around the clock. </p>
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