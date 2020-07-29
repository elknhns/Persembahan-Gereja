<?php

namespace App\Filters;

class AreaFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('area_id', $value);
    }
}