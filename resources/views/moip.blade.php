  
<!-- JavaScript Libraries -->
<script src="{{ asset('site/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('site/lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('site/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('site/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('site/lib/aos/aos.js') }}"></script>
<script src="{{ asset('site/lib/superfish/hoverIntent.js') }}"></script>
<script src="{{ asset('site/lib/superfish/superfish.min.js') }}"></script>
<script src="{{ asset('site/lib/magnific-popup/magnific-popup.min.js') }}"></script>

<!-- Contact Form JavaScript File -->
<script src="{{ asset('site/contactform/contactform.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('site/js/main.js') }}"></script>


<!-- JavaScript do moip -->
<script type="text/javascript" src="//assets.moip.com.br/v2/moip.min.js"></script>

<strong>Número</strong>
<br>
<input type="text" id="number" placeholder="Credit card number" value="6062825624254001" />

<br>
<br>

<strong>CVC</strong>
<br>
<input type="text" id="cvc" placeholder="cvc" value="123" />

<br>
<br>

<strong>Mês</strong>
<br>
<input type="text" id="month" placeholder="month" value="12" />

<br>
<br>

<strong>Ano</strong>
<br>
<input type="text" id="year" placeholder="year" value="18" />

<br>
<br>

<strong>Valores do cartão, encriptados</strong>
<br>
<textarea id="encrypted_value"></textarea>


<br>
<br>
<br>
<br>



<input type="submit" id="encrypt" value="Doar com Cartão de crédito" />

<br>
<br>
<br>
<br>
<br>
<br>

<input type="submit" id="gerar_boleto" onclick="gerar_boleto()" value="Gerar Boleto" />



<script type="text/javascript" language="javascript">

 var key = "-----BEGIN PUBLIC KEY-----"+
 "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA4UDKQUT5lrZdSeE6d/Tu"+
 "AnYAV8H0FjwT3+0AAIoo3bwekxvkLjn9AjQ+25IIEOe2Q5h4KWf8Apa4KA69S58T"+
 "R32FSJofl3S6TS9F/bZSYfZXwizcdfJhOl3aIbtFRQ3/B6Pa3Bg0Z/bofN02cy5T"+
 "SxY3+wAqORYChhMNS+NQT68NVIgk2mYJU9Le+a/lj8IwVDEAoy0N5jsox8PPfe0a"+
 "kU1cTtx7TWOVSBTJC9l/GbT/CvKGcj2MO824ShYozW/4bx3yeaAIzBl8VgQMnph3"+
 "v8pYTtQJjhQ7N6GwMu7mRoYkwYVNUgxgJocIcnKfXym5Ij95aJw8WyfzgxvkSdNh"+
 "2wIDAQAB"+
 "-----END PUBLIC KEY-----";

 $(document).ready(function() {

  $("#encrypt").click(function() {
    var cc = new Moip.CreditCard({
      number  : $("#number").val(),
      cvc     : $("#cvc").val(),
      expMonth: $("#month").val(),
      expYear : $("#year").val(),
      pubKey  : key
    });
    console.log(cc);
    if( cc.isValid()){
      $("#encrypted_value").val(cc.hash());
    }
    else{
      $("#encrypted_value").val('');
      alert('Invalid credit card. Verify parameters: number, cvc, expiration Month, expiration Year');
    }

    var hash = $("#encrypted_value").val();

    var base64 = btoa(hash);

    location.href = '/pagamento-credit-card/' + base64; 
    // $.get('/pagamento-credit-card/'  + base64, function(retorno){

    //     alert(retorno);


    // );
  });

});

 function redirecionar(item) { 
  // location.href = '{{route('moip')}}'; 
}
function gerar_boleto(){

 window.open('/boleto', '_blank');
       // window.location.href = "/boleto";

     }


// function MM_goToURL() {

// for (var i=0; i< (MM_goToURL.arguments.length - 1); i+=100)

// eval(MM_goToURL.arguments+".location='"+MM_goToURL.arguments[i+1]+"'");

// document.MM_returnValue = false;

// }

</script>


