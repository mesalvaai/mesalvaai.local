<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_Period extends Model
{
    //
	public $timestamps = false;
	protected $table = "course_period";
	
	protected $fillable = [
		'course_id',
		'period_id'
	];
}
