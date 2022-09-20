<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom-dark">
      <li class="breadcrumb-item"><a href="<?= base_url('admin/company/dashboard') ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Job List</li>
    </ol>
  </nav>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?= base_url('admin/company/job_vacancies/'); ?>" class="btn btn-primary btn-icon-split" title="tambah">
        <span class="icon text-white-50">
          <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text">Open Job</span>
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Title</th>
              <th>Type</th>
              <th>Location</th>
              <th>Open date</th>
              <th>Close date</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ((array) @$data as $key => $row) : ?>
              <tr>
                <td><?= $row->title_name ?></td>
                <td><?= $row->type_name ?></td>
                <td><?= $row->location_name ?></td>
                <td><?= convert_datetime($row->date_in, 'user_date') ?></td>
                <td><?= convert_datetime($row->date_close, 'user_date') ?></td>
                <td><?= $row->status == 1 ? '<i class="fas fa-toggle-off fa-2x text-success"></i>' : '<i class="fas fa-toggle-on fa-2x text-danger"></i>' ?></td>
                <td>
                  <a class="btn btn-info btn-circle btn-sm" href="<?= base_url('admin/company/job_vacancies/view/' . $row->id); ?>" title="view"><i class="fas fa-eye"></i></a>
                  <a class="btn btn-primary btn-circle btn-sm" href="<?= base_url('admin/company/job_vacancies/edit/' . $row->id); ?>" title="edit"><i class="fas fa-edit"></i></a>
                  <?php if ($row->status == 1) : ?>
                    <a class="btn btn-danger btn-circle btn-sm" href="<?= base_url('admin/company/job_vacancies/stop/' . $row->id); ?>" title="stop"><i class="fas fa-stop-circle"></i></a>
                  <?php else : ?>
                    <a class="btn btn-success btn-circle btn-sm" href="<?= base_url('admin/company/job_vacancies/open/' . $row->id); ?>" title="open"><i class="fas fa-door-open"></i></a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->