<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {
	public function add(){
		$author_list = $this->book->get_all_authors();
		$this->load->view('add_book', array("author_list" => $author_list));
	}

	public function new_book_and_review(){
		$this->book->new_book_and_review($this->input->post());
	}

}