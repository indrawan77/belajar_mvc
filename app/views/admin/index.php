<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?= $data['judul'] ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Halaman Utama</a></li>
          <li class="breadcrumb-item active"><?= $data['judul'] ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

        <table class="table table-striped">
          <thead class="thead-inverse">
            <tr>
              <th style="text-align: center;vertical-align: middle;">NO</th>
              <th style="text-align: center;vertical-align: middle;">USERNAME</th>
              <th style="text-align: center;vertical-align: middle;">NAMA</th>
              <th style="text-align: center;vertical-align: middle;">EMAIL</th>
              <th style="text-align: center;vertical-align: middle;">HP</th>
              <th style="text-align: center;vertical-align: middle;"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (!empty($data['admin'])) {
              $no = 0;
              foreach ($data['admin'] as $admin) {
                $no++;
            ?>
                <tr>
                  <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                  <td style="text-align: center;vertical-align: middle;"><?= $admin['admin_username']; ?></td>
                  <td style="text-align: center;vertical-align: middle;"><?= $admin['admin_nama']; ?></td>
                  <td style="text-align: center;vertical-align: middle;"><?= $admin['admin_email']; ?></td>
                  <td style="text-align: center;vertical-align: middle;"><?= $admin['admin_hp']; ?></td>
                  <td style="text-align: center;vertical-align: middle;">
                    <a class="btn btn-primary" href="<?= BASE_URL ?>/admin/detail/<?= $admin['admin_id'] ?>" role="button"><i class="fa fa-search" aria-hidden="true"></i> Detail</a>
                    <a class="btn btn-primary" href="<?= BASE_URL ?>/admin/edit/<?= $admin['admin_id'] ?>" role="button"><i class="fa fa-edit" aria-hidden="true"></i> Ubah</a>
                    <a class="btn btn-danger" href="<?= BASE_URL ?>/admin/delete/<?= $admin['admin_id'] ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                  </td>
                </tr>
              <?php
              }
            } else {
              ?>
              <tr>
                <td colspan="6" style="text-align: center;vertical-align: middle;">
                  Data Admin Kosong
                </td>
              </tr>

            <?php
            }
            ?>

          </tbody>
        </table>
        <a class="btn btn-primary" href="<?= BASE_URL ?>/admin/add/" role="button"><i class="fa4-add"></i>Entry Admin</a>

      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>