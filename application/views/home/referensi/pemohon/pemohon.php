<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row d-none d-sm-flex mb-4">
          <div class="col-md-4">
            <h3 class="card-title">Pemohon</h3>
            <p class="card-description">
              Management Pemohon
            </p>
          </div>
          <div class="col-md-2 offset-md-6" align="center">
            <button type="button" class="btn btn-icons btn-success btn-rounded" data-toggle="modal" data-target="#tambah_pemohon"><span class="mdi mdi-plus"></span></button>
          </div>
          <?= load_modal('home/referensi/pemohon/modal/modal_tambah_pemohon','tambah_pemohon','Tambah Pemohon','lg') ?>
          <div class="table-responsive">
            <table class="table" id="order-listing">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>KTP</th>
                  <th>Phone</th>
                  <th>Klasifikasi</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
              	<?php 
              	$no = 1;
              	foreach ($pemohon_list as $pemohon): 
              		$name_modal = 'update_modal'.$no;
                	$name_title = 'Update Pemohon - '.$pemohon->nama_pemohon;
              		$isian = array('id_pemohon' => $pemohon->id_pemohon,'nama_pemohon' => $pemohon->nama_pemohon,'ktp_pemohon' => $pemohon->ktp_pemohon,'no_phone_pemohon' => $pemohon->no_phone_pemohon,'alamat_pemohon' => $pemohon->alamat_pemohon,'klasifikasi_id_klasifikasi' => $pemohon->klasifikasi_id_klasifikasi);
              	?>
              	<tr>
              		<td align="center"><?= $no ?></td>
              		<td align="center"><?= $pemohon->nama_pemohon ?></td>
              		<td align="left"><?= $pemohon->ktp_pemohon ?></td>
              		<td align="left"><?= $pemohon->no_phone_pemohon ?></td>
              		<td align="center"><?php 
              		switch ($pemohon->klasifikasi_id_klasifikasi) {
              			case 2:
              				echo "<span class='badge badge-primary badge-pill'>INTERNAL</span>";
              				break;
              			case 3:
              				echo "<span class='badge badge-warning badge-pill'>EKSTERNAL</span>";
              				break;
              			case 4:
              				echo "<span class='badge badge-Secondary badge-pill'>UMUM</span>";
              				break;
              		}
              		?></td>
              		<td align="center">
              		<button type="button" class="btn btn-outline-warning btn-rounded"data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
                    <a href="<?= site_url('Referensi/delete_pemohon/'.$pemohon->id_pemohon) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
                    <?= load_modal('home/referensi/pemohon/modal/modal_update_pemohon',$name_modal,$name_title,'lg',$isian) ?>
              		</td>
              	</tr>
              	<?php
              	$no++;
              	endforeach ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>