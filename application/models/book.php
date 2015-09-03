<?php
class Book extends CI_model{
	public function get_top_three_reviews(){
		//Returns an array with the most recent three book reviews
		return $this->db->query("SELECT b.id as \"book_id\", b.title, r.rating, u.id, u.name, r.content, r.created_at, u.alias
			FROM reviews r JOIN books b on r.books_id=b.id JOIN users u on r.users_id = u.id
			ORDER BY r.updated_at DESC
			LIMIT 3")->result_array();
	}

	public function get_all_books(){
		//Returns an array of every book title in the database, ordered alphabetically
		return $this->db->query("SELECT id, title FROM books ORDER BY title")->result_array();
	}

	public function get_all_authors(){
		//Returns an array of every author present in the database, ordered alphabetically by first name
		return $this->db->query("SELECT DISTINCT id, author FROM books ORDER BY author")->result_array();
	}

	public function new_book_and_review($post){
		//This function has multiple functions, but the main goal is to validate and insert any new books (and the related review) into the database
		//The first step is to validate the book content, and return errors if invalid
		$this->form_validation->set_rules("title", "Title", "trim|required");
		$this->form_validation->set_rules("new_author", "Author Name", "trim|is_unique[books.author]");
		$this->form_validation->set_rules("review_content", "Review", "trim|required");
		$this->form_validation->set_rules("rating", "Title", "required");
		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('errors', validation_errors());
			redirect("/books/add");	
		}
		//If it passes validation, it will insert the review and book into the appropriate tables
		//There is also one more piece of validation built in below to check that an author was entered
		else{
			$query1="INSERT INTO books (title, author, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
			$query2="INSERT INTO reviews (rating, content, created_at, updated_at, users_id, books_id) VALUES (?, ?, NOW(), NOW(), ?, ?)";
			$values1=array($post['title'], $post['selected_author']);
			$values2=array($post['title'], $post['new_author']);
			if($post['new_author'] == NULL && $post['selected_author'] != NULL){
				$this->db->query($query1, $values1);
				$temp = $this->db->insert_id();
			}
			else if($post['new_author'] == NULL && $post['selected_author'] == NULL){
				$this->session->set_flashdata('errors', "<p>An Author is required.</p>");
				redirect("/books/add");
			}
			else{
				$this->db->query($query1, $values2);
				$temp = $this->db->insert_id();
			}
			$values3=array($post['rating'], $post['review_content'], $this->session->userdata('id'), $temp);
			$this->db->query($query2, $values3);
			redirect("/");
		}
	}

	public function load_all_books_by_user($id){
		//Returns an array containing all the books that have been reviewed by the particular user
		$query = "SELECT b.id as \"book_id\", title FROM books b JOIN reviews r on b.id = r.books_id WHERE r.users_id = ?";
		$result = $this->db->query($query, $id)->result_array();
		return $result;
	}

	public function load_single_book_info($id){
		//Returns an array containing all book info, reviews, and users that are associated with a single book id
		$query = "SELECT b.title, b.author, r.rating, r.content, r.created_at, u.alias 
					FROM books b 
					LEFT JOIN reviews r on b.id = r.books_id 
					LEFT JOIN users u on r.users_id = u.id
					WHERE b.id = ?";
		$values = array($id);
		$book_details_array = $this->db->query($query, $values)->result_array();
		$this->load->view("book_details", array("book_details_array"=>$book_details_array));
	}
}

?>