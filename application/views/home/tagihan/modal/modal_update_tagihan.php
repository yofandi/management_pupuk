<div class="card" align="left">
	<div class="modal-header">
		<h5 class="modal-title"><?= $title_md ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<form action="<?= site_url('Gudang/update_tagihan/'.$data['id_tagihan'])  ?>" method="post">
		<div class="card-body">
			<div class="modal-body row">
				<div class="form-group col-md-12">
					<label>Status</label>
					<select name="status_pelunasan" class="form-control">
						<?php foreach ($sts_lns as $key => $value): ?>
						<option value="<?= $key ?>"
							<?php if ($key === $data['status_pelunasan']): ?>
								selected
							<?php endif ?>
						><?= $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-info">Change</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</form>
</div>
