<?php

namespace App\Http\Controllers\Admin;

use App\Donation;

use App\CampaignDonation;
use App\Campaign;
use App\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $donations = Donation::paginate();
      return view('admins.donations.index',compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $campaigns = Campaign::orderBy('title', 'ASC')->pluck('title', 'id');
      $countries = Country::orderBy('name', 'ASC')->pluck('name');
      return view('admins.donations.create',compact('campaigns', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
     $messages = [
      'max' => 'Valor máximo de caracteres excedido!',
    ];

    $validator = \Validator::make($request->all(), [

      'full_name' => 'max:255',
      'email' => 'max:255',

    ], $messages);

    if ($validator->fails()) {

      return redirect()->back()
      ->withErrors($validator)
      ->withInput();  


    }else{
      $parameters = $request->all(); 

      $donation = new Donation($parameters);

      $campaignDonation = new CampaignDonation();


      if($donation->anonymus != 1){
        $donation->anonymus  = 0;
      }

      $donation->save();

      $campaignDonation->campaign_id = $request->input('campaign_id');
      $campaignDonation->donation_id =$donation->id;
      $campaignDonation->donation_amount = $request->input('total_amount');
      $campaignDonation->details = $request->input('details');

      $campaignDonation->save();


      $campaign = Campaign::where('id','=',$request->input('campaign_id'))->first();

      $campaign->funds_received = $campaign->funds_received + $request->input('total_amount');

      $campaign->update();

      return redirect()->route('donations.edit', $donation->id)
      ->with('status', 'Doação cadastrada com sucesso!');
    }
  }
    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
      return view('admins.donations.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
      $campaigns = Campaign::orderBy('title', 'ASC')->pluck('title', 'id');
      $countries = Country::orderBy('name', 'ASC')->pluck('name');

      $campaign_donation = CampaignDonation::pluck('campaign_id')->where('donation_id', $donation->id);

      return view('admins.donations.edit', compact('donation', 'campaigns', 'campaign_donation', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {

     $messages = [
      'max' => 'Valor máximo de caracteres excedido!',
    ];

    $validator = \Validator::make($request->all(), [

      'full_name' => 'max:255',
      'email' => 'max:255',

    ], $messages);

    if ($validator->fails()) {

      return redirect()->back()
      ->withErrors($validator)
      ->withInput();  


    }else{

      $donation->update($request->all());

      return redirect()->route('donations.edit', $donation->id)
      ->with('status', 'Doação editada com sucesso!');
    }
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
     $donation->delete();

     return back()->with('status', 'Doação Excluída com sucesso!');
   }
 }
