<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Moip;

class WebhookController extends Controller
{
    
    public function index(Request $request)
    {
        /**
        * Este exemplo usa a SDK da Wirecard de PHP, disponível 
        * em: https://github.com/moip/moip-sdk-php
        */
        $moip = Moip::start();
        // Pega o RAW data da requisição
        $json = file_get_contents('php://input');
        // Converte os dados recebidos
        $response = json_decode($json, true);

        // To list all Webhooks
        $moip->webhooks()->get();

        // To list Webhooks, using pagination and filter
        //$moip->webhooks()->get(new Pagination(10, 0), "ORD_ID", "ORDER.PAID");
        
        //$payment = $moip->payments()->get("PAY-NH5W9QM7X4K7");

        dd($moip);
        
    }

    /**
     * [store Create Webhooks]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function createWebhook(Request $request)
    {
        $moip = Moip::start();

        $json = file_get_contents('php://input');
        $resultado = json_decode($json, true);

        $notification = $moip->notifications()
            ->addEvent("PAYMENT.*")
            ->setTarget("http://mesalvaai.com/api/V1/meeting")
            ->create();

        return Response::json([
             'status' =>'0k'
        ], 200); 
    }

    public function showWebhook()
    {
        $moip = Moip::start();

        $notification = $moip->notifications()->getList();
        dd($notification);
    }

    
    public function destroyWebhook()
    {
        $moip = Moip::start();

        $notification = $moip->notifications()->delete('NPR-3ADBMQK26JMA');
        //$notification = $moip->notifications()->delete('NPR-JN2XJU76LRO3');
        dd($notification);
    }
}
