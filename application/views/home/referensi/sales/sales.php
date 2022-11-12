<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row d-none d-sm-flex mb-4">
          <div class="col-md-2">
            <h3 class="card-title">Sales</h3>
            <p class="card-description">
              Management Sales
            </p>
          </div>
          <div class="col-md-2 offset-md-8" align="center">
            <button type="button" class="btn btn-icons btn-success btn-rounded" data-toggle="modal" data-target="#tambah_sales"><span class="mdi mdi-plus"></span></button>
          </div>
          <?= load_modal('home/referensi/sales/modal/modal_tambah_sales','tambah_sales','Tambah Sales','lg') ?>
          <div class="table-responsive">
            <table class="table" id="order-listing">
              <thead>
                <tr align="center">
                  <th>No.</th>
                  <th>Nama Sales</th>
                  <th>Email</th>
                  <th>No. HP</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1; foreach ($sales_list as $sales): 
                $nama_modal = 'update_modal_sales'.$sales->id_sales;
                $nama_title = 'Update Sales ID: '.$sales->id_sales.' | Nama: '.$sales->nama_sales;
                $isn = array('id_sales' => $sales->id_sales,'nama_sales' => $sales->nama_sales,'ktp_sales' => $sales->ktp_sales,'email_sales' => $sales->email_sales,'no_phone' => $sales->no_phone,'alamat_sales' => $sales->alamat_sales);
                ?>
                <td align="center"><?= $no ?></td>
                <td><?= $sales->nama_sales ?></td>
                <td><?= $sales->email_sales ?></td>
                <td><?= $sales->no_phone ?></td>
                <td align="center">
                  <button type="button" class="btn btn-warning btn-rounded" data-toggle="modal" data-target="#<?= $nama_modal ?>"><span class="mdi mdi-pencil"></span></button>
                  <a href="<?= site_url('Referensi/detele_sales/'.$sales->id_sales) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
                  <?= load_modal('home/referensi/sales/modal/modal_update_sales',$nama_modal,$nama_title,'lg',$isn) ?>
                </td>
                <?php $no++; endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>