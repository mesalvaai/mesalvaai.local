<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_Modality extends Model
{
    //
    public $timestamps = false;

	protected $table = "course_modality";

	protected $fillable = [
		'course_id',
		'modality_id'
	];
}
