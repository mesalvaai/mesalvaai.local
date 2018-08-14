<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name'];
    protected $guarded = ['id'];
    protected $table = 'levels';

}