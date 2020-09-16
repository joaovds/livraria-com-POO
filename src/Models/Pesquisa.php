<?php

require_once 'Connection.php';

class Pesquisa extends Connection
{
  protected $connection;

  public function __construct()
  {
    $this->connection = new Connection();
  }

  public function findAll($itemASerPesquisado)
  {
    $sql = 'SELECT DISTINCT(l.cd_livro), l.nm_livro, l.ano_lancamento
      FROM tb_livro l, tb_editora e, tb_autor a
      WHERE nm_livro like CONCAT("%", :item, "%")
      OR 
          a.nm_autor like CONCAT("%", :item, "%")
      AND  l.id_autor = a.cd_autor
      OR
      e.nm_editora like CONCAT("%", :item, "%")
      AND  l.id_editora = e.cd_editora';
    $smtp = $this->connection->getInstance()->prepare($sql);
    $smtp->bindParam(':item', $itemASerPesquisado);
    $smtp->execute();

    return $smtp->fetchAll();
  }
}
