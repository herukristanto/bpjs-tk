<?php echo '<pre>' . print_r($job_applicant, true) . '</pre>' ?>

<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom-dark">
      <li class="breadcrumb-item"><a href="<?= base_url('admin/company/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Job applicant</li>
    </ol>
  </nav>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Title</th>
              <th>Cryteria disability</th>
              <th>Location</th>
              <th>Open date</th>
              <th>Close date</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ((array) @$data as $key => $row) : ?>
            <tr>
              <td><?= $row->title_name ?></td>
              <td><?= $row->cryteria_name_slug ?></td>
              <td><?= $row->location_name ?></td>
              <td><?= convert_datetime($row->date_in, 'user_date') ?></td>
              <td><?= convert_datetime($row->date_close, 'user_date') ?></td>
              <td align="center">
                <a class="btn btn-info btn-circle btn-sm" href="<?= base_url('admin/company/job_vacancies/view/'. $row->id); ?>" title="view"><i class="fas fa-eye"></i></a>
                <a class="btn btn-success btn-circle btn-sm" href="<?= base_url('admin/company/job_vacancies/edit/'. $row->id); ?>" title="edit"><i class="fas fa-edit"></i></a>
                <button class="btn btn-danger btn-circle btn-sm" title="stop"><i class="far fa-stop-circle"></i></button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>