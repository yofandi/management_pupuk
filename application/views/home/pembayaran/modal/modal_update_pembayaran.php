<div class="card">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Pembayaran/update_pembayaran/'.$data['id_pembayaran']) ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label>No. DO Penjualan</label><br>
					<select name="id_penjualan" class="form-control selectpicker" data-live-search="true" disabled>
						<option value="">--- Pilih No. DO ---</option>
						<?php foreach ($penjualan_list as $penjualan): ?>
						<option value="<?= $penjualan->id_penjualan ?>" 
						<?php if ($penjualan->id_penjualan == $data['penjualan_id_penjualan']): ?>
							selected
						<?php endif ?>><?= $penjualan->no_do_penjualan ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group col-md-12">
					<label>Tanggal Awal</label>
					<input type="text" class="form-control" name="tanggal_awal" id="datetimepickerupdate1<?= $data['id_pembayaran'] ?>" value="<?php $c = date_create($data['tanggal_pembayaran_awl']); $b = date_format($c,'d/m/Y H:i A'); echo $b; ?>">
				</div>
				<div class="form-group col-md-12">
					<label>Tanggal Akhir Pelunasan</label>
					<input type="text" class="form-control" id="datetimepickerupdate2<?= $data['id_pembayaran'] ?>"  name="tanggal_max" value="<?php $f = date_create($data['tanggal_max_bayar']); $k = date_format($f,'d/m/Y H:i A'); echo $k; ?>">
				</div>
				<div class="form-group col-md-6">
					<label>Total Beli</label>
					<input type="text" name="" class="form-control" value="<?= number_format($data['harga_keseluruhan'],0,'.',',') ?>" readonly>
				</div>
				<div class="form-group col-md-6">
					<label>Yang Telah Dibayar</label>
					<input type="text" name="" class="form-control" value="<?= number_format($data['uang_terima'],0,'.',',') ?>" readonly>
				</div>
				<div class="form-group col-md-12">
					<label for="">Jenis Pembayaran</label>
					<select name="jenis_pembayaran" class="form-control" disabled>
						<?php foreach ($jenis_pembayaran as $key => $value): ?>
						<option value="<?= $key ?>" 
						<?php if ($key === $data['jenis_pembayaran']): ?>
							selected
						<?php endif ?>><?= $value ?></option>
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
