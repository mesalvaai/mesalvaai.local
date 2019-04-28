<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','cpf','email','data_of_birth','phone','cep','user_id','country_id','state_id','city_id','street','number','neighborhood','complement','status', 'institution', 'course', 'period', 'how_met_us'];
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'students';
    protected $data_of_birth = 'Y-m-d';


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function state()
    {
    	return $this->belongsTo(State::class);
    }

    public function city()
    {
    	return $this->belongsTo(City::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

}
