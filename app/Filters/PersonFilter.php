<?php

namespace App\Filters;

class PersonFilter extends AbstractFilter
{
    protected $filters = [
        'area_id' => AreaFilter::class
    ];
}