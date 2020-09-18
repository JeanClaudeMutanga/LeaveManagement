<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Updates extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Tasks()
    {
        return $this->belongsTo(Tasks::class);
    }
    public function Assignments()
    {
        return $this->belongsTo(Assignments::class);
    }
}
