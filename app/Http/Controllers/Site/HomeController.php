<?php

namespace App\Http\Controllers\Site;

use App\MoipIntegration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Donations\DonationsRequest;
use App\Helpers\MyFunctions;

use App\Campaign;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function campanhas()
    {
        $campanhas = Campaign::where('published', 1)->paginate(30);
        return view('sites.campanhas', compact('campanhas'));
    }

    public function index()
    {
        return view('sites.home');
    }

    public function home()
    {
            //$campanhas = Campaign::where('status', 1)->paginate();
        $campanhas = Campaign::where('published', 1)->paginate(4);
        return view('sites.site', compact('campanhas', 'progress'));
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

    public function mimos()
    {
        return view('sites.mimos');
    }

    public function campanha($slug = null)
    {
            //$campanha = Campaign::where('slug', $slug)->first();
        if ($slug == null) {
            abort(404, 'A url não existe');
        } else {
            $campanha = Campaign::where('slug', $slug)->first();
            if ($campanha) {
                return view('sites.campanha', compact('slug', 'campanha'));
            } else {
                abort(404, 'A url não existe');
            }
        } 
    }

    public function donate($slug)
    {
        if ($slug == null) {
            abort(404, 'A url não existe');
        } else {
            $campanha = Campaign::where('slug', $slug)->first();
            if ($campanha) {
                return view('sites.donations.create', compact('slug', 'campanha'));
            } else {
                abort(404, 'A url não existe');
            }
        }
    }

    public function donateProcess(DonationsRequest $request)
    {
        if ( ($request->type_payment === 'CREDIT_CARD') AND ($request->op === 'CREDIT_CARD') ) {
            $pagoComCartao = MoipIntegration::getPagamentoCreditCard($request);
            dd($pagoComCartao);
        } elseif ( ($request->type_payment === 'BOLETO') AND ($request->op === 'BOLETO') ){
            $boleto = MoipIntegration::getPagamentoBoleto($request);
            $idBoleto = $boleto['idBoleto'];
            $codBoleto = $boleto['codBoleto'];
            $urlBoleto = $boleto['urlBoleto'];
            $hrefBoleto = $boleto['hrefBoleto'];
            $printBoleto = $boleto['print'];
            return view('sites.donations.checkout-boleto', compact('idBoleto', 'codBoleto', 'printBoleto', 'hrefBoleto'));
        } else {
            dd('false');
        }
    }

    public function printBoleto($urlBoleto)
    {
        return view('sites.donations.print-boleto', compact('urlBoleto'));
    }
}
