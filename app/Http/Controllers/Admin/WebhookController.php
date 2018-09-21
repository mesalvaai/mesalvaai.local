<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        // To list all Webhooks
        // Recibir el cuerpo de la petición.
        $input = @file_get_contents("php://input");
        // Parsear el contenido como JSON.
        $eventJson = json_decode($input);

        // Usar los datos del Webhooks para alguna acción.
        dd($eventJson);
        // Responder
        http_response_code(200);
        
        // $response = \Response::json('POST', '/info', ['name' => 'Sally']);

        // $response
        //     ->assertStatus(201)
        //     ->assertJson([
        //         'created' => true,
        //     ]);



        // To list Webhooks, using pagination and filter
        //$moip->webhooks()->get(new Pagination(10, 0), "ORD_ID", "ORDER.PAID");
                // try {
        //     // $notification = $moip->notifications()->addEvent('ORDER.*')
        //     //         ->addEvent('PAYMENT.AUTHORIZED')
        //     //         ->setTarget('http://requestb.in/1dhjesw1')
        //     //         ->create();
        //     $notification = $moip->notifications()->get('NPR-DV61EEGGUFCQ');
        //     dd($notification);
        // } catch (Exception $e) {
        //     printf($e->__toString());    
        // }
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
        dd($request);
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
