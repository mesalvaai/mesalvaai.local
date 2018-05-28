$(function() {
    /* Função Input Type Range do Simulador - Início */
    var $document = $(document);
    var selector = '[data-rangeslider]';
    var $inputRange = $(selector);

    $inputRange.rangeslider({polyfill: false});
    /* Função Input Type Range do Simulador - Fim */

    /* Função Drag and Drop do Simulador - Início */
    var items = document.querySelectorAll('.draggable');
    for (var i = 0, len = items.length; i < len; i++) {
        var item = items[i];
        var draggie = new Draggabilly(item, {
            handle: '.dragdrop'
        });
    }
    /* Função Drag and Drop do Simulador - Fim */

    $(".btnSimulator").click(function () {
        var qtd_parcela = $('input[name=user_option]:checked').val();
        var valor       = convertToFloat($("#js-out").html());
        var targetUrl   = decideUrl("veiculos");
        $.ajax({
            type: "POST",
            url: targetUrl + "/a/analysis/fake",
            xhrFields: { withCredentials: true },
            data: {'value': valor, 'installments': qtd_parcela},
            success: function (response) {
                if (response.type == 'error') return;
                location.href = decideUrl("cadastro") + "/verificar/cadastro"
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});

function decideUrl(app)
{
    var currentUrl  = window.location.hostname;
    if (currentUrl.indexOf('.local') != -1) {
        return "http://" + app + ".trigg.local";
    } else if (currentUrl.indexOf('tst.') != -1) {
        return "http://tst.v2." + app + ".trigg.com.br";
    } else if (currentUrl.indexOf('uat.') != -1) {
        return "http://uat.v2." + app + ".trigg.com.br";
    } else {
        return "https://" + app + ".trigg.com.br";
    }
}

function pmt(valorSolicitado, numeroParcelas) {
    var taxaJuros = 0.68;
    var valorParcela = Math.round((valorSolicitado*(((taxaJuros/100)*(Math.pow((1+taxaJuros/100),numeroParcelas)))/(Math.pow((1+taxaJuros/100),numeroParcelas)-1))*100)/100);
    return valorParcela;
}

var showParcelas = [12,18,24,30,36,48];
var parcela_qtd = 0;
var parcela_valor = 0;

function calcularPct(valor) {

    // var taxa = 0;
    //
    // if(valor < 1000) {
    //   taxa = 0.55;
    // } else if(valor >= 1000 && valor < 2000) {
    //   taxa = 0.70;
    // } else if(valor >= 2000 && valor < 3000) {
    //   taxa = 0.90;
    // } else if(valor >= 3000 && valor < 5000) {
    //   taxa = 1;
    // } else {
    //   taxa = 1.3;
    // }
    //
    // var resgateMes = (valor * taxa) / 100;
    // var resgateAno = resgateMes * 12;
    // console.log("taxa", taxa);
    // console.log("mes", resgateMes);
    // console.log("ano", resgateAno);


    var maxcalculado = valor * 0.7;
    var mincalculado = valor * 0.3;

    $("#js-car").html(number_format( valor, 2, ',', '.' ));

    $("#carValor").html('R$&nbsp<div id="js-out" class="range"></div><input type="range" min="'+ mincalculado + '" max="'+ maxcalculado + '" step="500" data-rangeslider=""  value="'+ maxcalculado + '" oninput="calculaParcela(this.value);">');

    var selector = '[data-rangeslider]';
    var $inputRange = $(selector);

    $inputRange.rangeslider({polyfill: false});
    calculaParcela(valor);
}



function calculaParcela(valor) {

  var taxa = 0;
  var taxaPoupanca = 0.68;

  // if(valor < 1000) {
  //   taxa = 0.55;
  // } else if(valor >= 1000 && valor < 2000) {
  //   taxa = 0.70;
  // } else if(valor >= 2000 && valor < 3000) {
  //   taxa = 0.90;
  // } else if(valor >= 3000 && valor < 5000) {
  //   taxa = 1;
  // } else {
  //   taxa = 2;
  // }
    if(valor < 1000) {
        taxa = 0.55;
    } else if(valor >= 1000 && valor < 1200) {
        taxa = 0.70;
    } else if(valor >= 1200 && valor < 1500) {
        taxa = 0.90;
    } else if(valor >= 1500 && valor < 1800) {
        taxa = 1;
    } else {
        taxa = 2;
    }

    var resgateMes = (valor * taxa) / 100;
    var resgateAno = resgateMes * 12;

    var valorFormatado = number_format( valor, 2, ',', '.' );
    $("#js-out").html(valorFormatado);
    $(".valorAplic").html(valorFormatado);

    var taxaOutput = number_format(taxa, 2, ',', '.');
    var mesOutput  = number_format(resgateMes, 2, ',', '.');
    var anoOutput  = number_format(resgateAno, 2, ',', '.');

    taxaOutput = (taxaOutput.indexOf(',') == 0) ? "0" + taxaOutput : taxaOutput;
    mesOutput = (mesOutput.indexOf(',') == 0) ? "0" + mesOutput : mesOutput;
    anoOutput = (anoOutput.indexOf(',') == 0) ? "0" + anoOutput : anoOutput;

    $(".taxa").html(taxaOutput);
    $(".mes").html(mesOutput);
    $(".ano").html(anoOutput);

  // var valorMesCalculado = (valor * taxaPoupanca) / 100;
  // var valorAnoCalculado = valor *  Math.pow(( taxaPoupanca / 100 + 1), 12);

  // //Poupanca
  // alert(valorMesCalculado);
  // alert(valorAnoCalculado);
  //
  // //Rewards
  // alert("taxa: " + taxa);
  // alert("mes:" + resgateMes);
  // alert("ano: " + resgateAno);

    //
    // $(".funkyradio").html("");

    // for (i = 48; i >= 12; i--) {
    //     if(showParcelas.indexOf(i) != -1) {
    //         parcela_qtd = i;
    //         parcela_valor = pmt(parseFloat(valor_emprestimo), i);
    //
    //         html = '<div class="funkyradio-success">';
    //         html += '<input id="user_option'+i+'" type="radio" name="user_option" value="'+i+'"';
    //         if(i == showParcelas[showParcelas.length-1]){html += 'checked';}
    //         html += '>';
    //         html += '<label for="user_option'+i+'"><span><span></span></span>Em '+i+'X de R$&nbsp'+number_format( parcela_valor, 2, ',', '.' )+'</label></div>';
    //         $(".funkyradio").append(html);
    //     }
    // }
}

$(function() {
    // calculaParcela(1000);
    calcularPct(1500);
});

function number_format(number, decimals, decPoint, thousandsSep){
    decimals = decimals || 0;
    number = parseFloat(number);

    if(!decPoint || !thousandsSep){
        decPoint = '.';
        thousandsSep = ',';
    }

    var roundedNumber = Math.round( Math.abs( number ) * ('1e' + decimals) ) + '';
    var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
    var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
    var formattedNumber = "";

    while(numbersString.length > 3){
        formattedNumber += thousandsSep + numbersString.slice(-3)
        numbersString = numbersString.slice(0,-3);
    }

    return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
}

function convertToFloat(valor) {
    valor = valor.replace('.', '');
    valor = valor.replace(',', '.');
    return valor;
}
