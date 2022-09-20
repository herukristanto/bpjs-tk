<div id="page-job-board">
  <section id="main" class="mt-custom">
  <div class="container pt-lg-3">
      <div class="head-search mt-lg-5">
        <form action="" method="">
          <div class="search shadow-sm rounded">
            <i class="fa fa-search"></i> <input type="text" class="form-control" name="first_search" placeholder="Temukan Pekerjaan..."> <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
      <div class="list-job mt-lg-5">
      <p class="h5 font-weight-bold mb-3">JOB MATCHES</p>
        <div class="row">
        <?php foreach ($list_job_board as $value) { ?>
          <div class="col-lg-6">
            <div class="card-job bg-white rounded shadow-sm p-4 mb-4">
              <div class="row mb-3 mb-lg-0">
                <div class="col-12 col-md-8 mb-3 mb-lg-0">
                  <p class="h5 text-primary font-weight-bold title-job"><?= $value->title ?></p>
                  <p class="h6 mb-3 text-muted company">PT. Maju mundur sejahtera</p>
                  <p class="small desc mb-0" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">Performance optimization and problem diagnosis Kualifikasi Minimum Minimum 2 years experience in a Backend Development Strong experience with RESTful API’s and Microservices development Skilled in frameworks such as Laravel, Codeigniter, NodeJs, ExpressJS Skilled in database such as MySQL, MongoDB, Elastic Knowledge in developing software using agile methodologies</p>
                </div>
                <div class="col-12 col-md-4">
                  <div>
                    <p class="small text-muted text-lg-right mb-1">Posted Before 10 April 2020</p>
                    <p class="small text-muted text-lg-right mb-0">DKI Jakarta</p>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12">
                  <div class="d-flex justify-content-start justify-content-md-end">
                    <div>
                      <a class="btn btn-primary btn-sm mr-2" href="#" role="button"><i class="fas fa-location-arrow"></i> Lamar Sekarang</a>
                    </div>
                    <div>
                      <a id="simpan" class="btn btn-outline-primary btn-sm" href="#" role="button"><i class="far fa-heart"></i> Simpan</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
</div>