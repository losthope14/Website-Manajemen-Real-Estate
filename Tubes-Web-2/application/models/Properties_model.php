<?php

/**
 * 
 */
class Properties_model extends CI_Model
{

	public function getAllProperties(){
		return $this->db->get('properties')->result_array();
	}

	public function getPropertyById($id)
	{
		return $this->db->get_where('properties', ['id' => $id])->row_array();
	}

	public function getPropertyImages($id)
	{
		return $this->db->get_where('property_images', ['property_id' => $id])->result_array();
	}

	public function getAllPropertyImages()
	{
		return $this->db->get('property_images')->result_array();
	}

	public function add_properties()
	{
		$data = [
			"nama_properti" => $this->input->post('namaProperti', true),
			"bedroom" => $this->input->post('bedroom', true),
			"hall" => $this->input->post('hall', true),
			"kitchen" => $this->input->post('kitchen', true),
			"bathroom" => $this->input->post('bathroom', true),
			"balcony" => $this->input->post('balcony', true),
			"price" => $this->input->post('harga', true),
			"address" => $this->input->post('alamat', true),
			"link_video" => $this->input->post('link_video', true),
			"description" => $this->input->post('deskripsi', true),
			"link_lokasi" => $this->input->post('link_lokasi', true),
			"property_owner" => $this->input->post('pemilikProperti', true),
			"property_type" => $this->input->post('tipeProperti', true),
			"lot_size" => $this->input->post('lot_size', true),
			"land_area" => $this->input->post('land_area', true),
			"date_added" => time(),
			"sold" => $this->input->post('status', true),
		];
		$this->db->insert('properties', $data);
	}

	public function updateProperty($id){
		$data = [
			"nama_properti" => $this->input->post('namaProperti', true),
			"bedroom" => $this->input->post('bedroom', true),
			"hall" => $this->input->post('hall', true),
			"kitchen" => $this->input->post('kitchen', true),
			"bathroom" => $this->input->post('bathroom', true),
			"balcony" => $this->input->post('balcony', true),
			"price" => $this->input->post('harga', true),
			"address" => $this->input->post('alamat', true),
			"link_video" => $this->input->post('link_video', true),
			"description" => $this->input->post('deskripsi', true),
			"link_lokasi" => $this->input->post('link_lokasi', true),
			"property_owner" => $this->input->post('pemilikProperti', true),
			"property_type" => $this->input->post('tipeProperti', true),
			"lot_size" => $this->input->post('lot_size', true),
			"land_area" => $this->input->post('land_area', true),
			"sold" => $this->input->post('status', true),
		];

		$OldData = $this->db->get_where('properties', ['id' => $id])->row_array();

		if ($OldData["sold"] != $data["sold"] && $data["sold"] == "Terjual")
		{
			$data["sold_date"] = time();
		}
		elseif ($OldData["sold"] != $data["sold"] && $data["sold"] == "Belum Terjual") {
			$data["sold_date"] = 0;
		}

		$this->db->where('id', $id);
		$this->db->update('properties', $data);
	}

	public function addPropertyImages($file_name, $property_id)
	{
		$this->db->insert('property_images', ['image'=>$file_name, 'property_id'=>$property_id]);
	}

	public function deleteProperty($id){
		// $this->db->where('nim', $nim);
		$this->db->delete('properties', ['id' => $id]);
	}

	public function getPropertyTypeData()
	{
		$this->db->select("property_type, count(property_type) as property_count");
		$this->db->group_by("property_type");
		return $this->db->get("properties")->result();
	}

	public function getSoldStatus()
	{
		$this->db->select("sold, count(sold) as sold_count");
		$this->db->group_by("sold");
		return $this->db->get("properties")->result();
	}
}

?>