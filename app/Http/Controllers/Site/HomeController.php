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

    public function campanhas()
    {
        $campanhas = Campaign::where('published', 1)->paginate(30);
        return view('sites.campanhas', compact('campanhas'));
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
            
            //dd($campaignSlug->slug);
            $pagoComCartao = MoipIntegration::getPagamentoCreditCard($request);
            $campaignSlug = Campaign::where('id', $request['campaign_id'])->first();
            //$campaignSlug = Campaign::find($request['campaign_id']);
            return redirect()->route('show.campanha', $campaignSlug->slug)->with('status', 'Obrigado pos sua contribuição');

        } elseif ( ($request->type_payment === 'BOLETO') AND ($request->op === 'BOLETO') ){

            $boleto = MoipIntegration::getPagamentoBoleto($request);

            $idBoleto = $boleto['idBoleto'];
            $orderId = $boleto['orderId'];
            $codBoleto = $boleto['codBoleto'];
            $urlBoleto = $boleto['urlBoleto'];
            $hrefBoleto = $boleto['hrefBoleto'];
            $total_amount = $boleto['total_amount'];
            $printBoleto = $boleto['print'];
            $full_name = $boleto['full_name'];
            $request->session()->flash('status', 'Obrigado por sua contribuição, aguardamos o pagamento do boleto!!');
            return view('sites.donations.checkout-boleto', compact('idBoleto', 'codBoleto', 'printBoleto', 'hrefBoleto', 'total_amount', 'full_name'));
            //return redirect()->route('gerar.boleto', ['idBoleto' => $idBoleto, 'orderId ' => $orderId]);

        } else {
            dd('false');
        }

    }

    public function gerarBoleto($idBoleto, $orderId)
    {

        $boleto = MoipIntegration::getDadosBoleto($idBoleto, $orderId);
        $codBoleto = $boleto['codBoleto'];
        $full_name = $boleto['full_name'];
        $total_amount = $boleto['total_amount'];
        $urlBoleto = $boleto['urlBoleto'];
        $hrefBoleto = $boleto['hrefBoleto'];
        $printBoleto = $boleto['print'];
        session()->flash('status', 'Obrigado por sua contribuição, aguardamos o pagamento do boleto!!');
        return view('sites.donations.gerar-boleto', compact('idBoleto', 'full_name', 'total_amount', 'codBoleto', 'printBoleto', 'hrefBoleto'));
    }

    public function printBoleto($urlBoleto)
    {
        return view('sites.donations.print-boleto', compact('urlBoleto'));
    }
}
