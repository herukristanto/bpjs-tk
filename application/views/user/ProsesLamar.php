<div id="main" class="mt-custom">
  <div class="jumbotron jumbotron-fluid jumbotron-collapse bg-transparent mb-0">
    <div class="container pt-lg-5">
      <p class="h1 font-weight-bold text-center mb-5">Proses Lamaran Anda</p>
      <!-- <?php print_r($ProsesJob[0]->status)?> -->
      <?php foreach ($ProsesJob as $val) : ?>
        <div class="row bg-white shadow border rounded p-4 mb-5">
          <div class="col-12">
            <div>
              <p class="h5 font-weight-bold mt-2"><?= $val->title ?></p>
              <p class="h6 "><?= $val->company ?></p>
            </div>
            <div>
              <?php if($val->status == 1) : ?>
                <div>
                  <img src="<?php echo base_url('assets/user/img/terkirim.svg') ?>" class="img-fluid" alt="...">
                </div>
                <div>
                  <p class="h6 font-weight-bold text-center mt-5">Lamaran Anda Sudah Terkirim, lamaran Anda Akan Ditinjau Terlebih Dahulu Oleh Perusahaan</p>
                </div>
              <?php elseif($val->status == 2) : ?>
                <div>
                  <img src="<?php echo base_url('assets/user/img/dilihat.svg') ?>" class="img-fluid" alt="...">
                </div>
                <div>
                  <p class="h6 font-weight-bold text-center mt-5">Lamaran Sedang Ditinjau Oleh Perusahaan</p>
                </div>
              <?php elseif($val->status == 3) : ?>
                <div>
                  <img src="<?php echo base_url('assets/user/img/diterima.svg') ?>" class="img-fluid" alt="...">
                </div>
                <div>
                  <p class="h6 font-weight-bold text-center mt-5">Selamat <?= $val->username ?>, Lamaran Anda Diterima, Beberapa Waktu Kedepan Perusahaan Akan Menghubungi Anda</p>
                </div>
                <?php elseif($val->status == 4) : ?>
                <div>
                  <img src="<?php echo base_url('assets/user/img/ditolak.svg') ?>" class="img-fluid" alt="...">
                </div>
                <div>
                  <p class="h6 font-weight-bold text-center mt-5">Lamaran Anda Belum Diterima Perusahaan</p>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>