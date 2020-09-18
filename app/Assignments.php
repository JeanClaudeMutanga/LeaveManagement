<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignments extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Tasks()
    {
        return $this->belongsTo(Tasks::class);
    }

    public function Updates()
    {
        return $this->hasMany(Updates::class);
    }
}
