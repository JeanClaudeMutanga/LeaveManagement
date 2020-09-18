<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacations extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Applications()
    {
        return $this->Applications(User::class);
    }
}
