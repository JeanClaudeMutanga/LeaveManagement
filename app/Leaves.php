<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    protected $guarded = [];
    
    public function User()
    {
        
        return $this->belongsTo(User::class);
    }

    public function Applications()
    {
        
        return $this->hasMany(Applications::class);
    }

    public function Days()
    {
        
        return $this->hasMany(Days::class);
    }
}
