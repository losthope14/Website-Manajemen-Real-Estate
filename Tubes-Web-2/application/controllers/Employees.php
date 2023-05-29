<?php

class Employees extends CI_Controller
{

	public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('Employees_model');
      $this->load->helper(array('file', 'url'));

      is_logged_in();
   }

   public function index()
	{
		
	}

	public function view_data()
	{
		$data =
		[
			'title' => 'Data Employees',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'employees' => $this->Employees_model->get_employees(),
			'positions' => $this->Employees_model->get_job_positions()
		];
		$this->load->view('AdminDashboard/DataHandler/Employees/employee_data', $data);
	}

	public function viewEmployeeProfile($id)
	{
		$data =
		[
			'title' => 'Employee Profile',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'employee' => $this->Employees_model->get_employee_by_id($id),
			'positions' => $this->Employees_model->get_job_positions()
		];
		$this->load->view('AdminDashboard/DataHandler/Employees/employee_profile', $data);
	}

	public function add_employee()
	{
		$data =
		[
			'title' => 'Add Data Employee',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'positions' => $this->Employees_model->get_job_positions()
		];

		$this->form_validation->set_rules('namaKaryawan', "Nama Karyawan", 'required', ['required' => 'Field nama karyawan belum diisi!']);
		$this->form_validation->set_rules('emailKaryawan', "Email Karyawan", 'required', ['required' => 'Field email karyawan belum diisi!']);
		$this->form_validation->set_rules('alamatKaryawan', "Alamat Karyawan", 'required', ['required' => 'Field alamat karyawan belum diisi!']);
		$this->form_validation->set_rules('telpKaryawan', "No. Telp Karyawan", 'required', ['required' => 'Field nomor telepon belum diisi!']);
		$this->form_validation->set_rules('jabatan', "Jabatan", 'required', ['required' => 'Field jabatan belum diisi!']);
		
		if ($this->form_validation->run() == false)
		{
			$data['jabatanData'] = $this->input->get('jabatan');
			$this->load->view('AdminDashboard/DataHandler/Employees/add_employee', $data);
		}
		else
		{
			$upload_image = $_FILES['image']['name'];

			if($upload_image)
			{
				$config['allowed_types'] = 'gif|jpg|png';
				$config['upload_path'] = './assets/image/employee_profile/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image'))
				{
					$image = $this->upload->data('file_name');
					$this->Employees_model->AddEmployees($image);

					$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data berhasil <strong>Ditambahkan</strong>!</div>');
					redirect('employees/view_data');
				}
				else
				{
					$this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'!</div>');
					$this->load->view('AdminDashboard/DataHandler/Employees/add_employee', $data);
				}
			}
			else
			{
				$this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Foto profile belum <strong>Ditambahkan</strong>!</div>');
				$this->load->view('AdminDashboard/DataHandler/Employees/add_employee', $data);
			}
		}
	}

	public function edit_employee_data($id)
	{
		$data =
		[
			'title' => 'Edit Data Employee',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'positions' => $this->Employees_model->get_job_positions(),
			'employee' => $this->Employees_model->get_employee_by_id($id)
		];

		$this->form_validation->set_rules('namaKaryawan', "Nama Karyawan", 'required', ['required' => 'Field nama karyawan belum diisi!']);
		$this->form_validation->set_rules('emailKaryawan', "Email Karyawan", 'required', ['required' => 'Field email karyawan belum diisi!']);
		$this->form_validation->set_rules('alamatKaryawan', "Alamat Karyawan", 'required', ['required' => 'Field alamat karyawan belum diisi!']);
		$this->form_validation->set_rules('telpKaryawan', "No. Telp Karyawan", 'required', ['required' => 'Field nomor telepon belum diisi!']);
		$this->form_validation->set_rules('jabatan', "Jabatan", 'required', ['required' => 'Field jabatan belum diisi!']);
		$this->form_validation->set_rules('status', "Status", 'required', ['required' => 'Field status belum dipilih!']);
		
		if ($this->form_validation->run() == false)
		{
			$data['jabatanData'] = $this->input->get('jabatan');
			$this->load->view('AdminDashboard/DataHandler/Employees/edit_employee_data', $data);
		}
		else
		{
			$upload_image = $_FILES['image']['name'];

			if($upload_image)
			{
				$config['allowed_types'] = 'gif|jpg|png';
				$config['upload_path'] = './assets/image/employee_profile/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image'))
				{
					$newImage = $this->upload->data('file_name');
					$this->Employees_model->UpdateEmployeesData($id,$newImage);

					$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data berhasil <strong>Diupdate</strong>!</div>');
					redirect('employees/view_data');
				}
				else
				{
					$this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'!</div>');
					$this->load->view('AdminDashboard/DataHandler/Employees/edit_employee_data', $data);
				}
			}
			else
			{
				$this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Foto profile belum <strong>ditambahkan</strong>!</div>');
				$this->load->view('AdminDashboard/DataHandler/Employees/edit_employee_data', $data);
			}
		}
	}

	public function delete_employee($id){
		$this->Employees_model->DeleteEmployeeData($id);
		$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data berhasil <strong>Dihapus</strong>!</div>');
		redirect('Employees/view_data');
	}


 }
?>