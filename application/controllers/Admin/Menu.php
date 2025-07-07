<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Produk_model');
		$this->load->model('Menu_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['menu'] = $this->Menu_model->get_all_menu();
		$data['total_menu'] = $this->Menu_model->count_all();
		$this->load->view('admin/menu/menu_view', $data);
	}

	public function get_menu_form()
	{
		$this->load->view('admin/menu/menu_add');
	}

	public function get_menu_form_update($id)
	{
		$data['menu'] = $this->Menu_model->get_menu_by_id($id);
		$this->load->view('admin/menu/menu_edit', $data);
	}

	public function menu_addsave()
	{
		$this->form_validation->set_rules('nama_menu', 'Nama menu', 'required');
		$this->form_validation->set_rules('gambar_menu', 'Gambar menu', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = $this->Menu_model->get_all_menu();
			$this->load->view('admin/menu/menu_add');
		} else {
			$data = [
				'nama_menu' => $this->input->post('nama_menu'),
				'gambar_menu' => $this->input->post('gambar_menu'),
			];
			$this->Menu_model->insert_menu($data);
			$this->session->set_flashdata('success', 'menu berhasil ditambah!');
			redirect('admin/menu');
		}
	}

	public function menu_editsave($id)
	{
		$this->form_validation->set_rules('nama_menu', 'Nama menu', 'required');
		$this->form_validation->set_rules('gambar_menu', 'Gambar menu', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = $this->Menu_model->get_menu_by_id($id);
			$this->load->view('admin/menu/menu_edit', $data);
		} else {
			$data = [
				'nama_menu' => $this->input->post('nama_menu'),
				'gambar_menu' => $this->input->post('gambar_menu'),
			];
			$this->Menu_model->update_menu($id, $data);
			$this->session->set_flashdata('success', 'menu berhasil diedit!');
			redirect('admin/menu');
		}
	}

	public function menu_delete($id)
	{
		$this->load->model('Produk_model');

		if ($this->Produk_model->menu_exists($id)) {
			$this->session->set_flashdata('error', 'menu ini tidak bisa dihapus karena sudah digunakan dalam Produk.');
			redirect('admin/menu');
		} else {
			$this->Menu_model->delete_menu($id);
			$this->session->set_flashdata('success', 'menu berhasil dihapus.');
			redirect('admin/menu');
		}
	}
}
