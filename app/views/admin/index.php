<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?= $data['judul'] ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Starter Page</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <?php if (isset($data['admin'])) {
        ?>
          <p><?= $data['admin']['admin_nama'][0] ?></p>
        <?php
        }
        ?>

        <table class="table table-striped table-inverse table-responsive">
          <thead class="thead-inverse">
            <tr>
              <th style="text-align: center;vertical-align: middle;">NO</th>
              <th style="text-align: center;vertical-align: middle;">USERNAME</th>
              <th style="text-align: center;vertical-align: middle;">NAMA</th>
              <th style="text-align: center;vertical-align: middle;">EMAIL</th>
              <th style="text-align: center;vertical-align: middle;">HP</th>
              <th style="text-align: center;vertical-align: middle;">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (!empty($data['admin'])) {
              $no = 1;
              foreach ($data['admin'] as $admin) {
                $no++;
            ?>
                <tr>
                  <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                  <td style="text-align: center;vertical-align: middle;"><?= $admin['admin_username']; ?></td>
                  <td style="text-align: center;vertical-align: middle;"><?= $admin['admin_nama']; ?></td>
                  <td style="text-align: center;vertical-align: middle;"><?= $admin['admin_email']; ?></td>
                  <td style="text-align: center;vertical-align: middle;"><?= $admin['admin_hp']; ?></td>
                  <td style="text-align: center;vertical-align: middle;"></td>
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

      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>