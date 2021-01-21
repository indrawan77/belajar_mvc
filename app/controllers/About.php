<?php

class About extends Controller
{
  public function index($param1 = 'pepek', $param2 = 'memeg')
  {
    $data['param1'] = $param1;
    $data['param2'] = $param2;
    $data['judul'] = 'INDEX';
    $this->view('templates/header', $data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }
  public function page()
  {
    $data['judul'] = 'PAGE';
    $this->view('templates/header', $data);
    $this->view('about/page');
    $this->view('templates/footer');
  }
}
