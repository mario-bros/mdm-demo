<?php

namespace App\Model\Lookups;

use Illuminate\Database\Eloquent\Model;

class MDMProvince extends Model
{
    protected $table = 'mdm_mst_provinsi';
	protected $fillable = [
	    'name'
    ];

    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public function getNameById($id = 0) {
        if ($id == 0 || $id === NULL) return '';
        return self::where('id', $id)->first()->name;
    }
}
