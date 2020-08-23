<?php

namespace App\Search;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Helpers\CollectionHelper;
use App\Model\ProfileWeb;

class GoldenRecordSearch
{
    public static function apply(Request $filters)
    {
        $detailAttrs = [];
        $query = static::applyDecoratorsFromRequest($filters, (new ProfileWeb)->newQuery());

        if ( array_key_exists('contacts', $filters->all()) ) {
            $detailAttrs['contacts'] = true;
        }

        return static::getResults($query, $detailAttrs);
    }

    private static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {

        $query->select(
                        'mdm_customer_profile.u_id', 
                        'mdm_customer_profile.customer_id',
                        'mdm_customer_profile.full_name',
                        'mdm_customer_profile.first_name',
                        'mdm_customer_profile.middle_name',
                        'mdm_customer_profile.last_name',
                        'mdm_customer_profile.surname',
                        'mdm_customer_profile.nickname',
                        DB::raw('(SELECT mdm_lookups.lookup_name FROM mdm_lookups WHERE mdm_lookups.id = CAST( mdm_customer_profile.gender as integer)) as gender'),
                        'mdm_customer_profile.dob',
                        DB::raw('(SELECT mdm_mst_kota.name FROM mdm_mst_kota WHERE mdm_mst_kota.id = mdm_customer_profile.pob_id) as pob'),
                        DB::raw('(SELECT mdm_lookups.lookup_name FROM mdm_lookups WHERE mdm_lookups.id = mdm_customer_profile.suku_id) as suku'),
                        DB::raw('(SELECT mdm_lookups.lookup_name FROM mdm_lookups WHERE mdm_lookups.id = mdm_customer_profile.kewarganegaraan_id) as kewarganegaraan'),
                        DB::raw('(SELECT mdm_lookups.lookup_name FROM mdm_lookups WHERE mdm_lookups.id = mdm_customer_profile.religion_id) as agama'),
                        DB::raw('(SELECT mdm_lookups.lookup_name FROM mdm_lookups WHERE mdm_lookups.id = mdm_customer_profile.profesi_id) as profesi'),
                        DB::raw('(SELECT mdm_lookups.lookup_name FROM mdm_lookups WHERE mdm_lookups.id = mdm_customer_profile.status_kawin_id) as status_nikah'),
                        'mdm_customer_profile.email'
                    );

        foreach ($request->all() as $filterName => $value) {
            $decorator = static::createFilterDecorator($filterName);

            if (static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }

        }

        return $query;
    }

    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\Filters\\' . studly_case($name);
    }

    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    private static function getResults(Builder $query, $detailAttrs)
    {
        $results = [];
        

        foreach( $query->get() as $idx => $val ) {
            foreach ( $val->getAttributes() as $key => $result ) {
                $results[$idx][$key] = $result;
            }

            if ( count($val->address) > 0 ) {
                foreach($val->address as $index => $obj ) {
                    $results[$idx]['addresses'][$index] = $obj;

                    $lookupVal = ( $obj->statusTempatTinggalID ) ? $obj->statusTempatTinggalID->lookup_name : '';
                    $results[$idx]['addresses'][$index]['status_tempat_tinggal'] = $lookupVal;

                    $lookupVal = ( $obj->kelurahanID ) ? $obj->kelurahanID->name : '';
                    $results[$idx]['addresses'][$index]['kelurahan'] = $lookupVal;

                    $lookupVal = ( $obj->kecamatanID ) ? $obj->kecamatanID->name : '';
                    $results[$idx]['addresses'][$index]['kecamatan'] = $lookupVal;

                    $lookupVal = ( $obj->kotaID ) ? $obj->kotaID->name : '';
                    $results[$idx]['addresses'][$index]['kota'] = $lookupVal;

                    $lookupVal = ( $obj->provinsiID ) ? $obj->provinsiID->name : '';
                    $results[$idx]['addresses'][$index]['provinsi'] = $lookupVal;
                }
            }

            if ( count($val->bank) > 0 ) {
                foreach($val->bank as $index => $obj ) {
                    $results[$idx]['banks'][$index] = $obj;

                    $lookupVal = ( $obj->namaBank ) ? $obj->namaBank->name : '';
                    $results[$idx]['banks'][$index]['nama_bank'] = $lookupVal;

                    $lookupVal = ( $obj->statusKeaktifanID ) ? $obj->statusKeaktifanID->name : '';
                    $results[$idx]['banks'][$index]['status_keaktifan'] = $lookupVal;

                    $lookupVal = ( $obj->statusData ) ? $obj->statusData->name : '';
                    $results[$idx]['banks'][$index]['status_data'] = $lookupVal;
                }
            }

            if ( count($val->contact) > 0 ) {
                foreach($val->contact as $index => $obj ) {
                    $results[$idx]['contacts'][$index] = $obj;

                    $lookupVal = ( $obj->tipeKontak ) ? $obj->tipeKontak->lookup_name : '';
                    // dd($obj->tipeKontak->lookup_name);
                    $results[$idx]['contacts'][$index]['tipe_kontak'] = $lookupVal;
                }
            }

            if ( count($val->identity) > 0 ) {
                foreach($val->identity as $index => $obj ) {
                    $results[$idx]['identities'][$index] = $obj;

                    $lookupVal = ( $obj->categoryIdentityID ) ? $obj->categoryIdentityID->lookup_name : '';
                    $results[$idx]['identities'][$index]['kategori_identitas'] = $lookupVal;
                }
            }

            if ( count($val->unit) > 0 ) {
                foreach($val->unit as $index => $obj ) {
                    $results[$idx]['units'][$index] = $obj;

                    $lookupVal = ( $obj->statusKeaktifanID ) ? $obj->statusKeaktifanID->lookup_name : '';
                    $results[$idx]['units'][$index]['status_keaktifan'] = $lookupVal;
                }
            }
            
        }

        $collections = collect($results);
        $total = $collections->count();
        $pageSize = 20;

        $paginated = CollectionHelper::paginate($collections, $total, $pageSize);

        return $paginated;
    }
}