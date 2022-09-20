<div id="pageregister">

  <section id="register-form" class="mt-custom">
    <div class="jumbotron jumbotron-fluid bg-transparent">
      <div class="container pt-lg-5">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-4">
            <div class="bg-custom-regis shadow rounded" data-aos="zoom-in" data-aos-duration="1500">
              <div class="title-form bg-biru-theme text-white py-3 mb-4 rounded-top">
                <p class="h5 font-weight-bold text-center mb-0">Form Register User</p>
              </div>
              <div class="px-4 pb-4">
                <form action="<?php echo site_url('user/register/verify'); ?>" method="post">
                  <div class="form-group">
                    <div class="d-block d-lg-none">
                      <div>
                        <img src="<?php echo base_url('assets/user/custom/img/user-img-login-2.svg') ?>" class="img-fluid" alt="...">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama">Username</label>
                    <input type="text" name="username" class="form-control" id="username" autocomplete="off">
                    <?php echo form_error('username'); ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" minlength="10" name="email" class="form-control" id="email" autocomplete="off">
                    <?php echo form_error('email'); ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    <?php echo form_error('password'); ?>
                  </div>
                  <div class="form-group form-check text-center text-lg-left">
                    <input type="checkbox" class="form-check-input chk-activation-regis" id="chk-activation-regis" name="chk-activation-regis" value="<?= CAPTCHA_SECRET_KEY ?>">
                    <label class="form-check-label" for="chk-activation-regis">I am not robot</label>
										<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                  </div>
                  <div class="text-center text-lg-right">
                    <button type="submit" class="btn bg-biru-theme text-white">Daftar Sekarang</button>
                  </div>
                </form>
              </div>
            </div>
            <p class="h6 text-center mt-4">Sudah Punya Akun ? <span><a class="txt-biru-theme" href="<?php echo base_url('user/Login') ?>">Kembali Login</a></span></p>
          </div>
          <div class="col-lg-6">
            <div class="d-none d-lg-block">
              <div data-aos="zoom-in" data-aos-duration="1500">
                <img src="<?php echo base_url('assets/user/custom/img/user-img-login-2.svg') ?>" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>