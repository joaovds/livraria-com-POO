<?php

require_once 'Crud.php';

class Livro extends Crud
{
  protected $table = 'tb_livro';
  protected $cdName = 'cd_livro';
  private $nome;
  private $idioma;
  private $isbn;
  private $anoLancamento;
  private $altura;
  private $largura;
  private $profundidade;
  private $peso;
  private $numeroPaginas;
  private $numeroExemplares;
  private $valor;
  private $idEditora;
  private $idAutor;

  public function getNome()
  {
    return $this->nome;
  }
  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getIdioma()
  {
    return $this->idioma;
  }
  public function setIdioma($idioma)
  {
    $this->idioma = $idioma;
  }

  public function getIsbn()
  {
    return $this->isbn;
  }
  public function setIsbn($isbn)
  {
    $this->isbn = $isbn;
  }

  public function getAnoLancamento()
  {
    return $this->anoLancamento;
  }
  public function setAnoLancamento($anoLancamento)
  {
    $this->anoLancamento = $anoLancamento;
  }

  public function getAltura()
  {
    return $this->altura;
  }
  public function setAltura($altura)
  {
    $this->altura = $altura;
  }

  public function getLargura()
  {
    return $this->largura;
  }
  public function setLargura($largura)
  {
    $this->largura = $largura;
  }

  public function getProfundidade()
  {
    return $this->profundidade;
  }
  public function setProfundidade($profundidade)
  {
    $this->profundidade = $profundidade;
  }

  public function getPeso()
  {
    return $this->peso;
  }
  public function setPeso($peso)
  {
    $this->peso = $peso;
  }

  public function getNumeroPaginas()
  {
    return $this->numeroPaginas;
  }
  public function setNumeroPaginas($numeroPaginas)
  {
    $this->numeroPaginas = $numeroPaginas;
  }

  public function getNumeroExemplares()
  {
    return $this->numeroExemplares;
  }
  public function setNumeroExemplares($numeroExemplares)
  {
    $this->numeroExemplares = $numeroExemplares;
  }

  public function getValor()
  {
    return $this->valor;
  }
  public function setValor($valor)
  {
    $this->valor = $valor;
  }

  public function getIdEditora()
  {
    return $this->idEditora;
  }
  public function setIdEditora($idEditora)
  {
    $this->idEditora = $idEditora;
  }

  public function getIdAutor()
  {
    return $this->idAutor;
  }
  public function setIdAutor($idAutor)
  {
    $this->idAutor = $idAutor;
  }

  public function insert()
  {
    try {
      $sql = "INSERT INTO $this->table VALUES (
        null,
        :nome,
        :idioma,
        :isbn,
        :anoLancamento,
        :altura,
        :largura,
        :profundidade,
        :peso,
        :numeroPaginas,
        :numeroExemplares,
        :valorLivro,
        :idEditora,
        :idAutor
      )";
      $stmt = Connection::getInstance()->prepare($sql);
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':idioma', $this->idioma);
      $stmt->bindParam(':isbn', $this->isbn);
      $stmt->bindParam(':anoLancamento', $this->anoLancamento);
      $stmt->bindParam(':altura', $this->altura);
      $stmt->bindParam(':largura', $this->largura);
      $stmt->bindParam(':profundidade', $this->profundidade);
      $stmt->bindParam(':peso', $this->peso);
      $stmt->bindParam(':numeroPaginas', $this->numeroPaginas);
      $stmt->bindParam(':numeroExemplares', $this->numeroExemplares);
      $stmt->bindParam(':valorLivro', $this->valor);
      $stmt->bindParam(':idEditora', $this->idEditora, PDO::PARAM_INT);
      $stmt->bindParam(':idAutor', $this->idAutor, PDO::PARAM_INT);

      return $stmt->execute();
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function insertLivroCategoria($categorias)
  {
    $total = sizeof($categorias);
    $id = Connection::getInstance()->lastInsertId();

    $sql = "INSERT INTO tb_livro_categoria VALUES ";
    for ($i = 0; $i < $total; $i++) {
      $sql .= "($categorias[$i], $id),";
    }
    $sql = substr($sql, 0, -1);

    $stmt = Connection::getInstance()->prepare($sql);
    return $stmt->execute();
  }

  public function insertFotoLivro($nomeFotoLivro, $idLivro)
  {
    $sql = "INSERT INTO tb_foto VALUES (null, :nmFoto, :idLivro)";
    $stmt = Connection::getInstance()->prepare($sql);
    $stmt->bindParam(':nmFoto', $nomeFotoLivro);
    $stmt->bindParam(':idLivro', $idLivro);

    return $stmt->execute();
  }

  public function update($id)
  {
    $sql = "UPDATE $this->table SET
      nm_livro = :nome,
      idioma_livro = :idioma,
      isbn_livro = :isbn,
      ano_lancamento = :anoLancamento,
      altura_livro = :altura,
      largura_livro = :largura,
      profundidade_livro = :profundidade,
      peso_livro = :peso,
      n_pagina = :numeroPaginas,
      n_exemplares = :numeroExemplares,
      vl_livro = :valorLivro,
      id_editora = :idEditora,
      id_autor = :idAutor
      WHERE cd_livro = :id
    ";
    $stmt = Connection::getInstance()->prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':idioma', $this->idioma);
    $stmt->bindParam(':isbn', $this->isbn);
    $stmt->bindParam(':anoLancamento', $this->anoLancamento);
    $stmt->bindParam(':altura', $this->altura);
    $stmt->bindParam(':largura', $this->largura);
    $stmt->bindParam(':profundidade', $this->profundidade);
    $stmt->bindParam(':peso', $this->peso);
    $stmt->bindParam(':numeroPaginas', $this->numeroPaginas);
    $stmt->bindParam(':numeroExemplares', $this->numeroExemplares);
    $stmt->bindParam(':valorLivro', $this->valor);
    $stmt->bindParam(':idEditora', $this->idEditora);
    $stmt->bindParam(':idAutor', $this->idAutor);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
  }

  public function deleteLivroCategoria($id)
  {
    $sql = "DELETE FROM tb_livro_categoria WHERE id_livro = :id";
    $stmt = Connection::getInstance()->prepare($sql);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
  }

  public function paginacao($inicio, $qtRegistros)
  {
    $sql = "SELECT * FROM $this->table LIMIT " . $inicio . ", " . $qtRegistros;
    $stmt = Connection::getInstance()->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
