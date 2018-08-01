  

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



<script type="text/javascript" src="//assets.moip.com.br/v2/moip.min.js"></script>


<input type="text" id="number" placeholder="Credit card number" value="6062825624254001" />
<input type="text" id="cvc" placeholder="cvc" value="123" />
<input type="text" id="month" placeholder="month" value="12" />
<input type="text" id="year" placeholder="year" value="18" />
<br>
<br>
<input type="submit" id="encrypt" value="Criptografar" />

<br>
<br>
<br>

<textarea id="public_key">-----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA4UDKQUT5lrZdSeE6d/Tu
    AnYAV8H0FjwT3+0AAIoo3bwekxvkLjn9AjQ+25IIEOe2Q5h4KWf8Apa4KA69S58T
    R32FSJofl3S6TS9F/bZSYfZXwizcdfJhOl3aIbtFRQ3/B6Pa3Bg0Z/bofN02cy5T
    SxY3+wAqORYChhMNS+NQT68NVIgk2mYJU9Le+a/lj8IwVDEAoy0N5jsox8PPfe0a
    kU1cTtx7TWOVSBTJC9l/GbT/CvKGcj2MO824ShYozW/4bx3yeaAIzBl8VgQMnph3
    v8pYTtQJjhQ7N6GwMu7mRoYkwYVNUgxgJocIcnKfXym5Ij95aJw8WyfzgxvkSdNh
    2wIDAQAB
-----END PUBLIC KEY-----</textarea>

<textarea id="encrypted_value"></textarea>

<script type="text/javascript">
    $(document).ready(function() {
        $("#encrypt").click(function() {
          var cc = new Moip.CreditCard({
            number  : $("#number").val(),
            cvc     : $("#cvc").val(),
            expMonth: $("#month").val(),
            expYear : $("#year").val(),
            pubKey  : $("#public_key").val()
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

var sha1 = btoa(hash);


  $.get('/passa-hash/'  + sha1, function(retorno){

            alert(retorno);
         }

    );

    
    });
    });
</script>


