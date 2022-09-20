<?php 
if (isset($UserProfile[0]->id_disability)) {
  $disability = explode(',', $UserProfile[0]->id_disability);
}
?>
<section id="page-preview-user">
  <div id="main" class="mt-custom">
    <div class="jumbotron-fluid jumbotron-collapse bg-transparent mb-5">
      <div class="container pt-lg-3">
        <div class="row">
            <div class="col-12 col-lg-1"></div>
            <div class="col-12 col-lg-3 mt-5">
              <div class="preview-kiri bg-white rounded shadow-lg p-4 text-center">
               
                <label for="upload-avatar" style="cursor: pointer;">
                  
                    <img class="rounded-circle img-thumbnail" widht="100%"src="<?= ($UserProfile[0]->avatar == null ? base_url('assets/uploads/avatar/default-user.png') : base_url('assets/uploads/avatar/'.$UserProfile[0]->avatar))?>" id="output" alt="...">
                    <form id="form_avatar" method="post" enctype="multipart/form-data">
                      <input type="file" name="upload-avatar" id="upload-avatar" accept="image/*" style="display:none" onchange="loadFile(event)">
                      <button class="btn btn-outline-primary btn-upload-avatar" ><i class="fas fa-save"></i></button>
                    </form>
                </label>

                <label class="mt-2" for="firstname"><h5 class="font-weight-bold"><?= ($UserProfile[0]->first_name == '' && $UserProfile[0]->last_name == '') ? 'Your Name' : $UserProfile[0]->first_name.' '.$UserProfile[0]->last_name ?></h5></label>
              </div>
            </div>
            <div class="col-12 col-lg-7">
              <div class="mt-lg-5 shadow rounded border p-4">
              
                <div id="update-cv">
                  <form action="<?= base_url('user/Profile/cv_upload')?>" method="POST" enctype="multipart/form-data">
                    <label for=""><h5 class="font-weight-bold">CV</h5></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="upload-cv" id="inputGroupFile04" accept=".pdf" aria-describedby="inputGroupFileAddon04">

                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Upload</button>
                      </div>
                    </div>
                    <!-- <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="upload-cv" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary rounded">Upload</button>
                    </div> -->
                  </form>
                </div>
              
                <div class="view-cv">
                  <div class="text-right">
                    <a href="" id="edit-cv" style="color: inherit;"><i class="fas fa-edit"></i></a>
                  </div>
                  <a href="<?= base_url('assets/uploads/cv/'.$UserProfile[0]->file_cv)?>">
                    <img width="10%" src="<?= base_url('assets/user/img/curriculum.png')?>" alt="">
                  </a>
                  <label for=""><h5 class="font-weight-bold">CV (Curriculum Vitae)</h5></label>
                </div>

              </div>

              <div class="mt-lg-5 shadow rounded border p-4 view-profile">
                  <div class="text-right">
                    <a href="" id="edit-profile" style="color: inherit;"><i class="fas fa-edit"></i></a>
                  </div>
                  <label for="" ><h5 class="font-weight-bold">Profile</h5></label>

                  <?php if(isset($UserProfile[0]->first_name)) : ?>
                    <div class="search shadow-sm rounded p-3">
                      <p>Nama Depan : <?= $UserProfile[0]->first_name ?></p>
                    </div>
                  <?php endif;?>

                  <?php if(isset($UserProfile[0]->last_name)) : ?>
                    <div class="search shadow-sm rounded mt-3 p-3">
                      <p>Nama Belakang : <?= $UserProfile[0]->last_name ?></p>
                    </div>
                  <?php endif;?>

                  <?php if(isset($UserProfile[0]->address) == null) : ?>
                    <div class="search shadow-sm rounded mt-3 p-3">
                      <label for="">Alamat :</label>
                      <p><?= $UserProfile[0]->address ?></p>
                    </div>
                  <?php endif;?>

                  <?php if(isset($UserProfile[0]->gender) == 0) : ?>
                    <div class="search shadow-sm rounded mt-3 p-3">
                      <p><label for="">Jenis Kelamin :</label> <?php if($UserProfile[0]->gender == 1) {echo 'Laki - laki';} elseif($UserProfile[0]->gender == 2) { echo 'Perempuan';} else { echo '';} ?></p> 
                    </div>
                  <?php endif;?>

                  <?php if(isset($UserProfile[0]->id_disability) == '') : ?>
                    <div class="search shadow-sm rounded mt-3 p-3">
                    <label for="" >Cryteria :</label>
                    <div class="row">
                      <div class="col-sm">
                        <?php if(in_array ('1', $disability)) : ?>
                          <img src="<?php echo base_url('assets/admin/img/icon/lumpuh.png') ?>" class="img-fluid" alt="...">
                          <p class="small text-center mb-0 mt-2">Daksa</p>
                        <?php endif;?>
                      </div>
                      <div class="col-sm">
                        <?php if(in_array ('2', $disability)) : ?>
                          <img src="<?php echo base_url('assets/admin/img/icon/tuli.png') ?>" class="img-fluid" alt="...">
                          <p class="small text-center mb-0 mt-2">Rungu</p>
                        <?php endif;?>
                      </div>
                      <div class="col-sm">
                        <?php if(in_array ('3', $disability)) : ?>
                          <img src="<?php echo base_url('assets/admin/img/icon/buta.png') ?>" class="img-fluid" alt="...">
                          <p class="small text-center mb-0 mt-2">Netra</p>
                        <?php endif;?>
                      </div>
                      <div class="col-sm">
                        <?php if(in_array ('4', $disability)) : ?>
                          <img src="<?php echo base_url('assets/admin/img/icon/grahita.png') ?>" class="img-fluid" alt="...">
                              <p class="small text-center mb-0 mt-2">Grahita</p>
                        <?php endif;?>
                      </div>
                      <div class="col-sm">
                        <?php if(in_array ('5', $disability)) : ?>
                          <img src="<?php echo base_url('assets/admin/img/icon/depression.png') ?>" class="img-fluid" alt="...">
                          <p class="small text-center mb-0 mt-2">Mental</p>
                        <?php endif;?>
                      </div>
                    </div>
                    </div>
                  <?php endif;?>

                  <?php if(isset($UserProfile[0]->handphone) == 0) : ?>
                  <div class="search shadow-sm rounded mt-3 p-3">
                    <p><label for="">No. HP :</label> <?= $UserProfile[0]->handphone ?></p> 
                  </div>
                  <?php endif;?>

                  <div class="search mt-5">
                    <div>
                      <label for="" class="font-weight-bold"><label for="">Email :</label> <?= $UserProfile[0]->email ?></label>
                    </div>
                  </div>
              </div>

              <div class="mt-lg-5 shadow rounded border p-4 insert-profile">
                <form action="<?= base_url('user/Profile/update')?>" method="POST">
                  <div class="text-right">
                    <a href="" id="edit-profile" style="color: inherit;"><i class="fas fa-edit"></i></a>
                  </div>
                  <label for="" ><h5 class="font-weight-bold">Profile</h5></label>

                  <div class="search shadow-sm rounded">
                    <label for="">Nama Depan <span class="text-danger">*</span></label>
                    <input type="text" name="firstname" required class="form-control change-profile" id="firstname" value="<?= $UserProfile[0]->first_name ?>" placeholder="Masukan nama depan"> 
                  </div>

                  <div class="search shadow-sm rounded mt-3">
                    <label for="">Nama Belakang <span class="text-danger">*</span></label>
                    <input type="text" name="lastname" required class="form-control change-profile" value="<?= $UserProfile[0]->last_name ?>" placeholder="Masukan nama belakang"> 
                  </div>

                  <div class="search shadow-sm rounded mt-3">
                    <label for="">Alamat</label>
                    <textarea name="address" class="form-control change-profile" id="" cols="30" rows="5"><?= $UserProfile[0]->address ?></textarea>
                  </div>

                  <div class="search shadow-sm rounded mt-3">
                    <label for="">No. HP</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">+62</span>
                      <input type="number" class="form-control" placeholder="Masukan No. HP" name="phonenumber" value="<?= $UserProfile[0]->handphone ?>" aria-label="Phone number" aria-describedby="basic-addon1">
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="">Jenis Kelamin </label></br>
                    <select class="form-control" name="gender" aria-label="Default select example">
                      <option selected="true" disabled="disabled">Pilih</option>
                      <option <?= ($UserProfile[0]->gender == 1) ? 'selected' : ''?> value="1">Laki - laki</option>
                      <option <?= ($UserProfile[0]->gender == 2) ? 'selected' : ''?> value="2">Perempuan</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="">Tanggal Lahir </label></br>
                    <input type="text" placeholder="Masukan tanggal lahir" name="birthday" value="<?= $UserProfile[0]->birthday ?>" class="form-control" onfocus="(this.type='date')">
                  </div>

                  <div class="form-group mb-5">
                    <label>Cryteria <span class="text-danger">*</span></label>
                    <div class="row ml-2">
                        <div class="col">
                            <div>
                                <img src="<?php echo base_url('assets/admin/img/icon/lumpuh.png') ?>" class="img-fluid" alt="...">
                                <p class="small text-center mb-0 mt-2">Daksa</p>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="id_disability[]" value="1" <?= in_array ('1', $disability) ? "checked" : ""; ?>>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <img src="<?php echo base_url('assets/admin/img/icon/tuli.png') ?>" class="img-fluid" alt="...">
                                <p class="small text-center mb-0 mt-2">Rungu</p>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="id_disability[]" value="2" <?= in_array ('2', $disability) ? "checked" : ""; ?>>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <img src="<?php echo base_url('assets/admin/img/icon/buta.png') ?>" class="img-fluid" alt="...">
                                <p class="small text-center mb-0 mt-2">Netra</p>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="id_disability[]" value="3" <?= in_array ('3', $disability) ? "checked" : ""; ?>>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <img src="<?php echo base_url('assets/admin/img/icon/grahita.png') ?>" class="img-fluid" alt="...">
                                <p class="small text-center mb-0 mt-2">Grahita</p>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="id_disability[]" value="4" <?= in_array ('4', $disability) ? "checked" : ""; ?>>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <img src="<?php echo base_url('assets/admin/img/icon/depression.png') ?>" class="img-fluid" alt="...">
                                <p class="small text-center mb-0 mt-2">Mental</p>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="id_disability[]" value="5" <?= in_array ('5', $disability) ? "checked" : ""; ?>>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="search mt-3">
                    <label for="">Email </label>
                    <div>
                      <label for="" class="font-weight-bold"><?= $UserProfile[0]->email ?></label>
                    </div>
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary rounded"><i class="fas fa-save"></i> Simpan</button>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-12 col-lg-1"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>