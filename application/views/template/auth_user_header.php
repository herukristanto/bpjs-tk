<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo base_url('assets/user/dist/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/user/dist/fontawesome/css/all.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/user/dist/aos/aos.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/user/custom/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/toastr/toastr.min.css')?>">
  <link rel="icon" href="<?php echo base_url('assets/user/img/bpjsktn-logo.svg')?>" type = "image/x-icon">
  <script src="https://www.google.com/recaptcha/api.js?render=6LddMYEfAAAAABJP7ldSEbLT5WdAx45OgVzC7-Bu"></script>
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
          <li class="nav-item <?= ($this->uri->segment(1) == 'Home' || $this->uri->segment(1) == '' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('Home')?>"><span class="d-none d-lg-inline-block "><i class="fas fa-home"></i></span> BERANDA</a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1) == 'Jobs' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('Jobs') ?>"><span class="d-none d-lg-inline-block "><i class="fas fa-search"></i></span> CARI LOWONGAN</a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(2) == 'DaftarPerusahaan' || $this->uri->segment(2) == '' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('user/DaftarPerusahaan') ?>"><span class="d-none d-lg-inline-block "><i class="fas fa-building"></i></span> DAFTAR PERUSAHAAN</a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(2) == 'Rekrut' || $this->uri->segment(2) == '' ? 'active' : '');?>">
            <a class="nav-link pr-lg-4" href="<?php echo base_url('user/Rekrut') ?>"><span class="d-none d-lg-inline-block "><i class="fas fa-hands-helping"></i></span> REKRUT PEKERJA</a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(2) == 'Login' || $this->uri->segment(2) == 'Register' ? 'active' : '');?>">
            <a class="nav-link pr-lg-0" href="<?php echo base_url('user/Login') ?>"><span class="d-none d-lg-inline-block "><i class="fas fa-sign-in-alt"></i></span> MASUK</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>