<div class="card">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Referensi/add_supplier') ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label for="">Suplier</label>
					<input type="text" class="form-control" name="nama_suplier" placeholder="Name Suplier">
				</div>
				<div class="form-group col-md-6">
					<label for="email">Email</label>
					<input class="form-control" type="email" name="email_suplier" placeholder="Example: John@gmail.com" required>
				</div>
				<div class="form-group col-md-6">
					<label for="">Phone</label>
					<input type="text" class="form-control" name="no_phone_suplier" placeholder="Example: 08**********">
				</div>
				<div class="form-group col-md-12">
					<label for="username">Telp</label>
					<input type="text" class="form-control" name="no_telepon_suplier" placeholder="Example: (0334) ******* ">
				</div>
				<div class="form-group col-md-12">
					<label for="level">Alamat</label>
					<textarea name="alamat_suplier" class="form-control" placeholder="Alamat"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>