<?php
/**
 * 
 */
class Auth_model extends CI_Model
{
	
	public function add_user()
	{
		$data = [
			'email' => $this->input->post('email', true),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'full_name' => $this->input->post('name', true),
			'phone' => $this->input->post('phone', true),
			'image_profile' => 'default.jpeg',
			'role_id' => 2,
			'is_active' => 1,
			'date_created' => time(),
			];
		$this->db->insert('users', $data);
	}

	public function auth_user()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		return $this->db->get_where('users', ['email' => $email])->row_array();
	}

	public function retrieve($email)
	{
		return $this->db->get_where('users', ['email' => $email])->row_array();
	}
}

?>