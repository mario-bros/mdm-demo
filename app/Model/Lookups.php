<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Lookups extends Model
{
    public $timestamps = false;

    protected $connection = 'pgsql';
    protected $table = 'mdm_lookups';
	protected $fillable = [
        'lookup_name', 
        'category', 
        'priority', 
        'kode', 
        'parent_kode', 
        'description',
        'unit'
    ];

    public function getNameById($id = 0) 
    {
        if ($id == 0 || $id === NULL) return '';
        return self::where('id', $id)->first()->lookup_name;
    }

    public static function getCaptionByLookupNameUnit(array $lookups = [], $lookupName = '', $category = '', $unit='TEST')
    {
        if ( empty($lookups) ) return '';

        if ($lookupName == '' || $category == '') return '';

        // Check valid index in lookup's unit
        if ( !isset($lookups[$unit]) ) {
            if ( array_key_exists($lookupName, $lookups['ALL'][$category]) ) {
                return $lookups['ALL'][$category][$lookupName];
            } else {
                return $lookupName;
            }
        }

        // Check valid index in category's lookup name
        if ( array_key_exists($category, $lookups[$unit]) ) {
            if ( isset( $lookups[$unit][$category][$lookupName] ) ) {
                return $lookups[$unit][$category][$lookupName];
            } else {
                Log::notice( 'Undefined index => ' . $unit . ' => ' . $category . ' => ' . $lookupName);
                return '';
            }
            // return $lookups[$unit][$category][$lookupName] ?? '';
        } else {
            if ( array_key_exists($lookupName, $lookups['ALL'][$category]) ) {
                return $lookups['ALL'][$category][$lookupName];
            } else {
                return $lookupName;
            }
            
        }
    }
}