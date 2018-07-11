<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    //
    protected  $fillable = [
		'user_id',
		'campaign_id',
		'title',
		'donation',
		'description',
		'quantity',
		'unlimited',
		'delivery_date',
		'delivery_mode',
		'variations',
		'thanks',
		'created_at',
		'updated_at', 
	];
}
