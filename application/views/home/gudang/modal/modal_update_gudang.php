<div class="card">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Gudang/update_gudang/'.$data['id_history']) ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label for="">Tanggal</label>
					<input type="text" class="form-control" name="tanggal" id="datetimepicker2<?= $data['id_history'] ?>" value="<?php $cac = date_create($data['tanggal_history']); echo date_format($cac,'Y-m-d H:i A'); ?>">
				</div>
				<div class="form-group col-md-12">
					<label for="">Pupuk</label>
					<input type="hidden" name="pupuk" value="<?= $data[
							'stock_pupuk_id_stock'] ?>">
					<input type="hidden" id="id_satuan_barang" name="id_satuan" value="<?= $data['satuan_barang_idsatuan_barang'] ?>">
					<select name="" id="pupuk" class="form-control" disabled>
						<option value="">-- Pilih Pupuk --</option>
						<?php foreach ($stock_pupuk as $pupuk): ?>
						<option value="<?= $pupuk->id_stock ?>" 
						<?php if ($pupuk->id_stock == $data[
							'stock_pupuk_id_stock']): ?>
						selected
						<?php endif ?>><?= $pupuk->nama_pupuk ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="">No. DO</label>
					<input type="text" class="form-control" name="no_do" placeholder="No. DO" value="<?= $data['no_do'] ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="">No. Polisi</label>
					<input type="text" class="form-control" name="no_polisi" placeholder="No. Polisi" value="<?= $data['no_police'] ?>">
				</div>
				<div class="form-group col-md-12">
					<label for="">Supir</label>
					<input type="text" class="form-control" name="supir" placeholder="Nama Supir" value="<?= $data['driver'] ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="">Jml (li)</label>
					<input type="hidden" name="jml_li_sb" step="any" value="<?= $data['jml_li'] ?>">
					<input class="form-control" type="number" name="jml_li" placeholder="Jml (li)" step="any" value="<?= $data['jml_li'] ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="">Satuan</label>
					<input type="text" id="satuan_pupuk" class="form-control " name="qty_satuan" value="<?= $data['qty_satuan'] ?>" readonly>
				</div>
				<div class="form-group col-md-12">
					<label for="">Suplier</label><br>
					<select name="suplier" class="form-control selectpicker"  data-live-search="true" style="height: 1000px">
						<option value="">--- Pilih Suplier ---</option>
						<?php foreach ($suplier as $suplier_list): ?>
						<option value="<?= $suplier_list->id_suplier ?>" 
						<?php if ($suplier_list->id_suplier == $data['suplier_id_suplier']): ?>
						selected
						<?php endif ?>><?= $suplier_list->nama_suplier ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-md-12">
					<label for="">Penerima</label>
					<input type="text" class="form-control" name="penerima" placeholder="Penerima" value="<?= $data['receiver'] ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="">Ongkos Kirim</label>
					<input type="hidden" name="ongkos_kirim_sb" value="<?= $data['ongkos_kirim'] ?>">
					<input type="text" id="fortup0<?= $data['id_history'] ?>" class="form-control" name="ongkos_kirim" placeholder="Ongkos Kirim" value="<?= number_format($data['ongkos_kirim'],0,',','.') ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="">Uang BBM</label>
					<input type="hidden" name="uang_bbm_sb" value="<?= $data['uang_bbm'] ?>">
					<input type="text" id="fortup1<?= $data['id_history'] ?>" class="form-control" name="uang_bbm" placeholder="Uang BBM" value="<?= number_format($data['uang_bbm'],0,'.',',') ?>">
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Change</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>
<script>
	<?php for ($i=0; $i < 2; $i++) { ?>
	function perngformta<?= $i.$data['id_history'] ?>(number, prefix, thousand_separator, decimal_separator)
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

	var input_ue_as<?= $i.$data['id_history'] ?> = document.getElementById('fortup<?= $i.$data['id_history'] ?>');
	input_ue_as<?= $i.$data['id_history'] ?>.addEventListener('keyup', function(e)
	{
		input_ue_as<?= $i.$data['id_history'] ?>.value = perngformta<?= $i.$data['id_history'] ?>(this.value, '');
	});
	<?php } ?>
</script>