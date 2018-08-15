<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $fillable = ['name'];
    protected $guarded = ['id'];
    protected $table = 'turns';
    public $timestamps = false;
}
