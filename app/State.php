<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
   protected $fillable = [
		'name', 'sigla','slug','status','country_id'
	];

	public function students()
	{
		return $this->hasMany(Student::class);
	}
}
