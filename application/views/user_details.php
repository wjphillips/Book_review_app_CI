<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Red Belt Exam Practice - Books</title>
	<style type="text/css">
		*{
			padding: 5px;
		}
		h1{
			display: inline-block;
			width: 1000px;
		}
		div{
			display: inline-block;
			vertical-align: top;
		}
	</style>
</head>
<body>
	<?php
		$user_details = $user_array[0];
	?>
<a class="headlink" href="/main/logout">Logout</a>
<a class="headlink" href="/books/add">Add Book and Review</a>
<a class="headlink" href="/books">Home</a>
<h2>User Alias: <?= $user_details['alias']; ?></h2>
<h2>Name: <?= $user_details['name']; ?></h2>
<h2>E-Mail Addess: <?= $user_details['email']; ?></h2>
<h2>Total Reviews: <?= $user_details['review_count']; ?></h2><br>
<h2>Posted Reviews on the Following Books:</h2>
<?php
	foreach($book_list as $book){
		echo "<a href=\"/book_reviews/" . $book['book_id'] . "\">" . $book['title'] . "</a><br>";
	}
?>
</div>
</body>
</html>