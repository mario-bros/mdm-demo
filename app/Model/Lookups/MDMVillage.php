<?php

namespace App\Model\Lookups;

use Illuminate\Database\Eloquent\Model;

class MDMVillage extends Model
{
    protected $table = 'mdm_mst_kelurahan';
	protected $fillable = [
	    'district_id', 'name'
    ];

    protected $connection = 'pgsql';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public function getNameById($id = 0) {
        if ($id == 0 || $id === NULL) return '';
        return self::where('id', $id)->first()->name;
    }
}
