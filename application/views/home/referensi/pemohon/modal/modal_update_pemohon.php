<div class="card" align="left">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Referensi/update_pemohon/'.$data['id_pemohon']) ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label for="">Nama Pemohon</label>
					<input type="text" class="form-control" name="nama_pemohon" placeholder="Full Name" value="<?= $data['nama_pemohon'] ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="username">KTP</label>
					<input type="text" class="form-control" name="ktp_pemohon" placeholder="No. KTP" value="<?= $data['ktp_pemohon'] ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="">Phone</label>
					<input type="text" class="form-control" name="no_phone_pemohon" placeholder="Example: 08**********" value="<?= $data['no_phone_pemohon'] ?>">
				</div>
				<div class="form-group col-md-12">
					<label for="level">Klasifikasi</label>
					<select name="klasifikasi_id_klasifikasi" class="form-control">
						<option value="">--- Pilih Klasifikasi ---</option>
						<?php foreach ($klasifikasi as $kla): ?>
						<option value="<?= $kla->id_klasifikasi ?>" 
						<?php if ($kla->id_klasifikasi == $data['klasifikasi_id_klasifikasi']): ?>
							selected
						<?php endif ?>><?= $kla->nama_klasifikasi ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-md-12">
					<label for="level">Alamat</label>
					<textarea name="alamat_pemohon" class="form-control" placeholder="Alamat"><?= $data['alamat_pemohon'] ?></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>