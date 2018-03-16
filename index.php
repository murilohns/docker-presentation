<html>
    <head>
        <title>Checkout Options</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Revalia">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>
    <body>
    	<main>
	    	<nav>
                <ul>
                    <li id="checkout_1">
                        <center>
                            <input type="button" value="Checkout API 2017-07" data-js="checkoutAPI">
                        </center>
                    </li>
                    <li id="checkout_2">
                        <center>
                            <form method="POST" action="capture/capture.php" center>
                                <script type="text/javascript"
                                    src="https://assets.pagar.me/checkout/checkout.js"
                                    data-button-text="Checkout Form"
                                    data-encryption-key="ek_test_XrkRVobUGGTtvafcLGfoxPmNg5dnSD"
                                    data-amount="1000"
                                    data-customer-data="false"
                                    data-payment-methods="boleto,credit_card"
                                    data-ui-color="#bababa"
                                    data-postback-url="requestb.in/1234"
                                    data-create-token="true"
                                    data-default-installment="1"
                                    data-max-installments="1"
                                    data-header-text="Título"
                                    data-customer-name="Meu nome"
                                    data-customer-document-number="00000000000"
                                    data-customer-email="teste@teste.com"
                                    data-customer-address-street="Rua"
                                    data-customer-address-street-number="123"
                                    data-customer-address-complementary="Complemento"
                                    data-customer-address-neighborhood="Bairro"
                                    data-customer-address-city="Cidade"
                                    data-customer-address-state="Estado"
                                    data-customer-address-zipcode="37701026"
                                    data-customer-phone-number="987263827"
                                    data-customer-phone-ddd="11"
                                    data-postback-url="https://requestb.in/pvomdppv">
                                </script>
                            </form>
                        </center>
                    </li>
                    <li id="checkout_3">
                        <center>
                            <input type="button" data-js="newCheckoutAPI" value="Checkout API 2018-08">
                        </center>
                    </li>
                </ul>
	    	</nav>
    	</main>	
    </body>
    <script type="text/javascript" src="js/includeScript.js"></script>
    <script type="text/javascript" src="checkout/checkoutAPI.js"></script>
    <script type="text/javascript" src="checkout/newCheckoutAPI.js"></script>
</html>
