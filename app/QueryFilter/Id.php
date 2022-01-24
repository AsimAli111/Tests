<?php

namespace App\QueryFilter;

class Id extends Filter
{
    protected function applyFilter($builder)
    {
        $id=request()->get('id');
        return $builder->where('id',$id);
    }

}
