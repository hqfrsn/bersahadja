<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model');
		$this->load->model('Produk_model');
		$this->load->model('Menu_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['produk'] = $this->Produk_model->get_all_produk();

		$this->load->view('admin/produk/produk_view', $data);
	}

	public function produk_add()
	{
		$data['kategori'] = $this->Kategori_model->get_all_kategori();

		$this->load->view('admin/produk/produk_add', $data);
	}

	public function produk_addsave()
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('id_kategori', 'Kategori Produk', 'required');
		$this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required');
		$this->form_validation->set_rules('gambar_produk', 'Gambar Produk', 'required');
		$this->form_validation->set_rules('keterangan_produk', 'Keterangan Produk', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['kategori'] = $this->Kategori_model->get_all_kategori();

			$this->load->view('admin/produk/produk_add', $data);
		} else {
			$data = [
				'nama_produk' => $this->input->post('nama_produk'),
				'id_kategori' => $this->input->post('id_kategori'),
				'harga_produk' => $this->input->post('harga_produk'),
				'gambar_produk' => $this->input->post('gambar_produk'),
				'keterangan_produk' => $this->input->post('keterangan_produk')
			];
			$this->Produk_model->insert_produk($data);
			$this->session->set_flashdata('success', 'Produk berhasil ditambah!');
			redirect('admin/produk');
		}
	}

	public function produk_edit($id)
	{
		$data['produk'] = $this->Produk_model->get_produk_by_id($id);
    	$data['kategori'] = $this->Kategori_model->get_all_kategori();

		$this->load->view('admin/produk/produk_edit', $data);
	}

	public function produk_editsave($id)
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('id_kategori', 'Kategori Produk', 'required');
		$this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required');
		$this->form_validation->set_rules('gambar_produk', 'Gambar Produk', 'required');
		$this->form_validation->set_rules('keterangan_produk', 'Keterangan Produk', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data['produk'] = $this->Produk_model->get_produk_by_id($id);
			$data['kategori'] = $this->Kategori_model->get_all_kategori();

			$this->load->view('admin/produk/produk_edit', $data);
		} else {
			$data = [
				'nama_produk' => $this->input->post('nama_produk'),
				'id_kategori' => $this->input->post('id_kategori'),
				'harga_produk' => $this->input->post('harga_produk'),
				'gambar_produk' => $this->input->post('gambar_produk'),
				'keterangan_produk' => $this->input->post('keterangan_produk')
			];
			$this->Produk_model->edit_produk($id, $data);
			$this->session->set_flashdata('success', 'Produk berhasil diedit!');
			redirect('Admin/produk');
		}
	}

	public function produk_delete($id)
	{
		$this->Produk_model->delete_produk($id);
		$this->session->set_flashdata('success', 'Produk berhasil dihapus.');
		redirect('Admin/produk');
	}

	public function update_status()
	{
		$id_produk = $this->input->post('id');
		$status = $this->input->post('status');

		$this->Produk_model->update_status($id_produk, $status);
		echo json_encode(['success' => true]);
	}

}
