<div class="card">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div><!-- <?= site_url('Referensi/insert_pupuk') ?> -->
	<div class="card-body">
		<div class="modal-body row">
			<div class="form-group col-md-12">
				<label for="">Nama Merk</label>
				<input type="text" class="form-control" id="nama_merk" name="nama_merk" placeholder="Merk">
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-success" onclick="insert_merk()">Submit</button>
			<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
		</div>
	</div>
</div>