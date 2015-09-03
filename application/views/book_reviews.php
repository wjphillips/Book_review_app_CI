<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Red Belt Exam Practice - Book Details</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
<div id="container">
	<a class="headlink" href="/main/logout">Logout</a>
	<a class="headlink" href="/books">Home</a>
	<h1>Book Title</h1>
	<h2>Author: Author Name</h2>
	<div id="review_list">
		<h2>Reviews:</h2>
	</div>
	<div id="add_review">
		<h2>Add a Review:</h2>
		<form action="books/add" method="post">
			<input type="textarea" name="content">
			<select name="rating">
				<option value="5">5</option>
				<option value="4">4</option>
				<option value="3">3</option>
				<option value="2">2</option>
				<option value="1">1</option>
			</select>
		</form>
	</div>

	<?php
		echo "<pre>";
		var_dump($this->input->post());
	?>
	</div>
</div>
</body>
</html>