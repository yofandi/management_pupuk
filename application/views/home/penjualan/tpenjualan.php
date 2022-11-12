<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="row card-body">
        <div class="col-md-12">
          <h3 class="card-title">Tambah Penjualan</h3>
          <div class="d-none d-sm-flex mb-4">
            <div class="table-responsive">
              <table class="table" id="example">
                <thead>
                  <tr align="center">
                    <th>Merk</th>
                    <th>Pupuk</th>
                    <th>QTY</th>
                    <th>Diskon</th>
                    <th>Price</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($list_pupuk as $key): ?>
                  <tr>
                    <td><input type="hidden" id="id<?= $key->id_stock ?>" value="<?= $key->id_stock ?>"><?= $key->nama_merk ?></td>
                    <td><input type="hidden" id="nama<?= $key->id_stock ?>" value="<?= $key->nama_pupuk ?>"><?= $key->nama_pupuk ?></td>
                    <td>
                      <div class="form-group">
                        <input type="number" class="form-control" id="qty<?= $key->id_stock ?>" value="1">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input type="number" class="form-control" id="dis<?= $key->id_stock ?>" value="0">
                      </div>
                    </td>
                    <td><input type="hidden" id="harga<?= $key->id_stock ?>" value="<?= $key->harga_pupuk ?>"><?= $key->harga_pupuk ?></td>
                    <td>
                      <button type="button" onclick="coba<?= $key->id_stock ?>()" class="btn btn-rounded btn-danger"><span class="mdi mdi-plus"></span></button>
                      <script type="text/javascript">
                        function coba<?= $key->id_stock  ?>(argument) {
                          let id = $('#id<?= $key->id_stock ?>').val();
                          let nama = $('#nama<?= $key->id_stock ?>').val();
                          let qty = parseInt($('#qty<?= $key->id_stock ?>').val());
                          let dis = parseInt($('#dis<?= $key->id_stock ?>').val());
                          let harga = parseInt($('#harga<?= $key->id_stock ?>').val());

                          let harga_set = harga * qty;
                          let diskon_va = (harga_set * dis) / 100;
                          let total = harga_set - diskon_va;
                          $.ajax({
                            url: '<?= site_url('Penjualan/keranjang_penjualan') ?>',
                            type: 'POST',
                            dataType: 'json',
                            data: {id:id,nama:nama,qty:qty,dis:dis,harga:harga,total:total},
                          })
                          .done(function(data) {
                            alert(data);
                            tampil();
                          });
                          
                        }
                      </script>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr align="center">
                    <th>Merk</th>
                    <th>Pupuk</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <h3 class="card-title">Keranjang</h3>
            </div>
            <div class="col-md-6" align="right">
              <button type="button" onclick="destroy()" class="btn btn-secondary"><span></span>Hapus Keranjang</button>
            </div>
          </div>
          <div class="d-none d-sm-flex mb-4">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr align="center">
                    <th>Pupuk</th>
                    <th>QTY</th>
                    <th>Diskon(%)</th>
                    <th>Total(Rp.)</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody id="ppp">
                 
                </tbody>
                <tfoot>
                  <tr align="right">
                    <th colspan="3">Jumlah :<input type="hidden" id="total_pupuk"></th>
                    <th id="total"></th>
                  </tr>
                  <tr align="right">
                    <th colspan="3">Diskon :</th>
                    <th>
                      <div class="form-group">
                        <input class="form-control" type="text" id="diskon_univ" name="diskon" value="0" style="text-align:right;border: none;border-color: transparent;">
                      </div>
                    </th>
                    <th><button type="button" onclick="counting()" class="btn btn-success btn-md">Hitung</button></th>
                  </tr>
                  <tr align="right">
                    <th colspan="3">Total Semua :</th>
                    <th>
                      <div class="form-group">
                        <input type="hidden" id="total_semua_sblm">
                        <input class="form-control" type="text" id="total_semua" name="total_semua" value="0" style="text-align:right;border: none;border-color: transparent;">
                      </div>
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Form - Input</h3>
        <?php date_default_timezone_set('Asia/Jakarta'); ?>
        <form class="row forms-sample">
          <div class="form-group col-md-6">
            <label for="">Tanggal Penjualan</label>
            <input type="datetime" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" value="<?= date('Y-m-d H:i A') ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="">Tanggal Kirim</label>
            <input type="datetime" class="form-control" id="tanggal_kirim" name="tanggal_kirim" value="<?= date('Y-m-d H:i A') ?>">
          </div>
          <div class="form-group col-md-6">
            <label>No Do</label>
            <input type="text" class="form-control" id="no_do" name="no_do" placeholder="No Do">
          </div>
          <div class="form-group col-md-6">
            <label for="">Sales</label>
            <select name="sales" id="sales" class="form-control selectpicker"  data-live-search="true">
              <option value="">-- Pilih Sales --</option>
              <?php foreach ($sales_list as $sales): ?>
              <option value="<?= $sales->id_sales ?>"><?= $sales->nama_sales ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="">Kebun</label>
            <select name="kebun" id="kebun" class="form-control">
              <option value="">--- Pilih Kebun ---</option>
              <?php foreach ($kebun_list as $kebun): ?>
              <option value="<?= $kebun->id_kebun ?>"><?= $kebun->nama_kebun ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="">Blok</label>
            <select name="blok" id="blok" class="form-control">
              <option value="">--- Pilih Blok ---</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="">Pekerjaan</label>
            <select name="pekerjaan" id="pekerjaan" class="form-control">
              <option value="">--- Pilih Pekerjaan ---</option>
              <?php foreach ($pekerjaan_list as $pekerjaan): ?>
              <option value="<?= $pekerjaan->id_pekerjaan ?>"><?= $pekerjaan->nama_pekerjaan ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label for="">Supir</label>
            <select name="supir" id="supir" class="form-control selectpicker"  data-live-search="true">
              <option value="">--- Pilih Supir ---</option>
              <?php foreach ($supir_list as $supir): ?>
              <option value="<?= $supir->id_supir ?>"><?= $supir->nama_supir ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="">Pemohon</label>
            <select name="pemohon" id="pemohon" class="form-control selectpicker" data-live-search="true">
              <option value="">--- Pilih Pemohon ---</option>
              <?php foreach ($pemohon_list as $pemohon): ?>
              <option value="<?= $pemohon->id_pemohon ?>"><?= $pemohon->nama_pemohon ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="">Perkiraan</label>
            <select name="perkiraan" id="perkiraan" class="form-control">
              <option value="">--- Pilih Perkiraan ---</option>
              <?php foreach ($perkiraan_list as $perkiraan): ?>
              <option value="<?= $perkiraan->id_perkiraan ?>"><?= $perkiraan->no_perkiraan.' - '.$perkiraan->nama_perkiraan ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label for="">Pengirim</label>
            <input type="text" id="pengirim" class="form-control" name="pengirim" placeholder="Pengirim">
          </div>
        </form>
        <div class="row">
          <div class="col-md-12">
            <button type="button" onclick="send_to_penjualan()" class="btn btn-primary btn-rounded">Save</button>
            <a href="<?= site_url('Penjualan/penjualaan') ?>" class="btn btn-secondary btn-rounded">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>