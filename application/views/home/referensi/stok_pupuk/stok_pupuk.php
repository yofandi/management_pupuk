<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<div class="row d-none d-sm-flex mb-4">
					<div class="col-md-4">
						<h3 class="card-title">Stok</h3>
						<p class="card-description">
							Management Stok
						</p>
					</div>
					<div class="col-md-2 offset-md-6" align="center">
						<button type="button" class="btn btn-icons btn-success btn-rounded" data-toggle="modal" data-target="#tambah_pupuk"><span class="mdi mdi-plus"></span></button>

						<button type="button" class="btn btn-icons btn-secondary btn-rounded" data-toggle="modal" data-target="#tambah_merk"><span class="mdi mdi-loupe"></span></button>
					</div>
					<?= load_modal('home/referensi/stok_pupuk/modal/modal_tambah_stok','tambah_pupuk','Tambah Stok Pupuk','lg') ?>
					<?= load_modal('home/referensi/stok_pupuk/modal/modal_tambah_merk','tambah_merk','Tambah Merk','md') ?>
					<div class="table-responsive">
						<table class="table" id="order-listing">
							<thead>
								<tr align="center">
									<th>No.</th>
									<th>Merk</th>
									<th>Nama Pupuk</th>
									<th>QTY</th>
									<th>Satuan</th>
									<th>Harga (Rp.)</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach ($stock_pupuk as $stok): 
								$name_modal = 'update_stok'.$stok->id_stock;
								$name_title = 'Update Stok Pupuk - '.$stok->nama_pupuk;
								$isn = array(
									'id_stock' => $stok->id_stock, 
									'nama_pupuk' => $stok->nama_pupuk, 
									'qty' => $stok->qty, 
									'harga_pupuk' => $stok->harga_pupuk, 
									'description_pupuk' => $stok->description_pupuk,
									'satuan_barang_idsatuan_barang' => $stok->satuan_barang_idsatuan_barang,
									'merk_pupuk_id_merk' => $stok->merk_pupuk_id_merk
								);
								?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $stok->nama_merk ?></td>
										<td><?= $stok->nama_pupuk ?></td>
										<td align="right"><?= $stok->qty ?></td>
										<td  align="center"><?= $stok->nama_satuan ?></td>
										<td align="right"><?= number_format($stok->harga_pupuk,2,',','.') ?></td>
										<td>
											<button type="button" class="btn btn-outline-warning btn-rounded"data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
											<a href="<?= site_url('Referensi/delete_stok/'.$stok->id_stock) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
											<?= load_modal('home/referensi/stok_pupuk/modal/modal_update_stok',$name_modal,$name_title,'lg',$isn) ?>
										</td>
									</tr>
									<?php $no++; endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>