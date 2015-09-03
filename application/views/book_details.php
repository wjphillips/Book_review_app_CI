<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Red Belt Exam Practice - Books</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<div id="container">
	<div id="header_div">
		<h3 id="current_user_header">
			Current User: <?= $this->session->userdata['alias']; ?><br>
			<a href="/myProfile/<?= $this->session->userdata['id']?>">My Profile</a>
		</h3>
		<h2 id="site_title">Book Review Platform</h2>
		<a class="headlink" href="/main/logout">Logout</a>
		<a class="headlink" href="/books/add">Add Book and Review</a>
		<a class="headlink" href="/books">Home</a>
	</div>
	<div id="book_title_div">
		<?= 
			"<h1>" . $book_details_array[0]['title'] . "</h1><h2>" . $book_details_array[0]['author'] . "</h2>";
		?>
	</div>
	<div id="reviews_div">
		<?php
			foreach($book_details_array as $review){
				echo "<p>Rating: " . 
				$review['rating'] . " stars</p><p><a href=\"users/" . $review['usersid'] . "\">" . 
				$review['alias'] . "</a>says: <i>" . 
				$review['content'] . "</i></p><p>Posted on: " . 
				$review['created_at'] . "</p></div>";
			}
		?>
	</div>
	<div id="new_review_div">
	</div>
	<?php var_dump($book_details_array); ?>
</div>
</body>
</html>