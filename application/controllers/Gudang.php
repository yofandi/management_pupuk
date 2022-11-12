<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_level') != 1) {
			redirect('Login/');
		}
	}

	public function gudang()
	{
		$content = 'home/gudang/gudang';
		$js = 'home/gudang/script_gudang';

		$this->db->select('id_suplier,nama_suplier');
		$isi['suplier'] = $this->Glo_model->get('suplier')->result();
		$this->db->select('id_stock,nama_pupuk,qty');
		$isi['stock_pupuk'] = $this->Glo_model->get('stock_pupuk')->result();

		$this->db->order_by('history_add_pupuk.id_history', 'desc');
		$isi['history'] = $this->Glo_model->joinhistorytostock_pupuktosupltotg('history_add_pupuk.*,stock_pupuk.nama_pupuk,suplier.nama_suplier,tagihan.uang_bbm')->result();
		$this->load_template->begining('Pupuk DewiSri | Management Gudang',$content,$js,$isi);
	}

	public function get_valuesat()
	{
		$po = $this->input->post();
		$this->db->select('satuan_barang.idsatuan_barang,satuan_barang.nama_satuan');
		$this->db->from('stock_pupuk');
		$this->db->join('satuan_barang', 'stock_pupuk.satuan_barang_idsatuan_barang = satuan_barang.idsatuan_barang', 'inner');
		$this->db->where('stock_pupuk.id_stock', $po['pupuk']);
		$query = $this->db->get()->row_array();

		echo json_encode($query);
	}

	public function insert_gudang()
	{
		$po = $this->input->post();
		$ongkir = intval(preg_replace('/[^\d.]/', '', $po['ongkos_kirim']));
		$uangbbm = intval(preg_replace('/[^\d.]/', '', $po['uang_bbm']));
		$tanggal = date_create($po['tanggal']);
		$tgl = date_format($tanggal, 'Y-m-d H:i:s');

		$select_id = 'MAX(id_history) as id_history';
		$id = $this->Glo_model->make_id($select_id,'id_history','history_add_pupuk','GD');

		$ins = array('id_history' => $id,
					 'suplier_id_suplier' => $po['suplier'],
					 'no_do' => $po['no_do'],
					 'no_police' => $po['no_polisi'],
					 'driver' => $po['supir'],
					 'jml_li' => $po['jml_li'],
					 'qty_satuan' => $po['qty_satuan'],
					 'receiver' => $po['penerima'],
					 'ongkos_kirim' => $ongkir,
					 'tanggal_history' => $tgl,
					 'stock_pupuk_id_stock' => $po['pupuk'],
					 'satuan_barang_idsatuan_barang' => $po['id_satuan']
					);
		$query = $this->Glo_model->insert('history_add_pupuk', $ins);
		if ($query > 0) {
			$this->db->select('qty');
			$this->db->where('id_stock', $po['pupuk']);
			$stock = $this->Glo_model->get('stock_pupuk')->row();
			$tambah = $stock->qty + $po['jml_li'];

			$this->Glo_model->update('stock_pupuk',array('id_stock' => $po['pupuk']),array('qty' => $tambah));
			$tag = array('ongkos_kirim_tagihan' => $ongkir,
						 'uang_bbm' => $uangbbm,
						 'status_pelunasan' => 'Belum Lunas',
						 'history_add_pupuk_id_history' => $id);
			$this->Glo_model->insert('tagihan', $tag);

			echo '<script>alert("Success!! Data berhasil ditambahkan"); window.location="'.site_url('Gudang/gudang').'"</script>';
		} else {
			echo "<script>alert('Failed!! Data gagal ditambahakan'); window.location=".site_url('Gudang/gudang')."</script>";
		}
	}

	public function update_gudang($id)
	{
		$po = $this->input->post();
		$ongkir = intval(preg_replace('/[^\d.]/', '', $po['ongkos_kirim']));
		$uangbbm = intval(preg_replace('/[^\d.]/', '', $po['uang_bbm']));
		$tanggal = date_create($po['tanggal']);
		$tgl = date_format($tanggal, 'Y-m-d H:i:s');

		$upd = array('suplier_id_suplier' => $po['suplier'],
					 'no_do' => $po['no_do'],
					 'no_police' => $po['no_polisi'],
					 'driver' => $po['supir'],
					 'jml_li' => $po['jml_li'],
					 'qty_satuan' => $po['qty_satuan'],
					 'receiver' => $po['penerima'],
					 'ongkos_kirim' => $ongkir,
					 'tanggal_history' => $tgl,
					 'satuan_barang_idsatuan_barang' => $po['id_satuan']);
		$query = $this->Glo_model->update('history_add_pupuk',array('id_history' => $id),$upd);
		if ($query > 0) {
			$this->db->select('qty');
			$this->db->where('id_stock', $po['pupuk']);
			$show = $this->Glo_model->get('stock_pupuk')->row();
			if ($po['jml_li'] > $po['jml_li_sb']) {
				$banding = $po['jml_li'] - $po['jml_li_sb'];

				$qty_now = $show->qty + $banding;
				$this->Glo_model->update('stock_pupuk',array('id_stock' => $po['pupuk']),array('qty' => $qty_now));
			} else {
				$banding = $po['jml_li_sb'] - $po['jml_li'];

				$qty_now = $show->qty - $banding;
				$this->Glo_model->update('stock_pupuk',array('id_stock' => $po['pupuk']),array('qty' => $qty_now));
			}

			if ($po['ongkos_kirim_sb'] != $ongkir || $po['uang_bbm_sb'] != $uangbbm)
			{
				$update_tagihan = array('ongkos_kirim_tagihan' => $ongkir,'uang_bbm' => $uangbbm);
				$this->Glo_model->update('tagihan',array('history_add_pupuk_id_history' => $id),$update_tagihan);

			}
			echo '<script>alert("Success!! Data ID: '.$id.'  berhasil diupdate"); window.location="'.site_url('Gudang/gudang').'"</script>';
		} else {
			echo "<script>alert('Failed!! Data ID: ".$id." gagal diupdate'); window.location=".site_url('Gudang/gudang')."</script>";
		}
	}

	public function delete_gudang($id)
	{
		$this->db->where('history_add_pupuk.id_history', $id);
		$show = $this->Glo_model->joinhistorytostock_pupuktosupltotg('history_add_pupuk.jml_li,stock_pupuk.id_stock,stock_pupuk.qty')->row();

		$upd_qty = $show->qty - $show->jml_li;
		if ($upd_qty < 0) {
			$pp = 0;
		} else {
			$pp = $upd_qty;
		}

		$this->Glo_model->update('stock_pupuk',array('id_stock' => $show->id_stock),array('qty' => $pp));

		$query = $this->Glo_model->delete('history_add_pupuk',array('id_history' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil dihapus"); window.location="'.site_url('Gudang/gudang').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal dihapus"); window.location="'.site_url('Gudang/gudang').'"</script>';
		}
	}

	public function tagihan()
	{
		$content = 'home/tagihan/tagihan';
		$js = 'home/tagihan/script_tagihan';
		$isi['sts_lns'] = ['Belum Lunas' => 'Belum Lunas','Lunas' => 'Lunas'];
		$isi['tagihan_list'] = $this->Glo_model->get('tagihan')->result();
		$this->load_template->begining('Pupuk DewiSri | Management Tagihan',$content,$js,$isi);
	}

	public function update_tagihan($id)
	{
		$po = $this->input->post();
		$update = ['status_pelunasan' => $po['status_pelunasan']];
		$query = $this->Glo_model->update('tagihan',['id_tagihan' => $id],$update);
		if ($query > 0) {
			echo '<script>alert("Success!! Data ID: '.$id.'  berhasil diupdate"); window.location="'.site_url('Gudang/tagihan').'"</script>';
		} else {
			echo "<script>alert('Failed!! Data ID: ".$id." gagal diupdate'); window.location=".site_url('Gudang/tagihan')."</script>";
		}
	}
}

/* End of file Gudang.php */
/* Location: ./application/controllers/Gudang.php */