window.Mercadopago.getIdentificationTypes();

function getBin() {
     const cardnumber = document.getElementById("cardNumber");
     return cardnumber.value.substring(0,6);
}

function guessingPaymentMethod(event) {
     var bin = getBin();
     if (event.type == "keyup") {
          if (bin.length >= 6) {
               window.Mercadopago.getPaymentMethod({
                    "bin": bin
               }, setPaymentMethodInfo);
          }
     } else {
          setTimeout(function() {
               if (bin.length >= 6) {
                    window.Mercadopago.getPaymentMethod({
                         "bin": bin
                    }, setPaymentMethodInfo);
               }
          }, 100);
     }
}

function setPaymentMethodInfo(status, response) {
     if (status == 200) {
          const paymentMethodElement = document.querySelector('input[name=paymentMethodId]');

          if (paymentMethodElement) {
              paymentMethodElement.value = response[0].id;
          } else {
               const input = document.createElement('input');
               input.setattribute('name', 'paymentMethodId');
               input.setAttribute('type', 'hidden');
               input.setAttribute('value', response[0].id);     
               form.appendChild(input);
          }

          Mercadopago.getInstallments({
               "bin": getBin(),
               "amount": document.getElementById("amount").value,
          }, setInstallmentInfo);
     } else {
          alert(`payment method info error: ${response}`);  
     }
}

function setInstallmentInfo(status, response) {
     var cu = response[0].payer_costs.length;
     document.getElementById('installments').innerHTML = "";

     for(let i = 0; i < cu; i++){
          let c = response[0].payer_costs[i];
          var sel = document.getElementById('installments');
          var opt = document.createElement('option');
          opt.appendChild( document.createTextNode(c.recommended_message) );
          opt.value = c.installments; 
          sel.appendChild(opt);
     }
}

doSubmit = false;
addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'keyup', guessingPaymentMethod);
addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'change', guessingPaymentMethod);
addEvent(document.querySelector('#pay'), 'submit', doPay);

function addEvent(el, eventName, handler) {
     if (el.addEventListener) {
          el.addEventListener(eventName, handler);
     } else {
          el.attachEvent('on' + eventName, function () {
               handler.call(el);
          });
     }
}

function doPay(event){
     event.preventDefault();
     if(!doSubmit){
          var $form = document.querySelector('#pay');
          window.Mercadopago.createToken($form, sdkResponseHandler); // The function      "sdkResponseHandler" is defined below
          return false;
     }
}

function sdkResponseHandler(status, response) {
     if (status != 200 && status != 201) {
          alert("verify filled data");
     }else{
          var form = document.querySelector('#pay');
          var card = document.createElement('input');
          card.setAttribute('name', 'token');
          card.setAttribute('type', 'hidden');
          card.setAttribute('value', response.id);
          form.appendChild(card);
          doSubmit=true;
          form.submit();
     }
}