<?php

namespace App\Model\Lookups;

use Illuminate\Database\Eloquent\Model;

class MDMCity extends Model
{
    protected $table = 'mdm_mst_kota';
	protected $fillable = [
	    'province_id', 'name', 'kode_area'
    ];

    protected $connection = 'pgsql';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public function getNameById($id = 0) {
        if ($id == 0 || $id === NULL) return '';
        return self::where('id', $id)->first()->name;
    }
}
