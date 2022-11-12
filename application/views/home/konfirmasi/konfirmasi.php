<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row d-none d-sm-flex mb-4">
          <div class="col-md-4">
            <h3 class="card-title">Konfirmasi</h3>
            <p class="card-description">
              Konfirmasi Pengiriman
            </p>
          </div>
          <div class="col-md-2 offset-md-6" align="center"></div>
          <div class="table-responsive">
            <table class="table" id="konfirmasi_table">
              <thead>
                <tr align="center">
                  <th>No.</th>
                  <th>No. DO</th>
                  <th>Tanggal Terjual</th>
                  <th>Tanggal Terkirim</th>
                  <th>Pengirim</th>
                  <th class="filter_scale">Status</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($penjualan_list as $key): ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $key->no_do_penjualan ?></td>
                  <td><?= $key->tanggal_penjualan ?></td>
                  <td><?= $key->tanggal_kirim ?></td>
                  <td><?= $key->pengirim ?></td>
                  <td><?= $key->nama_konfirmasi ?></td>
                  <td>
                    <a href="<?= site_url('Konfirmasi/view_konfirmasi/'.$key->id_penjualan) ?>" class="btn btn-outline-secondary btn-rounded"><span class="mdi mdi-eye"></span></a>
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