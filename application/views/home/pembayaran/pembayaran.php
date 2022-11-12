 <div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row d-none d-sm-flex mb-4">
          <div class="col-md-8">
            <h3 class="card-title">Pembayaran</h3>
            <p class="card-description">
              Management Pembayaran
            </p>
          </div>
          <div class="col-md-2 offset-md-2" align="center">
            <button type="button" class="btn btn-icons btn-success btn-rounded" data-toggle="modal" data-target="#tambah_pembayaran"><span class="mdi mdi-plus"></span></button>
          </div>
          <?= load_modal('home/pembayaran/modal/modal_tambah_pembayaran','tambah_pembayaran','Tambah Pembayaran','lg') ?>
          <div class="table-responsive">
            <table class="table" id="pembayaran_table">
              <thead>
                <tr align="center">
                  <th>No.</th>
                  <th>ID Penjualan</th>
                  <th>No. DO</th>
                  <th>Tanggal Awal</th>
                  <th>Tanggal Max</th>   
                  <th class="filter_scale">Jenis Pembayaran</th>
                  <th class="filter_scale">Status</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($show_intable as $is):
                  $uang_terima = $this->db->select('SUM(penerimaan.uang_terima) as uang_terima')->where('penjualan_id_penjualan',$is->penjualan_id_penjualan)->get('penerimaan')->row_array();

                  $name_modal = 'update_modal_pemb'.$is->id_pembayaran;
                  $name_title = 'Update Pembayaran || Pembayaran: '.$is->id_pembayaran;
                  $isian = [
                    'id_pembayaran' => $is->id_pembayaran,
                    'tanggal_pembayaran_awl' => $is->tanggal_pembayaran_awl,
                    'jenis_pembayaran' => $is->jenis_pembayaran,
                    'status_lunas' => $is->status_lunas,
                    'tanggal_max_bayar' => $is->tanggal_max_bayar,
                    'penjualan_id_penjualan' => $is->penjualan_id_penjualan,
                    'harga_keseluruhan' => $is->harga_keseluruhan,
                    'uang_terima' => $uang_terima['uang_terima']
                  ];
                ?>
                <tr>
                  <td align="center"><?= $no  ?></td>
                  <td align="right"><?= $is->penjualan_id_penjualan?></td>
                  <td align="center"><?= $is->no_do_penjualan ?></td>
                  <td align="center"><?= $is->tanggal_pembayaran_awl ?></td>
                  <td align="center"><?= $is->tanggal_max_bayar ?></td>
                  <td align="center"><?= $is->jenis_pembayaran ?></td>
                  <td align="center"><?= $is->status_lunas ?></td>
                  <td>
                    <button type="button" class="btn btn-outline-warning btn-rounded"data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
                    <?= load_modal('home/pembayaran/modal/modal_update_pembayaran',$name_modal,$name_title,'lg',$isian) ?>
                    <a href="<?= site_url('Pembayaran/delete_pembayaran/'.$is->id_pembayaran) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
                  </td>
                </tr>
                <?php $no++; endforeach ?>
              </tbody>
              <tfoot>
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
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>