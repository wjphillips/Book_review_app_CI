<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Red Belt Exam Practice - Books</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<div id="container">
	<?php
		$user_details = $user_array[0];
	?>
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
	<div id="profile_info_div">
		<h2>Profile Details:</h2>
		<h3>User Alias: <?= $user_details['alias']; ?>
			<?php 
				if($user_details['id'] == $this->session->userdata['id']){
					echo "<br><a href=\"\">change alias</a>";
				};
			?>
		</h3>
		<h3>Name: <?= $user_details['name']; ?></h2>
		<h3>E-Mail Addess: <?= $user_details['email']; ?></h2>
		<h3>Total Reviews: <?= $user_details['review_count']; ?></h2>
	</div>
	<div id="profile_reviews_div">
		<?php
		if($user_details['id'] == $this->session->userdata['id']){
			echo "<h2>You Have Posted Reviews on the Following Books:</h2>";
		}
		else{
			echo "<h2>" . $user_details['alias'] . "Has Posted Reviews on the Following Books:</h2>";
		}
			foreach($book_list as $book){
				echo "<p><a href=\"/book_reviews/" . $book['book_id'] . "\">" . $book['title'] . "</a></p>";
			}
		?>
	</div>
</div>
</body>
</html>