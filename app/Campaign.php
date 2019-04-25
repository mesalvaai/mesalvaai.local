<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
	protected $fillable =['title','goal','start_date', 'funds_received', 'end_date', 'file_path','description','location','status','category_id','student_id'];

	public function rewards()
    {
        return $this->hasMany('App\Reward');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function donations()
    {
    	return $this->belongsToMany(Donation::class)->withPivot('id', 'type_payment', 'payment_id', 'order_id', 'payment_status')->withTimestamps();;
    }

}
