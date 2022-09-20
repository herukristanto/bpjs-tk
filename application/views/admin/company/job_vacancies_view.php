<?php

if (isset($data[0]->id_disability)) {
  $disability = explode(',', $data[0]->id_disability);
}

?>
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom-dark">
      <li class="breadcrumb-item"><a href="<?= base_url('admin/company/dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('admin/company/job_vacancies/list') ?>">List Jobs</a></li>
      <li class="breadcrumb-item active" aria-current="page">View Jobs</li>
    </ol>
  </nav>
  <form class="needs-validation" method="post" novalidate enctype="multipart/form-data">
    <div class="form-row">
      <div class="col-md-4 mb-2">
        <label for="validationTooltip01">Title <span class="text-danger">*</span></label>
        <input type="text" class="form-control title" id="validationTooltip01" placeholder="Title" name="title" value="<?= $data[0]->title_name ?>" readonly>
      </div>
      <div class="col-md-4 mb-2">
        <label for="validationTooltip01">Permalink <span class="text-danger">*</span></label>
        <input type="text" class="form-control slug" id="validationTooltip02" placeholder="permalink" name="slug" value="<?= $data[0]->slug ?>" readonly>
      </div>
      <div class="col-md-4 mb-2">
        <label for="validationTooltip01">Benefit</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Rp</span>
          </div>
          <input type="text" class="form-control" id="rupiah" name="benefit" value="<?= @number_format($data[0]->benefit, 2, ',', '.') ?>" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="form-row">
          <div class="col-md-12 mb-2">
            <label for="validationTooltip05">Job Description <span class="text-danger">*</span></label>
            <textarea type="text" class="form-control ckeditor description" id="validationTooltip04" name="description" readonly><?= $data[0]->description ?></textarea>
            <div class="invalid-tooltip">
              Please provide a valid About.
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <label for="validationTooltip05">Short Description <span class="text-danger">*</span></label>
            <textarea class="form-control" name="" id="" cols="15" rows="7" readonly><?= $data[0]->short_desc ?></textarea>
            <div class="invalid-tooltip">
              Please provide a valid About.
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <label for="validationTooltip05">Requirement <span class="text-danger">*</span></label>
            <textarea class="form-control" name="" id="" cols="15" rows="7" readonly><?= $data[0]->requirement ?></textarea>
            <div class="invalid-tooltip">
              Please provide a valid About.
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="validationTooltip01">Provinsi <span class="text-danger">*</span></label>
          <input type="text" class="form-control title" id="validationTooltip01" placeholder="Title" name="title" value="<?= $data[0]->location_name ?>" readonly>
        </div>
        <div class="form-group">
          <label for="validationTooltip01 select">Category <span class="text-danger">*</span></label>
          <input type="text" class="form-control title" id="validationTooltip01" placeholder="Title" name="title" value="<?= $data[0]->category_name ?>" readonly>
        </div>
        <div class="form-group">
          <label for="validationTooltip01">Type <span class="text-danger">*</span></label>
          <input type="text" class="form-control title" id="validationTooltip01" placeholder="Title" name="title" value="<?= $data[0]->type_name ?>" readonly>
        </div>
        <div class="form-group mb-5">
          <label>Cryteria <span class="text-danger">*</span></label>
          <div class="row ml-2">
            <div class="col">
              <div>
                <img src="<?php echo base_url('assets/admin/img/icon/tuna-daksa.png') ?>" class="img-fluid d-block mx-auto check-hov" alt="...">
                <p class="small text-center mb-0 mt-2">Daksa</p>
              </div>
              <div class="d-flex flex-row justify-content-center">
                <span class="<?= @in_array('1', $disability) ? "fas fa-check-square" : "far fa-square" ?> "></span>
              </div>
            </div>
            <div class="col">
              <div>
                <img src="<?php echo base_url('assets/admin/img/icon/tuna-rungu-wicara.png') ?>" class="img-fluid d-block mx-auto check-hov" alt="...">
                <p class="small text-center mb-0 mt-2">Rungu</p>
              </div>
              <div class="d-flex flex-row justify-content-center">
                <span class="<?= @in_array('2', $disability) ? "fas fa-check-square" : "far fa-square" ?> "></span>
              </div>
            </div>
            <div class="col">
              <div>
                <img src="<?php echo base_url('assets/admin/img/icon/tuna-netra.png') ?>" class="img-fluid d-block mx-auto check-hov" alt="...">
                <p class="small text-center mb-0 mt-2">Netra</p>
              </div>
              <div class="d-flex flex-row justify-content-center">
                <span class="<?= @in_array('3', $disability) ? "fas fa-check-square" : "far fa-square" ?> "></span>
              </div>
            </div>
            <div class="col">
              <div>
                <img src="<?php echo base_url('assets/admin/img/icon/tuna-grahita.png') ?>" class="img-fluid d-block mx-auto check-hov" alt="...">
                <p class="small text-center mb-0 mt-2">Grahita</p>
              </div>
              <div class="d-flex flex-row justify-content-center">
                <span class="<?= @in_array('4', $disability) ? "fas fa-check-square" : "far fa-square" ?> "></span>
              </div>
            </div>
            <div class="col">
              <div>
                <img src="<?php echo base_url('assets/admin/img/icon/tuna-laras.png') ?>" class="img-fluid d-block mx-auto check-hov" alt="...">
                <p class="small text-center mb-0 mt-2">Mental</p>
              </div>
              <div class="d-flex flex-row justify-content-center">
                <span class="<?= @in_array('5', $disability) ? "fas fa-check-square" : "far fa-square" ?> "></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-row mb-2">
          <div class="col-md-6">
            <label for="validationTooltip01">Open Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control date_in" id="validationTooltip01" placeholder="Open Date" name="date_in" value="<?= $data[0]->date_in ?>" readonly>
          </div>
          <div class="col-md-6">
            <label for="validationTooltip01">Close Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control date_close" id="validationTooltip01" placeholder="Close Date" name="date_close" value="<?= $data[0]->date_close ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="validationTooltip05">Image <span class="text-danger">*</span></label>
          <div style="text-align: center;">
            <?php if (empty($data[0]->image)) : ?>
              <img src="<?php echo base_url() . 'assets/admin/img/job/img.png' ?>" class="rounded thumbnail" height="210">
            <?php else : ?>
              <img src="<?php echo base_url() . 'assets/admin/img/job/' . $data[0]->image; ?>" class="rounded thumbnail" height="210">
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <a class="btn btn-light btn-icon-split float-left" href="<?= base_url('admin/company/job_vacancies/edit/' . $data[0]->id); ?>" title="edit">
      <span class="icon text-white-50">
        <i class="far fa-edit"></i>
      </span>
      <span class="text">Edit Job</span>
    </a>
  </form>
</div>

<script type='text/javascript' src='<?= base_url(); ?>assets/admin/js/plugins/ckeditor/ckeditor.js'></script>
<script>
  $(document).ready(function() {

    $('.selectpicker').select2({
      placeholder: " Silahkan Pilih"
    });

    $('.title').keyup(function() {
      var title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g, '-');
      $('.slug').val(title);
    });

    $('.chooseFileImage').on('change', function() {
      let filename = $(".chooseFileImage").val();
      if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $(".noFileImage").text("Choose File...");
      } else {
        $(".file-upload").addClass('active');
        $(".noFileImage").text(filename.replace("C:\\fakepath\\", ""));
      }
    });
  });
</script>