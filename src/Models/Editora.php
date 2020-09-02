<?php

require_once 'Crud.php';

class Editora extends Crud
{
  protected $table = 'tb_editora';
  protected $cdName = 'cd_editora';
  private $nome;
  private $nomeLogo;

  public function getNome()
  {
    return $this->nome;
  }
  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getNomeLogo()
  {
    return $this->nomeLogo;
  }
  public function setNomeLogo($nomeLogo)
  {
    $this->nomeLogo = $nomeLogo;
  }

  public function insert()
  {
    $sql = "INSERT INTO $this->table VALUES (null, :nome, :nomeLogo)";
    $stmt = Connection::getInstance()->prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':nomeLogo', $this->nomeLogo);

    return $stmt->execute();
  }

  public function update($id)
  {
    $sql = "UPDATE $this->table SET nm_editora = :nome, nm_logo_editora = :nomeLogo WHERE cd_editora = :id";
    $stmt = Connection::getInstance()->prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':nomeLogo', $this->nomeLogo);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
  }

  public function deleteLogoEditora($nome)
  {
    unlink('../../../assets/imgs/editora/' . $nome);
  }
}
