<?php  
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

/**
 * My Fuctions
 */
class MyFunctions
{
    /**
     * summary
     */
    public static function FormatCurrencyForScreen($valor)
    {
    	$retornarValorFormatado = str_replace(',','.',str_replace('.','',$valor));
    	return $retornarValorFormatado;
    }
    public static function FormatCurrencyForDataBase($valor)
    {
    	//2,000,000.29 => 2.000.000.29
    	$retornarValorFormatado = str_replace(',','.',str_replace('.','',$valor));
    	return $retornarValorFormatado;
    }

    public static function AddDecimalPointForMoney($valor)
    {
        $total_amount = $valor / 100;
        return number_format($total_amount,2,',','.');
    }

    public static function sumAmountDataBase($valor)
    {
        $total_amount = $valor / 100;
        return number_format($total_amount,2,'.',',');
    }

    public static function formatandoForView($valor)
    {
        if($valor == null || $valor == 0)
            return 0;

        $tirandoPonto = str_replace('.','',$valor);
        $total_amount = $tirandoPonto / 100;
        return number_format($total_amount,2,',','.');
    }

    public static function convertCoin($xCoin = "EN", $xDecimal = 2, $xValue) {
       $xValue       = preg_replace( '/[^0-9]/', '', $xValue); // Deixa apenas números
       $xNewValue    = substr($xValue, 0, -$xDecimal); // Separando número para adição do ponto separador de decimais
       $xNewValue    = ($xDecimal > 0) ? $xNewValue.".".substr($xValue, strlen($xNewValue), strlen($xValue)) : $xValue;
       return $xCoin == "EN" ? number_format($xNewValue, $xDecimal, '.', '') : ($xCoin == "BR" ? number_format($xNewValue, $xDecimal, ',', '.') : NULL);
    }
}
?>