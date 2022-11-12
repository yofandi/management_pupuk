<div class="card" align="left">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Referensi/update_blok/'.$data['id_blok']) ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label for="">Nama Blok</label>
					<input type="text" class="form-control" name="nama_blok" placeholder="Full Name" value="<?= $data['nama_blok'] ?>">
				</div>
				<div class="form-group col-md-12">
					<label for="">Kebun</label>
					<select name="kebun_id_kebun" class="form-control">
						<option value="">--- Pilih Kota ---</option>
						<?php foreach ($kebun_list as $kebun_isi): ?>
						<option value="<?= $kebun_isi->id_kebun ?>" 
						<?php if ($kebun_isi->id_kebun == $data['kebun_id_kebun']): ?>
							selected
						<?php endif ?>
						><?= $kebun_isi->nama_kebun ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Change</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>