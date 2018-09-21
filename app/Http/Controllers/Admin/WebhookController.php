<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Moip;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Response;
use Moip;

class WebhookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $moip = Moip::start();

        header('Content-Type: application/json');
        $request = file_get_contents('php://input');
        $req_dump = print_r( $request, true );
        $fp = file_put_contents( 'request.log', $req_dump );
        
        // $value = 'test';

        // return Response::json([
        //     'hello' => $value
        // ], 200); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // /**
        // * Este exemplo usa a SDK do Moip de PHP, disponível 
        // * em: https://github.com/moip/moip-sdk-php
        // */

        // // To list all Webhooks
        // $webhooks = $moip->webhooks()->get();
        // print_r($webhooks);
        // $payment = $moip->payments()->get('PAY-NRBZI15BSN39');
        // dd($payment);
        

        // // To list Webhooks, using pagination and filter
        // $webhooks = $moip->webhooks()->get(new Pagination(10, 0), "ORD_ID", "ORDER.PAID");

        // print_r($webhooks);

        // $notification = $moip->notifications()->addEvent("ORDER.*")
        //     ->addEvent("PAYMENT.AUTHORIZED")
        //   ->addEvent("PAYMENT.CANCELLED")
        //   ->setTarget("http://www.mesalvaai.com/webhook")
        //   ->create();

        // dd($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
