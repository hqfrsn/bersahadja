<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Produk_model');
		$this->load->model('Kategori_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['kategori'] = $this->Kategori_model->get_all_kategori();
		$data['total_kategori'] = $this->Kategori_model->count_all();
		$this->load->view('admin/kategori/kategori_view', $data);
	}

	public function get_kategori_form()
	{
		$this->load->view('admin/kategori/kategori_add');
	}

	public function get_kategori_form_update($id)
	{
		$data['kategori'] = $this->Kategori_model->get_kategori_by_id($id);
		$this->load->view('admin/kategori/kategori_edit', $data);
	}

	public function kategori_addsave()
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['kategori'] = $this->Kategori_model->get_all_kategori();
			$this->load->view('admin/kategori/kategori_add');
		} else {
			$data = [
				'nama_kategori' => $this->input->post('nama_kategori'),
			];
			$this->Kategori_model->insert_kategori($data);
			$this->session->set_flashdata('success', 'Kategori berhasil ditambah!');
			redirect('admin/kategori');
		}
	}

	public function kategori_editsave($id)
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['kategori'] = $this->Kategori_model->get_kategori_by_id($id);
			$this->load->view('admin/kategori/kategori_edit', $data);
		} else {
			$data = [
				'nama_kategori' => $this->input->post('nama_kategori'),
			];
			$this->Kategori_model->update_kategori($id, $data);
			$this->session->set_flashdata('success', 'kategori berhasil diedit!');
			redirect('admin/kategori');
		}
	}

	public function kategori_delete($id)
	{
		$this->load->model('Produk_model');

		if ($this->Produk_model->kategori_exists($id)) {
			$this->session->set_flashdata('error', 'kategori ini tidak bisa dihapus karena sudah digunakan dalam Produk.');
			redirect('admin/kategori');
		} else {
			$this->Kategori_model->delete_kategori($id);
			$this->session->set_flashdata('success', 'kategori berhasil dihapus.');
			redirect('admin/kategori');
		}
	}
}
