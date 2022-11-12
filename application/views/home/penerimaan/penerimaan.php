 <div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row d-none d-sm-flex mb-4">
          <div class="col-md-12">
            <h3 class="card-title">Penerimaan</h3>
            <p class="card-description">
              Management Penerimaan
            </p>
          </div>
          <div class="table-responsive">
            <table class="table" id="order-listing">
              <thead>
                <tr align="center">
                  <th>No.</th>
                  <th>ID Penjualan</th>
                  <th>No. DO</th>
                  <th>Tanggal Penerimaan</th>
                  <th>Uang Terima</th>
                  <th class="filter_scale">Status</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($penerimaan_list as $penerimaan): 
                  $name_modal = "updatepenerimaan".$penerimaan->id_penerimaan;
                  $name_title = "Update Penerimaan | ID Penerimaan:".$penerimaan->id_penerimaan;
                  $isian = [
                    'id_penjualan' => $penerimaan->id_penjualan,
                    'id_pembayaran' => $penerimaan->pembayaran_id_pembayaran,
                    'id_penerimaan' => $penerimaan->id_penerimaan,
                    'tanggal_terima' => $penerimaan->tanggal_terima,
                    'uang_terima' => $penerimaan->uang_terima
                  ];
                  ?>
                  
                <tr align="right">
                  <td align="center"><?= $no ?></td>
                  <td align="center"><?= $penerimaan->id_penjualan ?></td>
                  <td align="center"><?= $penerimaan->no_do_penjualan ?></td>
                  <td align="center"><?= $penerimaan->tanggal_terima ?></td>
                  <th align="right"><?= number_format($penerimaan->uang_terima,0,'.',',') ?></th>
                  <td align="center"><?= $penerimaan->status_transaksi ?></td>
                  <td>
                    <button type="button" class="btn btn-outline-warning btn-rounded"data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
                    <?= load_modal('home/penerimaan/modal/modal_update_penerimaan',$name_modal,$name_title,'lg',$isian) ?>
                    <a href="<?= site_url('Pembayaran/delete_penerimaan/'.$penerimaan->id_penerimaan.'/'.$penerimaan->id_penjualan.'/'.$penerimaan->pembayaran_id_pembayaran) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
                  </td>
                </tr>
                <?php $no++; endforeach ?>
              </tbody>
              <!-- <tfoot>
                <tr align="center">
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>   
                  <th class="">Jenis Pembayaran</th>
                  <th class="">Status</th>
                  <th></th>
                </tr>
              </tfoot> -->
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>