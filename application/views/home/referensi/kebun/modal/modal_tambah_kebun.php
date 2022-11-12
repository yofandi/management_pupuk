<div class="card" align="left">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Referensi/insert_kebun') ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label for="">Nama Kebun</label>
					<input type="text" class="form-control" name="nama_kebun" placeholder="Full Name">
				</div>
				<div class="form-group col-md-12">
					<label for="">Kota</label>
					<select name="kota_id_kota" class="form-control kota_id_kota">
						<option value="">--- Pilih Kota ---</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>