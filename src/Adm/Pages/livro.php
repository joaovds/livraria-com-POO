<?php
require_once '../../Models/Livro.php';
require_once '../../Models/Categoria.php';
require_once '../../Models/Autor.php';
require_once '../../Models/Editora.php';

$categoriaC = new Categoria();
$autorC = new Autor();
$editoraC = new Editora();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />

  <title>Administração de livros</title>
</head>

<body>
  <div class="container-fluid">

    <div class="row">
      <div class="col-12 bg-primary p-2">
        <h1 class="text-center text-light font-weight-bold">Administração de livros</h1>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-8 offset-md-2 border rounded shadow-sm p-3 mx-md-5 mx-md-auto">

        <?php
        $livro = new Livro();

        if ($_POST) {
          $nome = $_POST['nome'];
          $idioma = $_POST['idioma'];
          $isbn = $_POST['isbn'];
          $ano = $_POST['ano'];
          $altura = $_POST['altura'];
          $largura = $_POST['largura'];
          $profundidade = $_POST['profundidade'];
          $peso = $_POST['peso'];
          $paginas = $_POST['paginas'];
          $exemplares = $_POST['exemplares'];
          $valor = $_POST['valor'];
          $editora = $_POST['editora'];
          $autor = $_POST['autor'];
          $categorias = $_POST['categorias'];

          $livro->setNome($nome);
          $livro->setIdioma($idioma);
          $livro->setIsbn($isbn);
          $livro->setAnoLancamento($ano);
          $livro->setAltura($altura);
          $livro->setLargura($largura);
          $livro->setProfundidade($profundidade);
          $livro->setPeso($peso);
          $livro->setNumeroPaginas($paginas);
          $livro->setNumeroExemplares($exemplares);
          $livro->setValor($valor);
          $livro->setIdEditora($editora);
          $livro->setIdAutor($autor);

          if ($livro->insert()) {
            $livro->insertLivroCategoria($categorias);
            echo "Cadastro feito com sucesso";
          } else {
            echo "Algum erro aconteceu";
          }
        }

        if (isset($_GET['delete'])) {
          if ($livro->deleteLivroCategoria($_GET['delete'])) {
            try {
              $livro->delete($_GET['delete']);
              header('Location: livro.php');
            } catch (\Throwable $th) {
              throw $th;
            }
          }
        }
        ?>

        <form action="livro.php" method="post">

          <div class="form-row">
            <div class="form-group col-lg-6">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" name="nome" />
            </div>

            <div class="form-group col-lg-6">
              <label class="idioma" for="idioma">Idioma</label>
              <select class="custom-select" name="idioma">
                <option value="ingles" selected>Inglês</option>
                <option value="portugues">Português</option>
                <option value="espanhol">Espanhol</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-lg-6">
              <label for="isbn">ISBN:</label>
              <input type="text" name="isbn" class="form-control">
            </div>

            <div class="form-group col-lg-6">
              <label for="ano">Ano de Lançamento:</label>
              <input type="number" name="ano" class="form-control">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-lg-4 col-sm-6">
              <label for="altura">Altura (cm):</label>
              <input type="number" name="altura" class="form-control">
            </div>

            <div class="form-group col-lg-4 col-sm-6">
              <label for="largura">Largura (cm):</label>
              <input type="number" name="largura" class="form-control">
            </div>

            <div class="form-group col-lg-4 col-sm-6">
              <label for="profundidade">Profundidade (cm):</label>
              <input type="number" name="profundidade" class="form-control">
            </div>

            <div class="form-group col-lg-4 col-sm-6">
              <label for="peso">Peso (kg):</label>
              <input type="number" name="peso" step="0.01" class="form-control">
            </div>

            <div class="form-group col-lg-4 col-sm-6">
              <label for="paginas">Número de Páginas:</label>
              <input type="number" name="paginas" class="form-control">
            </div>

            <div class="form-group col-lg-4 col-sm-6">
              <label for="exemplares">Quantidade de Exemplares:</label>
              <input type="number" name="exemplares" class="form-control">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-lg-4 col-sm-6">
              <label for="valor">Valor:</label>
              <input type="number" name="valor" step="0.01" class="form-control">
            </div>

            <div class="form-group col-lg-4 col-sm-6">
              <label for="editora">Editora:</label>
              <select class="custom-select" name="editora">

                <?php foreach ($editoraC->findAll() as $key => $value) : ?>

                  <option value="<?php echo $value['cd_editora'] ?>">
                    <?php echo $value['nm_editora'] ?>
                  </option>

                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group col-lg-4 col-sm-6">
              <label for="autor">Autor:</label>
              <select class="custom-select" name="autor">

                <?php foreach ($autorC->findAll() as $key => $value) : ?>

                  <option value="<?php echo $value['cd_autor'] ?>">
                    <?php echo $value['nm_autor'] ?>
                  </option>

                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group col-12">
              <label class="col-12">Categorias:</label>

              <?php foreach ($categoriaC->findAll() as $key => $value) : ?>

                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="categorias[]" value="<?php echo $value['cd_categoria'] ?>">
                  <label class="form-check-label" for="categoria">
                    <?php echo $value['nm_categoria'] ?>
                  </label>
                </div>

              <?php endforeach ?>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4 offset-md-4 col-sm-4 offset-sm-0 mt-4">
              <input type="submit" value="Cadastrar" class="btn btn-primary btn-block">
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-10 offset-lg-1 table-responsive border rounded shadow-sm p-4 mx-md-5 mx-lg-auto">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <td scope="col">Id</td>
              <td scope="col">Nome</td>
              <td scope="col">Qt. Exemplares</td>
              <td scope="col">Valor</td>
              <td scope="col">#</td>
            </tr>
          </thead>

          <?php foreach ($livro->findAll() as $key => $value) : ?>

            <tbody>
              <tr scope="row">
                <th>
                  <?php echo $value['cd_livro'] ?>
                </th>
                <td>
                  <?php echo $value['nm_livro'] ?>
                </td>
                <td>
                  <?php echo $value['n_exemplares'] ?>
                </td>
                <td>
                  <strong>R$ <?php echo $value['vl_livro'] ?></strong>
                </td>
                <td class="border-0 d-md-flex justify-content-around">
                  <a href="#" class="text-info">
                    Editar
                  </a>
                  <a href="galeria.php?livro=<?php echo $value['cd_livro'] ?>" class="text-info">
                    Galeria
                  </a>
                  <a href="?delete=<?php echo $value['cd_livro'] ?>" class="text-danger">
                    Excluir
                  </a>
                </td>
              </tr>
            </tbody>

          <?php endforeach ?>
        </table>
      </div>
    </div>

  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>