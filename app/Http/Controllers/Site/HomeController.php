<?php

namespace App\Http\Controllers\Site;

use App\MoipIntegration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Donations\DonationsRequest;
use App\Helpers\MyFunctions;
use Illuminate\Support\Facades\Mail;
use App\Mail\BoletoMail;

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
        return view('sites.site', compact('campanhas'));
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
        //dd($slug);
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
            $campaignSlug = Campaign::where('id', $request['campaign_id'])->first();
            
            return redirect()->route('show.campanha', $campaignSlug->slug)->with('status', 'Obrigado por sua contribuição!');

        } elseif ( ($request->type_payment === 'BOLETO') AND ($request->op === 'BOLETO') ){

            $boleto = MoipIntegration::getPagamentoBoleto($request);

            //dd($boleto);
            try {
                //Mail::to($request->email)->send(new BoletoMail($boleto['full_name'], $boleto['urlBoleto']));

                Mail::send('mail.boletomail', ['name'=>$boleto['full_name'], 'link'=>$boleto['urlBoleto']], function($message) use ($request)
                {
                    $message->from('financeiro@mesalvaai.com', 'Me salva aí | Financeiro');

                    $message->subject('Cópia do boleto');
            
                    $message->to($request->email);
                });

            } catch (\Throwable $th) {
            }
            

            $idBoleto = $boleto['idBoleto'];
            $orderId = $boleto['orderId'];
            $codBoleto = $boleto['codBoleto'];
            $urlBoleto = $boleto['urlBoleto'];
            $bolCod = $boleto['CodigoBol']; //no modo dev esse campo é 'bolCod'
            $total_amount = $boleto['total_amount'];
            $printBoleto = $boleto['print'];
            $full_name = $boleto['full_name'];
            $request->session()->flash('status', 'O boleto pode levar até duas horas para ser processado e até dois dias úteis para ser compensado. Obrigado pela sua contribuição!');
            return view('sites.donations.checkout-boleto', compact('idBoleto', 'codBoleto', 'printBoleto', 'urlBoleto', 'bolCod', 'total_amount', 'full_name'));
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
