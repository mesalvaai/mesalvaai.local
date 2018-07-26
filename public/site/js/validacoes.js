(function( $ ) {
    $(function() {
        $("#phone").mask("(00) 0000-00009");
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
})(jQuery);