<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	
	public function index()
	{

	
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
	

		$this->load->view('Page/home', $data);
	}

	public function loginpage()
	{

	
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
	

		$this->load->view('Page/loginpage', $data);
	}

	public function signuppage()
	{

	
		$data['style'] = $this->load->view('include/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/script', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
	

		$this->load->view('Page/signuppage', $data);
	}

	public function sellersignup()
	{
		if (isset($_SESSION['logged_in'])) {
			redirect('Page/loginpage');
		}else{
	
			$data['style'] = $this->load->view('include/style', NULL, TRUE);
			$data['script'] = $this->load->view('include/script', NULL, TRUE);
			$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		

			$this->load->view('Page/sellersignup', $data);
		}
	}

	public function suksespage()
	{

		if (isset($_SESSION['logged_in'])) {
			redirect('Page/loginpage');
		}else{
			$data['style'] = $this->load->view('include/style', NULL, TRUE);
			$data['script'] = $this->load->view('include/script', NULL, TRUE);
			$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		

			$this->load->view('template/suksespage', $data);
		}
	}
}
