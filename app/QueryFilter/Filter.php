<?php

namespace App\QueryFilter;

use Illuminate\Support\Str;

abstract class Filter
{
    public function handle($request,\Closure $next){
        $filter=request()->get(Str::lower( class_basename($this)));
        if ($filter===null){
            return $next($request);
        }

        $builder=$next($request);
        return $this->applyFilter($builder);
    }
    protected abstract function applyFilter($builder);
}
