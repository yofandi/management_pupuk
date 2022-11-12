<div class="card">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Pembayaran/insert_pembayaran') ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label>No. DO Penjualan</label>
					<select name="id_penjualan" id="no_do_tambah" class="form-control selectpicker" data-live-search="true">
						<option value="">--- Pilih No. DO ---</option>
						<?php foreach ($penjualan_list as $penjualan): ?>
						<option value="<?= $penjualan->id_penjualan ?>"><?= $penjualan->no_do_penjualan ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-md-6" id="tgl_awl">
					<label>Tanggal Awal</label>
					<input type="text" class="form-control" name="tanggal_awal" id="datetimepicker1" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d H:i A'); ?>">
				</div>
				<div class="form-group col-md-6" id="tgl_akhr">
					<label>Tanggal Akhir Pelunasan</label>
					<input type="text" class="form-control" id="datetimepicker2"  name="tanggal_max" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d H:i A'); ?>">
				</div>
				<div class="form-group col-md-12" id="tgl_penerimaan">
					<label>Tanggal Penerimaan</label>
					<input type="text" class="form-control" id="datetimepicker3"  name="tanggal_penerimaan" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d H:i A'); ?>">
				</div>
				<div class="form-group col-md-6" id="harga_keseluruhan">
					<label>Total Beli</label>
					<input type="text" name="total_beli" class="form-control" id="total_beli" readonly>
				</div>
				<div class="form-group col-md-6" id="kurang">
					<label>Yang Telah Dibayar</label>
					<input type="text" name="telah_bayar" class="form-control" id="must_bayar" readonly>
				</div>
				<div class="form-group col-md-12">
					<label>Uang Bayar</label>
					<input type="text" id="uang_dp" class="form-control" name="uang_bayar" value="0">
				</div>
				<div class="form-group col-md-12">
					<label for="">Jenis Pembayaran</label>
					<select name="jenis_pembayaran" class="form-control">
						<?php foreach ($jenis_pembayaran as $key => $value): ?>
						<option value="<?= $key ?>"><?= $value ?></option>
						<?php endforeach ?>
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
