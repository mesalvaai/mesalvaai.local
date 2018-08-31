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
}
?>