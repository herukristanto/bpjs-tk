<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom-dark">
      <li class="breadcrumb-item"><a href="<?= base_url('admin/company/dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Open Jobs</li>
    </ol>
  </nav>
  <form class="needs-validation" action="<?php echo site_url('admin/company/job_vacancies/save'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_company" value="<?= @$profile[0]->id == "" ? "" : @$profile[0]->id ?>">

    <div class="form-row">
      <div class="col-md-4 mb-2">
        <label for="validationTooltip01">Title <span class="text-danger">*</span></label>
        <input type="text" class="form-control title" id="validationTooltip01" placeholder="Title" name="title" value="" required>
      </div>
      <div class="col-md-4 mb-2">
        <label for="validationTooltip01">Permalink <span class="text-danger">*</span></label>
        <input type="text" class="form-control slug" id="validationTooltip02" placeholder="Permalink" name="slug" readonly>
      </div>
      <div class="col-md-4 mb-2">
        <label for="validationTooltip01">Benefit</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Rp</span>
          </div>
          <input type="text" class="form-control" id="rupiah" name="benefit" maxlength="15" onkeypress="return inputAngka(event)">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="form-row">
          <div class="col-md-12 mb-2">
            <label for="validationTooltip05">Job Description <span class="text-danger">*</span></label>
            <textarea type="text" class="form-control ckeditor description" name="description" required></textarea>
            <div class="invalid-tooltip">
              Please provide a valid About.
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <label for="validationTooltip05">Short Description <span class="text-danger">*</span></label>
            <textarea class="form-control" name="short_desc" id="short_desc" cols="15" rows="7" required></textarea>
            <div class="invalid-tooltip">
              Please provide a valid About.
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <label for="validationTooltip05">Requirement <span class="text-danger">*</span></label>
            <textarea class="form-control" name="requirement" id="requirement" cols="15" rows="7" required></textarea>
            <div class="invalid-tooltip">
              Please provide a valid About.
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="validationTooltip01">Provinsi <span class="text-danger">*</span></label>
          <select class="form-control" name="id_provinces" id="id_provinces" required>
            <option value="">--</option>
            <?php foreach ($wilayah->result() as $row) : ?>
              <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-tooltip">
            Please provide a valid Name.
          </div>
        </div>
        <div class="form-group">
          <label for="validationTooltip01 select">Category <span class="text-danger">*</span></label>
          <select class="form-control" name="id_category" id="id_category" required>
            <option value="">--</option>
            <?php foreach ($category as $row) : ?>
              <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="validationTooltip01">Type <span class="text-danger">*</span></label>
          <select class="form-control" name="id_type" id="id_type" required>
            <option value="">--</option>
            <?php foreach ($type as $row) : ?>
              <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
            <?php endforeach; ?>
          </select>
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
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="id_disability[]" value="1">
              </div>
            </div>
            <div class="col">
              <div>
                <img src="<?php echo base_url('assets/admin/img/icon/tuna-rungu-wicara.png') ?>" class="img-fluid d-block mx-auto check-hov" alt="...">
                <p class="small text-center mb-0 mt-2">Rungu</p>
              </div>
              <div class="d-flex flex-row justify-content-center">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="id_disability[]" value="2">
              </div>
            </div>
            <div class="col">
              <div>
                <img src="<?php echo base_url('assets/admin/img/icon/tuna-netra.png') ?>" class="img-fluid d-block mx-auto check-hov" alt="...">
                <p class="small text-center mb-0 mt-2">Netra</p>
              </div>
              <div class="d-flex flex-row justify-content-center">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="id_disability[]" value="3">
              </div>
            </div>
            <div class="col">
              <div>
                <img src="<?php echo base_url('assets/admin/img/icon/tuna-grahita.png') ?>" class="img-fluid d-block mx-auto check-hov" alt="...">
                <p class="small text-center mb-0 mt-2">Grahita</p>
              </div>
              <div class="d-flex flex-row justify-content-center">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="id_disability[]" value="4">
              </div>
            </div>
            <div class="col">
              <div>
                <img src="<?php echo base_url('assets/admin/img/icon/tuna-laras.png') ?>" class="img-fluid d-block mx-auto check-hov" alt="...">
                <p class="small text-center mb-0 mt-2">Mental</p>
              </div>
              <div class="d-flex flex-row justify-content-center">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="id_disability[]" value="5">
              </div>
            </div>
          </div>
        </div>
        <div class="form-row mb-3">
          <div class="col-md-6">
            <label for="validationTooltip01">Open Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control date_in" id="validationTooltip01" placeholder="Open Date" name="date_in" required>
          </div>
          <div class="col-md-6">
            <label for="validationTooltip01">Close Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control date_close" id="validationTooltip01" placeholder="Close Date" name="date_close" required>
          </div>
        </div>
        <div class="form-group">
          <label for="validationTooltip05">Image <span class="text-danger">*</span></label>
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input chooseFileImage" id="inputGroupFile01" name="image" accept=".jpg, .jpeg, .png" required>
              <label class="noFileImage file-select-name custom-file-label" for="inputGroupFile01">Choose file max 1 mb</label>
            </div>
          </div>
          <div style="text-align: center;">
            <img src="<?php echo base_url() . 'assets/admin/img/company/img.png' ?>" class="rounded thumbnail" height="210">
          </div>
        </div>
      </div>
    </div>
    <hr>
    <button class="btn btn-success btn-icon-split float-left" type="submit">
      <span class="icon text-white-50">
        <i class="fas fa-save"></i>
      </span>
      <span class="text">Submit Job</span>
    </button>
    <br><br>
  </form>
</div>

<script type='text/javascript' src='<?= base_url(); ?>assets/admin/js/plugins/ckeditor/ckeditor.js'></script>

<script>
  function inputAngka(evt) {
    let charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  };

  $(document).ready(function() {
    let rupiah = document.getElementById("rupiah");

    rupiah.addEventListener("keyup", function(e) {
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      // rupiah.value = formatRupiah(this.value, "Rp. ");
      rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
      }

      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    // let valRupiah = $("#rupiah").val();
    // rupiah.addEventListener("blur", function(e) {
    //   var benefit = parseFloat($("#benefit").val($(".rp").val()));
    // });

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