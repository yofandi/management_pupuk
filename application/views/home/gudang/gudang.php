 <div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row d-none d-sm-flex mb-4">
          <div class="col-md-4">
            <h3 class="card-title">Gudang</h3>
            <p class="card-description">
              Management Gudang
            </p>
          </div>
          <div class="col-md-2 offset-md-6" align="center">
            <button type="button" class="btn btn-icons btn-success btn-rounded" data-toggle="modal" data-target="#tambah_pupuk"><span class="mdi mdi-plus"></span></button>
          </div>
          <?= load_modal('home/gudang/modal/modal_tambah_gudang','tambah_pupuk','Tambah Stok Pupuk','lg') ?>
          <div class="table-responsive">
            <table class="table" id="order-listing">
              <thead>
                <tr align="center">
                  <th>No.</th>
                  <th>No. DO</th>
                  <th>Jml (li)</th>
                  <th>Suplier</th>
                  <th>Penerima</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($history as $row): 
                $name_modal = 'update_gudang'.$row->id_history;
                $name_title = 'Update History Pupuk - ID : '.$row->id_history;
                $isian = array(
                  'id_history' => $row->id_history,
                  'suplier_id_suplier' => $row->suplier_id_suplier,
                  'no_do' => $row->no_do,
                  'no_police' => $row->no_police,
                  'driver' => $row->driver,
                  'jml_li' => $row->jml_li,
                  'qty_satuan' => $row->qty_satuan,
                  'receiver' => $row->receiver,
                  'ongkos_kirim' => $row->ongkos_kirim,
                  'tanggal_history' => $row->tanggal_history,
                  'uang_bbm' => $row->uang_bbm,
                  'stock_pupuk_id_stock' => $row->stock_pupuk_id_stock,
                  'satuan_barang_idsatuan_barang' => $row->satuan_barang_idsatuan_barang
                );
                ?>
                <tr>
                  <td align="center"><?= $no ?></td>
                  <td align="center"><?= $row->no_do ?></td>
                  <td align="right"><?= $row->jml_li ?></td>
                  <td align="center"><?= $row->nama_suplier ?></td>
                  <td align="center"><?= $row->receiver ?></td></td>
                  <td>
                    <button type="button" class="btn btn-outline-warning btn-rounded"data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
                   <a href="<?= site_url('Gudang/delete_gudang/'.$row->id_history) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
                   <?= load_modal('home/gudang/modal/modal_update_gudang',$name_modal,$name_title,'lg',$isian) ?>
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