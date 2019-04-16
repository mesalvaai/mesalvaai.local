<?php

namespace App\Http\Controllers\Admin;

use App\Donation;
use App\CampaignDonation;
use App\Campaign;
use App\Country;
use App\Reward;
use App\DonationReward;

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
        
       $donations = Donation::paginate();
       return view('admins.donations.index',compact('donations'));
    }

    public function confirmed(Reward $reward)
    {
    // return view('admins.donations.create', compact('reward'));

      $campaigns = Campaign::orderBy('title', 'ASC')->pluck('title', 'id');
      $countries = Country::orderBy('name', 'ASC')->pluck('name');
      return view('admins.donations.create',compact('campaigns', 'countries', 'reward'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $campaigns = Campaign::orderBy('title', 'ASC')->pluck('title', 'id');
     $countries = Country::orderBy('name', 'ASC')->pluck('name', 'name');

     return view('admins.donations.create',compact('campaigns', 'countries'));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Reward $reward)
    { 
     $messages = [
       'required' => 'Este campo é obrigatório.',
       'max' => 'Valor máximo de caracteres excedido.',
       'email'=> 'Este campo deve conter um endereço de e-mail válido.',
     ];

     $validator = \Validator::make($request->all(), [
      'total_amount' => 'required',
      'details' => 'required',
      'full_name' => 'bail|required|max:255',
      'email' => 'bail|email|required|max:255',
      'country' => 'bail|required|max:255',
      'postal_code' => 'required',
      'status' =>'bail|required|max:1',
    ], $messages);

     if ($validator->fails()) {

      return redirect()->back()
      ->withErrors($validator)
      ->withInput();  


    }else{


      $donation = new Donation($request->all());
      

      $donationReward = new DonationReward();
      $donationReward->reward_id = $reward->id;

      $donationReward = new DonationReward();
      $donationReward->reward_id = $reward->id;

      $campaignDonation = new CampaignDonation();


      if($donation->anonymus != 1){
        $donation->anonymus  = 0;
      }
      else{
        $donation->full_name = 'Anônimo';
        $donation->email = 'Anônimo';
      }

      $donation->save();

      $donationReward->donation_id = $donation->id;
      $donationReward->save();

      $campaignDonation->campaign_id = $request->input('campaign_id');
      $campaignDonation->donation_id =$donation->id;
      $campaignDonation->donation_amount = $request->input('total_amount');
      $campaignDonation->details = $request->input('details');

      $campaignDonation->save();


      $campaign = Campaign::where('id', $request->input('campaign_id'))->first();

      $campaign->funds_received = $campaign->funds_received + $request->input('total_amount');

      $campaign->update();


      return redirect()->route('donations.index', $donation->id)
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

      $campaign = \DB::table('campaigns')->join('campaign_donation', 'campaigns.id', '=', 'campaign_donation.campaign_id')
      ->join('donations', 'donations.id', '=', 'campaign_donation.donation_id')
      ->select('campaigns.title')->where('campaign_donation.donation_id',$donation->id)
      ->first();

      return view('admins.donations.show', compact('donation', 'campaign'));

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

      $countries = Country::orderBy('name', 'ASC')->pluck('name', 'name');

      $campaign_donation = \DB::table('campaign_donation')->select('campaign_id')->where('donation_id', $donation->id)->first();

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
       'required' => 'Este campo é obrigatório.',
       'max' => 'Valor máximo de caracteres excedido.',
       'email'=> 'Este campo deve conter um endereço de e-mail válido.',
     ];

     $validator = \Validator::make($request->all(), [
      'total_amount' => 'required',
      'details' => 'required',
      'full_name' => 'bail|required|max:255',
      'email' => 'bail|email|required|max:255',
      'country' => 'bail|required|max:255',
      'postal_code' => 'required',
      'status' =>'bail|required|max:1',
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
