<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Retourne la relation entre la table Roles et Users
     *
     * @return void
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Retourne si user est admin ou non
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return ($this->role->name == 'admin') ? true : false ;
    }
}
