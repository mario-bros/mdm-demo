<?php

namespace App\Model\GlobalReports;

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

    protected $connection = 'report';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->created_by = Admin::user()->id;
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
