<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view($header); ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php $this->load->view($navbar); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view($sidebar); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        	<?php if ($content != ''): ?>
        	<?php $this->load->view($content,$data); ?>
        	<?php endif ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php $this->load->view($footer); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php $this->load->view($bottom); ?>
  <?php if ($script != ''): ?>
  <?php $this->load->view($script); ?>
  <?php endif ?>
</body>

</html>