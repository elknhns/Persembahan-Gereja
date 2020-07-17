<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    protected $fillable = [
        'person_id', 'code', 'value'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
