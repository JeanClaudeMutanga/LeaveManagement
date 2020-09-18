<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Leaves()
    {
        return $this->hasMany(Leaves::class);
    }

    public function Vacations()
    {
        return $this->hasMany(Vacations::class);
    }

    public function Applications()
    {
        return $this->hasMany(Applications::class);
    }
    public function Days()
    {
        return $this->hasMany(Days::class);
    }

    public function Tasks()
    {
        return $this->hasMany(Tasks::class);
    }

    public function Assignments()
    {
        return $this->hasMany(Assignments::class);
    }
    public function Updates()
    {
        return $this->hasMany(Updates::class);
    }
}
