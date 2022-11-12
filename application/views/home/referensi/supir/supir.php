<style type="text/css">
.panel-heading a{float: right;}
#importFrm{margin-bottom: 20px;display: none;}
#importFrm input[type=file] {display: inline;}
</style>
<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<div class="row d-none d-sm-flex mb-4">
					<div class="col-md-6">
						<h3 class="card-title">Supir</h3>
						<p class="card-description">
							Management Supir
						</p>
					</div>
					<div class="col-md-2 offset-md-4" align="center">
						<a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();" class="btn btn-icons btn-success btn-rounded"><span class="mdi mdi-plus"></span></a>
					</div>
					<form id="importFrm" action="<?= site_url('Referensi/insert_supir') ?>" method="POST" class="col-md-12">
						<div align="center">
							<h3 class="" align="center">Supir</h3>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label>Nama</label>
								<input type="text" class="form-control" name="nama_supir" placeholder="Nama Lengkap">
							</div>
							<div class="form-group col-md-4">
								<label for="">KTP</label>
								<input type="text" class="form-control" name="ktp_supir" placeholder="KTP">
							</div>
							<div class="form-group col-md-4">
								<label for="">No. Polisi</label>
								<input type="text" class="form-control" name="no_polisi" placeholder="No. Polisi">
							</div>
							<div class="form-group col-md-4">
								<label for="">No. Hp</label>
								<input type="text" class="form-control" name="no_phone" placeholder="No. Hp">
							</div>
							<div class="form-group col-md-12">
								<label for="">Alamat</label>
								<textarea name="alamat_supir" class="form-control" placeholder="Alamat"></textarea>
							</div>
							<div class="form-group col-md-12">
								<button type="submit" class="btn btn-primary btn-md">Save</button>
							</div>
						</div>
					</form>
					<div class="table-responsive">
						<table class="table" id="order-listing">
							<thead>
								<tr align="center">
									<th>No.</th>
									<th>KTP</th>
									<th>Nama</th>
									<th>No Polisi</th>
									<th>No. HP</th>
									<th>Alamat</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach ($supir_list as $supir): 
									$name_modal = 'update_modal_supir'.$supir->id_supir;
									$name_title = 'Update Supir || ID: '.$supir->id_supir;
									$isian = ['id_supir' => $supir->id_supir,
									'ktp_supir' => $supir->ktp_supir,
									'nama_supir' => $supir->nama_supir,
									'no_polisi' => $supir->no_polisi,
									'no_phone' => $supir->no_phone,
									'alamat_supir' => $supir->alamat_supir];
									?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $supir->ktp_supir ?></td>
										<td><?= $supir->nama_supir ?></td>
										<td><?= $supir->no_polisi ?></td>
										<td><?= $supir->no_phone ?></td>
										<td><?= $supir->alamat_supir ?></td>
										<td>
											<button type="button" class="btn btn-warning btn-rounded" data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
											<a href="<?= site_url('Referensi/delete_supir/'.$supir->id_supir) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
											<?= load_modal('home/referensi/supir/modal/modal_update_supir',$name_modal,$name_title,'lg',$isian) ?>
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