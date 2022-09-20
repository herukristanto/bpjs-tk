<section id="page-detail-job">

  <div id="profile-company" class="mt-custom">
    <div class="jumbotron jumbotron-fluid jumbotron-collapse bg-transparent">
      <div class="container pt-lg-1">
        <div class="company-job bg-white shadow rounded mb-5">
          <div class="company-head p-4">
            <div class="row">
              <div class="col-2">
                <div>
                <img src="<?php echo base_url('assets/user/img/rsup-img.jpg') ?>" class="img-fluid rounded img-thumbnail shadow-sm" alt="...">
                </div>
              </div>
              <div class="col-6">
                <p class="h5 font-weight-bold title-job"><?= $JobShow[0]->title ?></p>
                <p class="h5 font-weight-bold title-job"></p>
                <p class="h6 txt-biru-theme text-white company"><?= $JobShow[0]->company ?></p>
                <p class="h6 mb-3 company"><?= $JobShow[0]->provinsi ?>, Indonesia - <?= $JobShow[0]->type ?></p>
                
              </div>
              <div class="col-4">
                <div class="h-100 d-flex flex-column">
                  <div>
                    <p class="small text-muted text-lg-right mb-1">Posted Before 10 April 2020</p>
                    <p class="small text-muted text-lg-right mb-0">Kemungkinan lowongan diperpanjang</p>
                  </div>
                  <div class="mt-4 text-right">
                    <a class="btn btn-biru-theme text-white btn-sm apply-job" data-id="<?= $JobShow[0]->id ?>" href="" role="button">Lamar Sekarang</a>
                    <a class="btn btn-outline-success btn-sm" href="#" role="button"><i class="far fa-heart"></i> Simpan </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr class="m-0 p-0">
          <div class="company-body p-4">
            <div class="row">
              <div class="col-12 col-lg-8">
                <div class="job-desc mb-3">
                  <p class="h6 font-weight-bold">Job Description : </p>
                  <p class="small"><?= htmlspecialchars_decode($JobShow[0]->description) ?></p>
                </div>
                <!-- <div class="job-qualify mb-3">
                  <p class="h6 font-weight-bold">Minimum Qualification : </p>
                  <p class="small mb-1">- Struktur dan algoritma</p>
                  <p class="small mb-1">- Bahasa pemrograman</p>
                  <p class="small mb-1">- SDLC (Software Development Life Cycle)</p>
                  <p class="small mb-1">- Problem solving</p>
                  <p class="small mb-1">- Komunikasi</p>
                  <p class="small mb-1">- Teamwork</p>
                </div>
                <div class="job-benefits mb-3">
                  <p class="h6 font-weight-bold">Perk Benefits : </p>
                  <p class="small mb-1"><i class="far fa-check-circle text-success"></i> BPJS</p>
                  <p class="small mb-1"><i class="far fa-check-circle text-success"></i> Fasilitas</p>
                  <p class="small"><i class="far fa-check-circle text-success"></i> Cuti</p>
                </div>
                <div class="job-sumary mb-3">
                  <p class="h6 font-weight-bold">Job Summary : </p>
                  <div class="row">
                    <div class="col-6">
                      <div class="level mb-1">
                        <p class="small font-weight-bold mb-0">Job level</p>
                        <p class="small text-primary">Entry Level / Junior</p>
                      </div>
                      <div class="level mb-1">
                        <p class="small font-weight-bold mb-0">Job category</p>
                        <p class="small text-primary">IT / Software</p>
                      </div>
                      <div class="level mb-1">
                        <p class="small font-weight-bold mb-0">Educational Requirements</p>
                        <p class="small text-primary mb-0">Bachelors Degree</p>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="level mb-1">
                        <p class="small font-weight-bold mb-0">Vacancy</p>
                        <p class="small text-primary">1 Opening</p>
                      </div>
                      <div class="level mb-1">
                        <p class="small font-weight-bold mb-0">Website</p>
                        <a href="" class="small">www.NRI.co.id/</a>
                      </div>
                      <div class="level mb-1">
                        <p class="small font-weight-bold mb-0">Office Adress</p>
                        <p class="small text-primary mb-0">Sudirman, Jakarta</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="job-about mb-3">
                  <p class="h6 font-weight-bold">About Company : </p>
                  <p class="small mb-0">BPJS Ketenagakerjaan, sejak akhir 2019 secara resmi menggunakan nama panggilan
                    BPJAMSOSTEK, merupakan Badan Hukum Publik yang bertanggung jawab langsung kepada Presiden Republik
                    Indonesia yang memberikan perlindungan bagi tenaga kerja untuk mengatasi risiko sosial ekonomi
                    tertentu akibat hubungan kerja.</p>
                </div>
                <div class="job-activity mb-3">
                  <p class="h6 font-weight-bold">Company activity : </p>
                  <p class="small mb-0">- Peristiwa kecelakaan</p>
                  <p class="small mb-0">- Sakit</p>
                  <p class="small mb-0">- Hamil</p>
                  <p class="small mb-0">- Bersalin</p>
                  <p class="small mb-1">- Cacat</p>
                  <p class="small mb-0">Hal-hal ini mengakibatkan berkurangnya dan terputusnya penghasilan tenaga
                    kerja dan/atau membutuhkan perawatan medis.</p>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <div class="company-bottom-list">
          <p class="h5 font-weight-bold mb-3">Pekerjaan Terbaru</p>
          <div class="card-job">
            <div class="row">
            <?php for ($i=0; $i < 3 ; $i++) { ?>
              <div class="col-12 col-lg-3">
                <div class="popular-job bg-white p-3 rounded shadow mb-4">
                  <div class="row mb-2">
                    <div class="col-4">
                      <div>
                        <img class="img-fluid rounded shadow-sm border w-100" src="<?= base_url('assets/admin/img/job/' . $job->image) ?>" alt="">
                      </div>
                    </div>
                    <div class="col-8">
                      <p class="title small font-weight-bold mb-1"><?= $rekomJob[$i]->title ?></p>
                      <p class="corp small font-weight-bold txt-biru-theme mb-1"><?= $rekomJob[$i]->company ?></p>
                      <p class="location text-muted small mb-4"><?= $rekomJob[$i]->provinsi ?></p>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div>
                      <a class="btn btn-biru-theme text-white btn-sm mr-2 apply-job" href="" data-id="<?= $JobShow[0]->id ?>" role="button"><i class="far fa-eye"></i> Lamar Sekarang</a>
                    </div>
                    <div>
                      <a class="add-save btn btn-outline-success btn-sm" id="<?php echo $rekomJob[$i]->id; ?>" href="#" data-id="<?php echo $rekomJob[$i]->id; ?>" data-title="<?php echo $rekomJob[$i]->title; ?>" data-short_desc="<?php echo $rekomJob[$i]->short_desc; ?>" data-provinsi="<?php echo $rekomJob[$i]->provinsi; ?>" role="button">
                        <i class="far fa-bookmark"></i>
                        Simpan</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>