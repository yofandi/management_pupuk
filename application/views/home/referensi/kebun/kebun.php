<style type="text/css">
.table_scroll {
	border-spacing: 0;
}

.table_scroll tbody,
.table_scroll thead tr { display: block; }

.table_scroll tbody {
	height: 500px;
	overflow-y: scroll;
	overflow-x: hidden;
}

.table_scroll tbody td,
.table_scroll thead th {
	width: 140px;
}

.table_scroll thead th:last-child {
	width: 156px; /* 140px + 16px scrollbar width */
}

.table_scroll thead tr th { 
	height: 30px;
	line-height: 30px;
	/*text-align: left;*/
}


.table_scroll tbody td:last-child, thead th:last-child {
	border-right: none !important;
}
</style>
<div class="row grid-margin">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h1 class="card-title">Kebun</h1>
				<p class="card-description">Management Kota, Kebun & Blok</p>
				<div class="row">
					<div class="col-md-4">
						<div class="table-responsive">
							<h3>Kota</h3>
							<table class="table table_scroll">
								<thead>
									<tr id="importFrm1">
										<td colspan="3">
											<div class="form-group">
												<input type="text" class="form-control" id="search" placeholder="Cari...">
											</div>
										</td>
									</tr>
									<tr>
										<th>No</th>
										<th>KOTA</th>
										<th><a href="javascript:void(0);" onclick="$('#importFrm1').slideToggle()"><i class="mdi mdi-martini"></i></a> || <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle()"><i class="mdi mdi-plus"></i></a></th>
									</tr>
								</thead>
								<tbody id="table_kota">
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-4">
								<h3>Kebun</h3>
							</div>
							<div class="col-md-4 offset-md-4" align="right">
								<button type="button" class="btn btn-icons btn-success btn-rounded" data-toggle="modal" data-target="#tambah_kebun"><span class="mdi mdi-plus"></span></button>
								<?= load_modal('home/referensi/kebun/modal/modal_tambah_kebun','tambah_kebun','Tambah Kebun','md') ?>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table" id="example">
								<thead>
									<tr>
										<th>ID</th>
										<th>KOTA</th>
										<th>KEBUN</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($kota_kebun as $key):
										$name_modal = 'update_kebun'.$key->id_kebun;
										$name_title = 'Update Kebun || '.$key->id_kebun;
										$isian = array('id_kebun' => $key->id_kebun,'nama_kebun' => $key->nama_kebun,'kota_id_kota' => $key->kota_id_kota);
										?>
										<tr>
											<td><?= $key->id_kebun ?></td>
											<td><?= $key->nama_kota ?></td>
											<td><?= $key->nama_kebun ?></td>
											<td>
												<button type="button" class="btn btn-success btn-rounded" onclick="send_kebun('<?= $key->nama_kebun ?>')"><span class="mdi mdi-check"></span></button>
												<button type="button" class="btn btn-outline-warning btn-rounded"data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
												<a href="<?= site_url('Referensi/delete_kebun/'.$key->id_kebun) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
												<?= load_modal('home/referensi/kebun/modal/modal_update_kebun',$name_modal,$name_title,'md',$isian) ?>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<td></td>
										<th>KOTA</th>
										<th>KEBUN</th>
										<td></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="col-md-12"><br><br>
						<div class="row">
							<div class="col-md-6" align="right">
								<h3>Blok</h3>
							</div>
							<div class="col-md-2 offset-md-4" align="right">
								<button type="button" class="btn btn-icons btn-success btn-rounded" data-toggle="modal" data-target="#tambah_blok"><span class="mdi mdi-plus"></span></button>
								<?= load_modal('home/referensi/kebun/modal/modal_tambah_blok','tambah_blok','Tambah Blok','md') ?>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table" id="example1">
								<thead>
									<tr>
										<th>ID</th>
										<th>KEBUN</th>
										<th>BLOK</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($kebun_blok as $caca):
										$name_modal = 'update_blok'.$caca->id_blok;
										$name_title = 'Update Blok || '.$caca->id_blok;
										$isian = array('id_blok' => $caca->id_blok,'nama_blok' => $caca->nama_blok,'kebun_id_kebun' => $caca->kebun_id_kebun);
										?>
										<tr>
											<td><?= $caca->id_blok ?></td>
											<td><?= $caca->nama_kebun ?></td>
											<td><?= $caca->nama_blok ?></td>
											<td>
												<button type="button" class="btn btn-outline-warning btn-rounded"data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
												<a href="<?= site_url('Referensi/delete_blok/'.$caca->id_blok) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
												<?= load_modal('home/referensi/kebun/modal/modal_update_blok',$name_modal,$name_title,'md',$isian) ?>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<td></td>
										<th>KEBUN_</th>
										<th>BLOK</th>
										<td></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>