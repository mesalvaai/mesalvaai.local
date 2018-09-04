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
            return redirect()->route('campanhas')->with('status', 'Obrigado pos sua contribuição');

        } elseif ( ($request->type_payment === 'BOLETO') AND ($request->op === 'BOLETO') ){

            $boleto = MoipIntegration::getPagamentoBoleto($request);
            $idBoleto = $boleto['idBoleto'];
            $codBoleto = $boleto['codBoleto'];
            $urlBoleto = $boleto['urlBoleto'];
            $hrefBoleto = $boleto['hrefBoleto'];
            $printBoleto = $boleto['print'];
            $request->session()->flash('status', 'Obrigado por sua contribuição, aguardamos o pagamento do boleto!!');
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
