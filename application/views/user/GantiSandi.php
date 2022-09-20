<div id="page-ganti-sandi">

  <section id="ganti-sandi" class="mt-custom">
    <div class="jumbotron jumbotron-fluid bg-transparent">
      <div class="container pt-lg-5">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-5">
            <div class="bg-custom-regis shadow rounded">
              <div class="title-form bg-primary text-white py-3 mb-4 rounded-top">
                <p class="h5 font-weight-bold text-center mb-1">Ganti Kata Sandi Anda Untuk</p>
                <h5 class="font-weight text-center"> <?= $this->session->userdata('reset_email'); ?> </h5>
              </div>
              <div class="px-4 pb-4">
                <form action="<?php echo site_url('user/lupasandi/changePassword'); ?>" method="post">
                <div class="form-group">
                    <label for="password">Kata Sandi Baru</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?php echo form_error('password1'); ?>
                  </div>
                  <div class="form-group">
                    <label for="password2">Masukkan Kata Sandi Kembali</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    <?php echo form_error('password2'); ?>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input chk-activation" id="chk-activation" name="chk-activation" value="<?= CAPTCHA_SECRET_KEY ?>">
                    <label class="form-check-label" for="chk-activation">I am not robot</label>
                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">Ganti Kata Sandi</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>