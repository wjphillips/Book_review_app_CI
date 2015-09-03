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
	<h1 id="add_book_header">Add a New Book Title and a Review:</h1>
	<?php echo $this->session->flashdata('errors'); ?>
	<div id="add_book_div">
		<form action="/books/new_book_and_review" method="post">
			<strong>Book Title:</strong><input type="text" name="title">
			<p><strong>Author:</strong></p>
			Choose from the list:<select name="selected_author">
				<option value=""></option>
				<?php foreach($author_list as $author_array){
					echo "<option value=\"" . $author_array["author"] . "\">" . $author_array["author"] . "</option>";
				}?>
			</select>
			Or add a new author:<input type="text" name="new_author">
			<strong>Review:</strong><textarea name="review_content"></textarea>
			<strong>How many stars?</strong><select name="rating">
				<option value="5">5</option>
				<option value="4">4</option>
				<option value="3">3</option>
				<option value="2">2</option>
				<option value="1">1</option>
			</select>
			<input type="submit" value="Add Book and Review" class="submit">
		</form>
	</div>
</div>
</body>
</html>