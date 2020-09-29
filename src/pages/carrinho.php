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

  <title>Carrinho | Livraria Bom Saber</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="../index.html">
        <img src="../../assets/logo.png" alt="logo" width="120px" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse ml-5" id="navbarContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.html">
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
              <a class="dropdown-item" href="#">Categoria A</a>
              <a class="dropdown-item" href="#">Categoria B</a>
              <a class="dropdown-item" href="#">Categoria C</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Categoria D</a>
              <a class="dropdown-item" href="#">Categoria E</a>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./carrinho.html">
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
          background-image: url(../../assets/breadcrumb.jpg);
          background-repeat: no-repeat;
        ">
      <div class="col-md-12 p-5 text-center">
        <h1 class="text-light">Livraria Bom Saber</h1>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row border-bottom">
      <div class="col-lg-12">
        <table class="table table-borderless">
          <thead class="border-bottom border-primary">
            <tr>
              <th scope="col">Nome do Produto</th>
              <th scope="col">Preço</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Total</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">
                Box Senhor dos Anéis
                <button type="button" class="btn btn-sm btn-outline-info ml-5">Detalhe</button>
                </th>
              <td>R$120,00</td>
              <td>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-light">
                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                  </button>
                  <b class="btn">1</b>
                  <button type="button" class="btn btn-light">
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                  </button>
                </div>
              </td>
              <td>R$120,00</td>
              <td>
                <i class="fa fa-close"></i>
              </td>
            </tr>
            <tr>
              <td scope="row">
                Contos Inacabados
                <button type="button" class="btn btn-sm btn-outline-info ml-5">Detalhe</button>
                </th>
              <td>R$60,00</td>
              <td>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-light">
                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                  </button>
                  <b class="btn">2</b>
                  <button type="button" class="btn btn-light">
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                  </button>
                </div>
              </td>
              <td>R$120,00</td>
              <td>
                <i class="fa fa-close"></i>
              </td>
            </tr>
            <tr>
              <td scope="row">
                A Queda de Gondolin
                <button type="button" class="btn btn-sm btn-outline-info ml-5">Detalhe</button>
                </th>
              <td>R$34,00</td>
              <td>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-light">
                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                  </button>
                  <b class="btn">1</b>
                  <button type="button" class="btn btn-light">
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                  </button>
                </div>
              </td>
              <td>R$34,00</td>
              <td>
                <i class="fa fa-close"></i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-md-4 offset-md-1 mt-3">
        <button type="button" class="btn btn-outline-primary btn-block">
          <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>
          Continuar comprando
        </button>
      </div>
      <div class="col-12 col-md-4 offset-md-1 mt-3">
        <button type="button" class="btn btn-outline-primary btn-block">
          <i class="fa fa-spinner mr-2" aria-hidden="true"></i>
          Atualizar Carrinho
        </button>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4 offset-lg-1 mt-5">
        <div class="input-group">
          <input type="text" name="cupom" class="form-control" placeholder="Inserir Cupom de desconto" aria-describedby="usarCupom" />
          <div class="input-group-append">
            <button class="btn btn-outline-info" id="usarCupom">
              Usar Cupom
            </button>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-4 offset-lg-1 mt-5">
        <div class="card shadow" style="width: 100%;">
          <div class="card-header">
            <b>Total do Carrinho</b>
          </div>

          <div class="card-body">
            <table class="table table-borderless">
              <thead class="border-bottom">
                <tr>
                  <th scope="col">Subtotal</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody class="border-bottom">
                <tr>
                  <td scope="row">R$204,00</td>
                  <td>R$204,00</td>
                </tr>
              </tbody>
            </table>

            <button type="submit" class="btn btn-primary btn-block">
              Fechar Carrinho
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid mt-5">
    <footer class="row bg-light">
      <div class="col-12 col-sm-6 col-md-3 offset-md-1">
        <div class="logo mt-2">
          <img src="../assets/logo.png" alt="logo" width="150px" />
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