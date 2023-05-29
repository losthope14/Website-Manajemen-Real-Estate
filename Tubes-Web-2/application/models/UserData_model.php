<?php

/**
 * 
 */
class UserData_model extends CI_Model
{

	public function get_users()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function updateUserAdmin($id, $file_name)
	{
		$data = [
			"email" => $this->input->post('email', true),
			"full_name" => $this->input->post('nama', true),
			"phone" => $this->input->post('phone', true),
			"image_profile" => $file_name,
		];
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	public function get_user_by_id($id){
		return $this->db->get_where('users', ['id' => $id])->row_array();
	}

	public function delete_user($id)
	{
		$this->db->delete('users', ['id' => $id]);
	}

	public function reset_password($id, $pass)
	{
		$data["password"] = $pass;

		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

}

?>