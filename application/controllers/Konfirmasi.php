<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_level') != 1) {
			redirect('Login/');
		}
	}

	public function konfirmasi()
	{
		$content = 'home/konfirmasi/konfirmasi';
		$js = 'home/konfirmasi/script_konfirmasi';
		$isi['penjualan_list'] = $this->Glo_model->joinpen_keb('penjualan.*,status_konfirmasi.nama_konfirmasi')->result();
		$this->load_template->begining('Pupuk DewiSri | Konfirmasi Pengiriman',$content,$js,$isi);
	}

	public function view_konfirmasi($id)
	{
		$content = 'home/konfirmasi/view_konfirmasi';
		$js = 'home/konfirmasi/script_konfirmasi';
		$isi['id'] = $id;
		$this->db->where('penjualan.id_penjualan', $id);
		$isi['view_pen'] = $this->Glo_model->joinpen_keb('penjualan.*,kebun.id_kebun,status_konfirmasi.nama_konfirmasi')->row();
		$this->db->where('penjualan_id_penjualan', $id);

		$isi['keranjang'] = $this->Glo_model->joinSto_stockpupuk('stock_to_penjualan.*,stock_pupuk.nama_pupuk,stock_pupuk.harga_pupuk')->result();

		$isi['kebun_list'] = $this->Glo_model->get('kebun')->result();
		$isi['pekerjaan_list'] = $this->Glo_model->get('pekerjaan')->result();
		$isi['sales_list'] = $this->db->select('id_sales,nama_sales')->get('sales')->result();
		$isi['supir_list'] = $this->db->select('id_supir,nama_supir')->get('supir_ud_dewisri')->result();
		$isi['pemohon_list'] = $this->db->select('id_pemohon,nama_pemohon')->get('pemohon')->result();
		$isi['perkiraan_list'] = $this->Glo_model->get('perkiraan')->result();
		$isi['konfirmasi_list'] = $this->Glo_model->get('status_konfirmasi')->result();
		$this->load_template->begining('Pupuk DewiSri | Konfirmasi Pengiriman | Detail',$content,$js,$isi);
	}

	public function dokonfirmasi($id)
	{
		$po = $this->input->post();
		$query = $this->Glo_model->update('penjualan',['id_penjualan' => $id],['status_konfirmasi_id_konfirmasi' => $po['konfirmasi']]);
		if ($query > 0) {
			echo '<script>alert("Data ID: '.$id.' Berhasil dikonfirmasi!!"); window.location.href="'.site_url('Konfirmasi/konfirmasi').'";</script>';
		} else {
			echo '<script>alert("Data ID: '.$id.' Gagal dikonfirmasi!!"); window.location.href="'.site_url('Konfirmasi/konfirmasi').'";</script>';
		}
	}

}

/* End of file Konfirmasi.php */
/* Location: ./application/controllers/Konfirmasi.php */