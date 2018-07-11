<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $fillable = [
		'name', 'slug','status','state_id'
	];

	public function students()
	{
		return $this->hasMany(Student::class);
	}
}
