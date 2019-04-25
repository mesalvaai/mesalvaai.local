<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
   protected  $fillable = [
		'details',
		'full_name',
		'email',
		'date_of_birth',
		'cpf',
		'total_amount',
		'donation_date',
		'type_payment',
		'payment_id',
		'order_id',
		'country',
		'postal_code',
		'anonymus',
		'status',
		'created_at',
		'updated_at', 
	];
}
