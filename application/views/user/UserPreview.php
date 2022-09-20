<section id="page-preview-user">

  <div id="main" class="mt-custom">
    <div class="jumbotron jumbotron-fluid jumbotron-collapse bg-transparent mb-0">
      <div class="container pt-lg-3">
        <div class="row">
          <div class="col-12 col-lg-3">
            <div class="preview-kiri bg-white shadow-sm p-4">
              <p class="h2 font-weight-bold text-primary"><?= (isset($UserProfile[0])) ? $UserProfile[0]->name : '---' ?></p>
              <hr>
              <div>
                <p class="h6 font-weight-bold mb-0">No. KTP</p>
                <p class="h6 text-muted mb-0"><?= (isset($UserProfile[0])) ? $UserProfile[0]->nik : '---' ?></p>
              </div>
              <hr>
              <div>
                <p class="h6 font-weight-bold mb-0">Tempat Lahir</p>
                <p class="h6 text-muted mb-0"><?= (isset($UserProfile[0])) ? $UserProfile[0]->tempat_lahir : '---' ?></p>
              </div>
              <hr>
              <div>
                <p class="h6 font-weight-bold mb-0">Tanggal Lahir</p>
                <p class="h6 text-muted mb-0"><?= (isset($UserProfile[0])) ? $UserProfile[0]->birthday : '---' ?></p>
              </div>
              <hr>
              <div>
                <p class="h6 font-weight-bold mb-0">Jenis Kelamin</p>
                <p class="h6 text-muted mb-0"><?= (isset($UserProfile[0])) ? (($UserProfile[0]->gender == 1) ? 'Laki - laki' : 'Perempuan') : '---' ?></p>
              </div>
              <hr>
              <div>
                <p class="h6 font-weight-bold mb-0">Agama</p>
                <p class="h6 text-muted mb-0"><?= (isset($UserProfile[0])) ? $UserProfile[0]->agama : '---' ?></p>
              </div>
              <hr>
              <div>
                <p class="h6 font-weight-bold mb-0">No. Hp</p>
                <p class="h6 text-muted mb-0"><?= (isset($UserProfile[0])) ? '0'.$UserProfile[0]->handphone : '---' ?></p>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-9">
            <div class="preview-kanan shadow-sm bg-white p-5">
              <div class="text-right">
                <a class="btn btn-primary btn-sm" href="<?php echo base_url('user/UserProfile') ?>" role="button"><i class="fas fa-user-edit"></i> Edit Profile</a>
              </div>
              <hr>
              <div class="alamat mb-5">
                <div class="row">
                  <div class="col-1 text-right">
                    <div class="ikon">
                      <i class="fas fa-bookmark fa-2x text-primary"></i>
                    </div>
                  </div>
                  <div class="col-11">
                    <div class="alamat-ktp mb-3">
                      <!-- <?php var_dump(@$UserProfile[0])?> -->
                      <p class="h5 font-weight-bold text-primary mb-0">Alamat</p>
                      <div class="row mt-3">
                        <div class="col-12">
                          <p class="small font-weight-bold mb-0"><?= (isset($UserProfile[0])) ? $UserProfile[0]->address : '---' ?></p>
                        </div>
                        <!-- <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">Provinsi</p>
                          <p class="small text-muted mb-0">Jawa Timur</p>
                        </div>
                        <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">Kota/Kabupaten</p>
                          <p class="small text-muted mb-0">Kab.Bojonegoro</p>
                        </div>
                        <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">Kecamatan</p>
                          <p class="small text-muted mb-0">Trucuk</p>
                        </div>
                        <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">Kode Pos</p>
                          <p class="small text-muted mb-0">16425</p>
                        </div> -->
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="pendidikan mb-5">
                <div class="row">
                  <div class="col-1 text-right">
                    <div class="ikon">
                      <i class="fas fa-bookmark text-primary fa-2x"></i>
                    </div>
                  </div>
                  <div class="col-11">
                    <div class="pendidikan-detail">
                      <p class="h5 font-weight-bold text-primary mb-3">Pendidikan Terakhir</p>
                      <div class="row mt-3">
                        <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">Perguruan Tinggi</p>
                          <p class="small text-muted mb-0">Universitas Indonesia</p>
                        </div>
                        <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">Jenis Perguruan Tinggi</p>
                          <p class="small text-muted mb-0">PTN(Negeri)</p>
                        </div>
                        <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">Tingkat Pendidikan</p>
                          <p class="small text-muted mb-0">Sarjana</p>
                        </div>
                        <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">Detail Nama Jurusan</p>
                          <p class="small text-muted mb-0">Fakultas Ilmu Komputer</p>
                        </div>
                        <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">IPK</p>
                          <p class="small text-muted mb-0">3.64 dari 4.00</p>
                        </div>
                        <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">Status Lulus</p>
                          <p class="small text-muted mb-0">Lulus</p>
                        </div>
                        <div class="col-3 mb-2">
                          <p class="small font-weight-bold mb-0">Tanggal Ijazah</p>
                          <p class="small text-muted mb-0">1 Januari 2020</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sertifikasi mb-5">
                <div class="row">
                  <div class="col-1 text-right">
                    <div class="ikon">
                      <i class="fas fa-bookmark text-primary fa-2x"></i>
                    </div>
                  </div>
                  <div class="col-11">
                    <div class="sertifikasi-detail">
                      <p class="h5 font-weight-bold text-primary mb-3">Sertifikasi</p>
                      <div class="row mt-2">
                        <div class="col-3 mb-1">
                          <p class="small font-weight-bold mb-0">Nama Sertifikat</p>
                          <p class="small text-muted mb-0">Talent & Professional</p>
                        </div>
                        <div class="col-3 mb-1">
                          <p class="small font-weight-bold mb-0">Lembaga Sertifikasi</p>
                          <p class="small text-muted mb-0">LSP</p>
                        </div>
                        <div class="col-3 mb-1">
                          <p class="small font-weight-bold mb-0">Tahun Sertifikasi</p>
                          <p class="small text-muted mb-0">2022 - Seumur Hidup</p>
                        </div>
                        <div class="col-3 mb-1">
                          <p class="small font-weight-bold mb-0">Score</p>
                          <p class="small text-muted mb-0">-</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pelatihan mb-5">
                <div class="row">
                  <div class="col-1 text-right">
                    <div class="ikon">
                      <i class="fas fa-bookmark text-primary fa-2x"></i>
                    </div>
                  </div>
                  <div class="col-11">
                    <div class="pelatihan-detail">
                      <p class="h5 font-weight-bold text-primary mb-3">Pelatihan</p>
                      <div class="row mt-2">
                        <div class="col-3 mb-1">
                          <p class="small font-weight-bold mb-0">Nama Pelatihan</p>
                          <p class="small text-muted mb-0">WEB PROGRAMMER</p>
                        </div>
                        <div class="col-3 mb-1">
                          <p class="small font-weight-bold mb-0">Penyelenggara</p>
                          <p class="small text-muted mb-0">BPPTIK Cikarang</p>
                        </div>
                        <div class="col-3 mb-1">
                          <p class="small font-weight-bold mb-0">Tahun Sertifikasi</p>
                          <p class="small text-muted mb-0">2017</p>
                        </div>
                        <div class="col-3 mb-1">
                          <p class="small font-weight-bold mb-0">Tahun Akhir</p>
                          <p class="small text-muted mb-0">2018</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>