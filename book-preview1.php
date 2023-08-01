<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($conn);

function getBookDetails($conn, $book_id) {
	$query = "SELECT book_cover, book_pdf, b.book_id, b.book_title, b.description, a.author_id, a.author_name, c.category_name, b.pub_date, b.description, b.language
			  FROM books b
			  INNER JOIN author_books ab ON b.book_id = ab.book_id
			  INNER JOIN authors a ON ab.author_id = a.author_id
			  INNER JOIN category c ON c.category_name = b.category_name
			  WHERE b.book_id = $book_id";

	$result = mysqli_query($conn, $query);

	if (!$result || $result->num_rows === 0) {
		return null; // Book not found
	} else {
		return $result->fetch_assoc();
	}
}

// Sample usage: Assuming you have a book_id parameter in the URL
if (isset($_GET['book_id']) && is_numeric($_GET['book_id'])) {
	$book_id = $_GET['book_id'];
	$book = getBookDetails($conn, $book_id);
	$book_cover = $book['book_cover'];
	$book_pdf = $book['book_pdf'];

} else {
	echo '<p>No book selected.</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel ="stylesheet" href ="style-preview1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Book Preview</title>
</head>
<body>
    <a href="library.php"><i class="arrow left" ></i></a>
	
<div class="book">
        <img src="book_cover/<?php echo $book_cover; ?>">
     </div>   


	<div class="book-info">
        <h1 class="book-title"><?php echo $book['book_title'];?></h1> 
        <p class="author-name"><?php echo $book['author_name'];?></p> 
		<h4 class="caption"><?php echo $book['language'];?></h4>
    </div>
	


	<div class="oblong-rectangle">
		<a href="image/BOOKS/<?php echo $book_pdf; ?>" class="start-reading-btn">Start Reading</a>

  			<div class="download-icon">
    			<a href="image/BOOKS/<?php echo $book_pdf; ?>" download><i class="fa-regular fa-circle-down" ></i></a>
  			</div>

	<hr>

	<div class="column">
		<div class="column_card">
	    	<h1>Description</h1>
			<p> <?php echo $book['description'];?> </p>
	</div>
	<!-- <div class="column_card">
	<h1> Author </h1>
	<p>  </p>
</div> -->


	</div>

</body>
</html>