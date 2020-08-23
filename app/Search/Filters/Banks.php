<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Banks implements Filter
{
    public static function apply(Builder $builder, $criteriaValues)
    {
        $builder->whereHas('bank', function (Builder $query) use ($criteriaValues) {
            foreach ($criteriaValues as $filterField => $value) {
                $query->where($filterField, 'LIKE', '%' . $value . '%');
            }
        });

        return $builder;
    }
}