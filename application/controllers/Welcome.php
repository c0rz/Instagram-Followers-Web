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
		$this->load->model('Database');
	}
	public function index()
	{
		$data['list_config'] = $this->config->config;
		if (!$this->session->userdata('credentials')) :
			$this->load->view('pendukung/bagian_atas', $data);
			$this->load->view('halaman_utama', $data);
			$this->load->view('pendukung/bagian_bawah');
		else :
			$session = $this->session->userdata('credentials');
			$instagram = new apiig();
			$data['instagram'] = $instagram->getUser($session["username"]);
			$this->load->view('pendukung/bagian_atas', $data);
			$this->load->view('halaman_menu', $data);
			$this->load->view('pendukung/bagian_bawah');
		endif;
	}
	public function login()
	{
		$data['list_config'] = $this->config->config;
		if (!$this->session->userdata('credentials')) :
			if ($this->input->post('username') && $this->input->post('password')) :
				$con['returnType'] = 'single';
				$con['conditions'] = array(
					'username' => $this->input->post('username'),
				);
				$cek_agent = $this->Database->getData($con);
				if ($cek_agent) :
					$instagram = new apiig();
					$login = $instagram->login($this->input->post('username'), $this->input->post('password'), $cek_agent['useragent']);
				else :
					$instagram = new apiig();
					$login = $instagram->login($this->input->post('username'), $this->input->post('password'));
				endif;
				if ($login->status == true) :
					$con['returnType'] = 'count';
					$con['conditions'] = array(
						'user_id' => $login->userId,
					);
					$cek_user = $this->Database->getData($con);
					if ($cek_user < 1) :
						$sql = array(
							'user_id' => $login->userId,
							'session' => $login->sessionid,
							'username' => $this->input->post('username'),
							'password' => $this->input->post('password'),
							'useragent' => $login->user_Agent,
							'poin' => 3,
							'status' => 1,
						);
						$insert = json_decode($this->Database->insert($sql));
						if ($insert) :
							$msg = '<div class="alert alert-success alert-dismissible">Selamat datang di ' . $data["list_config"]["title"] . ', anda akan di arahakan ke layanan kami.</div>';
							$array = json_encode(['result' => 1, 'content' => $msg, 'redirect' => 'hhttp://indolikers.net']);
							$arses = array('username' => $this->input->post('username'), 'user_id' => $login->userId);
							$this->session->set_userdata('credentials', $arses);
							print_r($array);
						else :
							$msg = '<div class="alert alert-warning  alert-dismissible">Ada masalah dalam menginputkan data, Lapor ke Admin [CODE: 6102]</div>';
							$array = json_encode(['result' => 0, 'content' => $msg]);
							print_r($array);
						endif;
					else :
						$sql = array(
							'username' => $this->input->post('username'),
							'session' => $login->sessionid,
						);
						$update = json_decode($this->Database->update($sql, $login->userId));
						if ($update) :
							$msg = '<div class="alert alert-success alert-dismissible">Selamat datang di ' . $data["list_config"]["title"] . ', anda akan di arahakan ke layanan kami.</div>';
							$array = json_encode(['result' => 1, 'content' => $msg, 'redirect' => 'hhttp://indolikers.net']);
							$arses = array('username' => $this->input->post('username'), 'user_id' => $login->userId);
							$this->session->set_userdata('credentials', $arses);
							print_r($array);
						else :
							$msg = '<div class="alert alert-warning  alert-dismissible">Ada masalah dalam menginputkan data, Lapor ke Admin [CODE: 466]</div>';
							$array = json_encode(['result' => 0, 'content' => $msg]);
							print_r($array);
						endif;
					endif;
				else :
					$msg = '<div class="alert alert-danger  alert-dismissible">' . $login->message . '</div>';
					$array = json_encode(['result' => 0, 'content' => $msg]);
					print_r($array);
				endif;
			else :
				$this->load->view('pendukung/bagian_atas', $data);
				$this->load->view('halaman_masuk', $data);
				$this->load->view('pendukung/bagian_bawah');
			endif;
		else :
			redirect(base_url());
		endif;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
