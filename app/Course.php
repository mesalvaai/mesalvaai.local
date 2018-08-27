<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
	protected $fillable = [
		'name',
		'slug',
		'duration',
		'evaluation',
		'abstract',
		'content',
		'benefits',
		'status',
		'area_id',
		'level_id'
	];

	public function area()
	{
		return $this->belongsTo(Area::class);
	}

	public function level()
	{
		return $this->belongsTo(Level::class);
	}
}
