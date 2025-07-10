<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesanan_model');
		$this->load->library('cart');
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

		$this->load->library('form_validation');

		if ($cart && $subtotal) {
			$data_pesanan = [
				'tanggal_pesanan' => date('Y-m-d')
			];

			$id_pesanan = $this->Pesanan_model->add_pesanan($data_pesanan);

			foreach ($cart as $item) {
				$data_detail = [
					'id_pesanan' => $this->input->post('id_pesanan'),
					'id_produk' => $item['id_produk'],
					'qty' => $item['qty'],
					'subtotal' => $item['subtotal'],
					'selesai' => 0
				];

				$this->Pesanan_model->add_detail_pesanan($data_detail);
			}

			$this->session->unset_userdata('cart');
			$this->session->set_flashdata('success', 'Transaksi berhasil.');
		} else {
			$this->session->set_flashdata('error', 'Transaksi gagal, keranjang kosong atau uang tidak mencukupi.');
		}

		redirect('pesanan/pesanan');
	}

	public function Pesanan()
	{
		$data['Pesanan'] = $this->Pesanan_model->get_all_pesanan();

		$this->load->view('member/datapesanan_view', $data);
	}

	public function detail_pesanan($id_pesanan)
	{
		$data['detail_pesanan'] = $this->Pesanan_model->get_detail_pesanan_by_id($id_pesanan);

		$this->load->view('member/detailpesanan_view', $data);
	}

		public function selesai()
	{
	    $id_detail_pesanan = $this->input->post('id');

	    $detail = $this->Pesanan_model->get_detail_pesanan_by_detail_id($id_detail_pesanan);

	    if ($detail) {
	        $this->Pesanan_model->selesai($id_detail_pesanan, $detail['id_produk'], $detail['qty']);

	        echo json_encode(['success' => true]);
	    } else {
	        echo json_encode(['success' => false, 'message' => 'Data tidak ditemukan']);
	    }
	}


	public function cancel($id)
	{
		$result = $this->Pesanan_model->cancel($id, 'cancel');

		if ($result) {
			$this->session->set_flashdata('success', 'Status sewa berhasil diubah menjadi cancel.');
		} else {
			$this->session->set_flashdata('error', 'Gagal mengubah status sewa.');
		}

		redirect('pesanan/pesanan');
	}
}
