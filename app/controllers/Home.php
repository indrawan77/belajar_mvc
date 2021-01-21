<?php

class Home extends Controller
{
  public function index($param1 = 'jembut')
  {
    $data['param1'] = $param1;
    $data['judul'] = 'INDEX';
    $this->view('templates/header', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }
}
