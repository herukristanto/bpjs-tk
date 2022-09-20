      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; learnSoft Developer <?= date('Y') ?></span>
          </div>
        </div>
      </footer>
      </div>
      </div>

      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <script src="<?= base_url('assets/admin/'); ?>vendor/jquery/jquery.min.js"></script>
      <script src="<?= base_url('assets/admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="<?= base_url('assets/admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="<?= base_url('assets/admin/'); ?>js/sb-admin-2.min.js"></script>
      <script src="<?= base_url('assets/admin/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="<?= base_url('assets/admin/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <script src="<?= base_url('assets/admin/'); ?>js/demo/datatables.js"></script>
      <script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

      <script type="text/javascript">
        function tampilkanwaktu() {
          let waktu = new Date(),
            sh = waktu.getHours() + "",
            sm = waktu.getMinutes() + "",
            ss = waktu.getSeconds() + "";
          document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
        }

        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "3000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "slideDown",
          "hideMethod": "slideUp"
        }

        <?php if ($this->session->flashdata('msg') == 'success') : ?>
          toastr.success('Successfully');
        <?php elseif ($this->session->flashdata('msg') == 'warning') : ?>
          toastr.warning('Check your data again');
        <?php elseif ($this->session->flashdata('msg') == 'error') : ?>
          toastr.error('Failed to update');
        <?php elseif ($this->session->flashdata('file') == 'success') : ?>
          toastr.success('Successfully uploaded');
        <?php elseif ($this->session->flashdata('file') == 'error') : ?>
          toastr.error('Max file size is 1 MB');
        <?php elseif ($this->session->flashdata('change') == 'success') : ?>
          toastr.success('Successfully changed password');
        <?php elseif ($this->session->flashdata('change') == 'info') : ?>
          toastr.warning('Error-Not Match Password');
        <?php elseif ($this->session->flashdata('change') == 'warning') : ?>
          toastr.warning('Error to change password');
        <?php elseif ($this->session->flashdata('change') == 'error') : ?>
          toastr.error('Error-Not Found Password');
        <?php endif; ?>
      </script>

      <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
      </body>

      </html>