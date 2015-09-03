<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {
	public function add(){
		//Calls the Book model to get the full author list then loads the "add book" page for the user
		$author_list = $this->book->get_all_authors();
		$this->load->view('add_book', array("author_list" => $author_list));
	}

	public function new_book_and_review(){
		//Directs the request to the Book model for adding a new book and review
		$this->book->new_book_and_review($this->input->post());
	}
	public function bookLoad($id){
		//Passes the book id and directs the request to the Book model for loading details for one single book
		$this->book->load_single_book_info($id);
	}

}