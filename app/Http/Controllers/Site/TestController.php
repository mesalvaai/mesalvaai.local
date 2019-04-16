<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MoipIntegration;
use Illuminate\Support\Str;
use App\Http\Requests\Donations\DonationsRequest;
use App\Helpers\MyFunctions;
use App\Campaign;

class TestController extends Controller
{
    public function getStatusCartao()
    {
        $statusPagoCartao = MoipIntegration::getStatusCreditCard('PAY-B3ZO5RY5K3KT');
        dd($statusPagoCartao);
    }

	public function retornarStatusBoleto()
	{
		$statusPagoBoleto = MoipIntegration::getStatusBoleto('ORD-UAN0O4CLPQKE');
		dd($statusPagoBoleto);
	}

	public function testSessions()
	{
		session()->flash('status', 'Obrigado por sua contribuição, aguardamos o pagamento do boleto!!');
		return view('sites.tests.sessions');
	}
    public function test()
    {
        dd(MyFunctions::FormatCurrencyForDataBase('22.002.334,35'));
            // rebuilding-stillatcom
        $nome = 'TECNOLOGIA DE INFORMAÇÃO';
        echo Str::slug($nome);

        echo "<br>";
            // rebuilding-stillatcom
        echo Str::slug('Rebuilding stillat.com');

            // customizing-the-laravel-artisan-application
        echo Str::slug(' Customizing The Laravel Artisan Application ');

            // laravel_artisan_config_command_the_configclear_command
        echo Str::slug(
            'Laravel Artisan Config Command: The config:clear Command',
            '_'
        );

            // laravel_artisan_config_command_the_configclear_command
        echo Str::slug(
            'Laravel Artisan Config Command: The config:clear Command',
            '_',
            'en'
        );
        echo "<hr>";
        echo $random = rand(5, 99);
        echo "<hr>";
        echo $random = str_random(2);
        echo "<hr>";
        echo $random = Str::random(10);
        echo "<hr>";
        $collection = collect([1, 2, 3, 4, 5]);
        echo $collection->random();
        echo "<hr>";
        $string='1.500.050,00'; 
        $number = str_replace(',','.',str_replace('.','',$string)); 
        echo $number;
        echo "<hr>";
        $string='1,500,050.00'; 
        $number = str_replace('.','.',str_replace(',','',$string)); 
        echo $number;
            //echo $replaced = str_replace_array(',', '.', str_replace_array('.','',$string));
        echo "<hr>";
        echo $replaced = str_replace_first(',', '.', str_replace_first('.','',$string));
        echo "<hr>";
        echo "<hr>";
        //$ 22.345,50
        $number = 1500.40 + 1500.50;
        echo number_format($number,2,',','.');
            //dd('');
        $campings = Campaign::get();
        return view('sites.tests.tinymce', compact('campings'));
    }

}
