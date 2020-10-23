<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admpermintaan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ModelTransaksi');
		$this->load->model('ModelBarang');
		$this->load->model('ModelPelanggan');

		if (empty($this->session->userdata('id'))) {
			redirect(base_url());
		}
	}

	public function laporan(){
		$data['title']		= "Form Transaksi Penjualan";
		$id_user 			= $this->session->userdata('id');
		$data['user']		= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		$data['transaksi']	= $this->ModelTransaksi->select()->result_array();

		$this->load->view('admin/admtemplate/__header', $data);
		$this->load->view('admin/admpermintaan/laporanTransaksi', $data);
		$this->load->view('admin/admtemplate/__footer');
	}
}