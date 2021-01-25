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
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE admin_deleted=:admin_deleted');
    $this->db->bind('admin_deleted', 0);
    return $this->db->resultSet();
  }

  public function getAdminById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE admin_id=:admin_id');
    $this->db->bind('admin_id', $id);
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
    $query = "INSERT INTO admin VALUES ('', :admin_username, :admin_nama, :admin_email, :admin_hp, :admin_password, '')";

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
    $query = "UPDATE admin SET admin_deleted=:admin_deleted WHERE admin_id=:admin_id";

    $this->db->query($query);
    $this->db->bind('admin_deleted', 1);
    $this->db->bind('admin_id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function editAdmin($data)
  {

    if (empty($data['admin_password']) && empty($data['admin_password_confirmation'])) {
      $query = "UPDATE admin SET 
    admin_username=:admin_username, 
    admin_nama=:admin_nama, 
    admin_email=:admin_email, 
    admin_hp=:admin_hp 
    WHERE admin_id=:admin_id";
    } else {
      $query = "UPDATE admin SET 
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
