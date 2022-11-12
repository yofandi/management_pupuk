<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-pro/src/demo_1/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Oct 2018 07:03:58 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UD Dewi Sri - Managemnet Pupuk</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/iconfonts/puse-icons-feather/feather.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" /> </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper auth p-0 theme-two">
          <div class="row d-flex align-items-stretch">
            <div class="col-md-4 banner-section d-none d-md-flex align-items-stretch justify-content-center">
              <div class="slide-content bg-1"> </div>
            </div>
            <div class="col-12 col-md-8 h-100 bg-white">
              <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
              	
                <?php if ($this->session->flashdata('msg_login')): ?>
                <div class="alert alert-fill-danger" role="alert">
                  <i class="mdi mdi-alert-circle"></i><?= $this->session->flashdata('msg_login'); ?>
                </div>
                <?php endif ?>
                <form action="<?= site_url('Login/do_login') ?>" id="form_login" method="post">
                  <h3 class="mr-auto">Hello! let's get started</h3>
                  <p class="mb-5 mr-auto">UD-DEWI SRI - Management Pupuk.</p>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="mdi mdi-account-outline"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username"> </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="mdi mdi-lock-outline"></i>
                        </span>
                      </div>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password"> </div>
                  </div>
                  <div class="form-group">
                    <button type="button" onclick="cek_val()" class="btn btn-primary submit-btn">SIGN IN</button>
                  </div>
                  <div class="wrapper mt-5 text-gray">
                    <p class="footer-text">Copyright © 2018 <a href="https://www.mascitra.com/" target="_blank">MASCITRA.COM</a>. All rights reserved.</p>
                    <!-- <ul class="auth-footer text-gray">
                      <li>
                        <a href="#">Terms & Conditions</a>
                      </li>
                      <li>
                        <a href="#">Cookie Policy</a>
                      </li>
                    </ul> -->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url() ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url() ?>assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?= base_url() ?>assets/js/shared/off-canvas.js"></script>
    <script src="<?= base_url() ?>assets/js/shared/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>assets/js/shared/misc.js"></script>
    <script src="<?= base_url() ?>assets/js/shared/settings.js"></script>
    <script src="<?= base_url() ?>assets/js/shared/todolist.js"></script>
    <script>
    	function cek_val() {
    		let username = $('#username').val();
    		let password = $('#password').val();

    		if (username == '' && password == '') {
    			alert("Username dan Password kosong!!");
    		} else if (username != '' && password == '') {
    			alert("Password kosong!!");
    		} else if (username == '' && password != '') {
    			alert("Username kosong!!");
    		} else if (username != '' && password != '') {
    			$("#form_login").submit();
    		}
    	}
    </script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
  </body>

<!-- Mirrored from www.bootstrapdash.com/demo/star-admin-pro/src/demo_1/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Oct 2018 07:03:58 GMT -->
</html>