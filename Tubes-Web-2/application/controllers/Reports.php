<?php

class Reports extends CI_Controller
{

	public function __construct()
   {
      parent::__construct();
      $this->load->model('Employees_model');
      $this->load->model('UserData_model');
      $this->load->model('Properties_model');

      is_logged_in();
   }

   public function index()
   {

   }

   public function properties_report()
   {
   		$data = 
   		[
			'title' => 'Report Data Properti',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'properties' => $this->Properties_model->getAllProperties()
		];
		$this->load->view('AdminDashboard/ReportsView/report_properties', $data);
   }

   public function employees_report()
   {
   		$data =
		[
			'title' => 'Report Data Karyawan',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'employees' => $this->Employees_model->get_employees(),
			'positions' => $this->Employees_model->get_job_positions()
		];
		$this->load->view('AdminDashboard/ReportsView/report_employees', $data);
   }

   public function users_report()
   {
   		$data =
		[
			'title' => 'Report Data User',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'users' => $this->UserData_model->get_users()
		];
		$this->load->view('AdminDashboard/ReportsView/report_users', $data);
   }

   /*public function cetak_properti()
  {
    $data['alumni'] = $this->UserData_model->get_users();
    $this->load->view('AdminDashboard/ReportsView/report_properties', $data);
    $html           = $this->output->get_output();
    $pdf = new Dompdf();

    $CI = &get_instance();
    $CI->dompdf = $pdf;
    $paper_size     = "A4";
    $orientation    = "Landscape";
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("data-properti.pdf", array("Attachment" => 0));
  }*/

 }
?>