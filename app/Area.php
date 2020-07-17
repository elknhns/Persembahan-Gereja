<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name', 'slug'];
    
    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
