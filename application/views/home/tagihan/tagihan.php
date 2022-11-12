<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<div class="row d-none d-sm-flex mb-4">
					<h3 class="card-title">Gudang</h3><br>
					<p class="card-description">
						Management Gudang
					</p>
					<div class="table-responsive">
						<table class="table" id="tagihan_table">
							<thead align="center">
								<tr>
									<th>No.</th>
									<th>ID Riwayat Gudang</th>
									<th>Ongkos Kirim (Rp.)</th>
									<th>Uang BBM (Rp.)</th>
									<th class="filter_scale">Status</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								foreach ($tagihan_list as $tagihan): 
									$name_modal = "update_tagihan".$tagihan->id_tagihan;
									$name_title = "Update Tagihan | ID Riwayat Gudang: ".$tagihan->history_add_pupuk_id_history;
									$isian = [
										'id_tagihan' => $tagihan->id_tagihan,
										'status_pelunasan' => $tagihan->status_pelunasan
									];
									?>
								<tr>
									<td align="center"><?= $no ?></td>
									<td align="center"><?= $tagihan->history_add_pupuk_id_history ?></td>
									<td align="right"><?= number_format($tagihan->ongkos_kirim_tagihan,0,'.',',') ?></td>
									<td align="right"><?= number_format($tagihan->uang_bbm,0,'.',',') ?></td>
									<td align="center"><?= $tagihan->status_pelunasan ?></td>
									<td align="">
										<button type="button" class="btn btn-outline-warning btn-rounded"data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
                    <?= load_modal('home/tagihan/modal/modal_update_tagihan',$name_modal,$name_title,'lg',$isian) ?>
									</td>
								</tr>
								<?php $no++; endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>