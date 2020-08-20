<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Identities implements Filter
{
    public static function apply(Builder $builder, $criteriaValues)
    {
        $builder->whereHas('identity', function (Builder $query) use ($criteriaValues) {
            foreach ($criteriaValues as $filterField => $value) {

                if ( $filterField == 'kategori_identitas' ) {
                    $query->join('mdm_lookups', function ($join) use ($value) {
                        $join->on('mdm_customer_identity.category_identity_id', '=', 'mdm_lookups.id')
                                ->where('mdm_lookups.lookup_name', '=', $value);
                    });
                } else {
                    $query->where($filterField, 'ILIKE', '%' . $value . '%');
                }
            }
        });

        return $builder;
    }
}