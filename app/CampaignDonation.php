<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignDonation extends Model
{
   protected  $fillable = [
		'campaign_id',
		'donation_id',
		'donation_amount',
		'details'
	];
	
	protected $table = 'campaign_donation';
}
