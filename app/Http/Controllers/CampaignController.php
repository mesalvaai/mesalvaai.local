<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::paginate();
        return view('campaigns.index', compact('campaigns'));
    }


/*    public static function getStudents($id){
        return Student::where('id','=',$id)->get();
    }
*/

    public static function getStudents($id){
        return Student::where('id','=',$id)->get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('campaigns.create');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campaign = Campaign::create($request->all()); 

        $campaign = Campaign::create($request->all());
        return redirect()->route('campaigns.index', $campaign->id)
        ->with('status', 'Campanha salva com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
      return view ('campaigns.show',compact('campaign'));
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        return view('campaigns.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
       $campaign->update($request->all());
       return redirect()->route('campaigns.edit', $campaign->id)
       ->with('status', 'Campanhas alterada com sucesso');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return back()->with('status', 'A campanha foi excluído');
    }
}
