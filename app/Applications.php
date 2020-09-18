<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $guarded = [];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Leaves()
    {
        return $this->belongsTo(Leaves::class);
    }

    public function Vacations()
    {
        return $this->belongsTo(Vacations::class);
    }

}
