<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['name','cpf','email','data_of_birth','phone','cep','state','city','street','number','neighborhood','complement','status'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'students';
}
 