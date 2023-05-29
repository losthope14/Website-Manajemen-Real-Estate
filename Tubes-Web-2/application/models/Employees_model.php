<?php

/**
 * 
 */
class Employees_model extends CI_Model
{

	public function get_employees()
	{
		$query = $this->db->get('employees');
		return $query->result_array();
	}

	public function get_job_positions()
	{
		$query = $this->db->get('job_positions');
		return $query->result_array();
	}

	public function get_employee_by_id($id)
	{
		return $this->db->get_where('employees', ['id' => $id])->row_array();
	}

	public function AddEmployees($file_name)
	{
		$data = [
			"email" => $this->input->post('emailKaryawan', true),
			"full_name" => $this->input->post('namaKaryawan', true),
			"phone" => $this->input->post('telpKaryawan', true),
			"address" => $this->input->post("alamatKaryawan", true),
			"job_id" => $this->input->post('jabatan', true),
			"image_profile" => $file_name,
			"date_join" => time(),
			"is_active" => 1,
		];
		$this->db->insert('employees', $data);
	}

	public function UpdateEmployeesData($id,$file_name){
		$data = [
			"email" => $this->input->post('emailKaryawan', true),
			"full_name" => $this->input->post('namaKaryawan', true),
			"phone" => $this->input->post('telpKaryawan', true),
			"address" => $this->input->post("alamatKaryawan", true),
			"job_id" => $this->input->post('jabatan', true),
			"image_profile" => $file_name,
			"date_join" => time(),
			"is_active" => $this->input->post('status', true),
		];
		$this->db->where('id', $id);
		$this->db->update('employees', $data);
	}

	public function DeleteEmployeeData($id){
		// $this->db->where('employees', $id);
		$this->db->delete('employees', ['id' => $id]);
	}

	public function getEmployeeStatus()
	{
		$this->db->select("is_active, count(is_active) as employees_status_count");
		$this->db->group_by("is_active");
		return $this->db->get("employees")->result();
	}
}

?>