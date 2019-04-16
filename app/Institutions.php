<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institutions extends Model
{
    protected $fillable = [
        'name', 'slug', 'phone', 'cpnj', 'cpe', 'street', 'number', 'neighborhood', 'complement', 'handbag', 'logo', 'evaluation', 'description', 'status', 'state_id', 'city_id'
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'institutions';
}
