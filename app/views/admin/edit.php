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
          <div class="card-header">
            <h4><?= $data['sub_judul'] ?></h4>
          </div>
          <div class="card-body">

            <form action="<?= BASE_URL ?>/admin/edit/<?= $data['admin']['admin_id'] ?>" method="POST">
              <div class="col-lg-12 form-group row">
                <div class="col-lg-2">
                  <label fclass="control-label">Nama Pengguna<i style="color: red;">*</i></label>
                </div>
                <div class="col-lg-10">
                  <input type="text" name="admin_username" id="admin_username" class="form-control" placeholder="Nama Pengguna" required autocomplete="off" aria-describedby="invalidFeedback" value="<?= isset($_POST['admin_username']) ? $_POST['admin_username'] : $data['admin']['admin_username'] ?>">
                  <small id="invalidFeedback" class="text-danger"><?= $data['admin_usernameError'] ?></small>
                </div>
              </div>
              <div class="col-lg-12 form-group row">
                <div class="col-lg-2">
                  <label fclass="control-label">Kata Sandi<i style="color: red;">*</i></label>
                </div>
                <div class="col-lg-10">
                  <input type="password" name="admin_password" id="admin_password" class="form-control admin_password" placeholder="Kata Sandi (Kosongkan jika tidak merubah Kata Sandi)" autocomplete="off" aria-describedby="invalidFeedback" value="<?php echo isset($_POST['admin_password']) ? $_POST['admin_password'] : '' ?>">
                  <small id="invalidFeedback" class="text-danger"><?= $data['admin_passwordError'] ?></small>
                </div>
              </div>
              <div class="col-lg-12 form-group row">
                <div class="col-lg-2">
                  <label fclass="control-label">Konfirmasi Kata Sandi<i style="color: red;">*</i></label>
                </div>
                <div class="col-lg-10">
                  <input type="password" name="admin_password_confirmation" id="admin_password_confirmation" class="form-control admin_password_confirmation" placeholder="Konfirmasi Kata Sandi (Kosongkan jika tidak merubah Kata Sandi)" autocomplete="off" onkeyup="checkPasswordMatch()" aria-describedby="invalidFeedbackPass" value="<?php echo isset($_POST['admin_password_confirmation']) ? $_POST['admin_password_confirmation'] : '' ?>">
                  <small id="invalidFeedbackPass"><?= $data['admin_password_confirmationError'] ?></small>
                </div>
              </div>
              <div class="col-lg-12 form-group row">
                <div class="col-lg-2">
                  <label fclass="control-label">Nama<i style="color: red;">*</i></label>
                </div>
                <div class="col-lg-10">
                  <input type="text" name="admin_nama" id="admin_nama" class="form-control" placeholder="Nama" required autocomplete="off" aria-describedby="invalidFeedback" value="<?php echo isset($_POST['admin_nama']) ? $_POST['admin_nama'] : $data['admin']['admin_nama'] ?>">
                  <small id="invalidFeedback" class="text-danger"><?= $data['admin_namaError'] ?></small>
                </div>
              </div>
              <div class="col-lg-12 form-group row">
                <div class="col-lg-2">
                  <label fclass="control-label">Email</label>
                </div>
                <div class="col-lg-10">
                  <input type="email" name="admin_email" id="admin_email" class="form-control" placeholder="Email" autocomplete="off" aria-describedby="invalidFeedback" value="<?php echo isset($_POST['admin_email']) ? $_POST['admin_email'] : $data['admin']['admin_email'] ?>">
                  <small id="invalidFeedback" class="text-danger"><?= $data['admin_emailError'] ?></small>
                </div>
              </div>
              <div class="col-lg-12 form-group row">
                <div class="col-lg-2">
                  <label fclass="control-label">No. HP</label>
                </div>
                <div class="col-lg-10">
                  <input type="tel" maxlength="12" name="admin_hp" id="admin_hp" class="form-control admin_hp" placeholder="Nomor HP" autocomplete="off" aria-describedby="invalidFeedback" value="<?php echo isset($_POST['admin_hp']) ? $_POST['admin_hp'] : $data['admin']['admin_hp'] ?>">
                  <small id="invalidFeedback" class="text-danger"><?= $data['admin_hpError'] ?></small>
                </div>
              </div>
              <div class="form-group">
                <label class="sr-only" for="inputName"></label>
                <input type="hidden" class="form-control" name="admin_id" id="admin_id" value="<?= $data['admin']['admin_id'] ?>">
              </div>

          </div>
          <div class="card-footer text-muted text-right">

            <a class="btn btn-primary float-left" href="<?= BASE_URL ?>/admin/" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
            <button type="submit" class="btn btn-success float-right col-lg-3"><i class="fa fa-save" aria-hidden="true"></i> Ubah</button>

          </div>
          </form>
        </div>

      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<script type="text/javascript">
  $(document).ready(function() {

    $('.admin_hp').keydown(function(event) {
      // Allow special chars + arrows 
      if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 ||
        event.keyCode == 27 || event.keyCode == 13 ||
        (event.keyCode == 65 && event.ctrlKey === true) ||
        (event.keyCode >= 35 && event.keyCode <= 39)) {
        return;
      } else {
        // If it's not a number stop the keypress
        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
          event.preventDefault();
        }
      }
    });

  });

  function checkPasswordMatch() {
    var password = $(".admin_password").val();
    var confirmPassword = $(".admin_password_confirmation").val();

    if (password.length == 0)
      $("#invalidFeedbackPass").css("color", "red").html("Kata Sandi Harus Diisi!");
    else if (confirmPassword.length == 0)
      $("#invalidFeedbackPass").css("color", "red").html("Konfirmasi Kata Sandi Belum Diisi!");
    else if (password != confirmPassword)
      $("#invalidFeedbackPass").css("color", "red").html("Kata Sandi Belum Sama!");
    else
      $("#invalidFeedbackPass").css("color", "green").html("Kata Sandi Sudah Sama");
  }
</script>