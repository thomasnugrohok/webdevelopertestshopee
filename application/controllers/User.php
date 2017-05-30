<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()

	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
	}	

	public function index()
	{

	
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
	

		$this->load->view('Page/home', $data);
	}

	
	public function login()
	{	
		$this->load->model('user_models');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]');


		

		if ($this->form_validation->run() == FALSE) {

			$data['style'] = $this->load->view('include/style', NULL, TRUE);
			$data['script'] = $this->load->view('include/script', NULL, TRUE);
			$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
	

			$this->load->view('Page/loginpage', $data);
		}else {
			$username 		= $this->input->post('username');
			$password		= $this->input->post('password');
			
			$logged 		= $this->user_models->login($username, $password);
			
			$login_forSession = $logged->result();
			$masuk = $logged->num_rows();
			// $fullname = $this->user_models->selectUsername($username, $password);
			if ($masuk>0) {

				foreach ($login_forSession as $key) {
					$logged_in = array(
						'username' => $key->user_username,
						'userid' => $key->user_id,
						'status' => "login"
					);

				$_SESSION['logged_in'] = $logged_in;
				}
				$logged_seller 	= $this->user_models->searchSeller($_SESSION['logged_in']['userid'])->num_rows();
				if ($logged_seller>0) {
					redirect('/Page/suksespage');
				}else {
					redirect('/Page/sellersignup');
				}
				
				
			}
		}
		
		
	}

	public function signup()
	{

		$this->load->model('user_models');


		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[15]|is_unique[user.user_username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]');
		$this->form_validation->set_rules('repassword', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.user_email]');

		if ($this->form_validation->run() == FALSE) {
			$data['style'] = $this->load->view('include/style', NULL, TRUE);
			$data['script'] = $this->load->view('include/script', NULL, TRUE);
			$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
	

			$this->load->view('Page/signuppage', $data);
					
			
		}else{
			$username 	= $this->input->post('username');
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');
			$repassword = $this->input->post('repassword');

			$this->user_models->add($username,$email,md5($password));
			redirect('/page/index');
		}
		
	}

	public function seller(){
		if ($_SESSION['logged_in']['status'] !=="login") {
			redirect('Page/loginpage');
		}else{
			$this->load->model('user_models');


		
			$this->form_validation->set_rules('noktp', 'No. KTP', 'trim|required|min_length[6]|max_length[16]');
			// $this->form_validation->set_rules('fotodiri', '', 'required');
			// $this->form_validation->set_rules('fotoktp', '', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data['style'] = $this->load->view('include/style', NULL, TRUE);
				$data['script'] = $this->load->view('include/script', NULL, TRUE);
				$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		

				$this->load->view('Page/sellersignup', $data);
			}else{
				$noktp	= $this->input->post('noktp');

				$config['upload_path']          = './uploads/fotodiri';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
			 
				$this->load->library('upload', $config);
				$fotodiri = $this->upload->do_upload('fotodiri');
				$fotoktp = $this->upload->do_upload('fotoktp');
			 
				if ( !$fotodiri && !$fotoktp){
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
					//$this->load->view('v_upload', $error);
				}else{
					$fotodirifilename = $this->upload->data('file_name');
					$fotodiridata = array('upload_data' => $this->upload->data('file_name'));

					$fotoktpfilename = $this->upload->data('file_name');
					$fotoktpdata = array('upload_data' => $this->upload->data('file_name'));
					//$this->load->view('v_upload_sukses', $data);
				}

				$this->user_models->addPrefSeller($noktp,$fotodirifilename,$fotoktpfilename, $_SESSION['logged_in']['userid']);

				redirect('/Page/suksespage');

			}
		}

		
		

	}

	public function logout(){
		session_destroy();
		redirect('/Page/index');
	}

}