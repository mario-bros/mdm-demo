<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Contacts implements Filter
{

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    // public static function apply(Builder $builder, array $criteriaValues)
    public static function apply(Builder $builder, $criteriaValues)
    {
        $builder->whereHas('contact', function (Builder $query) use ($criteriaValues) {
            foreach ($criteriaValues as $filterField => $value) {

                if ( $filterField == 'tipe_kontak' ) {
                    $query->join('mdm_lookups', function ($join) use ($value) {
                        $join->on('mdm_customer_contact.type_contact_id', '=', 'mdm_lookups.id')
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