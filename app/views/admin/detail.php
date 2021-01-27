<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?= $data['sub_judul'] ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Halaman Utama</a></li>
          <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin"><?= $data['judul'] ?></a></li>
          <li class="breadcrumb-item active"><?= $data['sub_judul'] ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            <table class="table table-borderless table-responsive">
              <tbody>
                <tr>
                  <th>Nama</th>
                  <th>:</th>
                  <td><?= $data['admin']['admin_nama'] ?></td>
                </tr>
                <tr>
                  <th>Nama Pengguna</th>
                  <th>:</th>
                  <td><?= $data['admin']['admin_username'] ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <th>:</th>
                  <td><?= $data['admin']['admin_email'] ?></td>
                </tr>
                <tr>
                  <th>HP</th>
                  <th>:</th>
                  <td><?= $data['admin']['admin_hp'] ?></td>
                </tr>
              </tbody>
            </table>

          </div>
          <div class="card-footer text-muted text-right">
            <a class="btn btn-primary float-left" href="<?= BASE_URL ?>/admin/" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
            <a class="btn btn-primary float-right col-lg-4" href="<?= BASE_URL ?>/admin/edit/<?= $admin['admin_id'] ?>" role="button"><i class="fa fa-edit" aria-hidden="true"></i> Ubah</a>
          </div>
        </div>

      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>