<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

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
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function login_user() 
	{
		$this->load->model('user_model');

		$this->form_validation->set_rules("email", '', "trim|required|valid_email");
		$this->form_validation->set_rules("password", '', "trim|required");

		if(!$this->form_validation->run()){
			$errors = validation_errors();
			$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center">'.$errors.'</div>');
			redirect('/login');
			return;
		}
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$result = $this->user_model->validate_user($email, $password);

		if( $result > 0 )
		{
			$this->session->set_flashdata('error_msg', '<div class="alert alert-success text-center">Usuario valido!</div>');
			redirect('/login');
		}
		else
		{
			$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center">User or password invalids.</div>');
			redirect('/login');
		}

	}
}
	