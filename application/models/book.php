<?php
class Book extends CI_model{
	function get_top_three_reviews(){
		return $this->db->query("SELECT b.title, r.rating, u.id, u.name, r.content, r.created_at, u.alias
			FROM reviews r JOIN books b on r.books_id=b.id JOIN users u on r.users_id = u.id
			ORDER BY r.updated_at DESC
			LIMIT 3")->result_array();
	}

	function get_all_books(){
		return $this->db->query("SELECT title FROM books ORDER BY title")->result_array();
	}

	function get_all_authors(){
		return $this->db->query("SELECT DISTINCT author FROM books ORDER BY author")->result_array();
	}

	function new_book_and_review($post){
		$this->form_validation->set_rules("title", "Title", "trim|required");
		$this->form_validation->set_rules("new_author", "Author Name", "trim|is_unique[books.author]");
		$this->form_validation->set_rules("review_content", "Review", "trim|required");
		$this->form_validation->set_rules("rating", "Title", "required");
		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('errors', validation_errors());
			redirect("/books/add");	
		}
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
			redirect("/main/load_main_page");
		}
	}

	public function load_all_books_by_user($id){
		$query = "SELECT b.id as \"book_id\", title FROM books b JOIN reviews r on b.id = r.books_id WHERE r.users_id = ?";
		$result = $this->db->query($query, $id)->result_array();
		return $result;
	}
}

?>