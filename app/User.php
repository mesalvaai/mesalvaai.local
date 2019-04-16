<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\RedefinirSenha as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    protected $fillable = [
        'name', 'email', 'password',
    ];
 
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = true;

    //ao definir a senha
    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    } 

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notifications\RedefinirSenha($token));
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(403, 'This action is unauthorized User Model.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        //Function roles chama do pacote Shinobi
        if ($this->roles()->where('slug', $role)->first()) {
            return true;
        }
        return false;
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
