<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row d-none d-sm-flex mb-4">
          <div class="col-md-2">
            <h3 class="card-title">Users</h3>
            <p class="card-description">
              Management Users
            </p>
          </div>
          <div class="col-md-2 offset-md-8" align="center">
            <button type="button" class="btn btn-icons btn-success btn-rounded" data-toggle="modal" data-target="#tambah_users"><span class="mdi mdi-plus"></span></button>
          </div>
          <?php $list = $level_list; ?>
          <?= load_modal('home/referensi/user_management/modal/modal_tambah_users','tambah_users','Tambah Users','lg',$list) ?>
          <div class="table-responsive">
            <table class="table" id="order-listing">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1; foreach ($users_list as $user): 
                $name_modal = 'update_modal'.$no;
                $name_title = 'Update Users - '.$user->username;

                $isian = array('id_users' => $user->id_users,'username' => $user->username,
                'password' => $user->password,'full_name' => $user->full_name,'email' => $user->email,'phone_number' => $user->phone_number,'address' => $user->address,'level_id_level' => $user->level_id_level,'list_level' => $level_list);
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $user->username ?></td>
                  <td><?= $user->full_name ?></td>
                  <td><?= $user->email ?></td>
                  <td><?= $user->phone_number ?></td>
                  <td>
                    <button type="button" class="btn btn-outline-warning btn-rounded"data-toggle="modal" data-target="#<?= $name_modal ?>"><span class="mdi mdi-pencil"></span></button>
                    <a href="<?= site_url('Referensi/delete_users/'.$user->id_users) ?>" class="btn btn-outline-danger btn-rounded"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="mdi mdi-delete"></span></a>
                    <?= load_modal('home/referensi/user_management/modal/modal_update_users',$name_modal,$name_title,'lg',$isian) ?>
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