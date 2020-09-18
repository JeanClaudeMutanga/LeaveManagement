<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    protected $guarded = [];
    public function Tasks()
    {
        return $this->belongsTo(Tasks::class);
    }

    public function Updates()
    {
        return $this->hasMany(Updates::class);
    }
}
