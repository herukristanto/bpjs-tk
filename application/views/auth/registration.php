<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/css/can-utility-auth.css">

<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom-dark">
      <li class="breadcrumb-item"><a href="<?= base_url('admin/bpjstk/dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Company registration</li>
    </ol>
  </nav>
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block">
            <img src="<?php echo base_url('assets/user/img/bpjsktn-logo.svg') ?>" class="img-fluid" alt="...">
            <div>
              <div id="message">
                <p class="font-weight-bold mb-1"> Password harus terdiri dari: </p>
                <p id="letter" class="invalid mb-0 small"> Huruf <b> kecil </b> </p>
                <p id="capital" class="invalid mb-0 small"> Huruf <b> kapital (huruf besar) </b> </p>
                <p id="number" class="invalid mb-0 small"> <b>Angka</b> </p>
                <p id="length" class="invalid mb-0 small"> Minimal <b> 8 karakter </b> </p>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account Company!</h1>
              </div>
              <form class="user" action="<?php echo site_url('auth/registration/verify'); ?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                  <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                  <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Harus berisi setidaknya satu angka dan satu huruf besar dan kecil, dan setidaknya 8 karakter atau lebih" placeholder="password">
                  <?php echo form_error('password'); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url(); ?>assets/plugins/js/can-utility-auth.js"></script>