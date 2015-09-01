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
		.headlink{
			float: right;
			display: inline-block;
			vertical-align: top;
		}
		#all_list{
			height: 400px;
			overflow: scroll;
		}
		#all_list *{
			font-size: 90%;
		}
		#recent{
			width: 850px;
		}
		.recent *{
			margin: 3px;
		}
		.recent h2{
			margin: 10px 0px 0px 0px;
		}
	</style>
</head>
<body>
<h1>Welcome, <?= $user_alias; ?>!</h1>
<a class="headlink" href="/main/logout">Logout</a>
<a class="headlink" href="/books/add">Add Book and Review</a>
<div id="recent">
	<h2>Recent Book Reviews:</h2>
	<?php
		foreach($recent_reviews as $review){
			echo "<div class=\"recent\"><h2><a href=\"\">" .
				$review['title'] . "</a></h2><p>Rating: " . 
				$review['rating'] . " stars</p><p><a href=\"users/" . $review['id'] . "\">" . 
				$review['alias'] . "</a>says: <i>" . 
				$review['content'] . "</i></p><p>Posted on: " . 
				$review['created_at'] . "</p></div>";
		}
	?>
</div>
<div id="more">
	<h2>Other Books with Reviews:<h2>
	<div id="all_list">
		<?php
			foreach($book_list as $book){
				echo "<p><a href=\"\">" . $book['title'] . "</a></p>";
			}
		?>
	</div>
</div>
</body>
</html>