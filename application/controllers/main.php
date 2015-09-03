<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index(){
		//Loads the "main" view, which is just the login/registration page
		if(!isset($this->session->userdata['id'])){
			$this->load->view('main');
		}
		else{
			$recent_reviews = $this->book->get_top_three_reviews();
			$book_list = $this->book->get_all_books();
			$user_alias = $this->user->get_user_alias();
			$this->load->view('books', array("recent_reviews"=>$recent_reviews, "book_list"=>$book_list, "user_alias"=>$user_alias));
		}
	}
	public function register(){
		//Sends the submitted registration inputs to the user model for validation 
		$this->user->registration_validation($this->input->post());
	}
	public function login(){
		//Sends the submitted login inputs to the user model for validation 
		$user_array=$this->input->post();
		$this->user->login_validation($user_array);
	}
	public function logout(){
		//Destroys the session, effectively logging out the user and then reroutes to the login page
		$this->session->sess_destroy();
		redirect('/');
	}
	public function userLoad($id){
		//Calls the user and book models to get the user details and related books for the user associated with the passed id, then loads the user details page
		$user_array = $this->user->get_user_details($id);
		$book_list = $this->book->load_all_books_by_user($id);
		$this->load->view('user_details', array("user_array"=>$user_array, "book_list"=>$book_list));
	}
	public function load_main_page(){
		//Gets all the needed info for the home page by calling the models, then loads the homepage
		$recent_reviews = $this->book->get_top_three_reviews();
		$book_list = $this->book->get_all_books();
		$user_alias = $this->user->get_user_alias();
		$this->load->view('books', array("recent_reviews"=>$recent_reviews, "book_list"=>$book_list, "user_alias"=>$user_alias));
	}
}