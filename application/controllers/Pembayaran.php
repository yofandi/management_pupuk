<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_level') != 1) {
			redirect('Login/');
		}
	}

	public function pembayaran()
	{
		$content = 'home/pembayaran/pembayaran';
		$js = 'home/pembayaran/script_pembayaran';

		$isi['show_intable'] = $this->Glo_model->joinpenj_pemb('pembayaran.*,penjualan.no_do_penjualan,penjualan.harga_keseluruhan')->result();

		$isi['jenis_pembayaran'] = ['Cicil' => 'Cicil','Cash' => 'Cash'];

		$this->db->select('id_penjualan,no_do_penjualan');
		$this->db->where(['status_lunas_penjualan' => 0,'status_konfirmasi_id_konfirmasi' => 2]);
		$isi['penjualan_list'] = $this->Glo_model->get('penjualan')->result();
		$this->load_template->begining('Pupuk DewiSri | Management Pembayaran',$content,$js,$isi);
	}

	public function search_penerimaan()
	{
		$po = $this->input->post();

		$this->db->where('penjualan_id_penjualan', $po['id_penjualan']);
		$query = $this->Glo_model->get('pembayaran')->result_array();
		$output['cek'] = $query;

		$query1 = $this->db->select('harga_keseluruhan,status_konfirmasi_id_konfirmasi')->where('id_penjualan',$po['id_penjualan'])->get('penjualan', 1)->row_array();
		$output['show'] = $query1;

		$this->db->select('SUM(uang_terima) as uang_terima');
		$this->db->where('penjualan_id_penjualan', $po['id_penjualan']);
		$query2 = $this->Glo_model->get('penerimaan',1)->row_array();
		if (! empty($query2['uang_terima'])) {
			$echo = $query2['uang_terima'];
		} else {
			$echo = 0;
		}
		$output['pene'] = $echo;

		echo json_encode($output);
	}

	public function insert_pembayaran()
	{
		$po = $this->input->post();

		$tanggal1 = date_create($po['tanggal_awal']);
		$tgl1 = date_format($tanggal1, 'Y-m-d H:i:s');

		$tanggal2 = date_create($po['tanggal_max']);
		$tgl2 = date_format($tanggal2, 'Y-m-d H:i:s');

		$tanggal3 = date_create($po['tanggal_penerimaan']);
		$tgl3 = date_format($tanggal3, 'Y-m-d H:i:s');

		$hsl_sm = intval(preg_replace('/[^\d.]/', '', $po['total_beli']));
		$telah_bayar = intval(preg_replace('/[^\d.]/', '', $po['telah_bayar']));
		$uang_bayar = intval(preg_replace('/[^\d.]/', '', $po['uang_bayar']));

		$bayar = $telah_bayar + $uang_bayar;

		if ($bayar == $hsl_sm || $bayar > $hsl_sm) {
			$status = 'Lunas';
		} else {
			$status = 'Cicil';
		}

		$this->db->select('id_pembayaran');
		$this->db->where('penjualan_id_penjualan', $po['id_penjualan']);
		$cek_sam = $this->Glo_model->get('pembayaran');

		if ($cek_sam->num_rows() > 0) {
			$tampil_cek = $cek_sam->row();
			if ($status == 'Lunas') {
				$this->Glo_model->update('penjualan',['id_penjualan' => $po['id_penjualan']],['status_lunas_penjualan' => 1]);

				$this->Glo_model->update('pembayaran',['id_pembayaran' => $tampil_cek->id_pembayaran],['status_lunas' => $status]);
			}

			$ins_pen = array(
				'tanggal_terima' => $tgl3,
				'uang_terima' => $uang_bayar,
				'status_transaksi' => $status,
				'pembayaran_id_pembayaran' => $tampil_cek->id_pembayaran,
				'penjualan_id_penjualan' => $po['id_penjualan']
			);
			$query = $this->Glo_model->insert('penerimaan', $ins_pen);
			if ($query > 0) {
				echo '<script>alert("Success!! Data penerimaan berhasil ditambahkan"); window.location="'.site_url('Pembayaran/pembayaran').'"</script>';
			} else {
				echo '<script>alert("Failed!! Data penerimaan gagal ditambahkan"); window.location="'.site_url('Pembayaran/pembayaran').'"</script>';
			}
		} else {
			$select = 'MAX(id_pembayaran) as id_pembayaran';
			$id_pembayaran = $this->Glo_model->make_id($select,'id_pembayaran','pembayaran','PB');

			$ins = array(
				'id_pembayaran' => $id_pembayaran,
				'tanggal_pembayaran_awl' => $tgl1, 
				'jenis_pembayaran' => $po['jenis_pembayaran'], 
				'status_lunas' => $status, 
				'tanggal_max_bayar' => $tgl2, 
				'penjualan_id_penjualan' => $po['id_penjualan']
			);
			$query = $this->Glo_model->insert('pembayaran',$ins);
			if ($query > 0) {
				$ins_pen = array(
					'tanggal_terima' => $tgl1,
					'uang_terima' => $uang_bayar,
					'status_transaksi' => $status,
					'pembayaran_id_pembayaran' => $id_pembayaran,
					'penjualan_id_penjualan' => $po['id_penjualan']
				);
				$this->Glo_model->insert('penerimaan', $ins_pen);
				echo '<script>alert("Success!! Data pembayaran & penerimaan berhasil ditambahkan"); window.location="'.site_url('Pembayaran/pembayaran').'"</script>';
			} else {
				echo '<script>alert("Failed!! Data pembayaran & penerimaan gagal ditambahkan"); window.location="'.site_url('Pembayaran/pembayaran').'"</script>';
			}
		}
	}

	public function update_pembayaran($id)
	{
		$po = $this->input->post();

		$tanggal1 = date_create($po['tanggal_awal']);
		$tgl1 = date_format($tanggal1, 'Y-m-d H:i:s');

		$tanggal2 = date_create($po['tanggal_max']);
		$tgl2 = date_format($tanggal2, 'Y-m-d H:i:s');

		$update = array(
			'tanggal_pembayaran_awl' => $tgl1, 
			'tanggal_max_bayar' =>  $tgl2
		);
		$query = $this->Glo_model->update('pembayaran',['id_pembayaran' => $id],$update);
		if ($query > 0) {
			echo '<script>alert("Success!! Data ID Pembayaran: '.$id.'  berhasil diupdate"); window.location="'.site_url('Pembayaran/pembayaran').'"</script>';
		} else {
			echo '<script>alert("Success!! Data ID Pembayaran: '.$id.'  gagal diupdate"); window.location="'.site_url('Pembayaran/pembayaran').'"</script>';
		}
	}

	public function delete_pembayaran($id)
	{
		$query = $this->Glo_model->delete('pembayaran',array('id_pembayaran' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data Pembayaran: '.$id.' berhasil dihapus"); window.location="'.site_url('Pembayaran/pembayaran').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data Pembayaran: '.$id.' gagal dihapus"); window.location="'.site_url('Pembayaran/pembayaran').'"</script>';
		}
	}

	public function penerimaan()
	{
		$content = 'home/penerimaan/penerimaan';
		$js = 'home/penerimaan/script_penerimaan';

		$isi['penerimaan_list'] = $this->Glo_model->joinpene_penj('penerimaan.*,penjualan.no_do_penjualan,penjualan.id_penjualan')->result();

		$this->load_template->begining('Pupuk DewiSri | Management penerimaan',$content,$js,$isi);
	}

	public function update_penerimaan($id,$id_penjualan,$id_pembayaran)
	{
		$po = $this->input->post();

		$tanggal1 = date_create($po['tanggal_penerimaan']);
		$tgl1 = date_format($tanggal1, 'Y-m-d H:i:s');
		$nom = intval(preg_replace('/[^\d.]/', '', $po['uang_bayar']));

		$update = array(
			'tanggal_terima' => $tgl1,
			'uang_terima' => $nom,
			'status_transaksi' => 'Cicil'
		);

		$query = $this->Glo_model->update('penerimaan',['id_penerimaan' => $id],$update);
		if ($query > 0) {
			$this->db->select('SUM(uang_terima) as uang_terima');
			$this->db->where('penjualan_id_penjualan', $id_penjualan);
			$sum = $this->Glo_model->get('penerimaan')->row();

			$this->db->select('harga_keseluruhan');
			$this->db->where('id_penjualan', $id_penjualan);
			$hs = $this->Glo_model->get('penjualan', 1)->row();

			if ($sum->uang_terima == $hs->harga_keseluruhan || $sum->uang_terima > $hs->harga_keseluruhan) {
				$sta = 'Lunas';
				$this->Glo_model->update('penjualan',['id_penjualan' => $id_penjualan],['status_lunas_penjualan' => 1]);
				$this->Glo_model->update('pembayaran',['id_pembayaran' => $id_pembayaran],['status_lunas' => 'Lunas']);
			} else {
				$sta = 'Cicil';
				$this->Glo_model->update('penjualan',['id_penjualan' => $id_penjualan],['status_lunas_penjualan' => 0]);
				$this->Glo_model->update('pembayaran',['id_pembayaran' => $id_pembayaran],['status_lunas' => 'Cicil']);
			}

			$dd =  $this->db->select('id_penerimaan')->where('penjualan_id_penjualan', $id_penjualan)->order_by('id_penerimaan','desc')->get('penerimaan',1)->row();

			$this->Glo_model->update('penerimaan',['id_penerimaan' => $dd->id_penerimaan],['status_transaksi' => $sta]);
			echo '<script>alert("Success!! Data ID: '.$id.' berhasil diupdate"); window.location="'.site_url('Pembayaran/penerimaan').'"</script>';
		} else {
			echo '<script>alert("Failed!! Data ID: '.$id.' gagal diupdate"); window.location="'.site_url('Pembayaran/penerimaan').'"</script>';
		}
	}

	public function delete_penerimaan($id,$id_penjualan,$id_pembayaran)
	{
		$query = $this->Glo_model->delete('penerimaan',['id_penerimaan' => $id]);
		if ($query > 0) {
			$this->db->select('SUM(uang_terima) as uang_terima');
			$this->db->where('penjualan_id_penjualan', $id_penjualan);
			$sum = $this->Glo_model->get('penerimaan')->row();

			$this->db->select('harga_keseluruhan');
			$this->db->where('id_penjualan', $id_penjualan);
			$hs = $this->Glo_model->get('penjualan', 1)->row();

			if ($sum->uang_terima == $hs->harga_keseluruhan || $sum->uang_terima > $hs->harga_keseluruhan) {
				$sta = 'Lunas';
				$this->Glo_model->update('penjualan',['id_penjualan' => $id_penjualan],['status_lunas_penjualan' => 1]);
				$this->Glo_model->update('pembayaran',['id_pembayaran' => $id_pembayaran],['status_lunas' => 'Lunas']);
			} else {
				$sta = 'Cicil';
				$this->Glo_model->update('penjualan',['id_penjualan' => $id_penjualan],['status_lunas_penjualan' => 0]);
				$this->Glo_model->update('pembayaran',['id_pembayaran' => $id_pembayaran],['status_lunas' => 'Cicil']);
			}

			$dd =  $this->db->select('id_penerimaan')->where('penjualan_id_penjualan', $id_penjualan)->order_by('id_penerimaan','desc')->get('penerimaan',1)->row();

			$this->Glo_model->update('penerimaan',['id_penerimaan' => $dd->id_penerimaan],['status_transaksi' => $sta]);
			echo '<script>alert("Success!! ID Data Penerimaan: '.$id.' berhasil dihapus"); window.location="'.site_url('Pembayaran/penerimaan').'"</script>';
		} else {
			echo '<script>alert("Failed!! Data ID Penerimaan: '.$id.' gagal diupdate"); window.location="'.site_url('Pembayaran/penerimaan').'"</script>';
		}
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */