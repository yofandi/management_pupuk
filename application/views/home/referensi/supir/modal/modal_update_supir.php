<div class="card">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Referensi/update_supir/'.$data['id_supir']) ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label>Nama</label>
					<input type="text" class="form-control" name="nama_supir" value="<?= $data['ktp_supir'] ?>" placeholder="Nama Lengkap">
				</div>
				<div class="form-group col-md-4">
					<label for="">KTP</label>
					<input type="text" class="form-control" name="ktp_supir" value="<?= $data['nama_supir'] ?>" placeholder="KTP">
				</div>
				<div class="form-group col-md-4">
					<label for="">No. Polisi</label>
					<input type="text" class="form-control" name="no_polisi" value="<?= $data['no_polisi'] ?>" placeholder="No. Polisi">
				</div>
				<div class="form-group col-md-4">
					<label for="">No. Hp</label>
					<input type="text" class="form-control" name="no_phone" value="<?= $data['no_phone'] ?>" placeholder="No. Hp">
				</div>
				<div class="form-group col-md-12">
					<label for="">Alamat</label>
					<textarea name="alamat_supir" class="form-control" placeholder="Alamat"><?= $data['alamat_supir'] ?></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-info">Change</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>