<div id="page-lupa-sandi">

  <section id="lupa-sandi-form" class="mt-custom">
    <div class="jumbotron jumbotron-fluid bg-transparent">
      <div class="container pt-lg-5">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-5">
            <div class="shadow rounded border p-4" data-aos="zoom-in" data-aos-duration="1500">
              <form action="<?php echo site_url('user/lupasandi/forgotPassword'); ?>" method="post">
                <div class="mb-5 text-center">
                  <img src="<?php echo base_url('assets/user/img/email-masukan.svg') ?>" class="img-fluid" width="250rem" alt="...">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Masukan Email</label>
                  <input type="email" class="form-control form-control-sm" id="email" name="email" aria-describedby="emailHelp">
                  <?php echo form_error('email'); ?>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-sm btn-biru-theme text-white">Kirim Ke Email</button>
                </div>
              </form>
              <div class="text-center mt-3">
                <a href="<?php echo base_url('user/login') ?>" class="small txt-biru-theme mb-0">Kembali ke halaman login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>