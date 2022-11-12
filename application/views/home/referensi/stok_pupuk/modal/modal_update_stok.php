<div class="card">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Referensi/update_pupuk/'.$data['id_stock']) ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label for="">Merk</label>
					<!-- <input type="hidden" id="merkidu" value="<?= $data['merk_pupuk'] ?>"> -->
					<select name="merk_pupuk" id="" class="form-control">
						<option value="">--- Pilih Merk ---</option>
						<?php foreach ($merk_pupuk as $merek_cak): ?>
						<option value="<?= $merek_cak->id_merk ?>" 
							<?php if ($merek_cak->id_merk === $data['merk_pupuk_id_merk']): ?>
							selected
							<?php endif ?>
						><?= $merek_cak->nama_merk ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-md-12">
					<label for="">Nama Pupuk</label>
					<input type="text" class="form-control" name="nama_pupuk" placeholder="Nama Pupul" value="<?= $data['nama_pupuk'] ?>">
				</div>
				<div class="form-group col-md-4">
					<label for="">QTY</label>
					<input class="form-control" type="number" step="any" name="qty" placeholder="QTY" value="<?= $data['qty'] ?>">
				</div>
				<div class="form-group col-md-4">
					<label for="">Satuan</label>
					<select name="satuan_pupuk" class="form-control">
						<option value="">--- Pilih Satuan ---</option>
						<?php foreach ($satuan_barang as $satuan): ?>
						<option value="<?= $satuan->idsatuan_barang ?>" 
							<?php if ($satuan->idsatuan_barang === $data['satuan_barang_idsatuan_barang']): ?>
							selected
							<?php endif ?>
						><?= $satuan->nama_satuan ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="">Harga</label>
					<input class="form-control" id="harga_pupuk<?= $data['id_stock'] ?>" type="text" name="harga_pupuk" placeholder="Harga Pupuk" value="<?= number_format($data['harga_pupuk'],0,'.',',') ?>">
				</div>
				<div class="form-group col-md-12">
					<label for="">Deskripsi</label>
					<textarea class="form-control" name="description_pupuk" placeholder="Deskripsi"><?= $data['description_pupuk'] ?></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Change</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>
<script>
	function format_number<?= $data['id_stock'] ?>(number, prefix, thousand_separator, decimal_separator)
	{
		var 	thousand_separator = thousand_separator || ',',
		decimal_separator = decimal_separator || '.',
		regex		= new RegExp('[^' + decimal_separator + '\\d]', 'g'),
		number_string = number.replace(regex, '').toString(),
		split	  = number_string.split(decimal_separator),
		rest 	  = split[0].length % 3,
		result 	  = split[0].substr(0, rest),
		thousands = split[0].substr(rest).match(/\d{3}/g);

		if (thousands) {
			separator = rest ? thousand_separator : '';
			result += separator + thousands.join(thousand_separator);
		}
		result = split[1] != undefined ? result + decimal_separator + split[1] : result;
		return prefix == undefined ? result : (result ? prefix + result : '');
	};

	var input<?= $data['id_stock'] ?> = document.getElementById('harga_pupuk<?= $data['id_stock'] ?>');
	input<?= $data['id_stock'] ?>.addEventListener('keyup', function(e)
	{
		input<?= $data['id_stock'] ?>.value = format_number<?= $data['id_stock'] ?>(this.value, '');
	});
</script>