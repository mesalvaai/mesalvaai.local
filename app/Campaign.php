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

}