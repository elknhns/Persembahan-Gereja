<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
