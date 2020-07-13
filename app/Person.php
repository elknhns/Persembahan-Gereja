<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name', 'area_id', 'code', 'address'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
