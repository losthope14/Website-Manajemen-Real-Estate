<?php

/**
 * 
 */
class AdminDash extends CI_Controller
{

	public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('Employees_model');
      $this->load->model('Properties_model');
      $this->load->model('UserData_model');
      $this->load->helper(array('file', 'url'));

      is_logged_in();
   }
	
	public function index()
	{
		$data =
		[
			'title' => 'Dashboard',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'propertyTypeData' => $this->Properties_model->getPropertyTypeData(),
			'employeesCount' => $this->Employees_model->get_employees(),
			'usersCount' => $this->UserData_model->get_users(),
			'properties' => $this->Properties_model->getAllProperties(),
			'propertyImagesCount' => $this->Properties_model->getAllPropertyImages(),
			'propertiesSoldStatus' => $this->Properties_model->getSoldStatus()
		];

		$this->load->view('AdminDashboard/home', $data);
	}

	public function view_admin_profile($id)
	{
		$data =
		[
			'title' => 'My Profile',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		
		$this->form_validation->set_rules('nama', "Nama Lengkap", 'required', ['required' => 'Field nama belum diisi!']);
		$this->form_validation->set_rules('email', "Email", 'required', ['required' => 'Field email belum diisi!']);
		$this->form_validation->set_rules('phone', "No, Hp", 'required', ['required' => 'Field nomor hp belum diisi!']);
		
		if ($this->form_validation->run() == false)
		{
			$this->load->view('AdminDashboard/profile', $data);
		}
		else
		{
			$upload_image = $_FILES['image']['name'];

			if($upload_image)
			{
				$config['allowed_types'] = 'gif|jpg|png';
				$config['upload_path'] = './assets/image/users_profile/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image'))
				{
					$newImage = $this->upload->data('file_name');
					$this->UserData_model->updateUserAdmin($id,$newImage);

					$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data berhasil <strong>Diupdate</strong>!</div>');
					redirect('AdminDash/view_admin_profile/'.$id);
				}
				else
				{
					$this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'!</div>');
					$this->load->view('AdminDashboard/profile', $data);
				}
			}
			else
			{
				$this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Foto profile belum <strong>ditambahkan</strong>!</div>');
				$this->load->view('AdminDashboard/profile', $data);
			}
		}
	}

	public function view_contacts()
	{
		$data =
		[
			'employees' => $this->Employees_model->get_employees(),
			'job_positions' => $this->Employees_model->get_job_positions(),
			'title' => 'Contacts',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('AdminDashboard/contacts', $data);
	}

	public function view_mailbox()
	{
		$data =
		[
			'title' => 'MailBox',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('AdminDashboard/mailbox', $data);
	}

	public function send_specific_email($id)
	{
		$data =
		[
			'title' => 'Compose Message',
			'user_email' => $this->Employees_model->get_employee_by_id($id),
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('AdminDashboard/compose', $data);
	}

	public function send_email()
	{
		$data =
		[
			'title' => 'Compose Message',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('AdminDashboard/compose', $data);
	}

	public function read_email()
	{
		$data =
		[
			'title' => 'Read Message',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('AdminDashboard/read_email', $data);
	}

	public function view_calendar()
	{
		$data =
		[
			'title' => 'Calendar',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('AdminDashboard/calendar', $data);
	}
}

?>