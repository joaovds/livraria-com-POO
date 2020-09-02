<?php

require_once 'Connection.php';

abstract class Crud extends Connection
{
  protected $table;
  protected $cdName;
  protected $connection;

  abstract public function insert();
  abstract public function update($id);

  public function __construct()
  {
    $this->connection = new Connection();
  }

  public function find($id)
  {
    $sql = "SELECT * FROM $this->table WHERE $this->cdName = :id";
    $stmt = $this->connection->getInstance()->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function findAll()
  {
    $sql = "SELECT * FROM $this->table";
    $stmt = $this->connection->getInstance()->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
  }

  public function delete($id)
  {
    $sql = "DELETE FROM $this->table WHERE $this->cdName = :id";
    $stmt = $this->connection->getInstance()->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) : return true;
    else : echo "Este dado não pode ser deletado...ele pode estar vinculado a outra consulta!";
    endif;
  }
}
