<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->config('mainconfig');
	}
	public function index()
	{
		$data['list_config'] = $this->config->config;
		$this->load->view('pendukung/bagian_atas', $data);
		$this->load->view('halaman_utama', $data);
		$this->load->view('pendukung/bagian_bawah');
	}
	public function login()
	{
		$data['list_config'] = $this->config->config;
		$this->load->view('pendukung/bagian_atas', $data);
		$this->load->view('halaman_masuk', $data);
		$this->load->view('pendukung/bagian_bawah');
	}
}
