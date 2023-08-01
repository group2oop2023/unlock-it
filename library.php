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
        
 <!--library-->

    <div class="library">
        <h1>LIBRARY</h1>
        
        <div class="library_form">

            <form action="library.php" method="GET">
                <label for="searchQuery">Search by Author or Book:</label>
                <input type="text" id="searchQuery" name="q" required>
                <input type="submit" value="Search">
                
<?php 


// Check if the search query is provided
if (isset($_GET['q'])) {
    // Retrieve the search query from the form submission and sanitize it
    $searchQuery = $conn->real_escape_string($_GET['q']);

    // SQL query to search for authors or books
    $sql = "SELECT b.book_id, b.category_name, b.book_title, a.author_name, b.pub_date, b.book_cover, b.pages, b.language, b.description
            FROM books AS b
            INNER JOIN author_books AS ab ON b.book_id = ab.book_id
            INNER JOIN authors AS a ON ab.author_id = a.author_id
            WHERE b.book_title LIKE '%$searchQuery%'
            OR a.author_name LIKE '%$searchQuery%'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        if ($result->num_rows > 0) {
            // Display the search results
            while ($row = $result->fetch_assoc()) {
                // Process the rows and display the relevant information

                //echo "<a href="$book_title"></a>";
                // echo $link_address
                //echo "<p>" . $row['author_name'] . " - " . $row['book_title'] . "</p>";
                echo '<p><a href="book-preview1.php?book_id=' . $row['book_id'] . '">' . $row['author_name'] . ' - ' . $row['book_title'] . '</a></p>';
                //$row['author_name']
                // <a href="<?php echo 'page2.php'; ">Page 2</a>
                // echo "<p href=" . $row['author_name'] . " - " . $row['book_title'] . "></p>";
                // php echo "<a href= $author_name . "-" . $book_title"> </a>" ;
                // Add other relevant information from the $row array as needed (e.g., pub_date, book_cover, etc.)
            }
        } else {
            echo "No results found.";
        }
    } else {
        echo "Error executing the query: " . $conn->error;
    }

    // Close the database connection
    
} else {
    // Display an error message if the search query is not provided
    echo "";
}
?>
            </form>
        </div>
        
        
        <div class="library_box">

        <?php
        // Assuming you have already fetched the book data from the database into $books_array

        function getBooksFromDatabase($conn)
        {
            // Perform the query to get book data
            $query = "SELECT book_id, book_title, book_cover FROM books";
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

        // Fetch book data from the database
        $books_array = getBooksFromDatabase($conn);

        // Function to get author data from the database
        function getAuthorFromDatabase($conn) {
            $query = "SELECT author_id, author_name FROM authors";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                // Query execution failed, handle the error (e.g., log, display an error message, etc.).
                return false;
            }

            $authors = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $author = array(
                    'author_id' => $row['author_id'],
                    'author_name' => $row['author_name']
                );
                $authors[] = $author;
            }

            // Free the result set.
            mysqli_free_result($result);

            return $authors;
        }

        // Fetch author data from the database
        $authors = getAuthorFromDatabase($conn);

        // Check if $books_array is not empty and is an array before proceeding with the loop
        if (!empty($books_array) && is_array($books_array)) {
            foreach ($books_array as $book) {
                $book_id = $book['book_id'];
                $book_title = $book['book_title'];
                $book_cover = $book['book_cover'];

                // Get the author_id for the current book_id
                $query = "SELECT author_id FROM author_books WHERE book_id = $book_id";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    // Query execution failed, handle the error (e.g., log, display an error message, etc.).
                    $author_id = 'Unknown'; // Set a default value if author_id is not found
                } else {
                    $row = mysqli_fetch_assoc($result);
                    $author_id = $row['author_id'];
                }

                // Get the author_name using the author_id from the $authors array
                $author_name = '';
                foreach ($authors as $author) {
                    if ($author['author_id'] === $author_id) {
                        $author_name = $author['author_name'];
                        break;
                    }
                }

                
                ?>
                <div class="library_card">
                    <div class="library_image">
                        <img src="book_cover/<?php echo $book_cover; ?>">
                    </div>
                    <div class="library_tag">
                        <p><?php echo $book_title; ?></p>
                        <p><?php echo $author_name; ?></p>
                        <a href="book-preview1.php?book_id=<?php echo $book_id; ?>" class="library_btn">See Details</a>
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