<?php

namespace App;

use App\Filters\PersonFilter;
use Illuminate\Database\Eloquent\Builder;
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

    public function scopeFilter(Builder $builder, $request)
    {
        return (new PersonFilter($request))->filter($builder);
    }
}
