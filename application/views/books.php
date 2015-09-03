<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Red Belt Exam Practice - Books</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
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
	</div>
	<div id="recent_reviews_div">
		<h2>Recent Book Reviews:</h2>
		<?php
			foreach($recent_reviews as $review){
				echo "<div class=\"recent\"><h2><a href=\"/book_reviews/" . $review['book_id'] . "\">" .
					$review['title'] . "</a></h2><p>Rating: " . 
					$review['rating'] . " stars</p><p><a href=\"users/" . $review['id'] . "\">" . 
					$review['alias'] . "</a>says: <i>" . 
					$review['content'] . "</i></p><p>Posted on: " . 
					$review['created_at'] . "</p></div>";
			}
		?>
	</div>
	<div id="all_books_div">
		<h2>Other Books with Reviews:<h2>
		<div id="all_list">
			<?php
				foreach($book_list as $book){
					echo "<p><a href=\"/book_reviews/" . $book['id'] . "\">" . $book['title'] . "</a></p>";
				}
			?>
		</div>
	</div>
</div>
</body>
</html>