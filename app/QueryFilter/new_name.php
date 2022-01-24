<?php

namespace App\QueryFilter;

class new_name extends Filter
{
    protected function applyFilter($builder)
    {
        $new=request()->get('new');
        return $builder->where('new','LIKE', "%{$new}%");
    }
}
