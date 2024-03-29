<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{    
	protected $table = 'areas';

	protected  $fillable = [
		'name',
		'slug',
		'description',
		
	];

	public function courses()
	{
		return $this->hasMany(Course::class);
	}
}
