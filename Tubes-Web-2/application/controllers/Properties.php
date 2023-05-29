<?php

class Properties extends CI_Controller
{

	public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('Properties_model');
      $this->load->helper(array('file', 'url'));

      is_logged_in();
   }

   public function index()
   {

   }


	public function view_property()
	{
		$data = [
			'title' => 'Data Properti',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'properties' => $this->Properties_model->getAllProperties()
		];
		$this->load->view('AdminDashboard/DataHandler/Properties/view_property_data', $data);
	}

	public function view_property_images()
	{
		$data = [
			'title' => 'Data Gambar Properti',
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
			'images' => $this->Properties_model->getAllPropertyImages(),
			'properties' => $this->Properties_model->getAllProperties()
		];
		$this->load->view('AdminDashboard/DataHandler/Properties/view_property_images', $data);
	}

	public function view_details($id){
		$data = [
			'title' => 'Detail Properti',
			'property' => $this->Properties_model->getPropertyById($id),
			'images' => $this->Properties_model->getPropertyImages($id),
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('AdminDashboard/DataHandler/Properties/detail', $data);	
	}

	public function add_property()
	{
		$this->form_validation->set_rules('namaProperti', 'nama properti', 'required', ['required' => 'Field nama properti belum diisi!']);
		$this->form_validation->set_rules('bedroom', 'bedroom', 'required', ['required' => 'Field jumlah bedroom belum diisi!']);
		$this->form_validation->set_rules('hall', 'hall', 'required', ['required' => 'Field jumlah hall belum diisi!']);
		$this->form_validation->set_rules('kitchen', 'jurusan', 'required', ['required' => 'Field jumlah kitchen belum diisi!']);
		$this->form_validation->set_rules('bathroom', 'bathroom', 'required', ['required' => 'Field jumlah bathroom belum diisi!']);
		$this->form_validation->set_rules('balcony', 'balcony', 'required', ['required' => 'Field jumlah balcony belum diisi!']);
		$this->form_validation->set_rules('harga', 'harga', 'required', ['required' => 'Field jumlah harga belum diisi!']);
		$this->form_validation->set_rules('alamat', 'alamat', 'required', ['required' => 'Field alamat belum diisi!']);
		$this->form_validation->set_rules('link_video', 'link video', 'required', ['required' => 'Field link video belum diisi!']);
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', ['required' => 'Field deskripsi belum diisi!']);
		$this->form_validation->set_rules('link_lokasi', 'link lokasi', 'required', ['required' => 'Field link lokasi belum diisi!']);
		$this->form_validation->set_rules('pemilikProperti', 'pemilik properti', 'required', ['required' => 'Field pemilik properti belum diisi!']);
		$this->form_validation->set_rules('tipeProperti', 'tipe properti', 'required', ['required' => 'Field tipe properti belum diisi!']);
		$this->form_validation->set_rules('lot_size', 'lot size', 'required', ['required' => 'Field lot size belum diisi!']);
		$this->form_validation->set_rules('land_area', 'land_area', 'required', ['required' => 'Field land area belum diisi!']);
		$this->form_validation->set_rules('status', 'status', 'required', ['required' => 'Field status penjualan belum diisi!']);

		if($this->form_validation->run() == FALSE){
			$data =
			[
				'title' => 'Tambah Data Properti',
				'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
			];
			$this->load->view('AdminDashboard/DataHandler/Properties/add_property', $data);
		} else {
			$this->Properties_model->add_properties();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('Properties/view_property');
		}
	}

	public function update_property($id)
	{
		$this->form_validation->set_rules('namaProperti', 'nama properti', 'required', ['required' => 'Field nama properti belum diisi!']);
		$this->form_validation->set_rules('bedroom', 'bedroom', 'required', ['required' => 'Field jumlah bedroom belum diisi!']);
		$this->form_validation->set_rules('hall', 'hall', 'required', ['required' => 'Field jumlah hall belum diisi!']);
		$this->form_validation->set_rules('kitchen', 'jurusan', 'required', ['required' => 'Field jumlah kitchen belum diisi!']);
		$this->form_validation->set_rules('bathroom', 'bathroom', 'required', ['required' => 'Field jumlah bathroom belum diisi!']);
		$this->form_validation->set_rules('balcony', 'balcony', 'required', ['required' => 'Field jumlah balcony belum diisi!']);
		$this->form_validation->set_rules('harga', 'harga', 'required', ['required' => 'Field jumlah harga belum diisi!']);
		$this->form_validation->set_rules('alamat', 'alamat', 'required', ['required' => 'Field alamat belum diisi!']);
		$this->form_validation->set_rules('link_video', 'link video', 'required', ['required' => 'Field link video belum diisi!']);
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', ['required' => 'Field deskripsi belum diisi!']);
		$this->form_validation->set_rules('link_lokasi', 'link lokasi', 'required', ['required' => 'Field link lokasi belum diisi!']);
		$this->form_validation->set_rules('pemilikProperti', 'pemilik properti', 'required', ['required' => 'Field pemilik properti belum diisi!']);
		$this->form_validation->set_rules('tipeProperti', 'tipe properti', 'required', ['required' => 'Field tipe properti belum diisi!']);
		$this->form_validation->set_rules('lot_size', 'lot size', 'required', ['required' => 'Field lot size belum diisi!']);
		$this->form_validation->set_rules('land_area', 'land_area', 'required', ['required' => 'Field land area belum diisi!']);
		$this->form_validation->set_rules('status', 'status', 'required', ['required' => 'Field status penjualan belum diisi!']);

		if($this->form_validation->run() == FALSE){
			$data =
			[
				'title' => 'Ubah Data Properti',
				'property' => $this->Properties_model->getPropertyById($id),
				'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
			];

			$this->load->view('AdminDashboard/DataHandler/Properties/update', $data);
		} else {
			$this->Properties_model->updateProperty($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('Properties/view_property');
		}
	}

	public function delete_property($id){
		$this->Properties_model->deleteProperty($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('Properties/view_property');
	}

	public function add_images()
	{
		$data = [
			'title' => 'Tambah Gambar Properti',
			'properties' => $this->Properties_model->getAllProperties(),
			'user' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('AdminDashboard/DataHandler/Properties/add_images', $data);
	}

	public function proses_upload()
	{
		$config['upload_path'] = FCPATH.'/assets/image/properties/';
		$config['allowed_types'] = 'gif|jpg|png|ico';
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('userfile'))
		{
			$property_id = $this->input->post('property_id');
			$nama_file = $this->upload->data('file_name');
			$this->Properties_model->addPropertyImages($nama_file, $property_id);
		}
	}
 }
?>