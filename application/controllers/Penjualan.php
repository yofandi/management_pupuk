<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_level') != 1) {
			redirect('Login/');
		}
	}

	public function penjualaan()
	{
		$content = 'home/penjualan/penjualan';
		$js = 'home/penjualan/script';
		$isi['penjualan_list'] = $this->Glo_model->joinpen_keb('penjualan.*,status_konfirmasi.nama_konfirmasi')->result();
		$this->load_template->begining('Pupuk DewiSri | Management Penjualaan',$content,$js,$isi);
		
	}

	public function view_tpenjualan()
	{
		$content = 'home/penjualan/tpenjualan';
		$js = 'home/penjualan/script';
		$select = 'stock_pupuk.*,merk_pupuk.nama_merk';
		$isi['list_pupuk'] = $this->Glo_model->joinmerk_pupuk($select)->result();
		$isi['kebun_list'] = $this->Glo_model->get('kebun')->result();
		$isi['pekerjaan_list'] = $this->Glo_model->get('pekerjaan')->result();
		$isi['sales_list'] = $this->db->select('id_sales,nama_sales')->get('sales')->result();
		$isi['supir_list'] = $this->db->select('id_supir,nama_supir')->get('supir_ud_dewisri')->result();
		$isi['pemohon_list'] = $this->db->select('id_pemohon,nama_pemohon')->get('pemohon')->result();
		$isi['perkiraan_list'] = $this->Glo_model->get('perkiraan')->result();
		$this->load_template->begining('Pupuk DewiSri | Tambah Penjualaan',$content,$js,$isi);
	}

	public function keranjang_penjualan()
	{
		$po = $this->input->post();
		$data = array('id'      => $po['id'],
                'qty'     => $po['qty'],
                'price'   => $po['harga'],
                'name'    => $po['nama'],
                'options' => array('diskon' => $po['dis'],'total' => $po['total'])
            	);
		$p = $this->cart->insert($data);
		if ($p) {
			$k = 'success Ditambahkan '.$po['nama'];
		} else {
			$k = 'gagal Ditambahkan '.$po['nama'];
		}
		echo json_encode($k);
	}

	public function view_session_keranjang()
	{
		$output['table'] = "";
		$total = 0;
		foreach ($this->cart->contents() as $value) {
			$tol_row = $value['qty'] * $value['price'];
			$set = ($tol_row * $value['options']['diskon']) / 100;
			$tol_rows = $tol_row - $set;
			$output['table'] .= "
			<tr>
              <td align='center'>".$value['name']."</td>
              <td align='center'>".$value['qty']."</td>
              <td align='center'>".$value['options']['diskon']."</td>
              <td align='right'>".number_format($tol_rows,0,'.',',')."</td>
              <td align='center'>
              <button type='button' onclick='delet".$value['rowid']."()' class='btn btn-warning btn-rounded btn-sm' ><span class='mdi mdi-delete-variant'></span></button>
              <script>
              function delet".$value['rowid']."() {
				  $.ajax({
				    url: '".base_url('Penjualan/delete_cart/'.$value['rowid'].'/'.$value['name'])."',
				    dataType: 'json',
				  })
				  .done(function(data) {
				    alert(data);
				    tampil();
				  });
			  }
              </script>
              </td>
            </tr>
			";
			$total += $tol_rows;
		}
		$output['total_sb'] = $total;
		$output['total'] = number_format($total,0,'.',',');
		echo json_encode($output);
	}

	public function delete_cart($rowid,$name)
	{
		$pa = $this->cart->remove($rowid);
		if ($pa) {
			$output = "Success!! berhasil hapus ".$name;
		} else {
			$output = "Failed!! Gagal hapus ".$name;
		}
		echo json_encode($output);
	}

	public function destory()
	{
		$pas = $this->cart->destroy();
		if (! $pas) {
			$show = 'Berhasil Hapus Keranjang!!';
		} else {
			$show = 'Gagal Hapus Keranjang!!';
		}
		echo json_encode($show);
	}

	public function load_blok()
	{
		$this->db->where('kebun_id_kebun', $this->input->post('id_kebun'));
		$query = $this->Glo_model->get('blok')->result_array();
		echo json_encode($query);
	}

	public function insert_penjualan()
	{
		$select = 'MAX(id_penjualan) as id_penjualan';
		$id_penjualan = $this->Glo_model->make_id($select,'id_penjualan','penjualan','JP');
		$po = $this->input->post();


		$tanggal1 = date_create($po['tanggal_penjualan']);
		$tgl1 = date_format($tanggal, 'Y-m-d H:i:s');


		$tanggal2 = date_create($po['tanggal_kirim']);
		$tgl2 = date_format($tanggal, 'Y-m-d H:i:s');

		$ins_penj = array(
			'id_penjualan' => $id_penjualan,
			'tanggal_penjualan' => $tgl1,
			'total_harga' => $po['total_pupuk'],
			'diskon' => $po['diskon_kes'],
			'harga_keseluruhan' => $po['total_kes'],
			'status_konfirmasi_id_konfirmasi' => 1,
			'sales_id_sales' => $po['sales'],
			'blok_id_blok' => $po['blok'],
			'pekerjaan_id_pekerjaan' => $po['pekerjaan'],
			'pemohon_id_pemohon' => $po['pemohon'],
			'perkiraan_id_perkiraan' => $po['perkiraan'],
			'supir_ud_dewisri_id_supir' => $po['supir'],
			'no_do_penjualan' => $po['no_do'],
			'tanggal_kirim' => $tgl2,
			'pengirim' => $po['pengirim']
		);
		$query = $this->Glo_model->insert('penjualan', $ins_penj);
		if ($query > 0) {
			$i = 0;
			$cart = $this->cart->contents();
			if (! empty($cart)) {
				foreach ($this->cart->contents() as $value) {
					$this->db->select('qty');
					$this->db->where('id_stock', $value['id']);
					$stock_aw = $this->Glo_model->get('stock_pupuk')->row();
					$tol_row = $value['qty'] * $value['price'];
					$set = ($tol_row * $value['options']['diskon']) / 100;
					$tol_rows = $tol_row - $set;
					$insre_penj = array(
						'qty_jual' => $value['qty'],
						'diskon' => $value['options']['diskon'], 
						'harga_total' => $tol_rows,
						'stock_pupuk_id_stock' => $value['id'],
						'penjualan_id_penjualan' => $id_penjualan
					);

					$stock_now = $stock_aw->qty - $value['qty'];

					$this->Glo_model->insert('stock_to_penjualan', $insre_penj);
					$this->Glo_model->update('stock_pupuk',['id_stock' => $value['id']],['qty' => $stock_now]);
					$i++;
				}
			}
			$alert = 'Berhasil Tambah Penjualan!!';
			$this->cart->destroy();
		} else {
			$alert = 'Gagal Tambah Penjualan!!';
		}
		echo json_encode($alert);
	}

	public function edit_pupuk_beli($id_penjualan)
	{
		$po = $this->input->post();
		$this->db->where('diskon', $po['dis']);
		$this->db->where('stock_pupuk_id_stock',$po['id']);
		$cek = $this->Glo_model->get('stock_to_penjualan');
		
		if ($cek->num_rows() > 0) {
			$row = $cek->row();
			$qty = $row->qty_jual + $po['qty'];
			$hr = $po['harga'] * $qty;
			$har_= ($hr * $po['dis']) /100;
			$harga = $hr - $har_;

			$ins = ['qty_jual' => $qty,
				'diskon' => $po['dis'],
				'harga_total' => $harga
			];
			$p = $this->Glo_model->update('stock_to_penjualan',['idstock_to_penjualan' => $row->idstock_to_penjualan],$ins);
		} else {
			$ins = ['qty_jual' => $po['qty'],
				'diskon' => $po['dis'],
				'harga_total' => $po['total'],
				'stock_pupuk_id_stock' => $po['id'],
				'penjualan_id_penjualan' => $id_penjualan
			];
			$p = $this->Glo_model->insert('stock_to_penjualan', $ins);
		}
		if ($p) {
			$k = 'success Ditambahkan '.$po['nama'];
		} else {
			$k = 'gagal Ditambahkan '.$po['nama'];
		}
		echo json_encode($k);
	}

	public function load_pupuk_beli($id_penjualan)
	{
		$this->db->where('stock_to_penjualan.penjualan_id_penjualan',$id_penjualan);
		$value = $this->Glo_model->joinSto_stockpupuk('stock_to_penjualan.*,stock_pupuk.nama_pupuk')->result_array();
		$output['table'] = '';
		$total = 0;
		foreach ($value as $key) {
		$output['table'] .= '
		<tr>
			<td align="center">'.$key['nama_pupuk'].'</td>
			<td align="center">'.$key['qty_jual']. '</td>
			<td align="center">'.$key['diskon']. '</td>
			<td align="right">'.number_format($key['harga_total'],0,',','.'). '</td>
			<td align="center">
			<button type="button" onclick="delet'.$key['idstock_to_penjualan'].'()" class="btn btn-warning btn-rounded"><span class="mdi mdi-delete-variant"></span></button>
			<script>
              function delet'.$key['idstock_to_penjualan'].'() {
				  $.ajax({
				    url: "'.base_url('Penjualan/delete_isi_stocktopenj/').$key['idstock_to_penjualan'].'/'.$key['nama_pupuk'].'/'.$key['stock_pupuk_id_stock'].'/'.$key['qty_jual'].'",
				    dataType: "json",
				  })
				  .done(function(data) {
				    alert(data);
				    load_keranjang();
				  });
			  }
              </script>
			</td>
		</tr>
		';
		$total += $key['harga_total'];
		}
		$output['total'] = $total;
		echo json_encode($output);
	}

	public function delete_isi_stocktopenj($id,$name,$id_pupuk,$qty)
	{
		$this->db->select('qty');
		$this->db->where('id_stock', $id_pupuk);
		$cc = $this->Glo_model->get('stock_pupuk', 1)->row();

		$qty_now = $cc->qty + $qty;

		$this->Glo_model->update('stock_pupuk',['id_stock' => $id_pupuk],['qty' => $qty_now]);

		$pa = $this->Glo_model->delete('stock_to_penjualan',['
			idstock_to_penjualan' => $id]);
		if ($pa) {
			$output = "Success!! berhasil hapus ".$name;
		} else {
			$output = "Failed!! Gagal hapus ".$name;
		}
		echo json_encode($output);
	}

	public function edit_penjualan($id)
	{
		$content = 'home/penjualan/uppenjualan';
		$js = 'home/penjualan/script_update';
		$select = 'stock_pupuk.*,merk_pupuk.nama_merk';
		$isi['id'] = $id;
		$this->db->where('id_penjualan', $id);
		$isi['data_penjualan'] = $this->Glo_model->joinpen_keb('penjualan.*,kebun.id_kebun')->row();
		$isi['list_pupuk'] = $this->Glo_model->joinmerk_pupuk($select)->result();
		$isi['kebun_list'] = $this->Glo_model->get('kebun')->result();
		$isi['pekerjaan_list'] = $this->Glo_model->get('pekerjaan')->result();
		$isi['sales_list'] = $this->db->select('id_sales,nama_sales')->get('sales')->result();
		$isi['supir_list'] = $this->db->select('id_supir,nama_supir')->get('supir_ud_dewisri')->result();
		$isi['pemohon_list'] = $this->db->select('id_pemohon,nama_pemohon')->get('pemohon')->result();
		$isi['perkiraan_list'] = $this->Glo_model->get('perkiraan')->result();
		$this->load_template->begining('Pupuk DewiSri | Update Penjualaan',$content,$js,$isi);
	}

	public function update_totalhargasemua()
	{
		$po = $this->input->post();
		$update = [
			'total_harga' => $po['harga_pupuk'],
			'diskon' => $po['diskon_univ'],
			'harga_keseluruhan' => $po['total_semua_sblm']
		];

		$up = $this->Glo_model->update('penjualan',['id_penjualan' => $po['idpenup']],$update);
		if ($up) {
			$return = 'Berhasil update Keranjang';
		} else {
			$return = 'Gagal update Keranjang';
		}
		echo json_encode($return);
	}

	public function update_form($id)
	{
		$po = $this->input->post();

		$tanggal1 = date_create($po['tanggal_penjualan']);
		$tgl1 = date_format($tanggal, 'Y-m-d H:i:s');


		$tanggal2 = date_create($po['tanggal_kirim']);
		$tgl2 = date_format($tanggal, 'Y-m-d H:i:s');

		$update = [
			'tanggal_penjualan' => $tgl1,
			'sales_id_sales' => $po['sales'],
			'blok_id_blok' => $po['blok'],
			'pekerjaan_id_pekerjaan' => $po['pekerjaan'],
			'pemohon_id_pemohon' => $po['pemohon'],
			'perkiraan_id_perkiraan' => $po['perkiraan'],
			'supir_ud_dewisri_id_supir' => $po['supir'],
			'no_do_penjualan' => $po['no_do'],
			'tanggal_kirim' => $tgl2,
			'pengirim' => $po['pengirim']
		];
		$query = $this->Glo_model->update('penjualan',['id_penjualan' => $id],$update);
		if ($query > 0) {
			echo '<script>alert("Data ID: '.$id.' Berhasil diperbaharui!!"); window.location.href="'.site_url('Penjualan/penjualaan').'";</script>';
		} else {
			echo '<script>alert("Data ID: '.$id.' Gagal diperbaharui!!"); window.location.href="'.site_url('Penjualan/penjualaan').'";</script>';
		}
	}

	public function delete_penjualan($id)
	{
		$this->db->select('stock_pupuk_id_stock,qty_jual');
		$this->db->where('penjualan_id_penjualan', $id);
		$back = $this->Glo_model->get('stock_to_penjualan');
		if ($back->num_rows() > 0) {
			foreach ($back->result() as $value) {
				$this->db->select('qty');
				$this->db->where('id_stock', $value->stock_pupuk_id_stock);
				$qt_a = $this->Glo_model->get('stock_pupuk',1)->row();

				$qty_now = $qt_a->qty + $value->qty_jual;

				$this->Glo_model->update('stock_pupuk',['id_stock' => $value->stock_pupuk_id_stock],['qty' => $qty_now]);
			}
		}

		$query = $this->Glo_model->delete('penjualan',array('id_penjualan' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil dihapus"); window.location="'.site_url('Penjualan/penjualaan').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal dihapus"); window.location="'.site_url('Penjualan/penjualaan').'"</script>';
		}
	}

}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */