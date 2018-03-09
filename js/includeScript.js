(function (win, doc){
  var head = document.getElementsByTagName('head')[0];
  var script = document.createElement("script");

  var checkoutApiLink = document.querySelector('input[data-js="checkoutAPI"]');
  var newCheckoutApiLink = document.querySelector('input[data-js="newCheckoutAPI"]');

  script.type = "text/javascript";

  checkoutApiLink.addEventListener('click', function(event) {
  	event.preventDefault();
    script.src = "https://assets.pagar.me/checkout/checkout.js";	
    alert("Script carregado!");
  });

  newCheckoutApiLink.addEventListener('click', function(event) {
    event.preventDefault();
    script.src = "https://assets.pagar.me/checkout/1.1.0/checkout.js";
    alert("Script carregado!");
  });

  head.appendChild(script);
})(window, document)