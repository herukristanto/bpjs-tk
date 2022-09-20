<section id="page-job-user" class="mb-5">

  <div id="main" class="mt-custom">
    <div class="jumbotron jumbotron-fluid jumbotron-collapse bg-transparent mb-0 pt-0">
      <div class="container pt-lg-5">
        <div class="row">
          <div class="col-12 d-flex align-items-center mb-5 mb-lg-0">
            <div class="text-center text-lg-left bg w-100">
              <?php if (@$is_login == false) : ?>
                <div class="row">
                  <div class="col-12 col-lg-7 d-flex align-items-center">
                    <div>
                      <p class="lead text-success font-weight-bold lead-responsive mb-0">Halo, Selamat Datang</p>
                      <h1 class="display-4 display-4-responsive font-weight-bold">Pencari kerja</h1>
                      <p class="h6 line-height-custom font-weight-light text-muted">Pekerjaan untuk Penyandang Disabilitas. Tempat untuk cari lowongan sesuai dengan keunikanmu. Temukan karir yang sesuai dengan minat dan keunikanmu di sini! Tidak seperti mencari lowongan di portal pencarian kerja lainnya, Kerjabilitas memastikan kamu mendapatkan pengalaman menyenangkan dalam mencari peluang kerja yang akan merubah hidupmu.</p>
                    </div>
                  </div>
                  <div class="col-12 col-lg-5">
                    <div>
                      <img src="<?php echo base_url('assets/user/img/cari-lowongan-img.svg') ?>" class="img-fluid d-block ml-auto" width="300rem" alt="...">
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <div class="mt-lg-5">
                <form action="<?= base_url('Jobs') ?>" method="post">
                  <div class="search border rounded shadow-sm">
                    <i class="fa fa-search"></i> <input type="text" name="first_search" class="form-control" placeholder="Temukan Pekerjaan..."> <button class="btn btn-primary" type="submit">Cari</button>
                  </div>
                  <div class="search-qulifiy mt-2">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1" class="txt-biru-theme">Pilih Lokasi</label>
                          <select class="form-control" name="location" id="exampleFormControlSelect1">
                            <option value="" disabled selected>Semua Lokasi</option>
                            <option value="31">DKI Jakarta</option>
                            <option value="32">Jawa Barat</option>
                            <option value="36">Banten</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1" class="txt-biru-theme">Pilih Kategori</label>
                          <!-- <?php var_dump($JobCategory[0]->name) ?> -->
                          <select class="form-control" name="categori" id="exampleFormControlSelect1">
                            <option value="" disabled selected>Semua Kategori</option>
                            <?php foreach ($JobCategory as $value) { ?>
                              <option value="<?= $value->id ?>"><?= $value->name ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-2">
    <div class="job-list-login">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-9">
            <p class="h5 font-weight-bold mb-3">Match 1 - 10</p>
            <?php foreach ($jobs->result() as $job) : ?>
              <div class="test bg-white shadow rounded pb-4 mb-4">
                <div>
                  <img class="img-fluid rounded w-100" src="<?php echo base_url('assets/user/img/silute-company.svg') ?>" alt="">
                </div>
                <div class="px-4 mt-n-custom">
                  <img class="img-fluid rounded shadow" width="150rem" src="<?= base_url('assets/admin/img/job/' . $job->image) ?>" alt="">
                </div>
                <div class="row mt-4 px-4">
                  <div class="col-12 col-lg-8">
                    <p class="h6 font-weight-bold mb-1"><?= $job->title ?></p>
                    <p class="h6 font-weight-bold txt-biru-theme mb-4"><?= $job->company ?></p>
                    <p class="h6 mb-1">Deskripsi Pekerjaan :</p>
                    <p class="h6 text-muted"><?= htmlspecialchars_decode($job->short_desc) ?></p>
                  </div>
                  <div class="col-12 col-lg-4">
                    <p class="h6 mb-1 text-lg-right"><?= $job->provinsi ?></p>
                    <p class="h6 mb-0 text-lg-right">Posted <?= $job->date_in ?></p>
                  </div>
                </div>
                <div class="d-flex mt-2 px-4">
                  <div>
                    <a class="btn btn-biru-theme text-white btn-sm mr-2" href="<?= base_url('Jobs/View/' . $job->slug); ?>" role="button"><i class="far fa-eye"></i> Lihat Pekerjaan</a>
                  </div>
                  <div>
                    <a class="add-save btn btn-outline-success btn-sm" href="#" id="<?php echo $job->id; ?>" data-id="<?php echo $job->id; ?>" data-title="<?php echo $job->title; ?>" data-short_desc="<?php echo $job->short_desc; ?>" data-provinsi="<?php echo $job->provinsi; ?>" role="button">
                      <i class="far fa-bookmark"></i>
                      Simpan</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
          <div class="col-12 col-lg-3">
            <div class="rekomen-pekerjaan mb-5">
              <p class="h5 font-weight-bold mb-3">Pekerjaan Terbaru</p>
              <?php foreach ($rekomJob as $rekomJob) : ?>
                <div class="popular-job bg-white p-3 rounded shadow border mb-4">
                  <div class="row mb-2">
                    <div class="col-4">
                      <div>
                        <img class="img-fluid rounded shadow-sm border w-100" src="<?= base_url('assets/admin/img/job/' . $job->image) ?>" alt="">
                      </div>
                    </div>
                    <div class="col-8">
                      <p class="title small font-weight-bold mb-1"><?= $rekomJob->title ?></p>
                      <p class="corp small font-weight-bold txt-biru-theme mb-1"><?= $rekomJob->company ?></p>
                      <p class="location text-muted small mb-4"><?= $rekomJob->provinsi ?></p>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div>
                      <a class="btn btn-biru-theme text-white btn-sm mr-2" href="<?= base_url('Jobs/View/' . $rekomJob->id); ?>" role="button"><i class="far fa-eye"></i> Lihat Pekerjaan</a>
                    </div>
                    <div>
                      <a class="add-save btn btn-outline-success btn-sm" id="<?php echo $rekomJob->id; ?>" href="#" data-id="<?php echo $rekomJob->id; ?>" data-title="<?php echo $rekomJob->title; ?>" data-short_desc="<?php echo $rekomJob->short_desc; ?>" data-provinsi="<?php echo $rekomJob->provinsi; ?>" role="button">
                        <i class="far fa-bookmark"></i>
                        Simpan</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <?php echo $page; ?>
        <!-- <div class="pagination-page">
          <nav aria-label="...">
          
            <ul class="pagination">
              <li class="page-item disabled">
                <a class="page-link">Previous</a>
              </li>
              <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
            
          </nav>
        </div> -->
      </div>
    </div>
  </div>

</section>