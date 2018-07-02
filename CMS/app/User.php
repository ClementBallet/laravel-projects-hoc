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
        'name', 'email', 'password',
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
     * Undocumented function
     *
     * @param string $value
     * @return void
     */
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * Undocumented function
     *
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public static function scopeLatest($query)
    {
        return $query->orderBy("id", "desc")->get();
    }
}
