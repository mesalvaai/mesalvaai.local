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

    public static function formatandoForView($valor)
    {
        $tirandoPonto = str_replace('.','',$valor);
        $total_amount = $tirandoPonto / 100;
        return number_format($total_amount,2,',','.');
    }
}
?>