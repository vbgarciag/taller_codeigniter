<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}

	public function register_user()
	{
		$this->load->model('user_model');

		$this->form_validation->set_rules("name", 'Name', "trim|required|alpha");
		$this->form_validation->set_rules("last_name", 'Last Name', "trim|required");
		$this->form_validation->set_rules("other_name", 'Other Name', "trim|required");
		$this->form_validation->set_rules("email", 'Email', "trim|required");
		$this->form_validation->set_rules("cellphone", 'Cell Phone', "trim|required|regex_match[/^[0-9]{10}$/]");
		$this->form_validation->set_rules("password", 'Password', "trim|required");
		$this->form_validation->set_rules("confirm_password", 'Confirm Password', "trim|required|matches[password]");

		if(!$this->form_validation->run()){
			$errors = validation_errors();
			$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center">'.$errors.'</div>');
			redirect('/register');
			return;
		}

		$name = $this->input->post('name');
		$last_name = $this->input->post('last_name');
		$other_name = $this->input->post('other_name');
		$email = $this->input->post('email');
		$cellphone = $this->input->post('cellphone');
		$password = $this->input->post('password');

		/*$data = array('id_user', null,
					  'name' => $name,
					  'last_name', $last_name,
					  'other_name', $other_name,
					  'email', $email,
					  'cellphone', $cellphone,
					  'password', $password
					  );
		var_dump($data);
		exit();*/

		$result = $this->user_model->register_user($name, $last_name, $other_name, $email, $cellphone, $password);

		if($result) 
		{
			$this->session->set_flashdata('error_msg', '<div class="alert alert-success text-center">User created please login in.</div>');	
			redirect('/login');
		}
		else
		{
			$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center">Something was wrong please try again..</div>');
			redirect('/register');
		}
	}
}	