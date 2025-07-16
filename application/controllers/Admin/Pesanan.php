<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Produk_model');
		$this->load->model('Pesanan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['pesanan'] = $this->Pesanan_model->get_all_pesanan();
		$this->load->view('admin/pesanan/pesanan_view', $data);
	}

	public function detail_pesanan($id_pesanan)
	{
		$data['detail_pesanan'] = $this->Pesanan_model->get_detail_pesanan_by_id($id_pesanan);
		$this->load->view('admin/pesanan/pesanan_detail', $data);
	}

	public function status_pesanan($id_pesanan, $status)
	{
	    if (!in_array($status, ['selesai', 'cancel'])) {
	        $this->session->set_flashdata('error', 'Status tidak valid.');
	        redirect('admin/pesanan');
	    }

	    $result = $this->Pesanan_model->status_pesanan($id_pesanan, $status);

	    if ($result) {
	        $this->session->set_flashdata('success', 'Status pesanan berhasil diubah menjadi ' . $status . '.');
	    } else {
	        $this->session->set_flashdata('error', 'Gagal mengubah status pesanan.');
	    }

	    redirect('admin/pesanan');
	}

}
