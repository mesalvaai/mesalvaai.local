<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_Turn extends Model
{
    
    protected $table = "course_turn";

	protected $fillable = [
		'course_id',
		'turn_id'
	];
}
