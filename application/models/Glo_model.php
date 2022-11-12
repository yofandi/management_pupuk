<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Glo_model extends CI_Model {

	public function make_id($select,$name_column,$table,$nm_dpn)
	{
		$id = $this->db->select($select)->get($table)->row_array();
		if ($id[$name_column] != '') {
			$mentah = substr($id[$name_column], 2);
			$alfabet =  substr($id[$name_column],2,-6);
			$nilai = substr($mentah, 4);
			$nilai_baru = (int) $nilai;
			if ($nilai == '999999') {
				$alf = $alfabet;
				$alf++;
				$nilai_set = '000001';
				$jadi = $nm_dpn.$alf.$nilai_set;
			} else {
				$alf = $alfabet;
				$nilai_baru++;
				$nilai_set = $nilai_baru;
				$jadi = $nm_dpn.$alf.str_pad($nilai_baru, 6, "0", STR_PAD_LEFT);
			}
			$nilai_baru2 = $jadi;
		}else{
			$nilai_baru2 = $nm_dpn.'AAAA000001';
		}
		return $nilai_baru2;
	}

	public function get($table,$limit = "", $offset = "")
	{
		$query = $this->db->get($table, $limit, $offset);
		return $query;
	}

	public function insert($table,$object)
	{
		$query = $this->db->insert($table, $object);
		return $this->db->affected_rows();
	}


	public function update($table,$where,$object)
	{
		$this->db->where($where);
		$query = $this->db->update($table, $object);
		return $this->db->affected_rows();
	}

	public function delete($table,$where)
	{
		$this->db->where($where);
		$query = $this->db->delete($table);
		return $this->db->affected_rows();	
	}

	public function kota_kebun($select)
	{
		$this->db->select($select);
		$this->db->from('kebun');
		$this->db->join('kota', 'kebun.kota_id_kota = kota.id_kota', 'inner');
		$query = $this->db->get();
		return $query;
	}

	public function kebun_blok($select)
	{
		$this->db->select($select);
		$this->db->from('blok');
		$this->db->join('kebun', 'blok.kebun_id_kebun = kebun.id_kebun', 'inner');
		$query = $this->db->get();
		return $query;
	}

	public function Joinuserslevel($select)
	{
		$this->db->select($select);
		$this->db->from('users');
		$this->db->join('level', 'users.level_id_level = level.id_level', 'inner');
		$query = $this->db->get();
		return $query;
	}

	public function doLogin($username,$password)
	{
		$this->db->select('users.id_users,
						   users.username,
						   users.password,
						   level.id_level,
						   level.name_level');
		$this->db->from('users');
		$this->db->join('level', 'users.level_id_level = level.id_level', 'inner');
		$this->db->where('users.username', $username);
		$query = $this->db->get();
		$cek_show = $query->row();
		if ($query->num_rows() > 0) {
			if ($this->encryption->decrypt($cek_show->password) == $password) {
				$data = array(
					'id_users' => $cek_show->id_users,
					'username' => $cek_show->username,
					'password' => $cek_show->password,
					'id_level' => $cek_show->id_level,
					'nama_level' => $cek_show->name_level
				);
				$this->session->set_userdata($data);
				return $cek_show->id_level;
			} else {
				return 'password_wrong';
			}
		} else {
			return 'no_account';
		}
	}

	public function joinhistorytostock_pupuktosupltotg($select)
	{
		$this->db->select($select);
		$this->db->from('history_add_pupuk');
		$this->db->join('stock_pupuk', 'history_add_pupuk.stock_pupuk_id_stock = stock_pupuk.id_stock', 'inner');
		$this->db->join('suplier', 'history_add_pupuk.suplier_id_suplier = suplier.id_suplier', 'inner');
		$this->db->join('tagihan', 'history_add_pupuk.id_history = tagihan.history_add_pupuk_id_history', 'inner');
		$query = $this->db->get();
		return $query;
	}

	public function joinstocksatmerk($select)
	{
		$this->db->select($select);
		$this->db->from('stock_pupuk');
		$this->db->join('satuan_barang', 'stock_pupuk.satuan_barang_idsatuan_barang = satuan_barang.idsatuan_barang', 'inner');
		$this->db->join('merk_pupuk', 'stock_pupuk.merk_pupuk_id_merk = merk_pupuk.id_merk', 'inner');
		$query = $this->db->get();
		return $query;
	}

	public function joinmerk_pupuk($select)
	{
		$this->db->select($select);
		$this->db->from('stock_pupuk');
		$this->db->join('merk_pupuk', 'stock_pupuk.merk_pupuk_id_merk = merk_pupuk.id_merk', 'inner');
		$query = $this->db->get();
		return $query;
	}

	public function joinSto_stockpupuk($select)
	{
		$this->db->select($select);
		$this->db->from('stock_to_penjualan');
		$this->db->join('stock_pupuk', 'stock_to_penjualan.stock_pupuk_id_stock = stock_pupuk.id_stock', 'inner');
		$query = $this->db->get();
		return $query;
	}

	public function joinpen_keb($select)
	{
		$this->db->select($select);
		$this->db->from('penjualan');
		$this->db->join('blok', 'penjualan.blok_id_blok = blok.id_blok', 'inner');
		$this->db->join('kebun', 'blok.kebun_id_kebun = kebun.id_kebun', 'inner');
		$this->db->join('status_konfirmasi', 'penjualan.status_konfirmasi_id_konfirmasi = status_konfirmasi.id_konfirmasi', 'inner');
		$query = $this->db->get();
		return $query;	
	}

	public function joinpenj_pemb($select)
	{
		$this->db->select($select);
		$this->db->from('pembayaran');
		$this->db->join('penjualan', 'pembayaran.penjualan_id_penjualan = penjualan.id_penjualan', 'inner');
		$query = $this->db->get();
		return $query;	
	}

	public function joinpene_penj($select)
	{
		$this->db->select($select);
		$this->db->from('penerimaan');
		$this->db->join('penjualan', 'penerimaan.penjualan_id_penjualan = penjualan.id_penjualan', 'inner');
		$query = $this->db->get();
		return $query;	
	}
}

/* End of file Glo_model.php */
/* Location: ./application/models/Glo_model.php */