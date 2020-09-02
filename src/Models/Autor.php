<?php

require_once 'Crud.php';

class Autor extends Crud
{
  protected $table = 'tb_autor';
  protected $cdName = 'cd_autor';
  private $nome;
  private $nomeFoto;

  public function getNome()
  {
    return $this->nome;
  }
  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getNomeFoto()
  {
    return $this->nomeFoto;
  }
  public function setNomeFoto($nomeFoto)
  {
    $this->nomeFoto = $nomeFoto;
  }

  public function insert()
  {
    $sql = "INSERT INTO $this->table VALUES (null, :nome, :nomeFoto)";
    $stmt = Connection::getInstance()->prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':nomeFoto', $this->nomeFoto);

    return $stmt->execute();
  }

  public function update($id)
  {
    $sql = "UPDATE $this->table SET nm_autor = :nome, nm_foto_autor = :nomeFoto WHERE cd_autor = :id";
    $stmt = Connection::getInstance()->prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':nomeFoto', $this->nomeFoto);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
  }

  public function deleteFotoAutor($name)
  {
    unlink('../../../assets/imgs/autor/' . $name);
  }
}
