<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Produk_model');
		$this->load->model('Kategori_model');
		$this->load->model('Menu_model');
	}

	public function index()
	{
		$data['menu'] = $this->Produk_model->get_all_produk();
		$data['kategori'] = $this->Kategori_model->get_all_kategori();

		$this->load->view('member/menu_view', $data);
	}

	public function detailmenu($id)
	{
		$data['detail_menu'] = $this->Menu_model->get_menu_by_id($id);
		$data['menu'] = $this->Menu_model->get_all_produk();

		$this->load->view('member/detailmenu_view', $data);
	}
}
