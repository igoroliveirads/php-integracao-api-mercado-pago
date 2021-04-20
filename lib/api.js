(function(win,doc){
  "use strict";

  //Public Key
  window.Mercadopago.setPublishableKey("TEST-2330c5b5-1047-4d33-b663-3c9b18d6680e");

  //Docs Type
  window.Mercadopago.getIdentificationTypes();

  //Card bin
  function cardBin(event) {
      let textLength=event.target.value.length;
        console.log(textLength);
      if(textLength >= 6){
          let bin=event.target.value.substring(0,6);
          window.Mercadopago.getPaymentMethod({
              "bin": bin
          }, setPaymentMethodInfo);
      }
  }
  if(doc.querySelector('#cardNumber')){
    
      let cardNumber=doc.querySelector('#cardNumber');
      cardNumber.addEventListener('keyup',cardBin,false);
  }

  //Set Payment
  function setPaymentMethodInfo(status, response) {
      if (status == 200) {
          const paymentMethodElement = doc.querySelector('input[name=paymentMethodId]');
          paymentMethodElement.value=response[0].id;
      } else {
          alert(`payment method info error: ${response}`);
      }
  };
})(window,document);