<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index(){
		$this->load->view('main');
	}
	public function register(){
		$this->user->registration_validation($this->input->post());
	}
	public function login(){
		$user_array=$this->input->post();
		$this->user->login_validation($user_array);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
	public function userLoad($id){
		$user_array = $this->user->get_user_details($id);
		$book_list = $this->book->load_all_books_by_user($id);
		$this->load->view('user_details', array("user_array"=>$user_array, "book_list"=>$book_list));
	}
	public function bookLoad($id){
		
	}
	public function load_main_page(){
		$recent_reviews = $this->book->get_top_three_reviews();
		$book_list = $this->book->get_all_books();
		$user_alias = $this->user->get_user_alias();
		$this->load->view('books', array("recent_reviews"=>$recent_reviews, "book_list"=>$book_list, "user_alias"=>$user_alias));
	}
}