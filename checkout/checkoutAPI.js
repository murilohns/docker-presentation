(function(win, doc){
  'use strict';

  var checkoutApiLink = document.querySelector('input[data-js="checkoutAPI"]');

  checkoutApiLink.addEventListener('click', function(event) {
    event.preventDefault();
    // INICIAR A INSTÂNCIA DO CHECKOUT
    // declarando um callback de sucesso
    var checkoutAPI = new PagarMeCheckout.Checkout({"encryption_key":"ek_test_XrkRVobUGGTtvafcLGfoxPmNg5dnSD", success: function(data) {
        console.log(data);
        $.ajax({
          type: "POST",
          url: "../capture/capture.php",
          data: data,
          success: function( data ){
            alert ( data );
            setInterval(function(){
              location.reload();
            }, 5000)
          }
        });
        //Tratar aqui as ações de callback do checkout, como exibição de mensagem ou envio de token para captura da transação
    }});

    // DEFINIR AS OPÇÕES
    // e abrir o modal
    // É necessário passar os valores boolean em "var params" como string
    var params = {
      "amount":1000,
      "buttonText":"Pagar",
      "customerData":"true",
      "paymentMethods":"boleto,credit_card",
      "maxInstallments":12,
      "uiColor":"#bababa",
      "postbackUrl":"requestb.in/1234",
      "createToken":"true",
      "interestRate":12,
      "freeInstallments":3,
      "defaultInstallment":1,
      "headerText":"Título",
      "customerName": "Murilo Teste",
      "customerDocumentNumber": "11111111111",
      "customerEmail": "murilo@teste.com",
      "customerAddressStreet": "Rua Teste",
      "customerAddressStreetNumber": "123",
      "customerAddressComplementary": "Complemento",
      "customerAddressNeighborhood": "Bairro",
      "customerAddressCity": "Cidade",
      "customerAddressState": "Estado",
      "customerAddressZipCode": "04250000",
      "customerPhoneDdd": "11",
      "customerPhoneNumber": "852321459"
    };
    checkoutAPI.open(params);
  })
})(window, document)