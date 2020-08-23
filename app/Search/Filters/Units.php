<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Units implements Filter
{
    public static function apply(Builder $builder, $criteriaValues)
    {
        $builder->whereHas('unit', function (Builder $query) use ($criteriaValues) {
            foreach ($criteriaValues as $filterField => $value) {

                if ( $filterField == 'status_keaktifan' ) {
                    $query->join('mdm_lookups', function ($join) use ($value) {
                        $join->on('mdm_customer_unit.status_keaktifan_id', '=', 'mdm_lookups.id')
                                ->where('mdm_lookups.lookup_name', '=', $value);
                    });
                } else {
                    $query->where($filterField, 'LIKE', '%' . $value . '%');
                }
            }
        });

        return $builder;
    }
}