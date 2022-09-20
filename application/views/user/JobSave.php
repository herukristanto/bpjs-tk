<section id="page-job-user" class="mb-5">

<div id="main" class="mt-custom">
  <div class="jumbotron jumbotron-fluid jumbotron-collapse bg-transparent mb-0">
    <div class="container pt-lg-5">
      <div class="row">
        <div class="col-12 d-flex align-items-center mb-5 mb-lg-0">
          <div class="text-center text-lg-left w-100">
            <h1 class="display-4 display-4-responsive font-weight-bold">Pekerjaan Tersimpan</h1>
            <p class="lead text-muted lead-responsive">Simpan lebih banyak pekerjaan</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mt-0">
  <div class="job-list-login">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-9">
          <p class="h5 font-weight-bold mb-3">Pekerjaan Yang Anda Simpan</p>
          <?php if ( count($save) > 0) : ?>
          <?php foreach ($save as $res) : ?>
          <div class="card-job bg-white rounded shadow border p-4 mb-4 cart-<?php echo $res['rowid']; ?>">
            <div class="row mb-3 mb-lg-0">
              <div class="col-12 col-md-8 mb-3 mb-lg-0">
                <p class="h5 text-primary font-weight-bold title-job"></p>
                <p class="h6 mb-3 text-muted company"><?= $res['title'] ?></p>
                <p class="small desc mb-0"><?= $res['short_desc'] ?></p>
              </div>
              <div class="col-12 col-md-4">
                <div>
                  <p class="date_post small text-muted text-lg-right mb-1">Posted </p>
                  <p class="small text-muted text-lg-right mb-0"><?= $res['provinsi'] ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="d-flex justify-content-start justify-content-md-end">
                  <div>
                    <a class="btn btn-primary btn-sm mr-2" href="#" role="button"><i class="far fa-eye"></i> Lihat Pekerjaan</a>
                  </div>
                  <div>
                    <a class="remove-job btn btn-outline-primary btn-sm" href="#" 
                    data-rowid="<?php echo $res['rowid']; ?>"
                    role="button">
                      <i class="fas fa-minus-circle"></i>
                      Batal simpan</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php else : ?>
            <div class="row">
              <div class="col-md-12 ftco-animate">
                <div class="alert alert-info">Tidak ada pekerjaan yg tersimpan.<br><?php echo anchor('browse', 'Jelajahi pekerjaan'); ?></div>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-12 col-lg-3">
          <div class="rekomen-pekerjaan mb-5">
            <p class="h5 font-weight-bold mb-3">Rekomendasi Pekerjaan</p>
            <div class="popular-job bg-white p-3 rounded shadow border mb-3">
              <p class="title h6 font-weight-bold text-primary mb-0">Officer Development Program - IT</p>
              <p class="corp small mb-3">Bank Mandiri(Persero) Tbk.</p>
              <p class="location small mb-0">Jakarta Selatan</p>
              <p class="level small mb-0">Junior / Fresh graduate</p>
              <hr>
              <div class="d-flex justify-content-center">
                <div>
                  <a class="btn btn-primary btn-sm mr-2" href="#" role="button"><i class="far fa-eye"></i> Lihat Pekerjaan</a>
                </div>
                <div>
                  <a class="btn btn-outline-primary btn-sm" href="#" role="button"><i class="far fa-bookmark"></i>
                    Simpan</a>
                </div>
              </div>
            </div>
            <div class="popular-job bg-white p-3 rounded shadow border mb-3">
              <p class="title h6 font-weight-bold text-primary mb-0">Officer Development Program - IT</p>
              <p class="corp small mb-3">Bank Mandiri(Persero) Tbk.</p>
              <p class="location small mb-0">Jakarta Selatan</p>
              <p class="level small mb-0">Junior / Fresh graduate</p>
              <hr>
              <div class="d-flex justify-content-center">
                <div>
                  <a class="btn btn-primary btn-sm mr-2" href="#" role="button"><i class="far fa-eye"></i> Lihat Pekerjaan</a>
                </div>
                <div>
                  <a class="btn btn-outline-primary btn-sm" href="#" role="button"><i class="far fa-bookmark"></i>
                    Simpan</a>
                </div>
              </div>
            </div>
            <div class="popular-job bg-white p-3 rounded shadow border mb-0">
              <p class="title h6 font-weight-bold text-primary mb-0">Officer Development Program - IT</p>
              <p class="corp small mb-3">Bank Mandiri(Persero) Tbk.</p>
              <p class="location small mb-0">Jakarta Selatan</p>
              <p class="level small mb-0">Junior / Fresh graduate</p>
              <hr>
              <div class="d-flex justify-content-center">
                <div>
                  <a class="btn btn-primary btn-sm mr-2" href="#" role="button"><i class="far fa-eye"></i> Lihat Pekerjaan</a>
                </div>
                <div>
                  <a class="btn btn-outline-primary btn-sm" href="#" role="button"><i class="far fa-bookmark"></i>
                    Simpan</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
          

      <div class="pagination-page">
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
      </div>
    </div>
  </div>
</div>

</section>
