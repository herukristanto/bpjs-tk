<script type='text/javascript' src='<?= base_url(); ?>assets/admin/js/plugins/ckeditor/ckeditor.js'></script>
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom-dark">
      <li class="breadcrumb-item"><a href="<?= base_url('admin/company/dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Company Profile</li>
    </ol>
  </nav>
  <form class="needs-validation" action="<?php echo site_url('admin/company/profile/save'); ?>" method="post">
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Company Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="validationTooltip01" placeholder="Company Name" name="name" value="<?= @$company['name']; ?>" required>
        <div class="invalid-tooltip">
          Please provide a valid Name.
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationTooltip02">Company Website</label>
        <input type="text" class="form-control" id="validationTooltip02" placeholder="Company Website" value="<?= @$company['website']; ?>" name="website">
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Province <span class="text-danger">*</span></label>
        <select class="form-control" name="provinsi" id="provinsi">
          <option value="<?= @$get_provinsi['id']; ?>"><?= @$get_provinsi['name']; ?></option>
          <?php foreach ($provinsi->result() as $row) : ?>
            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
          <?php endforeach; ?>
        </select>
        <div class="invalid-tooltip">
          Please provide a valid Name.
        </div>
      </div>
    </div>

    <!-- <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Province <span class="text-danger">*</span></label>
        <select class="form-control" name="provinsi" id="provinsi">
          <option value=""><?php echo $get_provinsi; ?></option>
          <?php foreach ($provinsi->result() as $row) : ?>
            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
          <?php endforeach; ?>
        </select>
        <div class="invalid-tooltip">
          Please provide a valid Name.
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationTooltip02">City/Distrct</label>
        <select class="form-control" name="kota" id="kota">
        </select>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationTooltip02">Subdistrict</label>
        <select class="form-control" name="kec" id="kec">
        </select>
      </div>
    </div> -->

    <div class="form-row">
      <div class="col-md-12 mb-3">
        <label for="validationTooltip04">Company Address <span class="text-danger">*</span></label>
        <textarea type="text" class="form-control" id="validationTooltip03" rows="3" placeholder="Company Address" name="detail_address" required><?= @$company['detail_address']; ?></textarea>
        <div class="invalid-tooltip">
          Please provide a valid Address.
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-12 mb-3">
        <label for="validationTooltip05">About </label>
        <textarea type="text" class="form-control ckeditor" id="validationTooltip04" name="description" required><?= @$company['description']; ?></textarea>
        <div class="invalid-tooltip">
          Please provide a valid About.
        </div>
      </div>
    </div>
    <button class="btn btn-success btn-icon-split" type="submit">
      <span class="icon text-white-50">
        <i class="fas fa-save"></i>
      </span>
      <span class="text">Submit Profile</span>
    </button>
  </form>
  <hr>
</div>

<div class="container-fluid">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <form action="<?= base_url('admin/company/profile/image') ?>" method="POST" enctype="multipart/form-data">
        <label for="validationTooltip03">Company Logo</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button type="submit" class="btn btn-outline-primary input-group-text">Upload</button>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input chooseFileImage" id="inputGroupFile01" name="image" accept=".jpg, .jpeg, .png">
            <input type="hidden" name="image" value="<?= @$company['image']; ?>">
            <label class="noFileImage file-select-name custom-file-label" for="inputGroupFile01">Choose file max 1 mb</label>
          </div>
        </div>
        <div style="text-align: center;">
          <p class="help-block">Logo harus beresolusi 560 x 315 Pixels.</p>
          <?php if (empty(@$company['image'])) : ?>
            <img class=" rounded thumbnail" alt="..." src="<?php echo base_url() . 'assets/admin/img/company/img.png' ?>" height="210">
          <?php else : ?>
            <img class=" rounded thumbnail" alt="..." src="<?php echo base_url() . 'assets/admin/img/company/' . @$company['image']; ?>" height="210">
          <?php endif; ?>
        </div>
      </form>
    </div>

    <div class="col-md-6 mb-3">
      <form action="<?= base_url('admin/company/profile/logo') ?>" method="POST" enctype="multipart/form-data">
        <label for="validationTooltip03">Favicon</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button type="submit" class="btn btn-outline-primary input-group-text">Upload</button>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input chooseFileLogo" id="inputGroupFile01" name="logo" accept=".jpg, .jpeg, .png">
            <input type="hidden" name="logo" value="<?= @$company['logo']; ?>">
            <label class="noFileLogo file-select-name custom-file-label" for="inputGroupFile01">Choose file max 1 mb</label>
          </div>
        </div>
        <div style="text-align: center;">
          <p class="help-block">Favicon harus beresolusi 32 x 32 Pixels.</p>
          <?php if (empty(@$company['logo'])) : ?>
            <img class="rounded thumbnail" alt="..." src="<?php echo base_url() . 'assets/admin/img/company/img.png' ?>" height="210">
          <?php else : ?>
            <img class="rounded thumbnail" alt="..." src="<?php echo base_url() . 'assets/admin/img/company/' . @$company['logo']; ?>" height="210">
          <?php endif; ?>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#provinsi").change(function() {
      let id_provinces = $(this).val();
      $.ajax({
        type: "POST",
        dataType: "html",
        url: "<?php echo site_url('admin/company/profile/kota'); ?>",
        data: "id_provinces=" + id_provinces,
        success: function(data) {
          var html = '';
          $.each(JSON.parse(data), function(index, value) {
            html += '<option value=' + value.id + '>' + value.name + '</option>';
          });

          $('#kota').html(html);
        }
      });
    });

    $("#kota").click(function() {
      // $("img#load1").show();
      var id_regency = $(this).val();
      $.ajax({
        type: "POST",
        dataType: "html",
        url: "<?php echo site_url('admin/company/profile/kec'); ?>",
        data: "id_regency=" + id_regency,
        success: function(data) {
          console.log(data);
          var html = '';
          $.each(JSON.parse(data), function(index, value) {
            html += '<option value=' + value.id + '>' + value.name + '</option>';
          });

          $('#kec').html(html);
        }
      });
    });

    $('.chooseFileImage').on('change', function() {
      let filename = $(".chooseFileImage").val();
      if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $(".noFileImage").text("Choose File max 2mb...");
      } else {
        $(".file-upload").addClass('active');
        $(".noFileImage").text(filename.replace("C:\\fakepath\\", ""));
      }
    });

    $('.chooseFileLogo').on('change', function() {
      let filename = $(".chooseFileLogo").val();
      if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $(".noFileLogo").text("Choose File max 2mb...");
      } else {
        $(".file-upload").addClass('active');
        $(".noFileLogo").text(filename.replace("C:\\fakepath\\", ""));
      }
    });
  });
</script>