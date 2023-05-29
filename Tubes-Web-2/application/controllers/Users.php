<?php

class Users extends CI_Controller
{

	public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('UserData_model');

      is_logged_in();
   }

   public function index()
	{
		$data =
		[
			'title' => 'Data User',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'users' => $this->UserData_model->get_users()
		];
		$this->load->view('AdminDashboard/DataHandler/Users/user_data', $data);
	}

	public function delete_user_account($id)
	{
		$this->UserData_model->delete_user($id);
		$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Akun berhasil <strong>Dihapus</strong>!</div>');
		redirect('users');
	}

	public function reset_user_password($id)
	{
		$data =
		[
			'title' => 'Reset Password',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'passwordDefault' => password_hash("easyre123", PASSWORD_DEFAULT)
		];

		$this->form_validation->set_rules('newPassword', "New Password", 'required', ['required' => 'Field password belum diisi! Silahkan isi terlebih dahulu!']);
		if ($this->form_validation->run() == false)
		{
			$this->load->view('AdminDashboard/DataHandler/Users/reset_password', $data);
		}
		else
		{
			$pass = $this->input->post('newPassword');
			$this->UserData_model->reset_password($id, $pass);

			$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Password berhasil <strong>Direset</strong>!</div>');
			redirect('users');
		}
	}

 }
?>