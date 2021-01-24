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
}
