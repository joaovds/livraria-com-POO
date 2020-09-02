<?php
include_once '../../Models/Autor.php';
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />

  <title>Administração de autores</title>
</head>

<body>
  <div class="container-fluid">

    <div class="row">
      <div class="col-12 bg-primary p-2">
        <h1 class="text-center text-light font-weight-bold">Administração de autores</h1>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-8 offset-md-2 border rounded shadow-sm p-3 mx-md-5 mx-md-auto">

        <?php
        $autor = new Autor();

        if ($_POST) {
          $nome = $_POST['nome'];
          $route = '../../../assets/imgs/autor/' . $_FILES['foto']['name'];

          if (move_uploaded_file($_FILES['foto']['tmp_name'], $route)) {
            $autor->setNome($nome);
            $autor->setNomeFoto($_FILES['foto']['name']);

            if ($autor->insert()) {
              echo "Cadastro feito com sucesso";
            } else {
              echo "Algum erro aconteceu";
            }
          }
        }
        ?>

        <form action="autor.php" method="post" enctype="multipart/form-data">

          <div class="form-row">
            <div class="form-group col-lg-6">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" name="nome" />
            </div>
            <div class="form-group col-md-6 col-sm-8">
              <label for="foto">Foto:</label>
              <input type="file" class="form-control-file" name="foto" />
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
              <td scope="col-4">Foto</td>
              <td scope="col-3">#</td>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
              <th>1</th>
              <td>Nome do autor</td>
              <td class="text-center">
                <img src="https://images.pexels.com/photos/3251706/pexels-photo-3251706.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" width="150px" class="rounded img-thumbnail">
              </td>
              <td class="d-flex justify-content-center align-items-baseline border-0">
                <a href="#">
                  <i class="fa fa-edit fa-2x text-info" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-trash fa-2x text-danger ml-5" aria-hidden="true"></i>
                </a>
              </td>
            </tr>
          </tbody>
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