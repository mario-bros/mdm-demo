<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MappingGolden extends Model
{
    protected $table = 'mdm_staging_mapping_uid_golden';

    // protected $hidden = ['u_id'];
    protected $connection = 'mysql';
}
