<?php
include_once './src/Models/Categoria.php';
include_once './src/Models/Autor.php';
include_once './src/Models/Livro.php';

$categoria = new Categoria();
$categorias = $categoria->findAll();

$autor = new Autor();
$autores = $autor->findAll();

$livro = new Livro();
$livros = $livro->findAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Livraria Bom Saber" />
  <meta name="keywords" content="Bom Saber, livraria" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />

  <title>Home | Livraria Bom Saber</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="./index.html">
        <img src="./assets/logo.png" alt="logo" width="120px" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse ml-5" id="navbarContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              <i class="fa fa-home"></i>
              Home
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-tag"></i>
              Categorias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

              <?php
              for ($i = 0; $i < 10; $i++) :
              ?>
                <a class="dropdown-item" href="#">
                  <?php echo $categorias[$i]['nm_categoria']; ?>
                </a>
              <?php endfor ?>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./pages/carrinho.html">
              <i class="fa fa-shopping-cart"></i>
              Carrinho
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i>
              Entrar
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Login</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Criar Conta</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-0 my-lg-0">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Procurar produtos" aria-label="search Products" aria-describedby="textAcervo" />
            <div class="input-group-prepend">
              <button class="btn btn-outline-primary rounded-right" type="button" id="textAcervo">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>

  <div class="container-fluid mb-5">
    <div class="row" style="
          background-image: url(./assets/breadcrumb.jpg);
          background-repeat: no-repeat;
        ">
      <div class="col-md-12 p-5 text-center">
        <h1 class="text-light">Livraria Bom Saber</h1>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h4 class="ml-3"><b>Categorias</b></h4>

        <ul class="list-group shadow-sm">

          <?php for ($i = 0; $i < 5; $i++) : ?>
            <li class="list-group-item">
              <?php echo $categorias[$i]['nm_categoria']; ?>
            </li>
          <?php endfor ?>

        </ul>

        <h4 class="ml-3 mt-5 mb-3 border-bottom"><b>Preço</b></h4>

        <input type="range" class="custom-range mt-2" min="0" max="500" id="customRange2" />
        <small class="form-text text-success text-center">R$10 - R$100</small>
      </div>

      <div class="col-12 col-md-9 col-sm-12">
        <h2 class="border-bottom text-center text-md-left">
          <b>Ofertas</b>
        </h2>

        <div class="ofertas d-sm-block d-md-flex ml-0">

          <?php
          $qtRegistros = "3";

          $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : "1";

          $inicio = ($pagina * $qtRegistros) - $qtRegistros;

          $livrosPag = $livro->paginacao($inicio, $qtRegistros);

          foreach ($livrosPag as $key => $value) :
          ?>
            <div class="card bg-white shadow ml-md-1 mt-2 mx-auto" style="width: 18rem;">
              <?php $nomeFoto = $livro->listarFotosLivro($value['cd_livro']); ?>
              <img src="./assets/imgs/livro/<?php echo $nomeFoto[0]['nm_foto'] ?>" alt="box sda" class="card-img-top" />
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $value['nm_livro']; ?>
                </h5>
                <b class="d-flex">
                  R$ <?php echo $value['vl_livro']; ?>
                  <small class="form-text text-muted ml-2"><del>R$160,00</del></small>
                </b>
                <a href="#" class="btn btn-outline-primary btn-block">Detalhes</a>
              </div>
            </div>

          <?php endforeach ?>
        </div>

        <nav aria-label="offers navigation">
          <ul class="pagination justify-content-center mt-2">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-3 mt-5">
        <h4 class="ml-3 mt-3 mb-3 border-bottom text-md-left text-center">
          <b>Autores em alta</b>
        </h4>

        <table class="table shadow">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
            </tr>
          </thead>
          <tbody>

            <?php for ($i = 0; $i < 10; $i++) : ?>
              <tr>
                <th scope="row">
                  <?php echo $i + 1 ?>
                </th>
                <td>
                  <?php echo $autores[$i]['nm_autor'] ?>
                </td>
              </tr>
            <?php endfor ?>

          </tbody>
        </table>
      </div>

      <div class="col-md-12 col-lg-9 col-sm-12">
        <h2 class="border-bottom text-md-left text-center">
          <b>Mais vendidos</b>
        </h2>

        <div class="bestSellers row">
          <div class="col-12 d-md-flex">
            <div class="card bg-white shadow ml-md-1 mt-2 mt-md-0 mx-auto" style="width: 18rem;">
              <img src="./assets/imgs/offers/contosInacabados.jpg" alt="contos inacabados" class="card-img-top" />
              <div class="card-body">
                <h5 class="card-title">
                  Contos Inacabados
                </h5>
                <b class="d-flex">
                  R$70,00
                </b>
                <a href="#" class="btn btn-outline-primary btn-block mt-1">Detalhes</a>
              </div>
            </div>
            <div class="card bg-white shadow ml-md-1 mt-2 mt-md-0 mx-auto" style="width: 18rem;">
              <img src="./assets/imgs/offers/boxSDA.jpg" alt="box sda" class="card-img-top" />
              <div class="card-body">
                <h5 class="card-title">
                  Box Senhor dos Anéis
                </h5>
                <b class="d-flex">
                  R$120,00
                </b>
                <a href="#" class="btn btn-outline-primary btn-block mt-1">Detalhes</a>
              </div>
            </div>
            <div class="card bg-white shadow ml-md-1 mt-2 mt-md-0 mx-auto" style="width: 18rem;">
              <img src="./assets/imgs/offers/contosInacabados.jpg" alt="contos inacabados" class="card-img-top" />
              <div class="card-body">
                <h5 class="card-title">
                  Contos Inacabados
                </h5>
                <b class="d-flex">
                  R$70,00
                </b>
                <a href="#" class="btn btn-outline-primary btn-block mt-1">Detalhes</a>
              </div>
            </div>
          </div>

          <div class="col-12 d-md-flex mt-2">
            <div class="card bg-white shadow ml-md-1 mt-2 mt-md-0 mx-auto" style="width: 18rem;">
              <img src="./assets/imgs/offers/boxSDA.jpg" alt="box sda" class="card-img-top" />
              <div class="card-body">
                <h5 class="card-title">
                  Box Senhor dos Anéis
                </h5>
                <b class="d-flex">
                  R$120,00
                </b>
                <a href="#" class="btn btn-outline-primary btn-block mt-1">Detalhes</a>
              </div>
            </div>
            <div class="card bg-white shadow ml-md-1 mt-2 mt-md-0 mx-auto" style="width: 18rem;">
              <img src="./assets/imgs/offers/contosInacabados.jpg" alt="contos inacabados" class="card-img-top" />
              <div class="card-body">
                <h5 class="card-title">
                  Contos Inacabados
                </h5>
                <b class="d-flex">
                  R$55,00
                </b>
                <a href="#" class="btn btn-outline-primary btn-block mt-1">Detalhes</a>
              </div>
            </div>
            <div class="card bg-white shadow ml-md-1 mt-2 mt-md-0 mx-auto" style="width: 18rem;">
              <img src="./assets/imgs/offers/boxSDA.jpg" alt="box sda" class="card-img-top" />
              <div class="card-body">
                <h5 class="card-title">
                  Box Senhor dos Anéis
                </h5>
                <b class="d-flex">
                  R$120,00
                </b>
                <a href="#" class="btn btn-outline-primary btn-block mt-1">Detalhes</a>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-3 text-center">
          <a href="#" class="btn btn-primary p-2">Ver todo o estoque</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid mt-5">
    <footer class="row bg-light">
      <div class="col-12 col-sm-6 col-md-3 offset-md-1">
        <div class="logo mt-2">
          <img src="./assets/logo.png" alt="logo" width="150px" />
        </div>

        <div class="infos">
          <p>Avenida fulano de tal - Centro</p>
          <p>11750-000, Peruíbe/SP</p>
          <p>Telefone: (13) 997877787</p>
          <p>Email: atendimento@bomsaber.com.br</p>
        </div>
      </div>
      <div class="col-6 col-md-3 offset-md-1 mt-2">
        <b>Links</b>

        <p>Sobre nós</p>
        <p>Serviços</p>
        <p>Política de Privacidade</p>
        <p>Contato</p>
        <p>Entregas</p>
      </div>
      <div class="col-8 offset-2 text-center col-sm-8 text-md-center text-lg-left col-md-12 col-lg-3 offset-md-0 mr-md-1 mt-3">
        <b>Cadastre-se na Newsletter agora</b>
        <small class="form-text">Receba nossas ofertas em primeira mão.</small>

        <div class="input-group mt-4 shadow">
          <div class="input-group-prepend">
            <div class="input-group-text" id="newsletter">@</div>
          </div>
          <input type="text" class="form-control" placeholder="E-mail" aria-label="newsletter" aria-describedby="newsletter" />
          <div class="input-group-prepend">
            <button class="btn btn-outline-primary rounded-right" id="btnNewsletter">
              <i class="fa fa-paper-plane" aria-hidden="true"></i>
            </button>
          </div>
        </div>

        <div class="social mt-4 text-center">
          <a href="#">
            <i class="fa fa-facebook-f mx-sm-4" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-instagram mx-sm-4" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-twitter mx-sm-4" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-pinterest-p mx-sm-4" aria-hidden="true"></i>
          </a>
        </div>
      </div>

      <div class="col-12 mt-3 mb-2 col-md-4 ml-md-2 text-center mb-md-3">
        <small class="form-text">
          <a href="https://github.com/joaovds">By Joaovds</a>
        </small>
      </div>
      <div class="col-8 mt-3 mb-2 col-md-6 text-right mb-md-3">
        <i class="fa fa-cc-visa mx-md-4" aria-hidden="true"></i>
        <i class="fa fa-paypal mx-md-4" aria-hidden="true"></i>
        <i class="fa fa-cc-mastercard mx-md-4" aria-hidden="true"></i>
        <i class="fa fa-bitcoin mx-md-4" aria-hidden="true"></i>
        <i class="fa fa-cc-stripe mx-md-4" aria-hidden="true"></i>
      </div>
    </footer>
  </div>

  <!-- scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>