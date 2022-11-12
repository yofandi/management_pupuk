<div class="row profile-page">
	<div class="col-md-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<h3 class="">Detail</h3>
				<p class="card-description">
					Penjualan ID: <b><?= $id ?></b> &nbsp &nbsp||&nbsp &nbsp No. DO: <b><?= $view_pen->no_do_penjualan ?></b>
				</p>
				<div class="row">
					<div class="col-md-12 profile-body">
                      <ul class="nav tab-switch" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="update-keranjang-tab" data-toggle="pill" href="#update-keranjang" role="tab" aria-controls="update-keranjang" aria-selected="true">Detail Keranjang</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="form-update-tab" data-toggle="pill" href="#form-update" role="tab" aria-controls="form-update" aria-selected="false">Detail Form</a>
                        </li>
                      </ul>
					</div>
					<div class="col-md-12">
						<div class="tab-content tab-body" id="profile-log-switch">
							<div class="tab-pane fade show active pr-3" id="update-keranjang" role="tabpanel" aria-labelledby="update-keranjang-tab"><br>
								<h4>Keranjang Beli</h4>
								<div class="table-reponsive">
									<table class="table table-striped">
										<thead>
											<tr align="center">
												<th>Pupuk</th>
												<th>QTY</th>
												<th>Diskon(%)</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$total = 0;
											foreach ($keranjang as $ke): 
											?>
											<tr>
												<td align="left"><?= $ke->nama_pupuk ?></td>
												<td align="center"><?= $ke->qty_jual ?></td>
												<td align="center"><?= $ke->diskon ?></td>
												<td align="right"><?= number_format($ke->harga_total,0,'.',',') ?></td>
											</tr>
											<?php
											$total += $ke->harga_total;
											endforeach ?>
										</tbody>
										<tfoot align="right">
											<tr>
												<th colspan="3" align="center">Jumlah :</th>
												<th><?= number_format($view_pen->total_harga,0,'.',',') ?></th>
											</tr>
											<tr>
												<th colspan="3" align="center">Diskon (%):</th>
												<th><?= $view_pen->diskon ?></th>
											</tr>
											<tr>
												<th colspan="3" align="center">total Keseluruhan :</th>
												<th><?= number_format($view_pen->harga_keseluruhan,0,'.',',') ?></th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="form-update" role="tabpanel" aria-labelledby="form-update-tab">
								<h3>Detail Form</h3><br>
								<form class="row forms-sample" action="<?= site_url('Konfirmasi/dokonfirmasi/'.$view_pen->id_penjualan) ?>" method="post">
								  <div class="form-group col-md-6">
						            <label for="">Tanggal Penjualan</label>
						            <input type="datetime" class="form-control" id="tanggal_penjualan" name="" value="<?= $view_pen->tanggal_penjualan ?>" readonly>
						          </div>
						          <div class="form-group col-md-6">
						            <label for="">Tanggal Kirim</label>
						            <input type="datetime" class="form-control" id="tanggal_kirim" name="" value="<?= $view_pen->tanggal_kirim ?>" readonly>
						          </div>
						          <div class="form-group col-md-6">
						            <label>No Do</label>
						            <input type="text" class="form-control" id="no_do" name="" placeholder="No Do" value="<?= $view_pen->no_do_penjualan ?>" readonly>
						          </div>
						          <div class="form-group col-md-6">
						            <label for="">Sales</label>
						            <select name="" id="sales" class="form-control selectpicker"  data-live-search="true" disabled>
						              <option value="">-- Pilih Sales --</option>
						              <?php foreach ($sales_list as $sales): ?>
						              <option value="<?= $sales->id_sales ?>" 
						              <?php if ($sales->id_sales == $view_pen->sales_id_sales): ?>
						              selected	
						              <?php endif ?>><?= $sales->nama_sales ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-4">
						          	
						            <label for="">Kebun</label>
						            <input type="hidden" id="kebun_fo" value="<?= $view_pen->id_kebun ?>">
						            <select name="" id="kebun" class="form-control" disabled>
						              <option value="">--- Pilih Kebun ---</option>
						              <?php foreach ($kebun_list as $kebun): ?>
						              <option value="<?= $kebun->id_kebun ?>" 
						              <?php if ($kebun->id_kebun == $view_pen->id_kebun): ?>
						              	selected
						              <?php endif ?>><?= $kebun->nama_kebun ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-4">
						            <label for="">Blok</label>
						            <input type="hidden" id="blok_fo" value="<?= $view_pen->blok_id_blok ?>">
						            <select name="" id="blok" class="form-control" disabled>
						              <option value="">--- Pilih Blok ---</option>
						            </select>
						          </div>
						          <div class="form-group col-md-4">
						            <label for="">Pekerjaan</label>
						            <select name="" id="pekerjaan" class="form-control" disabled>
						              <option value="">--- Pilih Pekerjaan ---</option>
						              <?php foreach ($pekerjaan_list as $pekerjaan): ?>
						              <option value="<?= $pekerjaan->id_pekerjaan ?>" 
						              	<?php if ($pekerjaan->id_pekerjaan == $view_pen->pekerjaan_id_pekerjaan): ?>
						              	selected
						              	<?php endif ?>
						              	><?= $pekerjaan->nama_pekerjaan ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-12">
						            <label for="">Supir</label>
						            <select name="" id="supir" class="form-control selectpicker"  data-live-search="true" disabled>
						              <option value="">--- Pilih Supir ---</option>
						              <?php foreach ($supir_list as $supir): ?>
						              <option value="<?= $supir->id_supir ?>" <?php if ($supir->id_supir == $view_pen->supir_ud_dewisri_id_supir): ?>
						              selected
						              <?php endif ?>><?= $supir->nama_supir ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-6">
						            <label for="">Pemohon</label>
						            <select name="" id="pemohon" class="form-control selectpicker" data-live-search="true" disabled>
						              <option value="">--- Pilih Pemohon ---</option>
						              <?php foreach ($pemohon_list as $pemohon): ?>
						              <option value="<?= $pemohon->id_pemohon ?>" <?php if ($pemohon->id_pemohon == $view_pen->pemohon_id_pemohon): ?>
						              selected
						              <?php endif ?>><?= $pemohon->nama_pemohon ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-6">
						            <label for="">Perkiraan</label>
						            <select name="" id="perkiraan" class="form-control" disabled>
						              <option value="">--- Pilih Perkiraan ---</option>
						              <?php foreach ($perkiraan_list as $perkiraan): ?>
						              <option value="<?= $perkiraan->id_perkiraan ?>"
						              	<?php if ($perkiraan->id_perkiraan == $view_pen->perkiraan_id_perkiraan): ?>
						              	selected
						              	<?php endif ?>><?= $perkiraan->no_perkiraan.' - '.$perkiraan->nama_perkiraan ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-12">
						            <label for="">Pengirim</label>
						            <input type="text" id="pengirim" class="form-control" name="" value="<?= $view_pen->pengirim ?>" placeholder="Pengirim" readonly>
						          </div>
						          <div class="form-group col-md-12">
						          	<label>Status Konfirmasi</label>
						          	<select name="konfirmasi" class="form-control">
						          		<?php foreach ($konfirmasi_list as $sts): ?>
						          		<option value="<?= $sts->id_konfirmasi ?>"><?= $sts->nama_konfirmasi ?></option>
						          		<?php endforeach ?>
						          	</select>
						          </div>
						          <div class="form-group col-md-12">
						            <button type="submit" class="btn btn-info btn-rounded">Change</button>
						            <a href="<?= site_url('Konfirmasi/konfirmasi') ?>" class="btn btn-secondary btn-rounded">Back</a>
						          </div>
								</form>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div> 
	</div>
</div>