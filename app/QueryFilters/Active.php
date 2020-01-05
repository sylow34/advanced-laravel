<?php


namespace App\QueryFilters;


use Illuminate\Http\Request;
use Closure;

class Active extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where($this->filterName(), request($this->filterName()));
    }
}
