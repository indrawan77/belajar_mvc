<?php

class Admin_model
{
  private $table = 'admin';
  private $db;
  private $pagination;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllAdmin()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE admin_deleted=:admin_deleted');
    $this->db->bind('admin_deleted', 0);

    $this->db->execute();

    return $this->db->resultSet();
  }

  public function countAllAdmin()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE admin_deleted=:admin_deleted');
    $this->db->bind('admin_deleted', 0);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getAllAdminx($data)
  {
    // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE admin_deleted=:admin_deleted LIMIT ' . $data['offset'] . ', ' . $data['limit'] . '');
    $query = 'SELECT * FROM ' . $this->table . ' WHERE admin_deleted=:admin_deleted LIMIT :awalData, :jumlahDataPerHalaman';
    $this->db->query($query);
    $this->db->bind('admin_deleted', 0);
    $this->db->bind('awalData', $data['offset']);
    $this->db->bind('jumlahDataPerHalaman', $data['limit']);

    $this->db->execute();

    return $this->db->resultSet();
  }

  public function getAdminById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE admin_id=:admin_id');
    $this->db->bind('admin_id', $id);

    $this->db->execute();

    return $this->db->single();
  }

  public function getAdminByUsername($username)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE admin_username=:admin_username');
    $this->db->bind('admin_username', $username);

    $this->db->execute();

    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function addAdmin($data)
  {
    $query = "INSERT INTO ' . $this->table . ' VALUES ('', :admin_username, :admin_nama, :admin_email, :admin_hp, :admin_password, '')";

    $this->db->query($query);
    $this->db->bind('admin_username', $data['admin_username']);
    $this->db->bind('admin_nama', $data['admin_nama']);
    $this->db->bind('admin_email', $data['admin_email']);
    $this->db->bind('admin_hp', $data['admin_hp']);
    $this->db->bind('admin_password', $data['admin_password']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function deleteAdmin($id)
  {
    $query = "UPDATE ' . $this->table . ' SET admin_deleted=:admin_deleted WHERE admin_id=:admin_id";

    $this->db->query($query);
    $this->db->bind('admin_deleted', 1);
    $this->db->bind('admin_id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function editAdmin($data)
  {

    if (empty($data['admin_password']) && empty($data['admin_password_confirmation'])) {
      $query = "UPDATE ' . $this->table . ' SET 
    admin_username=:admin_username, 
    admin_nama=:admin_nama, 
    admin_email=:admin_email, 
    admin_hp=:admin_hp 
    WHERE admin_id=:admin_id";
    } else {
      $query = "UPDATE ' . $this->table . ' SET 
    admin_username=:admin_username, 
    admin_nama=:admin_nama, 
    admin_email=:admin_email, 
    admin_hp=:admin_hp,
    admin_password=:admin_password 
    WHERE admin_id=:admin_id";
    }


    $this->db->query($query);
    $this->db->bind('admin_username', $data['admin_username']);
    $this->db->bind('admin_nama', $data['admin_nama']);
    $this->db->bind('admin_email', $data['admin_email']);
    $this->db->bind('admin_hp', $data['admin_hp']);
    $this->db->bind('admin_password', $data['admin_password']);
    $this->db->bind('admin_id', $data['admin_id']);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
