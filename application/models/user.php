<?php
class User extends CI_model{
	public function login_validation($user_array){
		$query = "SELECT id, email, password FROM users WHERE email = '{$user_array['email_log']}'";
		$query_result = $this->db->query($query, array())->row_array();
		if(empty($query_result)){
			$this->session->set_flashdata('errors', "!!No account found with this email address, please register");
			redirect("/");
		}
		else if($query_result['password'] != $user_array['password_log']){
			$this->session->set_flashdata('errors', "!!Incorrect password entered");
			redirect("/");
		}
		else{
			$this->session->set_userdata('id', $query_result['id']);
			redirect("/main/load_main_page");
		}
	}

	public function registration_validation($post){
		$this->form_validation->set_rules("name_reg", "Name", "trim|required");
		$this->form_validation->set_rules("alias_reg", "Alias", "trim|required");
		$this->form_validation->set_rules("email_reg", "Email Address", "trim|required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password_reg1", "Password", "trim|required|min_length[8]|matches[password_reg2]");
		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('errors', validation_errors());
			redirect("/");	
		}
		else{
			$query="INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
			$values=array($post['name_reg'], $post['alias_reg'], $post['email_reg'], $post['password_reg1']);
			$this->db->query($query, $values);
			$this->session->set_flashdata('errors', "Thank you for registering!");
			redirect("/");
		}

	}

	public function get_user_alias(){
		$query = "SELECT alias FROM users WHERE id = '{$this->session->userdata['id']}'";
		$query_result = $this->db->query($query, array())->row_array();
		return $query_result['alias'];
	}

	public function get_user_details($id){
		$query = "SELECT u.alias, u.name, u.email, COUNT(*) as \"review_count\"
					FROM users u LEFT JOIN reviews r on u.id = r.users_id 
					LEFT JOIN books b on r.books_id = b.id WHERE u.id = ?";
		$user_info_array = $this->db->query($query, $id)->result_array();
		return $user_info_array;
	}
}

?>