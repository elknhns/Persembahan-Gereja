<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name', 'area_id', 'code', 'address'
    ];

    protected $with = ['area'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function offerings()
    {
        return $this->hasMany(Offering::class);
    }
}
