<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $guarded= [];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Assignments()
    {
        return $this->hasMany(Assignments::class);
    }

    public function Updates()
    {
        return $this->hasMany(Updates::class);
    }

    public function Todos()
    {
        return $this->hasMany(Todos::class);
    }
}
