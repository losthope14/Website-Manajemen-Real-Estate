<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model');
	}

	public function index()
	{
		if ($this->session->userdata('sign'))
		{
			redirect('auth/blocked');
		}
		elseif($this->session->userdata('email') && $this->session->userdata('role_id'))
		{
			if($this->session->userdata('role_id') == 1)
			{
				redirect('admindash');
			}
			else
			{
				redirect('userview');
			}
		}
		else 
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required' => 'Email belum diisi!',
			'valid_email' => 'Email tidak valid!'
			]);
			$this->form_validation->set_rules('password', 'Password', 'required', [
				'required' => 'Password belum diisi!'
			]);

			if ($this->form_validation->run() == false)
			{
				$this->load->view('AdminDashboard/Auth/login');
			}
			else 
			{
				$user = $this->Auth_model->auth_user();

				if($user) 
				{
					if($user['is_active'] == 1)
					{
						if(password_verify($this->input->post('password'), $user['password']))
						{
							$data = 
							[
								'email' => $user['email'],
								'role_id' => $user['role_id'],
								'id' => $user['id']
							];
							$this->session->set_userdata($data);

							if ($user['role_id'] == 1)
							{
								redirect('admindash');
							}
							elseif ($user['role_id'] == 2)
							{
								redirect('userview');
							}
							else 
							{
								$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun <strong>tidak ditemukan</strong>!</div>');
								$this->load->view('AdminDashboard/Auth/login');
							}
						}
						else
						{
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password <strong>salah</strong>!</div>');
							$this->load->view('AdminDashboard/Auth/login');
						}	
					}
					else
					{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun <strong>belum diaktivasi</strong>!</div>');
						$this->load->view('AdminDashboard/Auth/login');
					}
				}
				else 
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun <strong>tidak ditemukan</strong>!</div>');
					$this->load->view('AdminDashboard/Auth/login');
				}
				
			}
		}
		
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim', [
			'required' => 'Field wajib diisi!',
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'required' => 'Field wajib diisi!',
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'required' => 'Field wajib diisi!',
			'matches' => 'Password tidak sesuai!',
			'min_length' => 'Password terlalu sederhana!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('phone', 'Phone number', 'required|trim', [
			'required' => 'Field wajib diisi!',
		]);

		if ($this->form_validation->run() == false)
		{
			$this->load->view('AdminDashboard/Auth/registration');
		}
		else 
		{
			$this->Auth_model->add_user();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil <strong>dibuat</strong>! Silahkan login!</div>');
			redirect('auth');
		}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('sign');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil <strong>log out</strong>!</div>');
		redirect('auth');
	}

	public function blocked()
	{
		if(empty($this->session->userdata('role_id')) && !empty($this->session->userdata('email')))
		{
			$data =
			[
				'title' => 'Access Blocked',
				'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
			];
			$this->load->view('admindashboard/auth/blocked', $data);
			$code = ['sign' => 'Blocked'];
	        $this->session->set_userdata($code);
		}
		else
		{
			if(empty($this->session->userdata('email')) && empty($this->session->userdata('role_id')))
			{
				redirect("auth");
			}
			elseif(!empty($this->session->userdata('email')) && !empty($this->session->userdata('role_id')))
			{
				if($this->session->userdata('role_id') == 1)
				{
					redirect("admindash");
				}
				else
				{
					redirect("userview");
				}
			}
		}

		/*if(!$this->session->userdata('role_id') && $this->session->userdata('sign'))
		{
			$data =
			[
				'title' => 'Access Blocked',
				'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
			];
			$this->load->view('admindashboard/auth/blocked', $data);
			echo $this->session->userdata('sign');die;
		}

		elseif($this->session->userdata('email') && $this->session->userdata('role_id'))
		{
			if($this->session->userdata('role_id') == 1)
			{
				redirect('admindash');
			}
			elseif($this->session->userdata('role_id') == 2)
			{
				redirect('userview');
			}
			else
			{
				echo "Hai";die;
				//redirect("auth");
			}
		}

		echo $this->session->userdata('sign');die;*/

	}

	public function account_retrieve()
	{
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Password belum diisi!'
		]);
		if ($this->form_validation->run() == false)
		{
			$data =
			[
				'title' => 'Access Blocked',
				'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
			];
			$this->load->view('AdminDashboard/Auth/blocked', $data);
		}
		else 
		{
			$email = $this->session->userdata('email');
			$user = $this->Auth_model->retrieve($email);

			if(password_verify($this->input->post('password'), $user['password']))
			{
				$data['role_id'] = $user['role_id'];
				$this->session->set_userdata($data);
				$this->session->unset_userdata('sign');

				if ($data['role_id'] == 1)
				{
					redirect('admindash');
				}
				else
				{
					redirect('userview');
				}
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
                    </button>Password salah!</div>');
				redirect('auth/blocked');
			}	
			
		}
	}
}

?>