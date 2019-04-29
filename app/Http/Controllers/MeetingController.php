<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;
use App\Campaign;
use App\CampaignDonation;
use Moip;
use MyFunctions;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $moip = Moip::start();

        // header('Content-Type: application/json; charset=utf-8');
        // $json = file_get_contents('php://input', true);
        // $resultado = json_decode($json);

        $payment = $moip->payments()->get("PAY-3GGWEHLSFTW8");
        $paymentId = $payment->getId(); //PAY-68JDI01L0E8C
        $event = $payment->getStatus(); //CREATED, WAITING, IN_ANALYSIS, PRE_AUTHORIZED, AUTHORIZED, CANCELLED, REFUNDED, REVERSED, SETTLED.
        $amount = $payment->getAmount()->total; //Monto da doação
        $paymentType = $payment->getFundingInstrument()->method; //BOLETO, CRETIT_CARD

        $donation = new Donation();
        // $donations = $donation->where('type_payment', 'BOLETO')->where('payment_id', 'PAY-68JDI01L0E8C')->first();
        // dd($donations->total_amount );

        switch ($event) {
            case 'WAITING':
                // Atualização de status para Aguardando, indica que a Wirecard está aguardando confirmação de pagamento.
                $donations = $donation->where('type_payment', $paymentType)->where('payment_id', $paymentId)->first();
                dd($donations->payment_status);
                foreach ($donations->campaigns as $cam) {
                    echo $cam->pivot->type_payment;
                }
                break;
            case 'IN_ANALYSIS':
                // Status Em Análise, indica que o pagamento está passando por uma análise de risco dentro da Wirecard.
                break;
            case 'PRE_AUTHORIZED':
                // Pré-autorizado: esse status indica a reserva do valor do pagamento no cartão do cliente.
                break;
            case 'AUTHORIZED':
                // Atualização de status para Autorizado
                $donations = $donation->where('type_payment', $paymentType)->where('payment_id', $paymentId)->first();
                //convertCoin("BR",0,$xValue); // 12.345.678
                //dd(MyFunctions::convertCoin("EN", 2,$amount));
                //dd($donations);
                if( $donations != null and $donations->payment_status != 'AUTHORIZED' ){
                    $campaigns = $donation->find($donations->id)->campaigns()->first();
                    $campaignDonation = CampaignDonation::find($campaigns->pivot->id);
                    $campaignDonation->payment_status = $event;
                    $campaignDonation->details = 'Pagamento Autorizado';
                    if ($campaignDonation->save()) {
                        $donation = Donation::where('id', $donations->id)->first();
                        $donation->payment_status = $event;
                        if ($donation->update()) {
                            $campaign = Campaign::where('id', $campaigns->id)->first();
                            $campaign->funds_received = $campaign->funds_received + MyFunctions::convertCoin("EN", 2,$amount);
                            $campaign->update();
                        }
                        
                    }
                    dd(true);
                }
                dd(false);
                // foreach ($donations->campaigns as $cam) {
                //     echo $cam->pivot->type_payment;
                // }

                break;
            case 'CANCELLED':
                // Pagamento Cancelado
                break;
            case 'REFUNDED':
                // Pagamento reembolsado (quem processa reembolsos são Wirecard e/ou Merchant).
                break;
            case 'REVERSED':
                // Estornado não reconhecimento do pagamento em sua fatura).
                break;
            case 'SETTLED':
                // Atualização para Concluído, valor disponível para transferência em conta bancária (saque).
                break;
            default:
                break;
        } 
        $response = [
            'msg' => 'Meeting Created',
            'data' => $event
        ];

        return response()->json($response, 200);
    }

    public function jsonWebhooks(Request $request)
    {
        $payment = '{  
           "date":"",
           "env":"",
           "event":"PAYMENT.WAITING",
           "resource":{  
              "payment":{  
                 "_links":{  
                    "order":{  
                       "href":"https://sandbox.moip.com.br/v2/orders/ORD-UIV5OBV81HWR",
                       "title":"ORD-UIV5OBV81HWR"
                    },
                    "self":{  
                       "href":"https://sandbox.moip.com.br/v2/payments/PAY-ICZGLZS503NV"
                    }
                 },
                 "acquirerDetails":{  
                    "taxDocument":{  
                       "number":"01027058000191",
                       "type":"CNPJ"
                    }
                 },
                 "amount":{  
                    "currency":"BRL",
                    "fees":0,
                    "gross":2000,
                    "liquid":2000,
                    "refunds":0,
                    "total":2000
                 },
                 "createdAt":"2018-06-05T16:15:08.502-03",
                 "delayCapture":false,
                 "events":[  
                    {  
                       "createdAt":"2018-06-05T16:15:08.504-03",
                       "type":"PAYMENT.CREATED"
                    }
                 ],
                 "fees":[  
                    {  
                       "amount":0,
                       "type":"TRANSACTION"
                    }
                 ],
                 "fundingInstrument":{  
                    "creditCard":{  
                       "brand":"MASTERCARD",
                       "first6":"555566",
                       "holder":{  
                          "birthDate":"1988-12-30",
                          "birthdate":"1988-12-30",
                          "fullname":"CANCELLED",
                          "taxDocument":{  
                             "number":"33333333333",
                             "type":"CPF"
                          }
                       },
                       "id":"CRC-442ZP3ZQBB5H",
                       "last4":"8884",
                       "store":true
                    },
                    "method":"CREDIT_CARD"
                 },
                 "id":"PAY-ICZGLZS503NV",
                 "installmentCount":1,
                 "receivers":[  
                    {  
                       "amount":{  
                          "currency":"BRL",
                          "fees":0,
                          "refunds":0,
                          "total":1000
                       },
                       "feePayor":true,
                       "moipAccount":{  
                          "fullname":"Moip SandBox",
                          "id":"MPA-CULBBYHD11",
                          "login":"integracao@labs.moip.com.br"
                       },
                       "type":"PRIMARY"
                    },
                    {  
                       "amount":{  
                          "currency":"BRL",
                          "fees":0,
                          "refunds":0,
                          "total":1000
                       },
                       "feePayor":false,
                       "moipAccount":{  
                          "fullname":"Sales Machine da Silva",
                          "id":"MPA-9D1519587231",
                          "login":"1522958134@myemail.com"
                       },
                       "type":"SECONDARY"
                    }
                 ],
                 "statementDescriptor":"MyStore",
                 "status":"WAITING",
                 "updatedAt":"2018-06-05T16:15:08.502-03"
              }
           }
        }';

        $payment = json_decode($payment);
        $id = $payment->resource->payment->id;
        $event = $payment->event;
        
        $status = $payment->resource->payment->status;
        $amount = $payment->resource->payment->amount->total;
        $fees = $payment->resource->payment->fees[0]->type;

        $other = $payment->resource->payment;
        dd($other);
        $fp = file_put_contents( 'request.txt', $payment );
        $name = 'request.txt';
        $text = $status;
        $file = fopen($name, 'a');
        fwrite($file, $text);
        fclose($file);
        //$result['resource']['payment']['status']
        
        $meetting = [
            'id' => $id,
            'event' => $event,
            'status' => $status,
            'amount' => $amount,
            'fees' => $fees
        ];

        $response = [
            'msg' => 'Meeting Created',
            'data' => $meetting
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        //$moip = Moip::start();

        header('Content-Type: application/json; charset=utf-8');
        $json = file_get_contents('php://input', true);
        $resultado = json_decode($json);

        $payment    = $request->all();

        $paymentId = $payment['resource']['payment']['id'];
        $evento = $payment['event']; //PAYMENT.AUTHORIZED
        $status = $payment['resource']['payment']['status']; //AUTHORIZED
        $amount = $payment['resource']['payment']['amount']['total'];
        $method = $payment['resource']['payment']['fundingInstrument']['method'];

        $donation = new Donation();

        switch ($status) {
            case 'WAITING':
                // Atualização de status para Aguardando, indica que a Wirecard está aguardando confirmação de pagamento.
                $donations = $donation->where('type_payment', $method)->where('payment_id', $paymentId)->first();
                dd($donations->payment_status);
                foreach ($donations->campaigns as $cam) {
                    echo $cam->pivot->type_payment;
                }
                break;
            case 'IN_ANALYSIS':
                // Status Em Análise, indica que o pagamento está passando por uma análise de risco dentro da Wirecard.
                break;
            case 'PRE_AUTHORIZED':
                // Pré-autorizado: esse status indica a reserva do valor do pagamento no cartão do cliente.
                break;
            case 'AUTHORIZED':
                // Atualização de status para Autorizado
                $donations = $donation->where('type_payment', $method)->where('payment_id', $paymentId)->first();
                //convertCoin("BR",0,$xValue); // 12.345.678
                //dd(MyFunctions::convertCoin("EN", 2,$amount));
                //dd($donations);
                if( $donations != null and $donations->payment_status != 'AUTHORIZED' ){
                    $campaigns = $donation->find($donations->id)->campaigns()->first();
                    $campaignDonation = CampaignDonation::find($campaigns->pivot->id);
                    $campaignDonation->payment_status = $status;
                    $campaignDonation->details = 'Pagamento Autorizado no' . $method;
                    if ($campaignDonation->save()) {
                        $donation = Donation::where('id', $donations->id)->first();
                        $donation->payment_status = $status;
                        if ($donation->update()) {
                            $campaign = Campaign::where('id', $campaigns->id)->first();
                            $campaign->funds_received = $campaign->funds_received + MyFunctions::convertCoin("EN", 2,$amount);
                            $campaign->update();
                        }
                        
                    }
                    return response()->json('Meeting Created',200);
                }
                return response()->json('Erro Meeting Created',500);
                // foreach ($donations->campaigns as $cam) {
                //     echo $cam->pivot->type_payment;
                // }

                break;
            case 'CANCELLED':
                // Pagamento Cancelado
                break;
            case 'REFUNDED':
                // Pagamento reembolsado (quem processa reembolsos são Wirecard e/ou Merchant).
                break;
            case 'REVERSED':
                // Estornado não reconhecimento do pagamento em sua fatura).
                break;
            case 'SETTLED':
                // Atualização para Concluído, valor disponível para transferência em conta bancária (saque).
                break;
            default:
                break;
        } 
        $response = [
            'msg' => 'Meeting Created',
            'data' => $status
        ];

        return response()->json($response, 200);

        /*$payment = $moip->payments()->get("$paymentId");
        $paymentId = $payment->getId(); //PAY-68JDI01L0E8C
        $event = $payment->getStatus(); //CREATED, WAITING, IN_ANALYSIS, PRE_AUTHORIZED, AUTHORIZED, CANCELLED, REFUNDED, REVERSED, SETTLED.
        $amount = $payment->getAmount()->total; //Monto da doação
        $paymentType = $payment->getFundingInstrument()->method; //BOLETO, CRETIT_CARD */

        // $donation = new Donation();
        // $donations = $donation->where('type_payment', $method)->where('payment_id', $paymentId)->first();
        // $donations->payment_status = $status;
        // $donations->details = $method . 'yeha';
        // if ($donations->update()) {
        //     return response()->json('Meeting Created',200);
        // } else {
        //     return response()->json('Erro Meeting Created',500);
        // }

        // $fp = file_put_contents( 'request.txt', $resultado );
        // $name = 'request.txt';
        // $text = $fees;
        // $file = fopen($name, 'a');
        // fwrite($file, $text);
        // fclose($file);
        
        // $meetting = [
        //     'id' => $paymentId,
        //     'status' => $status,
        //     'amount' => $amount
        // ];

        // $response = [
        //     'msg' => 'Meeting Created',
        //     'data' => $meetting
        // ];

        // return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getJsonStore(Request $request)
    {
        header('Content-Type: application/json; charset=utf-8');
        $json = file_get_contents('php://input', true);
        $resultado = json_decode($json);
        //$write = json_encode($json);
        
        $payment    = $request->all();

        $id = $payment['resource']['payment']['id'];
        $event = $payment['event'];
        $status = $payment['resource']['payment']['status'];
        $amount = $payment['resource']['payment']['amount']['total'];
        $fees = $payment['resource']['payment']['fees'][0]['amount'];

        $fp = file_put_contents( 'request.txt', $resultado );
        $name = 'request.txt';
        $text = $status;
        $file = fopen($name, 'a');
        fwrite($file, $text);
        fclose($file);
        //$result['resource']['payment']['status']
        
        $meetting = [
            'id' => $id,
            'event' => $event,
            'status' => $status,
            'amount' => $amount,
            'fees' => $fees
        ];

        $response = [
            'msg' => 'Meeting Created',
            'data' => $meetting
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $json = file_get_contents('php://input');
        $resultado = json_decode($json, true);

        $title = $request->input('title');
        $description = $request->input('description');

        $meetting = [
            'title' => $title,
            'description' => $description
        ];

        $response = [
            'msg' => 'Meeting Created',
            'data' => $meetting
        ];

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
