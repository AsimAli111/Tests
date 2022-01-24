<?php

namespace App\QueryFilter;

class about extends Filter
{
    protected function applyFilter($builder)
    {
        $about=request()->get('about');
        return $builder->where('about',$about);
    }
}
