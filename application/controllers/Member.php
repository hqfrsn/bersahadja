<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('member/dashboard_view');
	}

	public function tentang()
	{
		$this->load->view('member/tentang_view');
	}
}
