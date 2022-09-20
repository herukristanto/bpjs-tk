<div class="art">
  <footer class="info footer-bg py-4">
    <div class="container">
      <div class="info-head mb-4">
        <p class="h6 h6-responsive text-center text-white text-lg-left mt-3">Penyelenggaraan program jaminan sosial merupakan salah satu tanggung jawab dan kewajiban Negara untuk memberikan perlindungan sosial ekonomi kepada masyarakat. Sesuai dengan kondisi kemampuan keuangan Negara.</p>
      </div>
      <div class="info-body text-center text-lg-left">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-2 mb-3">
            <img src="<?php echo base_url('assets/user/img/footer-logo.png') ?>" class="img-fluid" alt="...">
          </div>
          <div class="col-12 col-md-6 col-lg-2 mb-3">
            <p class="h6 h6-responsive font-weight-bold text-warning">Aplikasi</p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">SiDewas</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">EPS</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Perisai</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">e-Procurement</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Mitra Pusat Layanan</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Kecelakaan Kerja</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">WBS</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Karir</a>
            </p>
          </div>
          <div class="col-12 col-md-6 col-lg-2 mb-3">
            <p class="h6 h6-responsive font-weight-bold text-warning">Manfaat Tambahan</p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Rusunawa</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Perumahan Pekerja</a>
            </p>
          </div>
          <div class="col-12 col-md-6 col-lg-2 mb-3">
            <p class="h6 h6-responsive font-weight-bold text-warning">Promosi & Pers</p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Promosi</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Siaran Pers</a>
            </p>
          </div>
          <div class="col-12 col-md-6 col-lg-2 mb-3">
            <p class="h6 h6-responsive font-weight-bold text-warning">Lainnya</p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Struktur Organisasi</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Formulir</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">F.A.Q</a>
            </p>
            <p class="small mb-2">
              <a href="" class="text-decoration-none text-white">Lelang</a>
            </p>
          </div>
          <div class="col-12 col-md-6 col-lg-2 mb-3">
            <p class="h6 h6-responsive font-weight-bold text-warning">Newsletter</p>
            <form>
              <div class="form-group">
                <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email Here">
              </div>
              <button type="submit" class="btn btn-block btn-sm btn-success">SUBSCRIBE NOW</button>
            </form>
          </div>
        </div>
      </div>
      <p class="small text-white">Copyright © 2021 BPJS Ketenagakerjaan. All Rights Reserved</p>
    </div>
  </footer>
</div>

<script src="<?php echo base_url('assets/user/dist/jquery/jquery-3.6.0.min.js')?>"></script>
<script src="<?php echo base_url('assets/user/dist/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/user/dist/popper/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/user/dist/lottie/lottie-player.js')?>"></script>
<script src="<?php echo base_url('assets/user/dist/aos/aos.js') ?>"></script>
<script src="<?php echo base_url('assets/user/dist/fontawesome/js/all.min.js')?>"></script>
<script src="<?php echo base_url('assets/user/custom/js/script.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js')?>"></script>

<script>
  grecaptcha.ready(function() {
		grecaptcha.execute('<?= CAPTCHA_KEY ?>', {action: 'submit'}).then(
			function(token) {
				let response = document.getElementById('g-recaptcha-response');
				response.value = token;
        console.log(token);
		});
	});

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

  <?php if($this->session->flashdata('msg') == 'info') : ?>
    toastr.info('Username Failed');
  <?php elseif($this->session->flashdata('msg') == 'warning') : ?>
    toastr.warning('Password Failed');
  <?php elseif($this->session->flashdata('msg') == 'danger') : ?>
    toastr.error('Captcha Verification Failed');
  <?php elseif($this->session->flashdata('msg') == 'success') : ?>
    toastr.success('Successfully Registered <br> Please Activated Your Account');
  <?php elseif($this->session->flashdata('verif') == 'email') : ?>
    toastr.error('Email does not match');
  <?php elseif($this->session->flashdata('verif') == 'token') : ?>
    toastr.error('Invalid token');
  <?php elseif($this->session->flashdata('verif') == 'timeout') : ?>
    toastr.error('Verification time out');
  <?php elseif($this->session->flashdata('send') == 'mail') : ?>
    toastr.error('Email not sent');
  <?php elseif($this->session->flashdata('verif') == 'please') : ?>
    toastr.info('Verification Email Sent');
  <?php elseif($this->session->flashdata('verif') == 'success') : ?>
    toastr.success('Successfully verified <br> Please Login');
  <?php elseif($this->session->flashdata('forgot') == 'danger') : ?>
    toastr.error('Email is not registered or activated');
  <?php elseif($this->session->flashdata('forgot') == 'success') : ?>
    toastr.success('Please check your email to reset your password');
  <?php elseif($this->session->flashdata('reset') == 'danger') : ?>
    toastr.error('Resert password failed! Failed email or token');
  <?php elseif($this->session->flashdata('reset') == 'success') : ?>
    toastr.success('Password has been changed! Please Login');
  <?php elseif($this->session->flashdata('msg') == 'company') : ?>
    toastr.info('Only for company login');
  <?php elseif($this->session->flashdata('msg') == 'user') : ?>
    toastr.info('Only to login prospective workers');
  <?php endif;?>

  $.ajax({
    method: 'GET',
    url: '<?php echo site_url('jobs/save_job?action=cart_info'); ?>',
    success: function(res) {
      var data = res.data;

      var total_item = data.total_item;
      $('.cart-item-total').text(total_item);
    }
  });

  $('.add-save').click(function(e) {
    e.preventDefault();

    let id = $(this).data('id'),
        title = $(this).data('title'),
        short_desc = $(this).data('short_desc'),
        provinsi = $(this).data('provinsi'),
        x = document.getElementById(id);

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('jobs/save_job?action=add_item'); ?>',
      data: {
        id: id,
        title: title,
        short_desc: short_desc,
        provinsi: provinsi
      },
      success: function(res) {
        if (res.code == 200) {
          let totalItem = res.total_job;

          toastr.info('Job telah ke simpan');
          
        } else {
          toastr.error('Job sudah anda simpan woi');
        }
      }
    });
  });
    
  $('.remove-job').click(function(e) {
    e.preventDefault();

    let rowid = $(this).data('rowid'),
        div = $('.cart-'+ rowid);

    $('.date_post', div).html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('jobs/save_job?action=remove_job'); ?>',
      data: { rowid: rowid },
      success: function (res) {
        if (res.code == 204) {
          div.addClass('alert alert-danger');
          setTimeout(function(e) {
            div.hide('fade');

          }, 2000);
        }
      }
    })
  });

  $('.apply-job').click(function(e) {
    e.preventDefault();

    let id = $(this).data('id');
    
    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('jobs/apply'); ?>',
      data: {
        id: id,
      },
      success: function(res) {
        //console.log(res);
        if (res == "2") {
          toastr.success('Anda Sudah Pernah Melamar');
        }
        // if (res == "0") {
        //   toastr.success('Anda Berhasil Melamar');
        // } elseif (res == '1') {
        //   console.log('Anda Sudah Pernah Melamar');
        //   toastr.warning('Anda Sudah Pernah Melamar');
        // } elseif (res == "2") {
        //   console.log('Login Untuk Melamar');
        //   toastr.error('Login Untuk Melamar');
        // } else {
        //   toastr.error('error not fount');
        // }
      }
    });
  });

</script>
</body>

</html>