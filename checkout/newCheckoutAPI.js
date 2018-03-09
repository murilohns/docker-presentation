(function (win, doc){
  'use strict';

  var newCheckoutApiLink = document.querySelector('input[data-js="newCheckoutAPI"]');
  
  newCheckoutApiLink.addEventListener('click', function() {
    function handleSuccess (data) {
      console.log(data);
      setInterval(function () {
        location.reload();
      }, 3000)
    }

    function handleError (data) {
      console.log(data);
    }

    var checkout = new PagarMeCheckout.Checkout({
      encryption_key: 'ek_test_UGvmO3DbRwGeHYc3gEMnUtRCrF3M9z',
      success: handleSuccess,
      error: handleError
    });

    checkout.open({
      amount: 8000,
      createToken: 'true',
      paymentMethods: 'boleto, credit_card',
      customerData: "false",
      maxInstallments: 12,
      customer: {
        external_id: '#123456789',
        name: 'Fulano',
        type: 'individual',
        country: 'br',
        email: 'fulano@email.com',
        documents: [
          {
            type: 'cpf',
            number: '71404665560',
          },
        ],
        phone_numbers: ['+5511999998888', '+5511888889999'],
        birthday: '1985-01-01',
      },
      billing: {
        name: 'Ciclano de Tal',
        address: {
          country: 'br',
          state: 'SP',
          city: 'São Paulo',
          neighborhood: 'Fulanos bairro',
          complementary: "Sem complemento",
          street: 'Rua dos fulanos',
          street_number: '123',
          zipcode: '05170060'
        }
      },
      shipping: {
        name: 'Ciclano de Tal',
        fee: 12345,
        delivery_date: '2017-12-25',
        expedited: true,
        address: {
          country: 'br',
          state: 'SP',
          city: 'São Paulo',
          neighborhood: 'Fulanos bairro',
          complementary: "Sem complemento",
          street: 'Rua dos fulanos',
          street_number: '123',
          zipcode: '05170060'
        }
      },
      items: [
        {
          id: '1',
          title: 'Bola de futebol',
          unit_price: 12000,
          quantity: 1,
          tangible: true
        },
        {
          id: 'a123',
          title: 'Caderno do Goku',
          unit_price: 3200,
          quantity: 3,
          tangible: true
        }
      ]
    })
  });
})(window, document)