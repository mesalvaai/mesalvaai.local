<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $table = 'turns';

    protected $fillable = ['name'];

    public function course_turns()
    {
        return $this->hasMany('App\Course_Turn');
    }

}
