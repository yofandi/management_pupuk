<div class="card" align="left">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Pembayaran/update_penerimaan/'.$data['id_penerimaan'].'/'.$data['id_penjualan'].'/'.$data['id_pembayaran']) ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label>Tanggal Penerimaan</label>
					<input type="text" class="form-control" id="upapenerima<?= $data['id_penerimaan'] ?>"  name="tanggal_penerimaan" value="<?php $c = date_create($data['tanggal_terima']); $b = date_format($c,'d/m/Y H:i A'); echo $b; ?>">
				</div>
				<div class="form-group col-md-12">
					<label>Uang Terima</label>
					<input type="text" class="form-control" id="nominal_update<?= $data['id_penerimaan'] ?>" name="uang_bayar" value="<?= number_format($data['uang_terima'],0,'.',',') ?>">
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>
