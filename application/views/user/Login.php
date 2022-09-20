<div id="page-login">

  <section id="login-form" class="mt-custom">
    <div class="jumbotron jumbotron-fluid bg-transparent">
      <div class="container pt-lg-5">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-4">
            <div class="bg-custom-regis shadow rounded" data-aos="zoom-in" data-aos-duration="1500">
              <div class="title-form bg-biru-theme text-white py-3 mb-4 rounded-top">
                <p class="h5 font-weight-bold text-center mb-0">Form Login User</p>
              </div>
              <div class="px-4 pb-4">
                <form action="<?php echo site_url('auth/login/auth_user');?>" method="post">
                  <div class="form-group">
                    <div class="d-block d-lg-none">
                      <div>
                        <img src="<?php echo base_url('assets/user/custom/img/user-img-login.svg') ?>" class="img-fluid" alt="...">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" autocomplete="off">
                    <input type="hidden" name="token" class="form-control" id="token" value="<?= TOKEN_USER ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <input type="hidden" class="form-control" id="log_user" name="log_user" value="1">
                  </div>
                  <div class="form-group form-check text-center text-lg-left">
                    <input type="checkbox" class="form-check-input chk-activation" id="chk-activation" name="chk-activation" value="<?= CAPTCHA_SECRET_KEY ?>">
                    <label class="form-check-label" for="chk-activation">I am not robot</label>
                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                  </div>
                  <div class="text-center text-lg-right">
                    <button type="submit" class="btn btn-biru-theme text-white">Masuk Sekarang</button>
                    <p class="mb-0 mt-3">
                      <a href="<?php echo base_url('user/LupaSandi') ?>" class="small txt-biru-theme mb-0">Lupa Kata Sandi ?</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <p class="h6 text-center mt-4">Belum Punya Akun ? <span><a class="txt-biru-theme" href="<?php echo base_url('user/Register') ?>">Daftar Sekarang</a></span></p>
          </div>
          <div class="col-lg-6">
            <div class="d-none d-lg-block">
              <div data-aos="zoom-in" data-aos-duration="1500">
                <img src="<?php echo base_url('assets/user/custom/img/user-img-login.svg') ?>" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>