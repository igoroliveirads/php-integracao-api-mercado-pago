<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SlumberShop</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet">

</head>

<body>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="#LOGOAQUI" alt="" width="72" height="72">
        <h2>Confirmação de Compra</h2>
        <p class="lead">Abaixo está o formulário para confirmação de sua compra, por favor preencher campos abaixo.</p>
      </div>

      <div class="row">
        <!-- <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
        </div> -->
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Informações de endereço</h4>
          <form class="needs-validation" novalidate method="POST" name="pay" id="pay" action="./controllers.php">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nome</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Por favor, adicione seu nome.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Sobrenome</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Por favor, adicione seu sobrenome.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Por favor, adicione seu email.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Endereço</label>
              <input type="text" class="form-control" id="address" placeholder="Rua General Portinho, 464" required>
              <div class="invalid-feedback">
                Por favor, adicione seu endereço completo.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Complemento<span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">País</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Opções...</option>
                  <option>Brasil</option>
                </select>
                <div class="invalid-feedback">
                  Por favor, selecione um país válido.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Estado</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Opções...</option>
                  <option>Pará</option>
                  <option>Rio Grande do Sul</option>
                </select>
                <div class="invalid-feedback">
                  Por favor, selecione um estado válido.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">CEP</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Por favor, adicione seu CEP.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Endereço de cobrança igual ao endereço de
                entrega</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Salvar informações para compras futuras.</label>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Formas de pagamento</h4>

            <div class="d-block my-3">
              <div>
              </div>
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Cartão de Crédito</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Cartão de Débito</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nome do títular</label>
                <input type="text" class="form-control" id="cardholderName" data-checkout="cardholderName" placeholder="" required/>
                <small class="text-muted">Como está escrito no cartão</small>
                <div class="invalid-feedback">
                  Nome do título é obrigatório
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Número do cartão</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <div class="brand"></div>
                    </span>
                  </div>
                  <input type="text" class="form-control" id="cardNumber" data-checkout="cardNumber" placeholder=""
                    onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false"
                    onDrag="return false" onDrop="return false" autocomplete=off required />
                  <div class="invalid-feedback">
                    Número do cartão é obrigatório
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              
                <div class="col-md-3 mb-2"><label for="cc-expiration">Mês da Validade</label><input type="text"
                  class="form-control" id="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder=""
                    onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false"
                    onDrag="return false" onDrop="return false" autocomplete=off required/></div>
                <div class="col-md-4 mb-2"><label for="cc-expiration">Ano da Validade</label><input type="text"
                  class="form-control" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder=""
                    onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false"
                    onDrag="return false" onDrop="return false" autocomplete=off required/></div>



                <!-- <label for="cc-expiration">Data de expiração</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Data de expiração é obrigatória
                </div> -->

              
              <div class="col-md-5 mb-3">
                <label for="cc-cvv">Código de segurança (CVV)</label>
                <input type="text" class="form-control" id="securityCode" data-checkout="securityCode" placeholder="123"
                  onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false"
                  onDrag="return false" onDrop="return false" autocomplete=off required/>
                <div class="invalid-feedback">
                  Código de segurança é obrigatório
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="docType">Documento</label>
                <select class="custom-select d-block w-100" id="docType" data-checkout="docType"></select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="docNumber">Número do Documento</label>
                <input type="text" class="form-control" id="docNumber" data-checkout="docNumber" placeholder=""
                  required>
              </div>
            </div>
            <div hidden='true' id="parcelas" class="mb-3"><label for="installments">Parcelas</label>
              <select id="installments" class="form-control" name="installments"></select>
            </div>
            <input type="hidden" name="amount" id="amount" value="18309.45" />
            <input type="hidden" name="description" value="SlumberShop"/>
            <input type="hidden" name="paymentMethodId" />
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar compra</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
    <!-- MercadoPago -->
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <script src="../lib/api.js"></script>
  </body>

</html>