<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Is is Index Meeting';
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        header('Content-Type: application/json; charset=utf-8');
        $json = file_get_contents('php://input', true);
        $resultado = json_decode($json);
        //$write = json_encode($json);
        
        $result    = $request->all();
        $fp = file_put_contents( 'request.txt', $resultado );
        $name = 'request.txt';
        $text = $result['resource']['payment']['status'];
        $file = fopen($name, 'a');
        fwrite($file, $text);
        fclose($file);
        //$result['resource']['payment']['status']

        return response()->json($text, 200);
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
