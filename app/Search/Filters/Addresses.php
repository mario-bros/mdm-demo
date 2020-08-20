<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Addresses implements Filter
{
    public static function apply(Builder $builder, $criteriaValues)
    {
        // dd($criteriaValues);
        $builder->whereHas('address', function (Builder $query) use ($criteriaValues) {
            foreach ($criteriaValues as $filterField => $value) {

                if ( $filterField == 'status_tempat_tinggal' ) {
                    $query->join('mdm_lookups', function ($join) use ($value) {
                        $join->on('mdm_customer_address.status_tempat_tinggal_id', '=', 'mdm_lookups.id')
                                ->where('mdm_lookups.lookup_name', '=', $value);
                    });
                } elseif ( $filterField == 'kecamatan' ) {
                    $query->join('mdm_mst_kecamatan', function ($join) use ($value) {
                        $join->on('mdm_customer_address.kecamatan_id', '=', 'mdm_mst_kecamatan.id')
                                ->where('mdm_mst_kecamatan.name', '=', $value);
                    });
                } elseif ( $filterField == 'kota' ) {
                    $query->join('mdm_mst_kota', function ($join) use ($value) {
                        $join->on('mdm_customer_address.kota_id', '=', 'mdm_mst_kota.id')
                                ->where('mdm_mst_kota.name', '=', $value);
                    });
                } elseif ( $filterField == 'provinsi' ) {
                    $query->join('mdm_mst_provinsi', function ($join) use ($value) {
                        $join->on('mdm_customer_address.propinsi_id', '=', 'mdm_mst_provinsi.id')
                                ->where('mdm_mst_provinsi.name', '=', $value);
                    });
                } else {
                    $query->where($filterField, 'ILIKE', '%' . $value . '%');
                }
            }
        });

        return $builder;
    }
}