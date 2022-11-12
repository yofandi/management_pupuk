<div class="card">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Gudang/insert_gudang') ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label for="">Tanggal</label>
					<input type="text" class="form-control" name="tanggal" id="datetimepicker1" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d H:i A'); ?>">
				</div>
				<div class="form-group col-md-4">
					<label for="">Pupuk</label>
					<input type="hidden" id="id_satuan_barang" name="id_satuan">
					<select name="pupuk" id="pupuk" class="form-control">
						<option value="">-- Pilih Pupuk --</option>
						<?php foreach ($stock_pupuk as $pupuk): ?>
						<option value="<?= $pupuk->id_stock ?>"><?= $pupuk->nama_pupuk ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="">No. DO</label>
					<input type="text" class="form-control" name="no_do" placeholder="No. DO">
				</div>
				<div class="form-group col-md-4">
					<label for="">No. Polisi</label>
					<input type="text" class="form-control" name="no_polisi" placeholder="No. Polisi">
				</div>
				<div class="form-group col-md-12">
					<label for="">Supir</label>
					<input type="text" class="form-control" name="supir" placeholder="Nama Supir">
				</div>
				<div class="form-group col-md-6">
					<label for="">Jml (li)</label>
					<input class="form-control" type="number" name="jml_li" placeholder="Jml (li)" step="any">
				</div>
				<div class="form-group col-md-6">
					<label for="">Satuan</label>
					<input type="text" id="satuan_pupuk" class="form-control" name="qty_satuan" readonly>
				</div>
				<div class="form-group col-md-12">
					<label for="">Suplier</label>
					<select name="suplier" class="form-control selectpicker"  data-live-search="true">
						<option value="">--- Pilih Suplier ---</option>
						<?php foreach ($suplier as $suplier_list): ?>
						<option value="<?= $suplier_list->id_suplier ?>"><?= $suplier_list->nama_suplier ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-md-12">
					<label for="">Penerima</label>
					<input type="text" class="form-control" name="penerima" placeholder="Penerima">
				</div>
				<div class="form-group col-md-6">
					<label for="">Ongkos Kirim</label>
					<input type="text" id="format0" class="form-control" name="ongkos_kirim" placeholder="Ongkos Kirim">
				</div>
				<div class="form-group col-md-6">
					<label for="">Uang BBM</label>
					<input type="text" id="format1" class="form-control" name="uang_bbm" placeholder="Uang BBM">
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>