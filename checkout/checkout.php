<?php
  // Realizamos o include_once para conseguimos nos comunicar com o arquivo responsavel pela consulta do CEP
  include_once('../lib/viaCep.php');
?>
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
  <body class="bg-light">
  <div
      class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm"
    >
      <h5 class="my-0 mr-md-auto font-weight-normal">SlumberShop</h5>
      <a
        class="btn btn-outline-primary"
        href="http://localhost/api/"
        >Home</a
      >
    </div>
    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="#LOGOAQUI" alt="" width="72" height="72">
        <h2>Confirmação de Compra</h2>
        <p class="lead">Abaixo está o formulário para confirmação de sua compra, por favor preencher campos abaixo.</p>
      </div>
      <!-- Form Responsavel pela Utilização da API VIACEP -->
      <div class="row">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
          <h4 class="mb-3">Informações de endereço</h4>
          <form class="needs-validation" novalidate method="POST" name="cep" id="cep">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="zip">CEP</label>
                <div style="display: flex;">
                  <input type="text" class="form-control" name="zip" id="zip" value="<?php echo $address->cep?>"
                    placeholder="" required>
                  <div class="invalid-feedback">
                    Por favor, adicione seu CEP.
                  </div>
                  <button class="" type="submit">Buscar</button>
                </div>
              </div>
            </div>
          </form>
           <!-- Form principal da Aplicação onde as primeiras interações com MercadoPago São feitas -->
          <form class="needs-validation" novalidate method="POST" name="pay" id="pay" action="./controllers.php">
            <div class="mb-3">
              <label for="address">Endereço</label>
              <input type="text" class="form-control" name="addr" id="addr" value="<?php echo $address->logradouro?>"
                placeholder="Rua General Portinho, 464" required>
              <div class="invalid-feedback">
                Por favor, adicione seu endereço completo.
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="number">Número</label>
                <input type="text" class="form-control" name="number" id="number" placeholder="123">
              </div>
              <div class="col-md-6 mb-3">
                <label for="address2">Complemento<span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite">
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">País</label>
                <select class="custom-select d-block w-100" name="country" id="country" required>
                  <option value="">Opções...</option>
                  <option selected>Brasil</option>
                </select>
                <div class="invalid-feedback">
                  Por favor, selecione um país válido.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Estado</label>
                <select class="custom-select d-block w-100" value="<?php echo $address->uf ?>" name="state" id="state"
                  required>
                  <option>Opções...</option>
                  <option selected>
                    <?php echo $address->uf ?>
                  </option>
                </select>
                <div class="invalid-feedback">
                  Por favor, selecione um estado válido.
                </div>
              </div>
            </div>
            <h4 class="mb-3">Informações pessoais</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nome</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value=""
                  required>
                <div class="invalid-feedback">
                  Por favor, adicione seu nome.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Sobrenome</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
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
            <hr class="mb-4">
            <h4 class="mb-3">Informações do Cartão</h4>
            <!-- Parte do input que trabalha com MercadoPago -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nome do títular</label>
                <input type="text" class="form-control" id="cardholderName" data-checkout="cardholderName"
                  placeholder="" required />
                <small class="text-muted">Como está escrito no cartão</small>
                <div class="invalid-feedback">
                  Nome do título é obrigatório
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Número do cartão</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <!-- Aparti do uso a api retorna a bandeira do cartão e colocamos aki -->
                    <span class="input-group-text">
                      <div class="brand"></div>
                    </span>
                  </div>
                  <!-- Os inputs que envolve o cartão possuem varias caracteristicas para proteção -->
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
                  onDrag="return false" onDrop="return false" autocomplete=off required /></div>
              <div class="col-md-4 mb-2"><label for="cc-expiration">Ano da Validade</label><input type="text"
                  class="form-control" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder=""
                  onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false"
                  onDrag="return false" onDrop="return false" autocomplete=off required /></div>
              <div class="col-md-5 mb-3">
                <label for="cc-cvv">Código de segurança (CVV)</label>
                <input type="text" class="form-control" id="securityCode" data-checkout="securityCode" placeholder="123"
                  onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false"
                  onDrag="return false" onDrop="return false" autocomplete=off required />
                <div class="invalid-feedback">
                  Código de segurança é obrigatório
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <!-- O mercado Pago fornece o tipo dos documentos que aceita -->
                <label for="docType">Documento</label>
                <select class="custom-select d-block w-100" id="docType" data-checkout="docType"></select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="docNumber">Número do Documento</label>
                <input type="text" class="form-control" id="docNumber" data-checkout="docNumber" placeholder=""
                  required>
              </div>
            </div>
            <!-- Apois verificar a bandeira e o valor o MercadoPago fornece as parcelas já com juros -->
            <div hidden='true' id="parcelas" class="mb-3"><label for="installments">Parcelas</label>
              <select id="installments" class="form-control" name="installments"></select>
            </div>
            <input type="hidden" name="amount" id="amount" value="18390.85" />
            <input type="hidden" name="description" value="SlumberShop" />
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