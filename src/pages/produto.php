<?php
include_once '../Models/Categoria.php';
include_once '../Models/Autor.php';
include_once '../Models/Livro.php';
include_once '../Models/Editora.php';
include_once '../Models/Pesquisa.php';

$categoria = new Categoria();
$categorias = $categoria->findAll();

$autor = new Autor();
$livro = new Livro();
$editora = new Editora();

if (isset($_GET['produto'])) :
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
          <img src="../../assets/logo.png" alt="logo" width="120px" />
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

          <?php
          $pesquisa = new Pesquisa();

          if (isset($_GET['pesquisa'])) {
            $resultados = $pesquisa->findAll($_GET['pesquisa']);
          }
          ?>

          <form class="form-inline my-0 my-lg-0" method="GET">
            <div class="input-group">
              <input name="pesquisa" type="text" class="form-control" placeholder="Procurar produtos" />
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary rounded-right" type="submit">
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
          background-image: url(../../assets/breadcrumb.jpg);
          background-repeat: no-repeat;
        ">
        <div class="col-md-12 p-5 text-center">
          <h1 class="text-light">Livraria Bom Saber</h1>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <?php $produto = $livro->find($_GET['produto']); ?>

        <div class="col-12 mb-3 col-sm-12 mx-sm-auto mb-sm-5 col-md-8 mb-md-0 col-lg-4 shadow">
          <?php $nomeFoto = $livro->listarFotosLivro($produto['cd_livro']); ?>
          <img src="../../assets/imgs/livro/<?php echo $nomeFoto[0]['nm_foto'] ?>" alt="<?php echo $produto['nm_livro'] ?>" class="img-fluid" width="100%" />
        </div>
        <div class="col-12 mt-2 col-md-12 mt-lg-0 col-lg-6">
          <h2 class="font-weight-bold" id="nomeProduto">
            <?php echo $produto['nm_livro'] ?>
          </h2>

          <div class="stars">
            <i class="fa fa-star" aria-hidden="true" style="color: rgb(209, 209, 4);"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: rgb(209, 209, 4);"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: rgb(209, 209, 4);"></i>
            <i class="fa fa-star" aria-hidden="true" style="color: rgb(209, 209, 4);"></i>
            <i class="fa fa-star-half-o" aria-hidden="true" style="color: rgb(209, 209, 4);"></i>

            <small class="text-primary"><u>(207 Avaliações)</u></small>
          </div>

          <div class="price mt-4">
            <h3 class="text-info font-weight-bold border-bottom">
              R$<?php echo $produto['vl_livro']; ?>
            </h3>
          </div>

          <div class="buy d-sm-flex mb-sm-4 align-items-md-center align-content-md-around mt-5">
            <div class="btn-group shadow-lg" role="group">
              <button type="button" class="btn btn-light" id="menosProduto">
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
              </button>
              <b class="btn" id="qtdProduto" value="1">1</b>
              <button type="button" class="btn btn-light" id="maisProduto">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
              </button>
            </div>

            <div class="addCarrinho ml-4">
              <button type="button" class="btn btn-outline-primary" onclick="addCarrinho()">
                <b>Adicionar ao carrinho</b>
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              </button>
            </div>

            <div class="love ml-4">
              <button type="button" class="btn btn-outline-danger border-0">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <!-- <div class="thumbnails d-flex mt-3">
          <img src="../../assets/imgs/offers/boxSDA.jpg" alt="box sda" class="border shadow-sm ml-2 img-thumbnail" />
          <img src="../../assets/imgs/offers/boxSDA.jpg" alt="box sda" class="border shadow-sm ml-2 img-thumbnail" />
          <img src="../../assets/imgs/offers/boxSDA.jpg" alt="box sda" class="border shadow-sm ml-2 img-thumbnail" />
          <img src="../../assets/imgs/offers/boxSDA.jpg" alt="box sda" class="border shadow-sm ml-2 img-thumbnail" />
        </div> -->
        </div>

        <div class="col-sm-12 col-md-5 offset-1 text-left">
          <div class="row mt-4">
            <div class="col-sm-12 col-md-6">
              <b>Em estoque:</b>
            </div>
            <div class="col-sm-12 col-md-6">
              <p><?php echo $produto['n_exemplares'] ?> Unidades</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <b>Qtd. Páginas:</b>
            </div>
            <div class="col-sm-12 col-md-6">
              <p><?php echo $produto['n_pagina'] ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <b>Editora:</b>
            </div>
            <div class="col-sm-12 col-md-6">
              <p>
                <?php
                $editoraDoProduto = $editora->find($produto['id_editora']);
                echo $editoraDoProduto['nm_editora'];
                ?>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 mt-5">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="true">Descrição detalhada</a>
              <a class="nav-item nav-link active" id="nav-infosProduct-tab" data-toggle="tab" href="#nav-infosProduct" role="tab" aria-controls="nav-infosProduct" aria-selected="false">Informações do produto</a>
              <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-comments" aria-selected="false">Comentários</a>
            </div>
          </nav>
          <div class="tab-content col-sm-12 col-md-10 offset-md-1 mt-2" id="nav-tabContent">
            <div class="tab-pane fade" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
              <p>
                Dolor quis proident qui dolor minim ut consequat culpa culpa
                ipsum esse elit ea occaecat. Ea ipsum cillum consequat duis
                consequat amet est fugiat minim labore velit. Duis consequat
                amet esse ad commodo amet voluptate ex nisi eiusmod ad excepteur
                tempor. Culpa nostrud labore duis ullamco velit mollit ad esse
                nulla aliquip duis aute consectetur cillum. Et esse cillum nisi
                et. Proident velit excepteur commodo est incididunt minim velit
                sunt irure Lorem proident excepteur.
              </p>
            </div>
            <div class="tab-pane fade show active" id="nav-infosProduct" role="tabpanel" aria-labelledby="nav-infosProduct-tab">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Autor</th>
                    <th scope="col">Número de Páginas</th>
                    <th scope="col">Idioma</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Editora</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">
                      <?php
                      $autorDoProduto = $autor->find($produto['id_autor']);
                      echo $autorDoProduto['nm_autor'];
                      ?>
                    </td>
                    <td>
                      <?php echo $produto['n_pagina'] ?>
                    </td>
                    <td>
                      <?php echo $produto['idioma_livro'] ?>
                    </td>
                    <td>
                      <?php echo $produto['peso_livro'] ?>Kg
                    </td>
                    <td>
                      <?php echo $produto['ano_lancamento'] ?>
                    </td>
                    <td>
                      <?php echo $editoraDoProduto['nm_editora']; ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
              <p>
                Eiusmod veniam occaecat velit ex occaecat nisi aliqua ex. Tempor
                amet adipisicing cillum reprehenderit sunt ullamco magna
                voluptate. Adipisicing proident eu culpa excepteur cupidatat.
              </p>
              <p>
                Velit enim commodo cillum excepteur eiusmod elit veniam veniam
                ut elit nostrud excepteur deserunt. Do ex amet duis pariatur
                cillum eu aute anim dolor aliquip nulla id ut exercitation.
                Commodo ut exercitation eiusmod voluptate enim labore non ex.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt-5">
      <footer class="row bg-light">
        <div class="col-12 col-sm-6 col-md-3 offset-md-1">
          <div class="logo mt-2">
            <img src="../../assets/logo.png" alt="logo" width="150px" />
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

    <script>
      let qtdProdutoValue = document.getElementById('qtdProduto');
      const maisProduto = document.getElementById('maisProduto');
      const menosProduto = document.getElementById('menosProduto');

      maisProduto.addEventListener('click', () => {
        qtdProdutoValue.innerHTML = parseInt(qtdProdutoValue.textContent) + 1;
        qtdProdutoValue.setAttribute("value", qtdProdutoValue.textContent);
      });
      menosProduto.addEventListener('click', () => {
        qtdProdutoValue.innerHTML = parseInt(qtdProdutoValue.textContent) - 1;
        qtdProdutoValue.setAttribute("value", qtdProdutoValue.textContent);
      });

      function addCarrinho() {
        const nomeProduto = document.getElementById('nomeProduto').innerText;
        const qtdProduto = qtdProdutoValue.getAttribute("value");

        let produtosCarrinho = JSON.parse(localStorage.getItem("produtosCarrinho") || '[]');

        produtosCarrinho.push({
          nome: nomeProduto,
          qtd: qtdProduto
        });
        localStorage.setItem("produtosCarrinho", JSON.stringify(produtosCarrinho));

        // alert(produtosCarrinho[0].nome);

        // var carrinho = produtosCarrinho.map((item, indice) => {
        //   console.log(item.nome, "-", item.qtd)
        //   return item.nome
        // });
      }
    </script>
  </body>

  </html>

<?php endif ?>