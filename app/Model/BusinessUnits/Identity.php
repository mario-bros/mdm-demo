<?php

namespace App\Model\BusinessUnits;

use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

use App\Model\Lookups;

class Identity extends Model
{
    protected $table        = 'mdm_customer_identity';
	protected $fillable     = [
        'u_id', 
        'category_identity_id', 
        'nomor_identity', 
        'masa_berlaku', 
        'status_data', 
        'description', 
        'isPrimary', 
        'created_by', 
        'updated_by',
    ];

    public function __construct(){
        parent::__construct();
        $this->connection = \Session::get('unit_name');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if ( $model->created_by == null) $model->created_by = Admin::user()->id;
        });
    }

    // Mengambil relasi untuk show data di table identity
    public function categoryIdentityID()
    {
        return $this->belongsTo(Lookups::class, 'category_identity_id', 'id');
    }

    public function statusData()
    {
        return $this->belongsTo(Lookups::class, 'status_data', 'id');
    }
}
