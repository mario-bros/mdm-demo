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
        // $builder = $builder->join('mdm_customer_contact', 'ILIKE', '%' . $value . '%');  
        // $builder->addSelect('mdm_customer_contact.contact_value');

        $builder->whereHas('contact', function (Builder $query) use ($criteriaValues) {
            foreach ($criteriaValues as $filterField => $value) {

                if ( $filterField == 'tipe_kontak' ) {
                    $query->join('mdm_lookups', function ($join) use ($value) {
                        $join->on('mdm_customer_contact.type_contact_id', '=', 'mdm_lookups.id')
                            // ->orOn('mdm_customer_profile.type_contact_id', '=', 'mdm_lookups.id');
                            // ->on('mdm_lookups.lookup_name', '=', $value);
                                ->where('mdm_lookups.lookup_name', '=', $value);
                    });
                    // $query->join('mdm_lookups', 'mdm_customer_profile.type_contact_id', '=', 'mdm_lookups.id');
                } else {
                    $query->where($filterField, 'ILIKE', '%' . $value . '%');
                }
                // $query->addSelect($filterField);
            }
            // $query->where
        });

        /*foreach ($criteriaValues as $filterField => $value) {
            $builder = $builder->where($filterField, 'ILIKE', '%' . $value . '%');
        }*/

        return $builder;
        // return $builder->where('customer_id', 'ILIKE', '%' . $value . '%');
    }
}