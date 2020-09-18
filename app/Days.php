<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    public function User()
    {
        
        return $this->belongsTo(User::class);
    }

    public function Leaves()
    {
        
        return $this->belongsTo(Leaves::class);
    }
}
