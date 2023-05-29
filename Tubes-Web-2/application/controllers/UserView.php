<?php

/**
 * 
 */
class UserView extends CI_Controller
{

	public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('Employees_model');
      $this->load->model('Properties_model');
      $this->load->model('UserData_model');

      is_logged_in();
   }
	
	public function index()
	{
		$data =
		[
			'title' => 'Welcome Page',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('User/index', $data);
	}

	public function about()
	{
		$data =
		[
			'title' => 'About Us',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('User/about', $data);
	}

	public function property()
	{
		$data =
		[
			'title' => 'Property',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'properties' => $this->Properties_model->getAllProperties(),
			'images' => $this->Properties_model->getAllPropertyImages(),
			'admin' => $this->db->get_where('users', ['role_id' => 1])->row_array()
		];
		$this->load->view('User/properties', $data);
	}

	public function contact()
	{
		$data =
		[
			'title' => 'Contact',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('User/contact', $data);
	}
}

?>