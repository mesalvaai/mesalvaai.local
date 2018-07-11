<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
   protected  $fillable = [
		'total_amount',
		'donation_date',
		'details',
		'full_name',
		'email',
		'country',
		'postal_code',
		'anonymus',
		'status',
		'created_at',
		'updated_at', 
	];
}
