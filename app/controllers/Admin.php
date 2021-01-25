<?php

class Admin extends Controller
{
  public function index()
  {
    $data['admin'] = $this->model('Admin_model')->getAllAdmin();
    $data['judul'] = 'List Admin';
    $this->view('templates/header', $data);
    $this->view('admin/index', $data);
    $this->view('templates/footer');
  }
  public function detail($id)
  {
    $data['admin'] = $this->model('Admin_model')->getAdminById($id);
    $data['judul'] = 'List Admin';
    $data['sub_judul'] = 'Detail Admin';
    $this->view('templates/header', $data);
    $this->view('admin/detail', $data);
    $this->view('templates/footer');
  }
  public function add()
  {

    $data = [
      'admin_username' => '',
      'admin_password' => '',
      'admin_password_confirmation' => '',
      'admin_nama' => '',
      'admin_email' => '',
      'admin_hp' => '',
      'admin_usernameError' => '',
      'admin_passwordError' => '',
      'admin_password_confirmationError' => '',
      'admin_namaError' => '',
      'admin_emailError' => '',
      'admin_hpError' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // filter post data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'admin_username' => trim($_POST['admin_username']),
        'admin_password' => trim($_POST['admin_password']),
        'admin_password_confirmation' => trim($_POST['admin_password_confirmation']),
        'admin_nama' => trim($_POST['admin_nama']),
        'admin_email' => trim($_POST['admin_email']),
        'admin_hp' => trim($_POST['admin_hp']),
        'admin_usernameError' => '',
        'admin_passwordError' => '',
        'admin_password_confirmationError' => '',
        'admin_namaError' => '',
        'admin_emailError' => '',
        'admin_hpError' => ''
      ];

      $usernameValidation = "/^[a-zA-Z0-9]*$/";
      $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)*$/i";
      $nohpValidation = "/^[-+]?[0-9]+$/";

      //validate username
      if (empty($data['admin_username'])) {
        $data['admin_usernameError'] = 'Nama pengguna belum dimasukan';
      } elseif (!preg_match($usernameValidation, $data['admin_username'])) {
        $data['admin_usernameError'] = 'Nama pengguna hanya boleh huruf dan angka';
      } else {
        if ($this->model('Admin_model')->getAdminByUsername($data['admin_username'])) {
          $data['admin_usernameError'] = 'Nama pengguna sudah digunakan';
        }
      }

      //validate password
      if (empty($data['admin_password'])) {
        $data['admin_passwordError'] = 'Kata sandi belum dimasukan';
      } elseif (strlen($data['admin_password']) < 6) {
        $data['admin_passwordError'] = 'Kata sandi kurang dari 6 karater';
      } elseif (!preg_match($passwordValidation, $data['admin_password'])) {
        $data['admin_passwordError'] = 'Kata sandi harus gabungan angka dan huruf';
      }

      //validate password confirmasi
      if (empty($data['admin_password_confirmation'])) {
        $data['admin_password_confirmationError'] = 'Konfirmasi kata sandi belum dimasukan';
      } else {
        if ($data['admin_password'] != $data['admin_password_confirmation']) {
          $data['admin_password_confirmationError'] = 'Kata sandi tidak sesuai';
        }
      }

      //validate nama
      if (empty($data['admin_nama'])) {
        $data['admin_namaError'] = 'Nama belum dimasukan';
      }

      //validate email
      if (!empty($data['admin_email'])) {
        if (!filter_var($data['admin_email'], FILTER_VALIDATE_EMAIL)) {
          $data['admin_emailError'] = 'Format email salah';
        }
      }

      //validasi hp
      if (!empty($data['admin_hp'])) {
        if (!preg_match($nohpValidation, $data['admin_hp'])) {
          $data['admin_hpError'] = 'Format no hp salah';
        }
      }

