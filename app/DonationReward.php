<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationReward extends Model
{
    //
    protected $table = "donation_reward";
    
    protected  $fillable = 
    [
		
		'donation_id',
		'reward_id'
		
	];
}
