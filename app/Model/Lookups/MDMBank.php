<?php

namespace App\Model\Lookups;

use Illuminate\Database\Eloquent\Model;

class MDMBank extends Model
{
    protected $table = 'mdm_bank';
	protected $fillable = [
	    'name'
    ];

    protected $connection = 'pgsql';
}
