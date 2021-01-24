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
        <div class="col-lg-12">
          <?php Flasher::flash(); ?>
        </div>
        <table class="table table-striped">
          <thead class="thead-inverse">
            <tr>
              <th style="text-align: center;vertical-align: middle;">NO</th>
              <th style="text-align: center;vertical-align: middle;">NAMA PENGGUNA</th>
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
                    <a class="btn btn-danger delete" data-id="<?= $admin['admin_id'] ?>" role="button"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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
        <a class="btn btn-primary" href="<?= BASE_URL ?>/admin/add/" role="button"><i class="fas fa-plus"></i> Entry Admin</a>

      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<script type="text/javascript">
  $(document).ready(function() {

    // Delete 
    $('.delete').click(function() {
      var el = this;

      // Delete id
      var deleteid = $(this).data('id');
      bootbox.confirm({
        size: "small",
        message: "Anda yakin menghapus data ini?",
        callback: function(result) {
          /* result is a boolean; true = OK, false = Cancel*/

          // AJAX Request
          $.ajax({
            url: 'http://localhost/belajar_mvc/public/admin/delete/',
            type: 'POST',
            data: {
              id: deleteid
            },
            success: function(data) {

              // Remove row from HTML Table
              $(el).closest('tr').css('background', 'tomato');
              $(el).closest('tr').fadeOut(800, function() {
                $(this).remove();
              });

            }
          });
        }
        /* your callback code */
      })
    });

  });
</script>