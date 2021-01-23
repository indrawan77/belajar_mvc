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
  public function page()
  {
    $data['judul'] = 'PAGE';
    $this->view('templates/header', $data);
    $this->view('admin/page');
    $this->view('templates/footer');
  }
}
