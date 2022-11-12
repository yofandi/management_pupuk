<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row d-none d-sm-flex mb-4">
          <div class="col-md-4">
            <h3 class="card-title">Supplier</h3>
            <p class="card-description">
              Management Supplier
            </p>
          </div>
          <div class="col-md-2 offset-md-6" align="center">
            <button type="button" class="btn btn-icons btn-success btn-rounded" data-toggle="modal" data-target="#tambah_suplier"><span class="mdi mdi-plus"></span></button>
          </div>
          <?= load_modal('home/referensi/suplier/modal/modal_tambah_suplier','tambah_suplier','Tambah Supplier','lg') ?>
          <div class="table-responsive">
            <table class="table" id="order-listing">
              <thead>
                <tr align="center">
                  <th>No.</th>
                  <th>Nama Supplier</th>
                  <th>Email</th>
                  <th>Telefon</th>
                  <th>No. HP</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1; foreach ($supplier_list as $supplier): 
                $name_modal = 'update_modal_suplier'.$supplier->id_suplier;
                $name_title = 'Update Supplier - ID: '.$supplier->id_suplier.' | '.$supplier->nama_suplier;
                $isn = array(
                  'id_suplier' => $supplier->id_suplier,
                  'nama_suplier' => $supplier->nama_suplier,
                  'email_suplier' => $supplier->email_suplier,
                  'no_telepon_suplier' => $supplier->no_telepon_suplier,
                  'no_phone_suplier' => $supplier->no_phone_suplier,
                  'alamat_suplier' => $supplier->alamat_suplier
                );
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $supplier->nama_suplier ?></td>
                  <td><?= $supplier->email_suplier ?></td>
                  <td><?= $supplier->no_telepon_suplier ?></td>
                  <td><?= $supplier->no_phone_suplier ?></td>
                  <td>
                    <button type="button" class="btn btn-outline-warning btn-rounded"data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
                    <a href="<?= site_url('Referensi/delete_supplier/'.$supplier->id_suplier) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
                    <?= load_modal('home/referensi/suplier/modal/modal_update_suplier',$name_modal,$name_title,'lg',$isn) ?>
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