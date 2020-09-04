<?php

require_once '../../Models/Livro.php';

if (isset($_GET['livro'])) :
?>

  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Galeria de livros</title>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 bg-primary p-2">
          <h1 class="text-center text-light font-weight-bold">Galeria de livros</h1>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-8 offset-md-2 border rounded shadow-sm p-3 mx-md-5 mx-md-auto">

          <?php
          $livro = new Livro();

          if ($_POST) {
            $route = '../../../assets/imgs/livro/' . $_FILES['foto']['name'];

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $route)) {
              $livro->insertFotoLivro($_FILES['foto']['name'], $_GET['livro']);
            } else {
              echo "Falha ao fazer upload da imagem";
            }
          }
          ?>

          <form action="galeria.php?livro=<?php echo $_GET['livro']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-12">
                <label for="foto">Cadastrar Foto do livro:</label>
                <input type="file" class="form-control-file" name="foto" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4 offset-md-4 col-sm-4 offset-sm-0 mt-4">
                <input type="submit" name="enviar" value="Enviar" class="btn btn-primary btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>

  </html>

<?php endif ?>