<?php

require_once 'Crud.php';

class Categoria extends Crud
{
  protected $table = 'tb_categoria';
  protected $cdName = 'cd_categoria';
  private $nome;
  private $descricao;

  public function getNome()
  {
    return $this->nome;
  }
  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }
  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
  }

  public function insert()
  {
    $sql = "INSERT INTO $this->table VALUES (null, :nome, :descricao)";
    $stmt = Connection::getInstance()->prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':descricao', $this->descricao);

    return $stmt->execute();
  }

  public function update($id)
  {
    $sql = "UPDATE $this->table SET nm_categoria = :nome, ds_categoria = :descricao WHERE cd_categoria = :id";
    $stmt = Connection::getInstance()->prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':descricao', $this->descricao);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
  }
}
