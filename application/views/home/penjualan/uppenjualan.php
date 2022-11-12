<div class="row profile-page">
	<div class="col-md-12 grid-margin">
		<div class="card">
			<div class="row card-body">
				<h3 class="card-title">Update Penjualan : ID - <?= $id ?></h3>
				<div class="col-md-12">
					<div class="profile-body">
                      <ul class="nav tab-switch" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="update-keranjang-tab" data-toggle="pill" href="#update-keranjang" role="tab" aria-controls="update-keranjang" aria-selected="true">Update Keranjang</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="form-update-tab" data-toggle="pill" href="#form-update" role="tab" aria-controls="form-update" aria-selected="false">Update Form</a>
                        </li>
                      </ul>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="tab-content tab-body" id="profile-log-switch">
                            <div class="tab-pane fade show active pr-3" id="update-keranjang" role="tabpanel" aria-labelledby="update-keranjang-tab">
                            	<div class="row">
                            		<div class="col-md-12">
                            			<input type="hidden" id="idpenup" value="<?= $id ?>" placeholder="">
						
										<div class="d-none d-sm-flex mb-4">
											<div class="table-responsive">
								              <table class="table" id="example">
								                <thead>
								                  <tr align="center">
								                    <th>Merk</th>
								                    <th>Pupuk</th>
								                    <th>QTY</th>
								                    <th>Diskon</th>
								                    <th>Price</th>
								                    <th>#</th>
								                  </tr>
								                </thead>
								                <tbody>
								                  <?php foreach ($list_pupuk as $key): ?>
								                  <tr>
								                    <td><input type="hidden" id="id<?= $key->id_stock ?>" value="<?= $key->id_stock ?>"><?= $key->nama_merk ?></td>
								                    <td><input type="hidden" id="nama<?= $key->id_stock ?>" value="<?= $key->nama_pupuk ?>"><?= $key->nama_pupuk ?></td>
								                    <td>
								                      <div class="form-group">
								                        <input type="number" class="form-control" id="qty<?= $key->id_stock ?>" value="1">
								                      </div>
								                    </td>
								                    <td>
								                      <div class="form-group">
								                        <input type="number" class="form-control" id="dis<?= $key->id_stock ?>" value="0">
								                      </div>
								                    </td>
								                    <td><input type="hidden" id="harga<?= $key->id_stock ?>" value="<?= $key->harga_pupuk ?>"><?= $key->harga_pupuk ?></td>
								                    <td>
								                      <button type="button" onclick="update_penj<?= $key->id_stock ?>()" class="btn btn-rounded btn-danger"><span class="mdi mdi-plus"></span></button>
								                      <script type="text/javascript">
								                        function update_penj<?= $key->id_stock  ?>(argument) {
								                          let id = $('#id<?= $key->id_stock ?>').val();
								                          let nama = $('#nama<?= $key->id_stock ?>').val();
								                          let qty = parseInt($('#qty<?= $key->id_stock ?>').val());
								                          let dis = parseInt($('#dis<?= $key->id_stock ?>').val());
								                          let harga = parseInt($('#harga<?= $key->id_stock ?>').val());
								                          let idpenup = $('#idpenup').val();

								                          let harga_set = harga * qty;
								                          let diskon_va = (harga_set * dis) / 100;
								                          let total = harga_set - diskon_va;
								                          $.ajax({
								                            url: '<?= site_url('Penjualan/edit_pupuk_beli/') ?>' + idpenup,
								                            type: 'POST',
								                            dataType: 'json',
								                            data: {id:id,nama:nama,qty:qty,dis:dis,harga:harga,total:total},
								                          })
								                          .done(function(data) {
								                          	console.log(data);
								                           	alert(data);
								                            load_keranjang();
								                          });
								                          
								                        }
								                      </script>
								                    </td>
								                  </tr>
								                  <?php endforeach ?>
								                </tbody>
								                <tfoot>
								                  <tr align="center">
								                    <th>Merk</th>
								                    <th>Pupuk</th>
								                    <td></td>
								                    <td></td>
								                    <td></td>
								                    <td></td>
								                  </tr>
								                </tfoot>
								              </table>
								            </div>
										</div>
                            		</div>
                            	</div>
                            	<div class="row">
						            <div class="col-md-6">
						              <h3 class="card-title">Keranjang</h3>
						            </div>
						            <div class="col-md-6" align="right">
						              <button type="button" onclick="hapus_terpilih()" class="btn btn-secondary"><span></span>Hapus Keranjang</button>
						            </div>
						          </div>
						          <div class="d-none d-sm-flex mb-4">
						            <div class="table-responsive">
						              <table class="table">
						                <thead>
						                  <tr align="center">
						                    <th>Pupuk</th>
						                    <th>QTY</th>
						                    <th>Diskon(%)</th>
						                    <th>Total(Rp.)</th>
						                    <th>#</th>
						                  </tr>
						                </thead>
						                <tbody id="load_sam">
						                 
						                </tbody>
						                <tfoot>
						                  <tr align="right">
						                    <th colspan="3">Jumlah :<input type="hidden" id="total_pupuk"></th>
						                    <th id="total"></th>
						                  </tr>
						                  <tr align="right">
						                    <th colspan="3">Diskon :</th>
						                    <th>
						                      <div class="form-group">
						                        <input class="form-control" type="text" id="diskon_univ" name="diskon" value="0" style="text-align:right;border: none;border-color: transparent;">
						                      </div>
						                    </th>
						                    <th><button type="button" onclick="counting()" class="btn btn-success btn-md">Hitung</button></th>
						                  </tr>
						                  <tr align="right">
						                    <th colspan="3">Total Semua :</th>
						                    <th>
						                      <div class="form-group">
						                        <input type="hidden" id="total_semua_sblm">
						                        <input class="form-control" type="text" id="total_semua" name="total_semua" value="0" style="text-align:right;border: none;border-color: transparent;">
						                      </div>
						                    </th>
						                  </tr>
						                </tfoot>
						              </table>
						              <div align="right">
						              	<button type="button" onclick="update_keranjang()" class="btn btn-primary btn-md">Change</button>
						              </div>
						            </div>
						          </div>
                            </div>
                            <div class="tab-pane fade" id="form-update" role="tabpanel" aria-labelledby="form-update-tab">
                            	<h3>Form - Update</h3><br>
						        <form class="row forms-sample" action="<?= site_url('Penjualan/update_form/'.$data_penjualan->id_penjualan)  ?>" method="Post">
						          <div class="form-group col-md-6">
						            <label for="">Tanggal Penjualan</label>
						            <input type="datetime" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" value="<?= $data_penjualan->tanggal_penjualan ?>">
						          </div>
						          <div class="form-group col-md-6">
						            <label for="">Tanggal Kirim</label>
						            <input type="datetime" class="form-control" id="tanggal_kirim" name="tanggal_kirim" value="<?= $data_penjualan->tanggal_kirim ?>">
						          </div>
						          <div class="form-group col-md-6">
						            <label>No Do</label>
						            <input type="text" class="form-control" id="no_do" name="no_do" placeholder="No Do" value="<?= $data_penjualan->no_do_penjualan ?>">
						          </div>
						          <div class="form-group col-md-6">
						            <label for="">Sales</label>
						            <select name="sales" id="sales" class="form-control selectpicker"  data-live-search="true">
						              <option value="">-- Pilih Sales --</option>
						              <?php foreach ($sales_list as $sales): ?>
						              <option value="<?= $sales->id_sales ?>" 
						              <?php if ($sales->id_sales == $data_penjualan->sales_id_sales): ?>
						              selected	
						              <?php endif ?>><?= $sales->nama_sales ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-4">
						          	
						            <label for="">Kebun</label>
						            <input type="hidden" id="kebun_fo" value="<?= $data_penjualan->id_kebun ?>">
						            <select name="kebun" id="kebun" class="form-control">
						              <option value="">--- Pilih Kebun ---</option>
						              <?php foreach ($kebun_list as $kebun): ?>
						              <option value="<?= $kebun->id_kebun ?>" 
						              <?php if ($kebun->id_kebun == $data_penjualan->id_kebun): ?>
						              	selected
						              <?php endif ?>><?= $kebun->nama_kebun ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-4">
						            <label for="">Blok</label>
						            <input type="hidden" id="blok_fo" value="<?= $data_penjualan->blok_id_blok ?>">
						            <select name="blok" id="blok" class="form-control">
						              <option value="">--- Pilih Blok ---</option>
						            </select>
						          </div>
						          <div class="form-group col-md-4">
						            <label for="">Pekerjaan</label>
						            <select name="pekerjaan" id="pekerjaan" class="form-control">
						              <option value="">--- Pilih Pekerjaan ---</option>
						              <?php foreach ($pekerjaan_list as $pekerjaan): ?>
						              <option value="<?= $pekerjaan->id_pekerjaan ?>" 
						              	<?php if ($pekerjaan->id_pekerjaan == $data_penjualan->pekerjaan_id_pekerjaan): ?>
						              	selected
						              	<?php endif ?>
						              	><?= $pekerjaan->nama_pekerjaan ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-12">
						            <label for="">Supir</label>
						            <select name="supir" id="supir" class="form-control selectpicker"  data-live-search="true">
						              <option value="">--- Pilih Supir ---</option>
						              <?php foreach ($supir_list as $supir): ?>
						              <option value="<?= $supir->id_supir ?>" <?php if ($supir->id_supir == $data_penjualan->supir_ud_dewisri_id_supir): ?>
						              selected
						              <?php endif ?>><?= $supir->nama_supir ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-6">
						            <label for="">Pemohon</label>
						            <select name="pemohon" id="pemohon" class="form-control selectpicker" data-live-search="true">
						              <option value="">--- Pilih Pemohon ---</option>
						              <?php foreach ($pemohon_list as $pemohon): ?>
						              <option value="<?= $pemohon->id_pemohon ?>" <?php if ($pemohon->id_pemohon == $data_penjualan->pemohon_id_pemohon): ?>
						              selected
						              <?php endif ?>><?= $pemohon->nama_pemohon ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-6">
						            <label for="">Perkiraan</label>
						            <select name="perkiraan" id="perkiraan" class="form-control">
						              <option value="">--- Pilih Perkiraan ---</option>
						              <?php foreach ($perkiraan_list as $perkiraan): ?>
						              <option value="<?= $perkiraan->id_perkiraan ?>"
						              	<?php if ($perkiraan->id_perkiraan == $data_penjualan->perkiraan_id_perkiraan): ?>
						              	selected
						              	<?php endif ?>><?= $perkiraan->no_perkiraan.' - '.$perkiraan->nama_perkiraan ?></option>
						              <?php endforeach ?>
						            </select>
						          </div>
						          <div class="form-group col-md-12">
						            <label for="">Pengirim</label>
						            <input type="text" id="pengirim" class="form-control" name="pengirim" value="<?= $data_penjualan->pengirim ?>" placeholder="Pengirim">
						          </div>
						          <div class="form-group col-md-12">
						            <button type="submit" class="btn btn-info btn-rounded">Change</button>
						            <a href="<?= site_url('Penjualan/penjualaan') ?>" class="btn btn-secondary btn-rounded">Back</a>
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
	</div>
</div>