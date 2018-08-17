(function( $ ) {
    $(function() {
        $("#phone").mask("(00) 0000-00009");
        //$("#goal").mask("0000.00");
        //$("#date").mask("99/99/9999");
        //$("#phone").mask("(99) 999-9999");
        $("#cep").mask("99.999-999");
        //$("#cpf").mask("99.999.999-99");
        //$("#txtCnpjPesquisa").mask("99.999.999/9999-99");
        
        $("#cpf").mask("999.999.999-99");
		$('#cpf').blur(function () {
        	var id=$(this).attr("id");
        	var val=$(this).val();
        	var pattern = new RegExp(/[0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2}/);

        	if(val.match(pattern) == null){
        		$("#"+id+"_error").html("Digite um CPF válido");
        	}
		});
    });

        //Validar Money
        //$("#goal").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});
        //$("#goal").maskMoney();
        $("#goal").maskMoney({thousands:".", decimal:",", symbol:"R$", showSymbol:true, symbolStay:true});
        $("#donation").maskMoney();
        $("#total_amount").maskMoney();
})(jQuery);