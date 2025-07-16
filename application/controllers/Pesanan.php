<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesanan_model');
		$this->load->library('cart');
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['cart'] = $this->session->userdata('cart') ?? [];
		$data['total'] = $this->calculate_total();

		$this->load->view('member/pesanan_view', $data);
	}

	private function calculate_total()
	{
		$cart = $this->session->userdata('cart') ?? [];
		return array_sum(array_column($cart, 'subtotal'));
	}

	public function bayar()
	{
	    $cart = $this->session->userdata('cart') ?? [];
	    $subtotal = $this->calculate_total();

	    if ($cart && $subtotal) {
	        $data_pesanan = [
	            'tanggal_pesanan' => date('Y-m-d H:i:s'),
	            'status_pesanan' => 'proses'
	        ];

	        $id_pesanan = $this->Pesanan_model->add_pesanan($data_pesanan);

	        foreach ($cart as $item) {
	            $data_detail = [
	                'id_pesanan' => $id_pesanan,
	                'id_produk' => $item['id_produk'],
	                'qty' => $item['qty'],
	                'subtotal' => $item['subtotal']
	            ];

	            $this->Pesanan_model->add_detail_pesanan($data_detail);
	        }

	        $this->session->set_userdata('last_pesanan_id', $id_pesanan);
	        $this->session->unset_userdata('cart');
	        $this->session->set_flashdata('success', 'Transaksi berhasil.');
	    } else {
	        $this->session->set_flashdata('error', 'Transaksi gagal, keranjang kosong atau subtotal 0.');
	    }

	    redirect('pesanan/pesanan');
	}

	public function Pesanan()
	{
	    $last_id = $this->session->userdata('last_pesanan_id');

	    if ($last_id) {
	        $data['pesanan'] = [$this->Pesanan_model->get_pesanan_by_id($last_id)];
	        $data['detail_pesanan'] = $this->Pesanan_model->get_detail_pesanan_by_id($last_id);

	        $this->session->unset_userdata('last_pesanan_id');

	        $this->load->view('member/datapesanan_view', $data);
	    } else {
	        redirect('menu');
	    }
	}
}
