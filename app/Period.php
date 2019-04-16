<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
   protected $fillable = [
		'slug', 'name'
	];

	// public function students()
	// {
	// 	return $this->hasMany(Student::class);
	// }
}
