(function (win, doc) {
  'use strict';

  // Primeiro Setamos a chave de confirmação com MercadoPago
  //Public Key
  window.Mercadopago.setPublishableKey(
    'TEST-2330c5b5-1047-4d33-b663-3c9b18d6680e'
  );
  //Docs Type
  window.Mercadopago.getIdentificationTypes();

  //Nas funções subsequentes utilizamos a logica de eventos, porem sempre verificamos se componente que queremos existe
  //Como podemos ver nas linhas 38 e 99
  //Card bin
  function cardBin(event) {
    // Apos a verificação de evento realizada na linha 3 verificamos se ja foi digitado pelo menos 6 digitos do cartão
    // Pois apois 6 digitos podemos retirar via api a bandeira e as parcelas, como pode ser vista nas linhas 23 e 29
    // Com as fuções getPaymentMethod e getInstallments respectivamente
    let textLength = event.target.value.length;
    // console.log(textLength);
    if (textLength >= 6) {
      let bin = event.target.value.substring(0, 6);
      window.Mercadopago.getPaymentMethod(
        {
          bin: bin,
        },
        setPaymentMethodInfo // função na linha 62 responsavel por colocar a thumb do cartão no html
      );
      Mercadopago.getInstallments(
        {
          bin: bin,
          amount: parseFloat(document.querySelector('#amount').value),
        },
        setInstallmentInfo // função na linha 45 responsavel por fazer um select com as parcelas e colocar no html
      );
    }
  }
  if (doc.querySelector('#cardNumber')) {
    // Verificação de existencia e de evento do input do numero do cartão
    let cardNumber = doc.querySelector('#cardNumber');
    cardNumber.addEventListener('keyup', cardBin, false);
  }

  //Set Installments
  function setInstallmentInfo(status, response) {
    // Como já mencionado função responsavel por criar o select das parcelas que inicialmente fica em modo hidden
    let label = response[0].payer_costs;
    let installmentsSel = doc.querySelector('#installments');
    installmentsSel.options.length = 0;

    label.map(function (elem, ind, obj) {
      let txtOpt = elem.recommended_message;
      let valOpt = elem.installments;
      installmentsSel.options[installmentsSel.options.length] = new Option(
        txtOpt,
        valOpt
      );
    });
  }

  //Set Payment
  function setPaymentMethodInfo(status, response) {
    // Função responsavel por colocar a bandeira do cartão e por retirar o hidden do select das parcelas
    if (status == 200) {
      const paymentMethodElement = doc.querySelector(
        'input[name=paymentMethodId]'
      );

      doc.querySelector('#parcelas').hidden = false;
      paymentMethodElement.value = response[0].id;
      doc.querySelector('.brand').innerHTML =
        "<img src='" + response[0].thumbnail + "' alt='Bandeira do Cartão'>";
    } else {
      alert(`payment method info error: ${response}`);
    }
  }
  //Create Token, necessario para transação do MercadoPago
  function sendPayment(event) {
    event.preventDefault();
    window.Mercadopago.createToken(event.target, sdkResponseHandler);
  }

  // Apos a requisição do token é verificado se deu certo, e depois o token é colocado como um input para que seja possivel pega-lo no controllets.php
  function sdkResponseHandler(status, response) {
    if (status == 200 || status == 201) {
      let form = doc.querySelector('#pay');

      let card = doc.createElement('input');
      card.setAttribute('name', 'token');
      card.setAttribute('type', 'text');
      card.setAttribute('value', response.id);
      form.appendChild(card);
      // finaliza o form e subimete
      form.submit();
    }
  }

  // Verificação de existencia do forms
  if (doc.querySelector('#pay')) {
    let formPay = doc.querySelector('#pay');
    // Espera o evento de submit para chamar a função de criação do token
    formPay.addEventListener('submit', sendPayment, false);
  }
})(window, document);
