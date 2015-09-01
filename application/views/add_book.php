<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Red Belt Exam Practice - Books</title>
	<style type="text/css">
		*{
			padding: 5px;
			font-family: sans-serif;
		}
		a{
			color: blue;
		}
		h1{
			display: inline-block;
			width: 1000px;
		}
		div{
			display: inline-block;
			vertical-align: top;
		}
		form *{
			display: block;
		}
	</style>
</head>
<body>
<h1>Add a New Book Title and a Review:</h1>
<a class="headlink" href="/main/logout">Logout</a>
<a class="headlink" href="/books">Home</a>
<?php echo $this->session->flashdata('errors'); ?>
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
	<strong>Review:</strong><input type="textarea" name="review_content">
	<strong>How many stars?</strong><select name="rating">
		<option value="5">5</option>
		<option value="4">4</option>
		<option value="3">3</option>
		<option value="2">2</option>
		<option value="1">1</option>
	</select>
	<input type="submit" value="Add Book and Review">
</form>
</body>
</html>