<?php

class Admin_model
{
  private $table = 'admin';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllAdmin()
  {
    $this->db->query('SELECT * FROM' . $this->table);
    return $this->db->resultSet();
  }
}
