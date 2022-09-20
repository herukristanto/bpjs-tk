<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="canonical" href="<?php echo @$canonical;?>" />
  <?php error_reporting(0); if(empty(@$url_prev)):?>
  <?php else:?>
  <link rel="prev" href="<?php echo @$url_prev;?>" />
  <?php endif;?>
  <link rel="next" href="<?php echo @$url_next;?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/user/dist/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/user/dist/fontawesome/css/all.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/user/dist/swiper/css/swiper-bundle.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/user/custom/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/toastr/toastr.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/user/dist/aos/aos.css')?>">
  <link rel="icon" href="<?php echo base_url('assets/user/img/bpjsktn-logo.svg')?>" type = "image/x-icon">
  <title>BPJS Ketenagakerjaan</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-biru-theme shadow-none fixed-top">
    <div class="nav-contain container">
      <a class="navbar-brand" href="#">
        <img src="<?php echo base_url('assets/user/img/bpjsktn-logo2-putih.svg')?>" class="nav-logo-responsive" alt="">
      </a>
      <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <div class="animated-icon1"><span></span><span></span><span></span></div>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <hr class="hr-white mb-0">
        <ul class="navbar-nav ml-lg-auto p-4 p-lg-0">
        <?php if (@$is_login == true) : ?>
          <li class="nav-item <?= ($this->uri->segment(1) == 'Home' || $this->uri->segment(1) == '' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('Home')?>"><span class="d-none d-lg-inline-block "><i class="fas fa-home"></i></span> BERANDA</a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1) == 'Jobs' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('Jobs') ?>"><span class="d-none d-lg-inline-block "><i class="fas fa-search"></i></span> CARI LOWONGAN</a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(2) == 'DaftarPerusahaan' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('user/DaftarPerusahaan') ?>"><span class="d-none d-lg-inline-block "><i class="fas fa-building"></i></span> DAFTAR PERUSAHAAN</a>
          </li>
          <!-- <li class="nav-item <?= ($this->uri->segment(2) == 'JobSave' ? 'active' : '');?>">
            <a href="<?php echo base_url('jobs/JobSave') ?>" class="nav-link text-center text-lg-left pr-lg-4">
              <i class="far fa-heart"></i> Tersimpan
              <span class="badge badge-success pull-right cart-item-total"></span>
            </a>
          </li> -->
          <li class="nav-item dropdown <?= ($this->uri->segment(2) == 'Profile' || $this->uri->segment(2) == 'ProsesLamar' || $this->uri->segment(2) == 'JobSave' ? 'active' : '' );?>">
            <a class="nav-link dropdown-toggle pr-lg-0 text-uppercase" href="<?php echo base_url('user/JobHome')?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            <span class="d-none d-lg-inline-block "><i class="fas fa-user"></i></span>
            <?php if(@$is_login == true) : ?>
              <?= $login[0]->username ?>
            <?php else: ?> 
              Profile
            <?php endif; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('user/Profile')?>"><i class="fas fa-id-card"></i>  Profile</a>
              <a class="dropdown-item" href="<?php echo base_url('user/ProsesLamar') ?>"><i class="fas fa-location-arrow"></i>  Lamaran</a>
              <a class="dropdown-item" href="<?php echo base_url('jobs/JobSave') ?>"><i class="fas fa-heart"></i>  Tersimpan</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url('auth/login/logout_user')?>"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </div>
          </li>

        <?php else : ?>
          <li class="nav-item <?= ($this->uri->segment(1) == 'Home' || $this->uri->segment(1) == '' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('Home')?>"><span class="d-none d-lg-inline-block "><i class="fas fa-home"></i></span> BERANDA</a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1) == 'Jobs' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('Jobs') ?>"><span class="d-none d-lg-inline-block "><i class="fas fa-search"></i></span> CARI LOWONGAN</a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(2) == 'DaftarPerusahaan' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('user/DaftarPerusahaan') ?>"><span class="d-none d-lg-inline-block "><i class="fas fa-building"></i></span> DAFTAR PERUSAHAAN</a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(2) == 'Rekrut' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('user/Rekrut') ?>"><span class="d-none d-lg-inline-block "><i class="fas fa-hands-helping"></i></span> REKRUT PEKERJA</a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(2) == 'Login' ? 'active' : '');?>">
            <a class="nav-link pr-lg-0" href="<?php echo base_url('user/Login') ?>"><span class="d-none d-lg-inline-block "><i class="fas fa-sign-in-alt"></i></span> MASUK</a>
          </li>
        <?php endif; ?>
        </ul>
      
      </div>
    </div>
  </nav>