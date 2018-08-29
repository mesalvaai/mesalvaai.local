<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $fillable = [
        'monthly_payment','discount','scholarship', 'economy', 'vacancy', 'status','course_id','period_id','level_id'
    ];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'costs';
  
}
