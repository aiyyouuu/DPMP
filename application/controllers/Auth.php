<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('login/admin');
	}
	public function prosesLogin() {
		if(isset($_POST['login'])) {
			$user = $this->input->post('username', TRUE);
			$pass = $this->input->post('password', TRUE);

			$cek = $this->db->get_where('user', ['username' => $user])->row_array();

			// Jika username ada
			if ($cek > 0) {

						$data =array(
							'id' 		=> $cek['id_user'],
							'username'	=> $cek['username']
						);
						$this->session->set_userdata($data);
						$this->session->set_flashdata('success', 'Login berhasil.');
						if ($cek['level'] == 'divisi') {
						redirect('index.php/divisi/barang');
						} else if ($cek['level'] == 'admin') {
							redirect('index.php/admin/admpermintaan/laporan');
						}else if ($cek['level'] == 'kepala') {
							redirect('index.php/kepala/keptransaksi/laporan');
						}else if ($cek['level'] == 'it') {
							redirect('index.php/it/itbarang');

			} else {
				$this->session->set_flashdata('error', 'Username tidak terdaftar.');
				redirect(base_url());
			}
		}

		if (!$this->session->logged_in) {
			redirect(base_url());
		}
	}
}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->set_flashdata('success', 'Logout.');
		redirect(base_url());
	}
	public function regis(){
		$this->load->view('registrasi');
	}

}