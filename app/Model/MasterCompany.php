<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MasterCompany extends Model
{
    protected $table = 'mdm_mst_company';

    public $timestamps = false;

    protected $keyType = 'string';

	protected $fillable = [
        'full_name', 
        'isholding',
        'address', 
        'website',
        'oracle_code',
        'brand_name',
        'email',
        'holding',
        'db_schema',
        'db_user',
        'db_passwd',
        'masking_set',
        'api_secret_key',
    ];

    protected $connection = 'pgsql';

    public static $businessUnitPaths = [
        'MKAP' => 'mkapital',
        'ASET' => 'asset_management',
        'BANK' => 'bank',
        'MVN' => 'vision_networks',
        'LIFE' => 'life',
        'SPIN' => 'spin',
        'STAR' => 'star',
        'VISI' => 'sky_vision',
        'SNDO' => 'sindo',
        'LEAS' => 'guna_usaha_ind',
        'FINA' => 'finance',
        'SEKU' => 'sekuritas',
        'INSU' => 'insurance',
        'PLAY' => 'play',
        'KVIS' => 'digital_vision_nusantara',
        'VPLS' => 'ott_network',
        'ROOV' => 'roov',
        'MNIE' => 'mni_entertaintment',
        'MNCA' => 'mnc_animation',
        'RPLS' => 'rcti_plus',
        'TFTH' => 'the_f_thing',
        'MCON' => 'mnc_contents',
        'INFO' => 'infotainment',
        'OKEZ' => 'okezone',
        'MSSO' => 'single_sign_on',
        'MRAD' => 'mnc_radio'
    ];

    public function getFullNameByUnitName($shortUnitName = '') 
    {
        if ($shortUnitName == '' || $shortUnitName === NULL) return '';
        $fullName = (self::where('id', $shortUnitName)->first() !== null) ? self::where('id', $shortUnitName)->first()->full_name : '';
        return $fullName;
    }

    /*public function scopeWithOutTestUnit($query, $category, $searchKey)
    {
        $query->select('jemaat_induk.*');

        if ($category == self::FIELD_NAMA_MUPEL_FILTER) {

            $query->join('mupel', 'jemaat_induk.id_mupel', '=','mupel.id');
            $query = $query->where('mupel.nama', 'like', '%' . $searchKey . '%');
        } else {

            $query = $query->where('jemaat_induk.nama', 'like', '%' . $searchKey . '%');
        }

        return $query;
    }*/
}
