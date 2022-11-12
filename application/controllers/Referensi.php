<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_level') != 1) {
			redirect('Login/');
		}
	}

	public function index()
	{
		$coc = $this->load_template->begining('Coba template','','');	
	}

	public function user_management()
	{
		$isi['level_list'] = $this->Glo_model->get('level')->result();
		$isi['users_list'] = $this->Glo_model->get('users')->result();
		$content = 'home/referensi/user_management/users';
		$coc = $this->load_template->begining('Pupuk DewiSri | Users',$content,'',$isi);	
	}

	public function add_users()
	{
		$po = $this->input->post();
		$this->db->where('username', $po['username']);
		$cek = $this->Glo_model->get('users')->num_rows();
		if ($cek > 0) {
			echo '<script>alert("Maaf Username yang anda masukkan sudah ada!!"); window.location="'.site_url('Referensi/user_management').'"</script>';
		} else {
			$pass = $this->encryption->encrypt($po['password']);
			$ins = array('username' => $po['username'],'password' => $pass,'full_name' => $po['fullname'],'email' => $po['email'],'phone_number' => $po['phone'],'address' => $po['address'],'level_id_level' => $po['level']);

			$insert = $this->Glo_model->insert('users', $ins);
			if ($insert > 0) {
				echo '<script>alert("Success!! Data berhasil ditambahkan"); window.location="'.site_url('Referensi/user_management').'"</script>';
			} else {
				echo '<script>alert("Failed!! Data gagal ditambahkan"); window.location="'.site_url('Referensi/user_management').'"</script>';
			}
		}
	}

	public function update_users($id)
	{
		$po = $this->input->post();
		$pass = $this->encryption->encrypt($po['password']);
		$upd = array('username' => $po['username'],'password' => $pass,'full_name' => $po['fullname'],'email' => $po['email'],'phone_number' => $po['phone'],'address' => $po['address'],'level_id_level' => $po['level']);

		$update = $this->Glo_model->update('users',array('id_users' => $id),$upd);

		if ($update > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil diupdate"); window.location="'.site_url('Referensi/user_management').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal diupdate"); window.location="'.site_url('Referensi/user_management').'"</script>';
		}
	}

	public function delete_users($id)
	{
		$query = $this->Glo_model->delete('users',array('id_users' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil dihapus"); window.location="'.site_url('Referensi/user_management').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal dihapus"); window.location="'.site_url('Referensi/user_management').'"</script>';
		}
	}

	public function supplier_management()
	{
		$content = 'home/referensi/suplier/suplier';
		$isi['supplier_list'] = $this->Glo_model->get('suplier')->result();
		$coc = $this->load_template->begining('Pupuk DewiSri | Supplier',$content,'',$isi);	
	}

	public function add_supplier()
	{
		$po = $this->input->post();
		$object = array('nama_suplier' => $po['nama_suplier'],'email_suplier' => $po['email_suplier'],'no_phone_suplier' => $po['no_phone_suplier'],'no_telepon_suplier' => $po['no_telepon_suplier'],'alamat_suplier' => $po['alamat_suplier']);
		$insert = $this->Glo_model->insert('suplier',$object);

		if ($insert > 0) {
			echo '<script>alert("Success!! Data berhasil ditambahkan"); window.location="'.site_url('Referensi/supplier_management').'"</script>';
		} else {
			echo '<script>alert("Failed!! Data gagal ditambahkan"); window.location="'.site_url('Referensi/supplier_management').'"</script>';
		}
	}

	public function update_supplier($id)
	{
		$po = $this->input->post();

		$upd = array('nama_suplier' => $po['nama_suplier'],'email_suplier' => $po['email_suplier'],'no_phone_suplier' => $po['no_phone_suplier'],'no_telepon_suplier' => $po['no_telepon_suplier'],'alamat_suplier' => $po['alamat_suplier']);

		$update = $this->Glo_model->update('suplier',array('id_suplier' => $id),$upd);

		if ($update > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil diupdate"); window.location="'.site_url('Referensi/supplier_management').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal diupdate"); window.location="'.site_url('Referensi/supplier_management').'"</script>';
		}
	}

	public function delete_supplier($id)
	{
		$query = $this->Glo_model->delete('suplier',array('id_suplier' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil dihapus"); window.location="'.site_url('Referensi/supplier_management').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal dihapus"); window.location="'.site_url('Referensi/supplier_management').'"</script>';
		}
	}

	public function sales_management()
	{
		$content = 'home/referensi/sales/sales';
		$isi['sales_list'] = $this->Glo_model->get('sales')->result();
		$coc = $this->load_template->begining('Pupuk DewiSri | Sales',$content,'',$isi);	
	}

	public function add_sales()
	{
		$po = $this->input->post();

		$ins = array('nama_sales' => $po['nama_sales'],'ktp_sales' => $po['ktp_sales'],'email_sales' => $po['email_sales'],'no_phone' => $po['no_phone'],'alamat_sales' => $po['alamat_sales']);

		$insert = $this->Glo_model->insert('sales',$ins);

		if ($insert > 0) {
			echo '<script>alert("Success!! Data berhasil ditambahkan"); window.location="'.site_url('Referensi/sales_management').'"</script>';
		} else {
			echo '<script>alert("Failed!! Data gagal ditambahkan"); window.location="'.site_url('Referensi/sales_management').'"</script>';
		}
	}

	public function update_sales($id)
	{
		$po = $this->input->post();

		$upd = array('nama_sales' => $po['nama_sales'],'ktp_sales' => $po['ktp_sales'],'email_sales' => $po['email_sales'],'no_phone' => $po['no_phone'],'alamat_sales' => $po['alamat_sales']);

		$update = $this->Glo_model->update('sales',array('id_sales' => $id),$upd);

		if ($update > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil diupdate"); window.location="'.site_url('Referensi/sales_management').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal diupdate"); window.location="'.site_url('Referensi/sales_management').'"</script>';
		}
	}

	public function detele_sales($id)
	{
		$query = $this->Glo_model->delete('sales',array('id_sales' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil dihapus"); window.location="'.site_url('Referensi/user_management').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal dihapus"); window.location="'.site_url('Referensi/user_management').'"</script>';
		}
	}

	public function perkiraan()
	{
		$content = 'home/referensi/perkiraan/perkiraan';
		$js = 'home/referensi/perkiraan/script_perkiraan';
		$coc = $this->load_template->begining('Pupuk DewiSri | Perkiraan',$content,$js);
	}

	public function get_perkiraan()
	{
		$get = $this->input->get();
		$where = array(
			'no_perkiraan' => $get['no_perkiraan'],
			'nama_perkiraan' => $get['nama_perkiraan']
		);
		$this->db->like($where);
		$show = $this->Glo_model->get('perkiraan')->result();
		foreach ($show as $key) {
			$output[] = array('id_perkiraan' => $key->id_perkiraan,'no_perkiraan' => $key->no_perkiraan,'nama_perkiraan' => $key->nama_perkiraan);
		}
		header("Content-Type: application/json");
		echo json_encode($output);
	}

	public function insert_perkiraan()
	{
		$po = $this->input->post();
		$ins = array(
			'no_perkiraan' => $po['no_perkiraan'],
			'nama_perkiraan' => $po['nama_perkiraan']
		);

		$this->Glo_model->insert('perkiraan',$ins);
	}

	public function update_perkiraan()
	{
		parse_str(file_get_contents("php://input"), $_PUT);

		$id = $_PUT['id_perkiraan'];
		$upd = array('no_perkiraan' => $_PUT['no_perkiraan'],'nama_perkiraan' => $_PUT['nama_perkiraan']);

		$this->Glo_model->update('perkiraan',array('id_perkiraan' => $id),$upd);
	}

	public function delete_perkiraan()
	{
		parse_str(file_get_contents("php://input"), $_DELETE);

		$id = $_DELETE['id_perkiraan'];
		$this->Glo_model->delete('perkiraan',array('id_perkiraan' => $id));
	}

	public function pekerjaan()
	{
		$content = 'home/referensi/pekerjaan/pekerjaan';
		$js = 'home/referensi/pekerjaan/script_pekerjaan';
		$coc = $this->load_template->begining('Pupuk DewiSri | Pekerjaan',$content,$js);
	}

	public function get_pekerjaan()
	{
		$get = $this->input->get();
		$where = array(
			'nama_pekerjaan' => $get['nama_pekerjaan']
		);
		$this->db->like($where);
		$show = $this->Glo_model->get('pekerjaan')->result();
		foreach ($show as $key) {
			$output[] = array('id_pekerjaan' => $key->id_pekerjaan,'nama_pekerjaan' => $key->nama_pekerjaan);
		}
		header("Content-Type: application/json");
		echo json_encode($output);
	}

	public function insert_pekerjaan()
	{
		$po = $this->input->post();
		$ins = array(
			'nama_pekerjaan' => $po['nama_pekerjaan']
		);

		$this->Glo_model->insert('pekerjaan',$ins);
	}

	public function update_pekerjaan()
	{
		parse_str(file_get_contents("php://input"), $_PUT);

		$id = $_PUT['id_pekerjaan'];
		$upd = array('nama_pekerjaan' => $_PUT['nama_pekerjaan']);

		$this->Glo_model->update('pekerjaan',array('id_pekerjaan' => $id),$upd);
	}

	public function delete_pekerjaan()
	{
		parse_str(file_get_contents("php://input"), $_DELETE);

		$id = $_DELETE['id_pekerjaan'];
		$this->Glo_model->delete('pekerjaan',array('id_pekerjaan' => $id));
	}

	public function pemohon()
	{
		$content = 'home/referensi/pemohon/pemohon';
		$js = 'home/referensi/pemohon/script_pemohon';
		$isi['pemohon_list'] = $this->Glo_model->get('pemohon')->result();
		$isi['klasifikasi'] = $this->Glo_model->get('klasifikasi')->result();
		$coc = $this->load_template->begining('Pupuk DewiSri | Pemohon',$content,$js,$isi);
	}

	public function insert_pemohon()
	{
		$po = $this->input->post();
		$object = array(
			'nama_pemohon' => $po['nama_pemohon'],
			'ktp_pemohon' => $po['ktp_pemohon'],
			'no_phone_pemohon' => $po['no_phone_pemohon'],
			'alamat_pemohon' => $po['alamat_pemohon'],
			'klasifikasi_id_klasifikasi' => $po['klasifikasi_id_klasifikasi']
		);

		$query = $this->Glo_model->insert('pemohon',$object);
		if ($query > 0) {
			echo '<script>alert("Success!! Data berhasil ditambahkan"); window.location="'.site_url('Referensi/pemohon').'"</script>';
		} else {
			echo '<script>alert("Failed!! Data gagal ditambahkan"); window.location="'.site_url('Referensi/pemohon').'"</script>';
		}
	}

	public function update_pemohon($id)
	{
		$po = $this->input->post();
		$object = array(
			'nama_pemohon' => $po['nama_pemohon'],
			'ktp_pemohon' => $po['ktp_pemohon'],
			'no_phone_pemohon' => $po['no_phone_pemohon'],
			'alamat_pemohon' => $po['alamat_pemohon'],
			'klasifikasi_id_klasifikasi' => $po['klasifikasi_id_klasifikasi']
		);

		$query = $this->Glo_model->update('pemohon',array('id_pemohon' => $id),$object);
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil diupdate"); window.location="'.site_url('Referensi/pemohon').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal diupdate"); window.location="'.site_url('Referensi/pemohon').'"</script>';
		}
	}

	public function delete_pemohon($id)
	{
		$query = $this->Glo_model->delete('pemohon',array('id_pemohon' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil dihapus"); window.location="'.site_url('Referensi/pemohon').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal dihapus"); window.location="'.site_url('Referensi/pemohon').'"</script>';
		}
	}

	public function setting()
	{
		$content = 'home/referensi/setting/setting';
		$js = 'home/referensi/setting/script_setting';
		$coc = $this->load_template->begining('Pupuk DewiSri | Setting',$content,$js);	
	}

	public function load_pimpinan()
	{
		$this->db->where('id_setting', 1);
		$query = $this->Glo_model->get('setting')->row_array();
		echo json_encode($query);
	}

	public function update_pimpinan()
	{
		$po = $this->input->post();

		$query = $this->Glo_model->update('setting',array('id_setting' => 1),array('pimpinan' => $po['pimpinan']));
		echo json_encode($query);
	}

	public function load_data_kota()
	{
		$query = $this->db->get('kota')->result_array();
		echo json_encode($query);
	}

	public function search_data_kota()
	{
		$po = $this->input->post('cari');
		$this->db->like('nama_kota',$po, 'BOTH');
		$query = $this->db->get('kota')->result_array();
		echo json_encode($query);
	}

	public function kebun()
	{
		$content = 'home/referensi/kebun/kebun';
		$js = 'home/referensi/kebun/script_kebun';
		$isi['kota_kebun'] = $this->Glo_model->kota_kebun('kebun.*,kota.nama_kota')->result();
		$isi['kebun_blok'] = $this->Glo_model->kebun_blok('blok.*,kebun.nama_kebun')->result();
		$isi['kebun_list'] = $this->Glo_model->get('kebun')->result();
		$coc = $this->load_template->begining('Pupuk DewiSri | Kebun',$content,$js,$isi);	
	}

	public function insert_kota()
	{
		$ins = array('nama_kota' => $this->input->post('kota'));
		$this->Glo_model->insert('kota',$ins);
	}

	public function update_kota()
	{
		$po = $this->input->post();
		$upd = array($po['table_column'] => $po['value']);
		$this->Glo_model->update('kota',array('id_kota' => $po['id']),$upd);
	}

	public function delete_kota()
	{
		$po = $this->input->post();
		$this->Glo_model->delete('kota',array('id_kota' => $po['id']));
	}

	public function show_kota()
	{
		$query = $this->Glo_model->get('kota')->result_array();
		$output = '<option value="">--- Pilih Kota ---</option>';
		foreach ($query as $li) {
		$output .= '<option value="'.$li['id_kota'].'">'.$li['nama_kota'].'</option>';
		}
		echo json_encode($output);
	}

	public function show_kota_update()
	{
		$po = $this->input->post();
		$query = $this->Glo_model->get('kota')->result_array();
		$output = '<option value="">--- Pilih Kota ---</option>';
		foreach ($query as $li) {
		$output .= '<option value="'.$li['id_kota'].'"';
		if ($li['id_kota'] == $po['kota_id_kota']) {
			$output .= 'selected';
		}
		$output .= '>'.$li['nama_kota'].'</option>';
		}
		echo json_encode($output);
	}

	public function insert_kebun()
	{
		$po = $this->input->post();

		$ins = array('nama_kebun' => $po['nama_kebun'],
			'kota_id_kota' => $po['kota_id_kota']);
		$query = $this->Glo_model->insert('kebun', $ins);
		if ($query > 0) {
			echo '<script>alert("Success!! Data berhasil ditambahkan"); window.location="'.site_url('Referensi/kebun').'"</script>';
		} else {
			echo '<script>alert("Failed!! Data gagal ditambahkan"); window.location="'.site_url('Referensi/kebun').'"</script>';
		}
	}

	public function update_kebun($id)
	{
		$po = $this->input->post();

		$update = array('nama_kebun' => $po['nama_kebun'],
			'kota_id_kota' => $po['kota_id_kota']);
		$query = $this->Glo_model->update('kebun',array('id_kebun' => $id),$update);
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil diupdate"); window.location="'.site_url('Referensi/kebun').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal diupdate"); window.location="'.site_url('Referensi/kebun').'"</script>';
		}
	}

	public function delete_kebun($id)
	{
		$query = $this->Glo_model->delete('kebun',array('id_kebun' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil dihapus"); window.location="'.site_url('Referensi/kebun').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal dihapus"); window.location="'.site_url('Referensi/kebun').'"</script>';
		}
	}

	public function insert_blok()
	{
		$po = $this->input->post();
		$object = array('nama_blok' => $po['nama_blok'],'kebun_id_kebun' => $po['kebun_id_kebun']);
		$query = $this->Glo_model->insert('blok', $object);
		if ($query > 0) {
			echo '<script>alert("Success!! Data berhasil ditambahkan"); window.location="'.site_url('Referensi/kebun').'"</script>';
		} else {
			echo '<script>alert("Failed!! Data gagal ditambahkan"); window.location="'.site_url('Referensi/kebun').'"</script>';
		}
	}

	public function update_blok($id)
	{
		$po = $this->input->post();
		$object = array('nama_blok' => $po['nama_blok'],'kebun_id_kebun' => $po['kebun_id_kebun']);
		$query = $this->Glo_model->update('blok',array('id_blok' => $id),$object);
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil diupdate"); window.location="'.site_url('Referensi/kebun').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal diupdate"); window.location="'.site_url('Referensi/kebun').'"</script>';
		}
	}

	public function delete_blok($id)
	{
		$query = $this->Glo_model->delete('blok',array('id_blok' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil dihapus"); window.location="'.site_url('Referensi/kebun').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal dihapus"); window.location="'.site_url('Referensi/kebun').'"</script>';
		}
	}

	public function stok_pupuk()
	{
		$content = 'home/referensi/stok_pupuk/stok_pupuk';
		$js = 'home/referensi/stok_pupuk/script_stok_pupuk';

		$select = 'stock_pupuk.*,satuan_barang.nama_satuan,merk_pupuk.nama_merk';
		$isi['stock_pupuk'] = $this->Glo_model->joinstocksatmerk($select)->result();
		$isi['satuan_barang'] = $this->Glo_model->get('satuan_barang')->result();
		$isi['merk_pupuk'] = $this->Glo_model->get('merk_pupuk')->result();
		$coc = $this->load_template->begining('Pupuk DewiSri | Pekerjaan',$content,$js,$isi);
	}

	public function insert_merk()
	{
		$po = $this->input->post();
		$ins = array('nama_merk' => $po['merk']);
		$query = $this->Glo_model->insert('merk_pupuk', $ins);
		if ($query) {
			$show = 'Success!! Data berhasil ditambahkan.';
		} else {
			$show = 'Failed!! Data gagal ditambahkan.';
		}
		echo json_encode($show);
	}

	public function show_merk()
	{
		$query = $this->Glo_model->get('merk_pupuk')->result_array();
		echo json_encode($query);
	}

	public function insert_pupuk()
	{
		$po = $this->input->post();
		$harga_pupuk = intval(preg_replace('/[^\d.]/', '', $po['harga_pupuk']));
		$ins = array('nama_pupuk' => $po['nama_pupuk'],
					 'qty' => $po['qty'],
					 'harga_pupuk' => $harga_pupuk,
					 'description_pupuk' => $po['description_pupuk'],
					 'satuan_barang_idsatuan_barang' => $po['satuan_pupuk'],
					 'merk_pupuk_id_merk' => $po['merk_pupuk']
					);
		$query = $this->Glo_model->insert('stock_pupuk', $ins);
		if ($query > 0) {
			echo '<script>alert("Success!! Data berhasil ditambahkan"); window.location="'.site_url('Referensi/stok_pupuk').'"</script>';
		} else {
			echo '<script>alert("Failed!! Data gagal ditambahkan"); window.location="'.site_url('Referensi/stok_pupuk').'"</script>';
		}
	}

	public function update_pupuk($id)
	{
		$po = $this->input->post();
		$harga_pupuk = intval(preg_replace('/[^\d.]/', '', $po['harga_pupuk']));
		$update = array('nama_pupuk' => $po['nama_pupuk'],
					 'qty' => $po['qty'],
					 'harga_pupuk' => $harga_pupuk,
					 'description_pupuk' => $po['description_pupuk'],
					 'satuan_barang_idsatuan_barang' => $po['satuan_pupuk'],
					 'merk_pupuk_id_merk' => $po['merk_pupuk']
					);
		$query = $this->Glo_model->update('stock_pupuk',array('id_stock' => $id),$update);
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil diupdate"); window.location="'.site_url('Referensi/stok_pupuk').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal diupdate"); window.location="'.site_url('Referensi/stok_pupuk').'"</script>';
		}
	}

	public function delete_stok($id)
	{
		$query = $this->Glo_model->delete('stock_pupuk',array('id_stock' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil dihapus"); window.location="'.site_url('Referensi/stok_pupuk').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal dihapus"); window.location="'.site_url('Referensi/stok_pupuk').'"</script>';
		}
	}

	public function supir()
	{
		$content = 'home/referensi/supir/supir';
		$js = '';
		$isi['supir_list'] = $this->Glo_model->get('supir_ud_dewisri')->result();
		$coc = $this->load_template->begining('Pupuk DewiSri | Supir',$content,$js,$isi);
	}

	public function insert_supir()
	{
		$po = $this->input->post();
		$ins = ['ktp_supir' => $po['ktp_supir'],
			'nama_supir' => $po['nama_supir'],
			'no_polisi' => $po['no_polisi'],
			'no_phone' => $po['no_phone'],
			'alamat_supir' => $po['alamat_supir']];

		$query = $this->Glo_model->insert('supir_ud_dewisri', $ins);
		if ($query > 0) {
			echo '<script>alert("Success!! Data berhasil ditambahkan"); window.location="'.site_url('Referensi/supir').'"</script>';
		} else {
			echo '<script>alert("Failed!! Data gagal ditambahkan"); window.location="'.site_url('Referensi/supir').'"</script>';
		}
	}

	public function update_supir($id)
	{
		$po = $this->input->post();
		$ins = ['ktp_supir' => $po['ktp_supir'],
			'nama_supir' => $po['nama_supir'],
			'no_polisi' => $po['no_polisi'],
			'no_phone' => $po['no_phone'],
			'alamat_supir' => $po['alamat_supir']];

		$query = $this->Glo_model->update('supir_ud_dewisri',['id_supir' => $id],$ins);
		if ($query > 0) {
			echo '<script>alert("Success!! Data ID: '.$id.' berhasil diupdate"); window.location="'.site_url('Referensi/supir').'"</script>';
		} else {
			echo '<script>alert("Failed!! Data ID: '.$id.' gagal diupdate"); window.location="'.site_url('Referensi/supir').'"</script>';
		}
	}

	public function delete_supir($id)
	{
		$query = $this->Glo_model->delete('supir_ud_dewisri',array('id_supir' => $id));
		if ($query > 0) {
			echo '<script>alert("Success!! ID Data: '.$id.' berhasil dihapus"); window.location="'.site_url('Referensi/supir').'"</script>';
		} else {
			echo '<script>alert("Failed!! ID Data: '.$id.' gagal dihapus"); window.location="'.site_url('Referensi/supir').'"</script>';
		}
	}
}

/* End of file Referensi.php */
/* Location: ./application/controllers/Referensi.php */
