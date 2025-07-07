<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
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
		$data['produk'] = $this->Produk_model->get_all_produk();
		$data['menu'] = $this->Menu_model->get_all_menu();

		$data['cart'] = $this->session->userdata('cart') ?? [];
    	$data['total'] = $this->calculate_total();

		$this->load->view('member/menu_view', $data);
	}

	public function menu($id_menu)
	{
		$data['produk'] = $this->Menu_model->get_menu_by_menu($id_menu);
		$data['menu'] = $this->Menu_model->get_all_menu();

		$data['cart'] = $this->session->userdata('cart') ?? [];
		$data['total'] = $this->calculate_total();

		$this->load->view('member/menu_view', $data);
	}

	public function detailmenu($id)
	{
		$data['detail_produk'] = $this->Menu_model->get_menu_by_menu($id);
		$data['menu'] = $this->Menu_model->get_all_produk();

		$data['cart'] = $this->session->userdata('cart') ?? [];
    	$data['total'] = $this->calculate_total();

		$this->load->view('member/detailmenu_view', $data);
	}

	public function cart_add()
	{
		$id_produk = $this->input->post('id_produk');
		$qty = (int) $this->input->post('qty');
		$id_kategori = $this->input->post('id_kategori');
		$redirect_url = $this->input->post('redirect_url');

		$produk = $this->Menu_model->get_produk_by_id($id_produk);

		if ($produk && $qty > 0) {
			$cart = $this->session->userdata('cart') ?? [];

			$item = array_search($id_produk, array_column($cart, 'id_produk'));

			if ($item !== false) {
				$cart[$item]['qty'] += $qty;
				$cart[$item]['subtotal'] = $cart[$item]['qty'] * str_replace('.', '', $produk['harga_produk']);
			} else {
				$cart[] = [
					'id_produk' => $produk['id_produk'],
					'nama_produk' => $produk['nama_produk'],
					'gambar_produk' => $produk['gambar_produk'],
					'harga' => (int) str_replace('.', '', $produk['harga_produk']),
					'qty' => $qty,
					'subtotal' => $qty * (int) str_replace('.', '', $produk['harga_produk'])
				];
			}

			$this->session->set_userdata('cart', $cart);
			$this->session->set_flashdata('success', 'Produk berhasil ditambah.');
		} else {
			$this->session->set_flashdata('error', 'Produk atau jumlah tidak valid.');
		}

		if (!empty($redirect_url)) {
			redirect($redirect_url);
		} else {
			redirect('menu');
		}
	}

	private function calculate_total()
	{
		$cart = $this->session->userdata('cart') ?? [];
		return array_sum(array_column($cart, 'subtotal'));
	}

	public function keranjang_delete($id_produk)
	{
		$cart = $this->session->userdata('cart') ?? [];
		$cart = array_filter($cart, fn($item) => $item['id_produk'] != $id_produk);
		$this->session->set_userdata('cart', array_values($cart));
		redirect('menu');
	}

}
