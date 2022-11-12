      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="user-wrapper">
                  <div class="profile-image">
                    <img src=" <?= base_url() ?>assets/images/faces/face8.jpg" alt="profile image"> </div>
                  <div class="text-wrapper">
                    <p class="profile-name" id="fullname_sidebar"></p>
                    <div>
                      <small class="designation text-muted" id="name_level"></small>
                      <span class="status-indicator online"></span>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('Referensi/index') ?>">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('Gudang/gudang') ?>">
                <i class="menu-icon mdi mdi-cube-outline"></i>
                <span class="menu-title">Gudang</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('Gudang/tagihan') ?>">
                <i class="menu-icon mdi mdi-deskphone"></i>
                <span class="menu-title">Tagihan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('Penjualan/penjualaan') ?>">
                <i class="menu-icon mdi mdi-clipboard-text"></i>
                <span class="menu-title">Penjualan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('Konfirmasi/konfirmasi') ?>">
                <i class="menu-icon mdi mdi-clipboard-check"></i>
                <span class="menu-title">Konfirmasi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('Pembayaran/pembayaran') ?>">
                <i class="menu-icon mdi mdi-wallet-membership"></i>
                <span class="menu-title">Pembayaran</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('Pembayaran/penerimaan') ?>">
                <i class="menu-icon mdi mdi-book-variant"></i>
                <span class="menu-title">Penerimaan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#referensi" aria-expanded="false" aria-controls="referensi">
                <i class="menu-icon mdi mdi-dialpad"></i>
                <span class="menu-title">Referensi</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="referensi">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Referensi/user_management') ?>">User Management</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Referensi/supplier_management') ?>"> Supplier </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Referensi/stok_pupuk') ?>"> Stok Pupuk </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Referensi/sales_management') ?>">Sales</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Referensi/supir') ?>">Supir</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Referensi/kebun') ?>">Kebun</a>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Referensi/perkiraan') ?>"> Perkiraan </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Referensi/pekerjaan') ?>"> Pekerjaan </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Referensi/pemohon') ?>"> Pemohon </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Referensi/setting') ?>"> Setting </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#account" aria-expanded="false" aria-controls="account">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Account</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="account">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Manage Accounts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Change Password</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Check Inbox</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Login/logout') ?>">Log Out</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>