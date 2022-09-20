<div class="art">
  <footer class="info footer-bg py-4">
      <div class="container mt-5">
        <div class="info-head mb-4">
          <p class="h6 h6-responsive text-center text-white text-lg-left mt-3">Penyelenggaraan program jaminan sosial merupakan salah satu tanggung jawab dan kewajiban Negara untuk memberikan perlindungan sosial ekonomi kepada masyarakat. Sesuai dengan kondisi kemampuan keuangan Negara.</p>
        </div>
        <div class="info-body text-center text-lg-left">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-2 mb-3">
              <img src="<?php echo base_url('assets/user/img/footer-logo.png') ?>" class="img-fluid" width="150rem" alt="...">
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

<script src="<?php echo base_url('assets/user/dist/jquery/jquery-3.6.0.min.js') ?>"></script>
<script src="<?php echo base_url('assets/user/dist/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/user/dist/popper/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/user/dist/lottie/lottie-player.js') ?>"></script>
<script src="<?php echo base_url('assets/user/dist/swiper/js/swiper-bundle.min.js') ?>"></script>
<script src="<?php echo base_url('assets/user/dist/aos/aos.js') ?>"></script>
<script src="<?php echo base_url('assets/user/dist/fontawesome/js/all.min.js') ?>"></script>
<script src="<?php echo base_url('assets/user/custom/js/swiper-custom.js') ?>"></script>
<script src="<?php echo base_url('assets/user/custom/js/script.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>

<script>
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
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "slideDown",
    "hideMethod": "slideUp"
  }

  <?php if($this->session->flashdata('msg') == 'success') : ?>
    toastr.success('Successfully');
  <?php elseif($this->session->flashdata('msg') == 'warning') : ?>
    toastr.warning('Check your data again');
  <?php elseif($this->session->flashdata('msg') == 'error') : ?>
    toastr.error('Failed to update');
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

    var id = $(this).data('id');
    var title = $(this).data('title');
    var short_desc = $(this).data('short_desc');
    var provinsi = $(this).data('provinsi');
    var x = document.getElementById(id);
    console.log(x);

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
        console.log(res.total_job);
        if (res.code == 200) {
          var totalItem = res.total_job;

          //$('.cart-item-total').text(totalItem);
          toastr.info('Job telah ke simpan');


          // $("#mydiv").show();
        } else {
          toastr.error('Job sudah anda simpan woi');
        }
      }
    });
  });

  $('.remove-job').click(function(e) {
    e.preventDefault();

    var rowid = $(this).data('rowid');
    var div = $('.cart-' + rowid);

    $('.date_post', div).html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('jobs/save_job?action=remove_job'); ?>',
      data: {
        rowid: rowid
      },
      success: function(res) {
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
        if (res == 1) {
          toastr.success('Anda Berhasil Melamar');
        } else if (res == 2) {
          toastr.warning('Anda Sudah Pernah Melamar');
        } else if (res == 3) {
          toastr.error('Login Untuk Melamar');
          window.location.href = "<?= base_url('user/login') ?>";
        } else {
          toastr.error('error not fount');
        }
      }
    });
  });

  

  profile();
  function profile()
  {
    var cekCV = '<?= $UserProfile[0]->file_cv ?>';
    if (cekCV == '') {
      $('#update-cv').show();
      $('.view-cv').hide();
    } else {
      $('#update-cv').hide();
      $('.view-cv').show();
    }

    $('.view-profile').show();
    $('.insert-profile').hide();
    $('.btn-upload-avatar').hide();
  }

  $('#inputGroupFile04').on('change',function(){
      var fileName = $(this).val();
      fileName = $(this).val().replace('C:\\fakepath\\', " ");
      $(this).next('.custom-file-label').html(fileName);
  });

  $('#edit-profile').click(function(e) {
    e.preventDefault();

    $('.view-profile').hide();
    $('.insert-profile').show();
  });

  $('#edit-cv').click(function(e) {
    e.preventDefault();

    $('.view-cv').hide();
    $('#update-cv').show();
  });

  var loadFile = function (event) {
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);

    var avatar = $('#upload-avatar').val();

    $('.btn-upload-avatar').show();
  };

  $('.btn-upload-avatar').click(function(e) {
    e.preventDefault();

    var file_data = $('#upload-avatar').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);

    $.ajax({
        url:'<?= base_url('user/Profile/avatar_upload')?>',
        type:"post", 
        data: form_data,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(res) {
          if (res.status == true) {
            toastr.success('Success uploaded!');
            $('.btn-upload-avatar').hide();
          } else {
            toastr.error(res.massage);
            $('.btn-upload-avatar').hide();
          }
        }
    }); 
  });

    


</script>
</body>

</html>