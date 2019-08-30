  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Core plugin JavaScript-->
  
  <script src="<?php echo site_url('public/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<?php if($this->session->userdata('user')){ ?>
  <!-- Page level plugin JavaScript-->
  <script src="<?php echo site_url('public/vendor/chart.js/Chart.min.js') ?>"></script>
  <script src="<?php echo site_url('public/vendor/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?php echo site_url('public/vendor/datatables/dataTables.bootstrap4.js') ?>"></script>
  
  <!-- Custom scripts for all pages-->
  <script src="<?php echo site_url('/public/js/sb-admin.js') ?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo site_url('public/js/demo/datatables-demo.js') ?>"></script>
  <script src="<?php echo site_url('public/js/demo/chart-area-demo.js') ?>"></script>
<?php } ?>
  <?php foreach($scripts as $script){ ?>
    <script src="<?php echo site_url('public/js/'.$script) ?>"></script>
  <?php } ?>
<?php include APPPATH.'/views/layouts/admin/forms.php' ?>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>

</html>