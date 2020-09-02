<?php
include_once '../../Models/Categoria.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />

  <title>Administração de categorias</title>
</head>

<body>
  <div class="container-fluid">

    <div class="row">
      <div class="col-12 bg-primary p-2">
        <h1 class="text-center text-light font-weight-bold">Administração de categorias</h1>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-8 offset-md-2 border rounded shadow-sm p-3 mx-md-5 mx-md-auto">

        <?php
        $categoria = new Categoria();

        if ($_POST) {
          $nome = $_POST['nome'];
          $descricao = $_POST['descricao'];

          $categoria->setNome($nome);
          $categoria->setDescricao($descricao);

          if ($categoria->insert()) {
            echo "Cadastro feito com sucesso";
          } else {
            echo "Algum erro aconteceu";
          }
        }

        if (isset($_GET['delete'])) {
          $categoria->delete($_GET['delete']);
        }
        ?>

        <form action="categoria.php" method="post">

          <div class="form-row">
            <div class="form-group col-lg-6">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" name="nome" />
            </div>
            <div class="form-group col-lg-12">
              <label for="descricao">Descrição da categoria:</label>
              <textarea class="form-control" name="descricao" rows="3"></textarea>
            </div>
            <div class="form-group col-md-4 offset-md-4 col-sm-4 offset-sm-0 mt-4">
              <input type="submit" value="Cadastrar" class="btn btn-primary btn-block">
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-8 offset-lg-2 table-responsive border rounded shadow-sm p-3 mx-md-5 mx-lg-auto">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <td scope="col-1">Id</td>
              <td scope="col-4">Nome</td>
              <td scope="col-4">Descrição</td>
              <td scope="col-3">#</td>
            </tr>
          </thead>

          <?php foreach ($categoria->findAll() as $key => $value) : ?>

            <tbody>
              <tr scope="row">
                <th>
                  <?php echo $value['cd_categoria'] ?>
                </th>
                <td>
                  <?php echo $value['nm_categoria'] ?>
                </td>
                <td>
                  <?php echo $value['ds_categoria'] ?>
                </td>
                <td class="d-flex justify-content-center align-items-baseline border-0">
                  <a href="#">
                    <i class="fa fa-edit fa-2x text-info" aria-hidden="true"></i>
                  </a>
                  <a href="?delete=<?php echo $value['cd_categoria'] ?>">
                    <i class="fa fa-trash fa-2x text-danger ml-5" aria-hidden="true"></i>
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