      if (empty($data['admin_usernameError']) && empty($data['admin_passwordError']) && empty($data['admin_password_confirmationError']) && empty($data['admin_namaError']) && empty($data['admin_emailError']) && empty($data['admin_hpError'])) {

        $data['admin_password'] = password_hash($data['admin_password'], PASSWORD_DEFAULT);

        if ($this->model('Admin_model')->addAdmin($data) > 0) {
          Flasher::setFlash('berhasil', 'ditambahkan', 'success');
          header('Location: ' . BASE_URL . '/admin');
          exit;
        } else {
          Flasher::setFlash('gagal', 'ditambahkan', 'danger');
          header('Location: ' . BASE_URL . '/admin');
          exit;
        }
      }
    }

    $data['judul'] = 'List Admin';
    $data['sub_judul'] = 'Entry Admin';
    $this->view('templates/header', $data);
    $this->view('admin/add', $data);
    $this->view('templates/footer');
  }

  public function delete()
  {
    if ($this->model('Admin_model')->deleteAdmin($_POST['id']) > 0) {
      //   Flasher::setFlash('berhasil', 'dihapus', 'success');
      //   header('Location: ' . BASE_URL . '/admin');
      //   exit;
      // } else {
      //   Flasher::setFlash('gagal', 'dihapus', 'danger');
      //   header('Location: ' . BASE_URL . '/admin');
      //   exit;
    }
  }

  public function edit($id)
  {
    $data = [
      'admin_id' => '',
      'admin_username' => '',
      'admin_password' => '',
      'admin_password_confirmation' => '',
      'admin_nama' => '',
      'admin_email' => '',
      'admin_hp' => '',
      'admin_usernameError' => '',
      'admin_passwordError' => '',
      'admin_password_confirmationError' => '',
      'admin_namaError' => '',
      'admin_emailError' => '',
      'admin_hpError' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // filter post data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'admin_id' => trim($_POST['admin_id']),
        'admin_username' => trim($_POST['admin_username']),
        'admin_password' => trim($_POST['admin_password']),
        'admin_password_confirmation' => trim($_POST['admin_password_confirmation']),
        'admin_nama' => trim($_POST['admin_nama']),
        'admin_email' => trim($_POST['admin_email']),
        'admin_hp' => trim($_POST['admin_hp']),
        'admin_usernameError' => '',
        'admin_passwordError' => '',
        'admin_password_confirmationError' => '',
        'admin_namaError' => '',
        'admin_emailError' => '',
        'admin_hpError' => ''
      ];

      $usernameValidation = "/^[a-zA-Z0-9]*$/";
      $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)*$/i";
      $nohpValidation = "/^[-+]?[0-9]+$/";

      //validate username
      if (empty($data['admin_username'])) {
        $data['admin_usernameError'] = 'Nama pengguna belum dimasukan';
      } elseif (!preg_match($usernameValidation, $data['admin_username'])) {
        $data['admin_usernameError'] = 'Nama pengguna hanya boleh huruf dan angka';
      }

      //validate password
      if (!empty($data['admin_password'])) {
        if (strlen($data['admin_password']) < 6) {
          $data['admin_passwordError'] = 'Kata sandi kurang dari 6 karater';
        } elseif (!preg_match($passwordValidation, $data['admin_password'])) {
          $data['admin_passwordError'] = 'Kata sandi harus gabungan angka dan huruf';
        }
      }

      //validate password confirmasi
      if (!empty($data['admin_password_confirmation'])) {
        if ($data['admin_password'] != $data['admin_password_confirmation']) {
          $data['admin_password_confirmationError'] = 'Kata sandi tidak sesuai';
        }
      }

      //validate nama
      if (empty($data['admin_nama'])) {
        $data['admin_namaError'] = 'Nama belum dimasukan';
      }

      //validate email
      if (!empty($data['admin_email'])) {
        if (!filter_var($data['admin_email'], FILTER_VALIDATE_EMAIL)) {
          $data['admin_emailError'] = 'Format email salah';
        }
      }

      //validasi hp
      if (!empty($data['admin_hp'])) {
        if (!preg_match($nohpValidation, $data['admin_hp'])) {
          $data['admin_hpError'] = 'Format no hp salah';
        }
      }

      if (empty($data['admin_usernameError']) && empty($data['admin_passwordError']) && empty($data['admin_password_confirmationError']) && empty($data['admin_namaError']) && empty($data['admin_emailError']) && empty($data['admin_hpError'])) {

        $data['admin_password'] = password_hash($data['admin_password'], PASSWORD_DEFAULT);

        if ($this->model('Admin_model')->editAdmin($data) > 0) {
          Flasher::setFlash('berhasil', 'diubah', 'success');
          header('Location: ' . BASE_URL . '/admin');
          exit;
        } else {
          Flasher::setFlash('gagal', 'diubah', 'danger');
          header('Location: ' . BASE_URL . '/admin');
          exit;
        }
      }
    }

    if (empty($id)) {
      $id = $data['admin_id'];
    }

    $data['admin'] = $this->model('Admin_model')->getAdminById($id);
    $data['judul'] = 'List Admin';
    $data['sub_judul'] = 'Ubah Admin';
    $this->view('templates/header', $data);
    $this->view('admin/edit', $data);
    $this->view('templates/footer');
  }
}
