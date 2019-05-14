<?php
    header('X-Frame-Options: GOFORIT'); 
?>
{{-- <iframe src="https://sandbox.moip.com.br/v2/boleto/{{ $urlBoleto }}/print" width="100%" height="1200" frameborder="0" allowfullscreen></iframe> --}}
{{-- <iframe src="https://checkout-sandbox.moip.com.br/boleto/{{$urlBoleto}}/print" width="100%" height="1200" frameborder="0" allowfullscreen></iframe> --}}
<iframe src="{{ $printBoleto }}" width="100%" height="1200" frameborder="0" allowfullscreen></iframe>

