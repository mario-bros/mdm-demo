<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProfileClean extends Model
{
    protected $table = 'mdm_staging_customer_profile_clean';

    // protected $hidden = ['u_id'];
    protected $connection = 'mysql';
    protected $primaryKey = 'id';

    // protected $dateFormat = 'Y-m-d H:i:s.uO';
    // protected $dateFormat = 'Y-m-d H:m';

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function getDateFormat()
    {
        // return 'Y-m-d';
        return 'Y-m-d H:i:s.u';
        // return 'Y-m-d H:i:s';
    }

    public function mappingGolden()
    {
        return $this->belongsTo(MappingGolden::class, 'u_id', 'uid_unit');
    }
}
